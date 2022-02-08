<?php

// configuration
require_once 'config.php';

$row = $_POST['row'];
$rowperpage = 8;

// selecting posts
$query = 'SELECT * FROM tracks limit '.$row.','.$rowperpage;
$result = mysqli_query($db,$query);

$html = '';

while($result=mysqli_fetch_assoc($query))
{
	$id = $result['id'];
	$track_title = $result['track_title'];
	
	?>
	<tr class="post track_row_<?php echo $id;?>" data-id="<?php echo $id;?>" id="post_<?php echo $id;?>">
		<td>
			<img class="" src="">
			<?php echo $track_title; ?>
		</td>
		<td class="action_td">
			<a class="delete_track" href="javascript:void(0);" data-id="<?php echo $id; ?>"> 
				<i class="fa fa-trash trash_a_track"></i>
			</a>
		</td>
	</tr>
	<?php
}
?>