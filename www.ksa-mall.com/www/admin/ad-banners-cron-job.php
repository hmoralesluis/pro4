<?php

require_once('../includes/db_con.php');
require_once('../includes/general_functions.php');
require_once('../includes/db_functions.php');



// banners class
class banners {


     //iniating method to get banners
    public function get_banners() {
     
      $email_body = '';
        $email_body .= '<p>  Dear Admin,</p>';
        $email_body .= '<p>  Banners due to expire in 30 Days:</p>';
        $email_body .= '<table border="1"  cellpadding="6" style=" width:100%;">';
        $email_body .= '<tr>';
        $email_body .= '<td style="font-weight:bold; color:black;">Title</td>';
        $email_body .= '<td style="text-weight:bold; color:black;">Expiry Date</td>';
        $email_body .= '</tr>';
        
            $date = date('Y-m-d');
           $NewDate = date('Y-m-d', strtotime("+30 days"));
         
           $ads = mysql_query('SELECT * FROM ad_banners WHERE expiry >= "'.date('Y-m-d').'" AND expiry <="' .date('Y-m-d', strtotime("+30 days")).'" '); 
				
					$adArr = array();
					if(mysql_num_rows($ads) > 0){
						while($ad = mysql_fetch_object($ads)){
							$adArr[] = $ad;
						}
					}
				
                 if(count($adArr) > 0){
                
                    foreach($adArr as $kay => $arr) {
                     $date = $arr->expiry;
                     $email_body .= '<tr>';
                    	$email_body .= '<td>' . $arr->bTitle . '</td>';
                        $email_body .= '<td>' . date('d-m-Y', strtotime($date)) . '</td>';
                     $email_body .= '</tr>';
                      
                   	}
                   }
                  

    $email_body .= '</table>';

        $email_body .= '<p>Expired banners:</p>';
        $email_body .= '<table border="1"  cellpadding="6" style=" width:100%;">';
        $email_body .= '<tr>';
        $email_body .= '<td style="font-weight:bold; color:black;">Title</td>';
        $email_body .= '<td style="text-weight:bold; color:black;">Expiry Date</td>';
        $email_body .= '</tr>';
    $ads = mysql_query('SELECT * FROM ad_banners WHERE expiry <= "'.date('Y-m-d').'" '); 

     $adArr = array();
					if(mysql_num_rows($ads) > 0){
						while($ad = mysql_fetch_object($ads)){
							$adArr[] = $ad;
						}
					}
				
                 if(count($adArr) > 0){
                
                    foreach($adArr as $kay => $arr) {
                    	$date = $arr->expiry;
                     $email_body .= '<tr>';
                    	$email_body .= '<td>' . $arr->bTitle . '</td>';
                        $email_body .= '<td>' . date('d-m-Y', strtotime($date)) . '</td>';
                     $email_body .= '</tr>';
                      
                   	}
                   }
    $email_body .= '</table>';

    return $email_body;


    }

      //iniating method to send email
    public function send_email() {
     
    $emails = mysql_query('SELECT * FROM settings WHERE sID = 1');
    $email = mysql_fetch_object($emails);
     $mails = $email->sValue;

  

$to = $mails;   
$subject = "Information about ad banners!";
$txt = $this->get_banners();
$headers = "MIME-Version: 1.0"  . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: mailbox@libanmall.com" . "\r\n";

$mail = mail($to,$subject,$txt,$headers);

 if($mail){
  echo "mail sent";
 }
 else{
  echo "mail not sent";
 }
    }
}

$banners = new banners;
$banners->send_email();
?>