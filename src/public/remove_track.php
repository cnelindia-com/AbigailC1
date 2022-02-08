<?php
include "config.php";

$output = array();
if(isset($_POST['delete_id']) && isset($_POST['shop_id']) && isset($_POST['page_id'])){
	$delete_id = $_POST['delete_id'];
	$shop_id = $_POST['shop_id'];
	$page_id = $_POST['page_id'];
	
	
	$sql_c = "SELECT track_title FROM tracks WHERE shop_id = '$shop_id' AND id = '$delete_id'";
	$query_c = mysqli_query($db, $sql_c);
	$query_row = mysqli_fetch_assoc($query_c);
	$file_name = $query_row['track_title'];
	
	$sql = "DELETE FROM tracks WHERE shop_id = '$shop_id' AND id = '$delete_id'";
	mysqli_query($db, $sql);
	
	$sql2 = "DELETE FROM page_tracks WHERE shop_id = '$shop_id' AND id = '$delete_id' AND page_id = '$page_id'";
	mysqli_query($db, $sql2);

	unlink('upload_tracks/'.$file_name);
	$output['result'] = 'success';
	$output['msg'] = 'Track delete successfully.';
	$output['data']['delete_id'] = $delete_id;
}
else{
	$output['result'] = 'error'; 
	$output['msg'] = 'missing request parameter'; 
}

echo json_encode($output);
die();
?>