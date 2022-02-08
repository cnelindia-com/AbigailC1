<?php
include "config.php";

$output = array();
if(isset($_POST['delete_id']) && isset($_POST['page_id']) && isset($_POST['shop_id'])){
	$delete_id = $_POST['delete_id'];
	$page_id = $_POST['page_id'];
	$shop_id = $_POST['shop_id'];
	
	$sql = "DELETE FROM page_tracks WHERE page_id = '$page_id' AND shop_id = '$shop_id' AND track_id = '$delete_id'";
	mysqli_query($db, $sql);
	
	
	$get_total_tracks_sql = "SELECT COUNT(*) AS total FROM page_tracks WHERE shop_id = '$shop_id' AND page_id = '$page_id'"; 
	$get_total_tracks_query = mysqli_query($db, $get_total_tracks_sql);
	$total_row = mysqli_fetch_assoc($get_total_tracks_query);
	$total = $total_row['total'];

	$output['result'] = 'success';
	$output['msg'] = 'Track delete successfully.';
	$output['data']['delete_id'] = $delete_id;
	$output['data']['total_remaining'] = $total;
}
else{
	$output['result'] = 'error'; 
	$output['msg'] = 'missing request parameter'; 
}

echo json_encode($output);
die();
?>