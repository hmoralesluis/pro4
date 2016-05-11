<?php

require_once('../includes/db_con.php');
require_once('../includes/general_functions.php');
require_once('../includes/db_functions.php');

$formPostUrl = 'manage-directory-company-post.php';

$returnData = array();
$returnData['status'] = 1;

$action = $_POST['a'];

if ($action == 'addCompany') {

    $cName = $_POST['cName'];
    $cAdd = $_POST['cAdd'];
    $cPhone = $_POST['cPhone'];
    $cAbout = $_POST['cAbout'];
    $cCat = $_POST['asubCatIDs2'];
    $slug = strtolower(preg_replace('/-+/', '-', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $_POST['ecName']))));

    $sql = "INSERT INTO dir_members SET t_membername = '" . mysql_real_escape_string($cName) . "', t_address = '" . mysql_real_escape_string($cAdd) . "', t_phone = '" . mysql_real_escape_string($cPhone) . "', m_description = '" . mysql_real_escape_string($cAbout) . "', slug = '$slug'";

    if (mysql_query($sql)) {

        $insertedID = mysql_insert_id();

        $cat_count = count($cCat);
        for ($i = 0; $i < $cat_count; $i++) {
            mysql_query("INSERT INTO dir_member_market SET pi_memberid = $insertedID, pi_marketid = 2, pi_catid = " . $cCat[$i]);
        }

        $returnData['status'] = 0;
        $returnData['msg'] = '<span class="bg-green tip">Company Added Successfully.</span>';

        $cat = mysql_query("SELECT * FROM dir_category WHERE pa_catid = $cCat");
        $getCat = mysql_fetch_object($cat);

        $tr = '<tr class="cRow" id="cRow_' . $insertedID . '">';
        $tr .= '<td>0</td>';
        $tr .= '<td>' . $cName . '</td>';
        $tr .= '<td><button class="btn btn-sm btn-primary editBtn" data-id="' . $insertedID . '" data-a="getC" data-u="' . $formPostUrl . '" data-w="editDcWindow"><i class="glyphicon glyphicon-edit"></i></button> <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="' . $insertedID . '" data-a="delC" data-u="' . $formPostUrl . '" data-at="Directory Category" data-numbering="cRow" data-column="1" ><i class="glyphicon glyphicon-trash"></i></button></td>';
        $tr .= '</tr>';

        $returnData['tbody'] = $tr;
    }
} elseif ($action == 'getC') {

    $cID = (int) $_POST['id'];

    $sql = "SELECT * FROM dir_members AS mem INNER JOIN dir_member_market AS rel ON mem.pa_memberid = rel.pi_memberid INNER JOIN dir_category AS cat ON rel.pi_catid = cat.pa_catid WHERE mem.pa_memberid = $cID";

    $cRes = mysql_query($sql);

    if (mysql_num_rows($cRes) > 0) {

        $cRow = mysql_fetch_object($cRes);

        $returnData['status'] = 0;
        $returnData['field']['ecName'] = $cRow->t_membername;
        $returnData['field']['ecID'] = $cID;
        $returnData['field']['ecAdd'] = $cRow->t_address;
        $returnData['field']['ecPhone'] = $cRow->t_phone;
        $returnData['field']['ecAbout'] = $cRow->m_description;

        $catRes = mysql_query("SELECT * FROM dir_category WHERE i_parent = 2");

        $count = 0;

        $selectedCats = mysql_query("SELECT * FROM dir_member_market WHERE pi_memberid = $cID");

        $catArr = array();

        while ($selectedCatRow = mysql_fetch_object($selectedCats)) {
            $catArr[$selectedCatRow->pi_catid] = $selectedCatRow->pi_catid;
        }

        $ecatLists = null;
        $ecatListsSelected = null;

        while ($catRow = mysql_fetch_object($catRes)) {

            $ecatLists .= '<option value="" data-sort="' . $count . '">' . $catRow->t_catname . '</option>';

            $subCat = "SELECT * FROM dir_category WHERE i_parent = $catRow->pa_catid";
            $subCatRes = mysql_query($subCat);
            while ($subCatRow = mysql_fetch_object($subCatRes)) {
                $count++;

                if (!isset($catArr[$subCatRow->pa_catid])) {
                    $ecatLists .= '<option value="' . $subCatRow->pa_catid . '" data-sort="' . $count . '">&nbsp;&nbsp; - ' . $subCatRow->t_catname . '</option>';
                }
                if (isset($catArr[$subCatRow->pa_catid])) {
                    $ecatListsSelected .= '<option value="' . $subCatRow->pa_catid . '" data-sort="' . $count . '" selected="selected">&nbsp;&nbsp; - ' . $subCatRow->t_catname . '</option>';
                }
            } $count++;
        }

        $returnData['soptions']['catLists'] = $ecatLists;
        $returnData['soptions']['asubCatIDs'] = $ecatListsSelected;
    } else {
        $returnData['msg'] = 'Invalid Request, or Record not Found.';
    }
} elseif ($action == 'saveC') {

    $cID = (int) $_POST['ecID'];
    $cName = $_POST['ecName'];
    $cAdd = $_POST['ecAdd'];
    $cPhone = $_POST['ecPhone'];
    $cAbout = $_POST['ecAbout'];
    $cCat = $_POST['asubCatIDs'];
    $slug = strtolower(preg_replace('/-+/', '-', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $_POST['ecName']))));



    $updateSql = "UPDATE dir_members SET t_membername = '" . mysql_real_escape_string($cName) . "', t_address = '" . mysql_real_escape_string($cAdd) . "', t_phone = '$cPhone', m_description = '" . mysql_real_escape_string($cAbout) . "', slug = '$slug' WHERE pa_memberid = $cID";
    mysql_query("UPDATE dir_member_market SET pi_catid = $cCat WHERE pi_memberid = $cID");
    if (mysql_query($updateSql)) {

        $returnData['status'] = 0;
        $returnData['msg'] = '<span class="bg-green tip">Company Updated Successfully.</span>' . $cat_count;


        mysql_query("DELETE FROM dir_member_market WHERE pi_memberid = $cID");

        $cat_count = count($cCat);
        for ($i = 0; $i < $cat_count; $i++) {
            mysql_query("INSERT INTO dir_member_market SET pi_memberid = $cID, pi_marketid = 2, pi_catid = " . $cCat[$i]);
        }


        $returnData['html']['cName_' . $cID] = $cName;
    } else {
        $returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support. ' . mysql_error() . '</span>';
    }
} elseif ($action == 'delC') {

    $cID = $_POST['id'];

    $delSql = "DELETE FROM dir_members WHERE pa_memberid = $cID";
    $delSql2 = "DELETE FROM dir_member_market WHERE pi_memberid = $cID";

    if (mysql_query($delSql) && mysql_query($delSql2)) {
        $returnData['status'] = 0;
        $returnData['msg'] = '<span class="bg-green tip">Company Deleted Successfully.</span>';
    } else {
        $returnData['msg'] = '<span class="bg-red tip">Error on Deleting Company, Please Contact Support.</span>';
    }
} else {
    $returnData['msg'] = 'No Request Found.';
}


header('Content-Type: application/json');
print_r(json_encode($returnData));
?>