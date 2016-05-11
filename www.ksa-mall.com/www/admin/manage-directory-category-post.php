<?php

require_once('../includes/db_con.php');
require_once('../includes/general_functions.php');
require_once('../includes/db_functions.php');

$formPostUrl = 'manage-directory-category-post.php';

$returnData = array();
$returnData['status'] = 1;

$action = $_POST['a'];

if ($action == 'addCategory') {
    $catName = $_POST['aDCatName'];

    $insertSql = 'INSERT INTO dir_category SET t_catname = "' . mysql_real_escape_string($catName) . '", i_parent = 2';

    if (mysql_query($insertSql)) {

        $insertedID = mysql_insert_id();

        $returnData['status'] = 0;
        $returnData['msg'] = '<span class="bg-green tip">Category Added Successfully.</span>';

        $tr = '<tr class="dcRow" id="dcRow_' . $insertedID . '">';
        $tr .= '<td>0</td>';
        $tr .= '<td>' . $catName . '</td>';
        $tr .= '<td><a href="manage-directory-category.php?parentID=' . $insertedID . '" title="Manage Sub Categories">Sub Category (0)</a></td>';
        $tr .= '<td><button class="btn btn-sm btn-primary editBtn" data-id="' . $insertedID . '" data-a="getDc" data-u="' . $formPostUrl . '" data-w="editDcWindow"><i class="glyphicon glyphicon-edit"></i></button> <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="' . $insertedID . '" data-a="delDc" data-u="' . $formPostUrl . '" data-at="Directory Category" data-numbering="dcRow" data-column="1" ><i class="glyphicon glyphicon-trash"></i></button></td>';
        $tr .= '</tr>';

        $returnData['tbody'] = $tr;
    }
} elseif ($action == 'addSubCategory') {
    
    $parentID = (int) $_POST['parentID'];
    $catName = $_POST['aDCatName'];

    $insertSql = 'INSERT INTO dir_category SET t_catname = "' . mysql_real_escape_string($catName) . '", i_parent = ' . $parentID;

    if (mysql_query($insertSql)) {

        $insertedID = mysql_insert_id();

        $returnData['status'] = 0;
        $returnData['msg'] = '<span class="bg-green tip">Category Added Successfully.</span>';

        $tr = '<tr class="dcRow" id="dcRow_' . $insertedID . '">';
        $tr .= '<td>0</td>';
        $tr .= '<td>' . $catName . '</td>';
        $tr .= '<td><button class="btn btn-sm btn-primary editBtn" data-id="' . $insertedID . '" data-a="getDc" data-u="' . $formPostUrl . '" data-w="editDcWindow"><i class="glyphicon glyphicon-edit"></i></button> <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="' . $insertedID . '" data-a="delDc" data-u="' . $formPostUrl . '" data-at="Directory Category" data-numbering="dcRow" data-column="1" ><i class="glyphicon glyphicon-trash"></i></button></td>';
        $tr .= '</tr>';

        $returnData['tbody'] = $tr;
    }
    
    
} elseif ($action == 'getDc') {


    $catID = (int) $_POST['id'];

    $sql = "SELECT * FROM dir_category WHERE pa_catid = $catID";
    $catRes = mysql_query($sql);

    if (mysql_num_rows($catRes) > 0) {

        $catRow = mysql_fetch_object($catRes);

        $returnData['status'] = 0;
        $returnData['field']['aEditDCatName'] = $catRow->t_catname;
        $returnData['field']['dCatID'] = $catRow->pa_catid;
    } else {
        $returnData['msg'] = 'Invalid Request, or Record not Found.';
    }
} elseif ($action == 'saveDc') {

    $catID = (int) $_POST['dCatID'];
    $catName = $_POST['aEditDCatName'];

    $updateSql = "UPDATE dir_category SET t_catname = '$catName' WHERE pa_catid = $catID";

    if (mysql_query($updateSql)) {
        $returnData['status'] = 0;
        $returnData['msg'] = '<span class="bg-green tip">Category Updated Successfully.</span>';
        $returnData['html']['DcName_' . $catID] = $catName;
    } else {
        $returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
    }
} elseif ($action == 'delDc') {

    $catID = (int) $_POST['id'];

    $catSql = mysql_query("SELECT cat.*, (SELECT COUNT(*) FROM dir_category AS subcat WHERE subcat.i_parent = cat.pa_catid) AS subcatCount FROM dir_category AS cat WHERE cat.i_parent = 2 AND cat.pa_catid = $catID");

    if (mysql_num_rows($catSql) > 0) {
        $catRow = mysql_fetch_object($catSql);

        if ($catRow->subcatCount > 0) {
            $returnData['msg'] = 'This Category contain Sub Categories, Please Delete them First.';
        } else {

            $delSql = "DELETE FROM dir_category WHERE pa_catid = $catID";

            if (mysql_query($delSql)) {
                $returnData['status'] = 0;
                $returnData['msg'] = '<span class="bg-green tip">Category Deleted Successfully.</span>';
            } else {
                $returnData['msg'] = '<span class="bg-red tip">Error on Deleting Category, Please Contact Support.</span>';
            }
        }
    } else {
        $returnData['msg'] = '<span class="bg-red tip">Invalid Category or Category may Deleted, Please Contact Support.</span>';
    }
} elseif ($action == 'delDcSub') {

    $catID = (int) $_POST['id'];

    $delSql = "DELETE FROM dir_category WHERE pa_catid = $catID";

    if (mysql_query($delSql)) {
        $returnData['status'] = 0;
        $returnData['msg'] = '<span class="bg-green tip">Category Deleted Successfully.</span>';
    } else {
        $returnData['msg'] = '<span class="bg-red tip">Error on Deleting Category, Please Contact Support.</span>';
    }
} else {
    $returnData['msg'] = 'No Request Found.';
}

header('Content-Type: application/json');
print_r(json_encode($returnData));
?>