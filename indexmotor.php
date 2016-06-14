<?php


define('APP_PATH', dirname(__FILE__));
include('index.php');


//-----------------------Connection Data------------------------------------
$host = "localhost";
$user = "root";
$pass =  "";
$database = "trialconnector";




function sendEmailforTrial($data){
    $fullname = $data['name'];
    $email = $data['email'];
    $trialname = $data['trialname'];

    if($fullname &&  $email && $trialname)
        sendMail($fullname, $email, $trialname);

}


/**
 * Add a record in the log wiht the message recibed in the parameters,
 * can be printed the message in the screen if $print = true
 *
 * @param  string       $msg
 * @param  bool         $print
 */
function errorsRegister($msg, $print = false){
    $date = date('Y-m-d : H:i:s');
    error_log($date." ".$msg."\n",3, APP_PATH.'\logs.log');
    if($print) print_r($msg);
}

//--------------------Open database connection-------------------------
$con = mysqli_connect($host,$user,$pass,$database) or errorsRegister('Database connection failed');

$memtriconditions = array();

//----------Load ID elements from Members table--------------
$querymembers = "SELECT id FROM member";
$listmembers = $con->query($querymembers) or registrar_errores('Query to the table Member failed');

while($linemember = mysqli_fetch_assoc($listmembers) ){

    //----------------Load ID elements from trial table--------------
    $querytrials = "SELECT id FROM trial";
    $listtrials = $con->query($querytrials) or registrar_errores('Query to the table Trial failed');

    while($linetrial = mysqli_fetch_assoc($listtrials) ){

        //------------Load conditions_id elements from member_condition table--------------
        $querymemberconditions = "SELECT condition_id FROM member_condition WHERE member_id = {$linemember['id']}";
        $listmemberconditions = $con->query($querymemberconditions ) or registrar_errores('Query to the table member_condition failed');

        while($linememberconditions = mysqli_fetch_assoc($listmemberconditions)){
            $find = false;
            //--------------Load conditions_id elements from trial_condition table-----------
            $querytrialconditions = "SELECT condition_id FROM trial_condition WHERE trial_id = {$linetrial['id']}";
            $listtrialconditions = $con->query($querytrialconditions) or registrar_errores('Query to the table trial_condition failed');

            while($linetrialconditions = mysqli_fetch_assoc($listtrialconditions)){

                //----------Compare conditions and save the equal relations---------------
                if($linememberconditions['condition_id'] == $linetrialconditions['condition_id']){
                    $aux = array(
                        'member' => $linemember['id'],
                        'trial' => $linetrial['id']
                    );
                    $memtriconditions[] = $aux;
                    $find = true;
                    break;
                }
            }
            if($find) break;
        }
    }
}

//-----------------Search in the array with the relations between members and trials--------------
foreach($memtriconditions as $mtc){

    //------------Check if the member don't have an site-trial with the field current active asigned-------------
    $querytrialsitemember = "SELECT id FROM member_trial_site WHERE member_id = {$mtc['member']} AND current = 1";
    $listtrialsitemember = $con->query($querytrialsitemember) or registrar_errores('Query to the table member_trial_site failed');
    if(mysqli_num_rows($listtrialsitemember)) break;

    //------------Load the trial-site_id-------------
    $querytrialsite = "SELECT id FROM trial_site WHERE id_trial = {$mtc['trial']}";
    $listtrialsite = $con->query($querytrialsite) or registrar_errores('Query to the table trial_site failed');

    while($linetrialsite = mysqli_fetch_assoc($listtrialsite)){
        //-----------------Load the prescreening of the trial-site-----------
        $queryprescreening = "SELECT id FROM prescreening WHERE id_trial_site = {$linetrialsite['id']}";
        $listprescreening = $con->query($queryprescreening) or registrar_errores('Query to the table prescreening failed');

        while($lineprescreening = mysqli_fetch_assoc($listprescreening)){
            //----------Check that does not exist the prescreening for this member-------
            $queryinsertmemprecheck = "SELECT id FROM member_prescreening WHERE member_id = {$mtc['member']} AND prescreening_id = {$lineprescreening['id']}";
            $listinsertmemprecheck = $con->query($queryinsertmemprecheck) or registrar_errores('Query to the table member_prescreening failed');

            if(mysqli_num_rows($listinsertmemprecheck) == 0){
                //----------------Insert the prescreening for the member-----------------
                $queryinsertmempre = "INSERT INTO member_prescreening (member_id, prescreening_id, deleted, answered) VALUES ({$mtc['member']},{$lineprescreening['id']},0,0)";
                $con->query($queryinsertmempre) or registrar_errores('Insertion in the member_prescreening table failed');

                //----Loading Mail Data-----------
                //------Select the member data-------
                $querygetmemberdata = "SELECT fullname, email FROM member WHERE id = {$mtc['member']}";
                $listgetmemberdata = $con->query($querygetmemberdata) or registrar_errores('Query to the table member failed');
                $linememberdata = mysqli_fetch_assoc($listgetmemberdata);

                //------Select the trial data-----------
                $querygettrial= "SELECT title FROM trial WHERE id = {$mtc['trial']}";
                $listgettrial = $con->query($querygettrial) or registrar_errores('Query to the table trial failed');
                $linegettrial = mysqli_fetch_assoc($listgettrial);

                //-------------Save data in the array-------------
                $data = array(
                    'name' => $linememberdata['fullname'],
                    'email' => $linememberdata['email'],
                    'trialname' => $linegettrial['title']
                );

                //-----Call function for send the email---------------
                sendEmailforTrial($data);

            }

        }
    }

}

//Close connection
$con->close();














