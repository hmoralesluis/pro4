<?php require_once('../includes/db_con.php');
require_once('../includes/general_functions.php');
require_once('../includes/db_functions.php');

$formPostUrl = 'manage-ecards-temps-post.php';

$returnData = array();
$returnData['status'] = 1;

$action = $_POST['a'];

if ($action == 'add_temp') {

	$temp = $_POST['temp'];

	$insertSql = "INSERT INTO ecards_temps SET t_temp = '$temp'";

	if (mysql_query($insertSql)) {

		$returnData['status'] = 0;
		$returnData['msg'] = '<span class="bg-green tip">Template has been saved!</span>';

		$insertedID = mysql_insert_id();

		$tr = '<tr class="tRow" id="tRow_' . $insertedID . '">';
		$tr .= '<td>0</td>';
		$tr .= '<td>' . $temp . '</td>';
		$tr .= '<td><div class="pull-right"><button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="' . $insertedID . '" data-a="delT" data-u="' . $formPostUrl . '" data-at="E Card Templates" data-numbering="tRow" data-column="1" ><i class="glyphicon glyphicon-trash"></i></button></div></td>';
		$tr .= '</tr>';

		$returnData['tbody'] = $tr;

	}

} else if ($action == 'delT') {
	$id = $_POST['id'];

	$delSql = "DELETE FROM ecards_temps WHERE t_id = $id";

	if (mysql_query($delSql)) {
        $returnData['status'] = 0;
        $returnData['msg'] = '<span class="bg-green tip">Template Deleted Successfully.</span>';
    } else {
        $returnData['msg'] = '<span class="bg-red tip">Error on Deleting Template, Please Contact Support.</span>';
    }

}

header("content-type: application/json");
echo json_encode($returnData);
?>