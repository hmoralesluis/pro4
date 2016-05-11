<?php

require_once('../includes/db_con.php');
require_once('../includes/general_functions.php');
require_once('../includes/db_functions.php');

$formPostUrl = 'manage-ecards-post.php';

$returnData = array();
$returnData['status'] = 1;

$action = $_POST['a'];

if ($action == 'add_ecard') {

    // Extracting posted array
    extract($_POST);

    // Supported extensions
    $extension = array("jpg", "png", "gif");

    $tr = NULL;

    // For each uploaded file
    foreach ($_FILES['ecard']['tmp_name'] as $key => $value) {
        $file_name = $_FILES["ecard"]["name"][$key];
        $file_tmp = $_FILES["ecard"]["tmp_name"][$key];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        if (in_array($ext, $extension)) {

            $returnData['status'] = 0;

            // Showing user success message
            $returnData['msg'] = '<span class="bg-green tip">E-Cards has been uploaded!</span>';

            // For checking of duplicate files so we can change the name and then move to folder
            if (!file_exists("../upload/e-cards/" . $file_name)) {
                move_uploaded_file($file_tmp, "../upload/e-cards/" . $file_name);
            } else {
                $filename = basename($file_name, $ext);
                $file_name = $filename . time() . "." . $ext;
                move_uploaded_file($file_tmp, "../upload/e-cards/" . $file_name);
            }

            // Inserting into database
            mysql_query("INSERT INTO ecards SET ec_filename = '$file_name'");

            $insertedID = mysql_insert_id();

            // Showing results
            $tr .= '<tr class="ecRow" id="ecRow_' . $insertedID . '">';
            $tr .= '<td>0</td>';
            $tr .= '<td><img src="../upload/e-cards/' . $file_name . '" alt="" width="100"></td>';
            $tr .= '<td><button class="btn btn-sm btn-primary editBtn" data-id="' . $insertedID . '" data-a="getEc" data-u="' . $formPostUrl . '" data-w="editDcWindow"><i class="glyphicon glyphicon-edit"></i></button> <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="' . $insertedID . '" data-a="delEc" data-u="' . $formPostUrl . '" data-at="E Cards" data-numbering="cRow" data-column="1" ><i class="glyphicon glyphicon-trash"></i></button></td>';
            $tr .= '<td><label><input type="checkbox" class="check" name="listings[]" value="' . $insertedID . '" /></label></td>';
            $tr .= '</tr>';
        } else {
            $returnData['msg'] = '<span class="bg-red tip">Supported image format: .jpg, .png, .gif</span>';
        }
    }
    $returnData['tbody'] = $tr;

} else if ($action == 'getEc') {

    $cID = (int) $_POST['id'];

    $sql = "SELECT * FROM ecards WHERE ec_id = $cID";

    $cRes = mysql_query($sql);

    if (mysql_num_rows($cRes) > 0) {

        $cRow = mysql_fetch_object($cRes);

        $returnData['status'] = 0;
        $returnData['field']['ecURL'] = $cRow->ec_seo_url;
        $returnData['field']['ecID'] = $cID;
        $returnData['field']['cAlt'] = $cRow->ec_alt_tag;
        $returnData['field']['cDesc'] = $cRow->ec_seo_desc;
        $returnData['field']['cKey'] = $cRow->ec_seo_key;

    } else {
        $returnData['msg'] = 'Invalid Request, or Record not Found.';
    }

} else if ($action == 'saveEc') {

    $cID = (int) $_POST['ecID'];
    $cAlt = $_POST['cAlt'];
    $cURL = $_POST['ecURL'];
    $cDesc = $_POST['cDesc'];
    $cKey = $_POST['cKey'];

    $updateSql = "UPDATE ecards SET ec_seo_url = '". mysql_real_escape_string($cURL) . "', ec_alt_tag = '". mysql_real_escape_string($cAlt) . "', ec_seo_desc = '". mysql_real_escape_string($cDesc) . "', ec_seo_key = '". mysql_real_escape_string($cKey) . "' WHERE ec_id = $cID";

    if (mysql_query($updateSql)) {
        $returnData['status'] = 0;
        $returnData['msg'] = '<span class="bg-green tip">E Card Updated Successfully.</span>';
    } else {
        $returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
    }

} else if ($action == 'delEc') {
    $id = $_POST['id'];

    $returnData['status'] = 0;

    $res = mysql_query("SELECT * FROM ecards WHERE ec_id = $id");
    $row = mysql_fetch_object($res);

    unlink(realpath('../upload/e-cards/' . $row->ec_filename));
    $returnData['msg'] = '<span class="bg-green tip">E Card has been deleted!</span>';

    mysql_query("DELETE FROM ecards WHERE ec_id = $id");
} else if ($action == 'deleteSelectedProducts') {

    extract($_POST);

    $returnData['status'] = 0;

    foreach ($_POST['listings'] as $key => $value) {
        $imgID =$_POST['listings'][$key];
        mysql_query("DELETE FROM ecards WHERE ec_id = $imgID");
        $returnData['anim']['ecRow_' . $imgID] = 'remove';
    }

    $returnData['sMsg'] = '<span class="bg-green tip">Selected E Cards has been deleted!</span>';

} else {
    $returnData['msg'] = 'No Request Found.';
}

header("content-type: application/json");
echo json_encode($returnData);
?>