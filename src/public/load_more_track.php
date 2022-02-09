<?php 
require_once 'config.php';
$rowperpage = 3;
$row = $_POST['row'];

// selecting posts
$query = 'SELECT * FROM tracks limit '.$row.','.$rowperpage;
$result = mysqli_query($db,$query);



while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $title = $row['track_title'];

    
?>


<tr class="post track_row_<?php echo $id;?>" data-id="<?php echo $id;?>" id="post_<?php echo $id; ?>">
	<td>
		<img class="" src="">
		<?php echo $title; ?>
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