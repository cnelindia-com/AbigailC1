<?php
if(isset($_POST['shop_id'])){
include "config.php";
/* Getting file name */
$shop_id = $_POST['shop_id'];
$filename = $_FILES['track']['name'];

/* Getting File size */
$filesize = $_FILES['track']['size'];

/* Location */

$allowed = array('mp3');

$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (!in_array($ext, $allowed)) {
   $output = array(
				'result' => 'error',
				'msg' => 'Please upload mp3 file only.'
				);

	
	echo json_encode($output);
	die(); 
}

$output = array();

$track_add_date = time(); 
$sql1 = "SELECT track_title FROM tracks WHERE track_title='$filename'";
$query1 = mysqli_query($db,$sql1);
if(mysqli_num_rows($query1) > 0){
	$filename = $track_add_date.$filename;
} 

$location = "upload_tracks/".$filename;



/* Upload file */
if(move_uploaded_file($_FILES['track']['tmp_name'],$location)){

	$sql = "insert into tracks SET shop_id = '$shop_id', track_title = '$filename'";
	$query = mysqli_query($db,$sql);	
		
	$track_id = mysqli_insert_id($db);
	
	$output = array(
				'result' => 'success',
				'data' => array(
							'id' => $track_id,
							'name' => $filename
							)
				);
}

echo json_encode($output);
die();
}
?>
