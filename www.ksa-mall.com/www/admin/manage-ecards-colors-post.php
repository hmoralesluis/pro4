<?php require_once('../includes/db_con.php');
require_once('../includes/general_functions.php');
require_once('../includes/db_functions.php');

$formPostUrl = 'manage-ecards-colors-post.php';

$returnData = array();
$returnData['status'] = 1;

$action = $_POST['a'];

if ($action == 'add_color') {

	$bgColor = $_POST['bgcolor'];
	$fgColor = $_POST['fontcolor'];

	$insertSql = "INSERT INTO ecards_colors SET c_bg_color = '$bgColor', c_fg_color = '$fgColor'";

	if (mysql_query($insertSql)) {

		$returnData['status'] = 0;
		$returnData['msg'] = '<span class="bg-green tip">Colors has been saved!</span>';

		$insertedID = mysql_insert_id();

		$tr = '<tr class="cRow" id="cRow_' . $insertedID . '">';
		$tr .= '<td>0</td>';
		$tr .= '<td><div style="background: ' . $bgColor . '; color: ' . $fgColor . '; padding: 2px 5px;`">The quick brown fox jumps over the lazy dog</div></td>';
		$tr .= '<td>' . $bgColor . '</td>';
		$tr .= '<td>' . $fgColor . '</td>';
		$tr .= '<td><div class="pull-right"><button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="' . $insertedID . '" data-a="delC" data-u="' . $formPostUrl . '" data-at="E Card" data-numbering="cRow" data-column="1" ><i class="glyphicon glyphicon-trash"></i></button></div></td>';
		$tr .= '</tr>';

		$returnData['tbody'] = $tr;

	}

} else if ($action == 'delC') {
	$id = $_POST['id'];

	$delSql = "DELETE FROM ecards_colors WHERE c_id = $id";

	if (mysql_query($delSql)) {
        $returnData['status'] = 0;
        $returnData['msg'] = '<span class="bg-green tip">Color Deleted Successfully.</span>';
    } else {
        $returnData['msg'] = '<span class="bg-red tip">Error on Deleting Color, Please Contact Support.</span>';
    }

}

header("content-type: application/json");
echo json_encode($returnData);
?>