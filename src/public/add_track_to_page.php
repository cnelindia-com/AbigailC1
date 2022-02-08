<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "config.php";
$output = array();

if(isset($_POST['shop_id'])&&isset($_POST['page_id'])&&isset($_POST['track_id'])){
	$shop_id = $_POST['shop_id'];
	$page_id = $_POST['page_id'];
	$track_id = $_POST['track_id'];

	$check_track_sql = "SELECT id FROM page_tracks WHERE shop_id = '$shop_id' AND page_id = '$page_id' AND track_id = '$track_id'";
	$check_track_query = mysqli_query($db, $check_track_sql);
	if(mysqli_num_rows($check_track_query) > 0){
		$output['result'] = 'error';
		$output['msg'] = 'Track already exist in this page.';
	}
	else{
	
		$sql = "insert into page_tracks SET shop_id = '$shop_id', page_id = '$page_id',track_id = '$track_id'";
		$res = mysqli_query($db,$sql);
		
		if($res){
			$get_total_tracks_sql = "SELECT COUNT(*) AS total FROM page_tracks WHERE shop_id = '$shop_id' AND page_id = '$page_id'"; 
			$get_total_tracks_query = mysqli_query($db, $get_total_tracks_sql);
			$total_row = mysqli_fetch_assoc($get_total_tracks_query);
			$total = $total_row['total'];
			
			
			$tracks_sql = "SELECT track_title FROM tracks WHERE shop_id = '$shop_id' AND id = '$track_id'"; 
			$tracks_query = mysqli_query($db, $tracks_sql);
			$track_row = mysqli_fetch_assoc($tracks_query);
			$track_title = $track_row['track_title'];
			
			$output = array(
					'result' => 'success',
					'total_count' => $total,
					'data' => array(
								'page_id' => $page_id,
								'track_id' => $track_id,
								'track_name' => $track_title
								)
					);
		}
		
	}
}
else{
	$output['result'] = 'error';
	$output['msg'] = 'POST Data is missing.';
}
echo json_encode($output);
die();
?>