<?php
require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'helpers.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_GET['shop'])&&isset($_GET['page-id'])){
	//	print_r ($_GET);
	//$perameater=($_GET);
	//http_build_query=$perameater;
	$page_id = $_GET['page-id'];
	$shop_row = get_install_by_shop($_GET['shop']);
	$shop_id = $shop_row['id'];
	$shop_domain = $_GET['shop'];
	$nonce = $shop_row['nonce'];
	$access_token = $shop_row['access_token'];

//	$validHmac = validateHmac($params, $secret);
//	$validShop = validateShopDomain($params['shop']);
//	$shop = $params['shop'];
//if ($validHmac && $validShop) {
	

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pages</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
		<style>
		div.dataTables_wrapper div.dataTables_filter input {
        	width: 100%;
        	margin-left: 0;
        }
		.dataTables_wrapper .dataTables_filter{
            float: left;
        }
        div.dataTables_wrapper div.dataTables_filter {
        	width:100%;
        }
        div.dataTables_wrapper div.dataTables_filter label {
        	width: 100%;
        }
		#upload_track_field_tb tbody tr{
			cursor: pointer;
		}
		#pages_list_table{
			cursor: pointer;	
		}
		#track_list_table {
			cursor: pointer;	
		}
		
		.trash_a_track {
		  float: right;
		  font-size: 20px;
		}
		.btn.btn-outline-primary.go_back_track_btn {
		  margin-top: 27px;
		}
		.track_heading {
		  float: right;
		  padding-right: 548px;
		  font-size: 23px;
		}
		.checkbox_track {
		  margin-right: 12px;
		}
		.btn.btn-outline-primary.add_track_btn {
		  float: right;
		  margin: -44px 13px 15px 0;
		}
		.tracks_table_heading {
		  font-size: 15px;
		  font-weight: bold;
		  padding-left: 12px;
		  margin-top: 12px;
		}
		.pop_up_heading {
		  color: black;
		  padding: 10px 0 1px 10px;
		  font-size: 22px;
		}
		.w3-teal, .w3-hover-teal:hover {
		  background-color: #fff !important;
		  border-bottom: 2px solid #ccc;
		}
		.w3-display-topright {
		  position: absolute;
		  right: 0px;
		  top: 0px;
		  font-size: 40px;
		  padding: 0px 25px 0 0px;
		  color: black;
		}
		
		.upload-area {
		  width: 15%;
		  height: 105px;
		  border: 2px dashed #918f8f;
		  border-radius: 3px;
		  padding: 10px;
		  margin: 15px 15px 15px -15px;
		}	
		
		.upload-area:hover{
			cursor: pointer;
		}
		
		.upload-area h1 {
		  text-align: center;
		  font-weight: normal;
		  font-family: sans-serif;
		  line-height: 50px;
		  color: darkslategray;
		  font-size: 14px;
		  line-height: 25px;
		}
		
		#track{
			display: none;
		}
		
		/* Thumbnail */
		.thumbnail{
			width: 80px;
			height: 80px;
			padding: 2px;
			border: 2px solid lightgray;
			border-radius: 3px;
			float: left;
			margin: 5px;
		}
		
		.size{
			font-size:12px;
		}
		.w3-button:hover {
		  color: #000 !important;
		}
		.add-track-popup-close:hover {
			background-color: #fff !important;
		}
		.overlay {
			background: #e9e9e9;  
			display: none;        
			position: absolute;   
			top: 0;                  
			right: 0;                
			bottom: 0;
			left: 0;
			opacity: 0.5;
		}
		#loading-img {
			background: url(http://preloaders.net/preloaders/360/Velocity.gif) center center no-repeat;
			height: 100%;
			z-index: 20;
		}
		
			
			.post{
				width: 97%;
				min-height: 200px;
				padding: 5px;
				border: 1px solid gray;
				margin-bottom: 15px;
			}

			.post h1{
				letter-spacing: 1px;
				font-weight: normal;
				font-family: sans-serif;
			}


			.post p{
				letter-spacing: 1px;
				text-overflow: ellipsis;
				line-height: 25px;
			}

			/* Load more */
			.load-more{
				width: 99%;
				background: #15a9ce;
				text-align: center;
				color: white;
				padding: 10px 0px;
				font-family: sans-serif;
			}

			.load-more:hover{
				cursor: pointer;
			}

			
		</style>
</head>
	<body>
        <div class="container">
			<div class="overlay">
				<div id="loading-img"></div>
			</div>
            <h2 style="margin-top: 25px;">Pages</h2>
            <button type="button" value="Go back!" class="btn btn-outline-primary go_back_track_btn" onclick="history.back()" >Go back!</button>
            <h2 style="margin-top: 30px;" class="track_heading">
			<?php
			$check_sql_page = "SELECT page_title FROM pages WHERE page_id = '$page_id' AND shop_id = '$shop_id'";
			$check_query_page = mysqli_query($db, $check_sql_page);
			$check_query_row = mysqli_fetch_assoc($check_query_page);
			$page_title = $check_query_row['page_title'];
			echo $page_title;
			?>
			</h2>
            <div class="table-responsive"> 
				
            	<table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                            <p class="tracks_table_heading">Tracks</p>
                            <button type="button" class="btn btn-outline-primary add_track_btn" value="Add_Track" onclick="document.getElementById('id01').style.display='block'">Add a Track</button>
                    </thead>
				</table>
				<?php 
				$sql_1 = "SELECT track_id FROM page_tracks WHERE page_id = '$page_id' AND shop_id = '$shop_id' ORDER BY id DESC";
				$query1 = mysqli_query($db,$sql_1);
				$total_showing = mysqli_num_rows($query1);
				?>
				<table class="table table-striped table-bordered" style="width:100%; margin:0px;">
					<thead>
						<tr>
							<td style="width:5%;"><input type="checkbox" value="" class="checkbox_track"></td>
							<td id="display_total_page_track">Showing <?php echo $total_showing; ?> tracks</td>
						</tr>
					</thead>
				</table>
					
				<table id="page_track_list_table" class="table table-striped table-bordered" style="width:100%">
				
                    <tbody>
						<?php
						while($result1 = mysqli_fetch_assoc($query1))
						{
							$track_id = $result1['track_id'];
							$sql3 = "SELECT track_title FROM tracks WHERE id = '$track_id'";
							$query3 = mysqli_query($db, $sql3);
							$row3 = mysqli_fetch_assoc($query3);
							$track_title = $row3['track_title'];
							?>
							<tr class="row_page_track_<?php echo $track_id; ?>">
								<td>
									<img src=""><?php echo $track_title; ?>
									<a data-id="<?php echo $track_id; ?>" class="remove_track_from_page" href="javascript:void(0);">
										<i class="fa fa-trash trash_a_track"></i>
									</a>		
								</td>
							</tr>
							<?php
						}
						?>
                    </tbody>  
                </table>
            </div>
         </div>
         <div class="w3-container">
		  <div id="id01" class="w3-modal">
			<div class="w3-modal-content w3-animate-top w3-card-4">
			  <header class="w3-container w3-teal"> 
				<span onclick="document.getElementById('id01').style.display='none'" 
				class="w3-button add-track-popup-close w3-display-topright">&times;</span>
				<h2 class="pop_up_heading">Tracks Library</h2>
			  </header>
			  <div class="w3-container">
				<div class="container">
					<div class="table-responsive"> 
						<table id="upload_track_field_tb" class="table table-striped table-bordered" style="width:100%">
							<tbody>
								<div class="container" >
									<input type="file" name="track" id="track">
						
									<!-- Drag and Drop container-->
									<div class="upload-area"  id="uploadtrack" style="float: left;">
										<h1 class="drag_area_content"><a href="#">Add file</a><br/>Or drop files to<br/> upload</h1>
									</div>
								</div>
								<div style="float: left;display:none;" class="loading_icon">
									<img src="img/loader.gif" />
								</div>
							 </tbody>
						 </table>
						
						<table id="track_list_table" class="table table-striped table-bordered" style="width:100%">
							<tbody>
								<!--<tr><td>No tracks found.</td></tr>-->
							   <?php
								$rowperpage = 5;
								$sql_hw = "SELECT track_title,id FROM tracks WHERE id NOT IN(SELECT track_id FROM page_tracks WHERE page_id = '$page_id' AND shop_id = '$shop_id') order by id desc limit $rowperpage";
								$query1 = mysqli_query($db,$sql_hw);
								$allcount_fetch = mysqli_fetch_array($query1);
								$allcount = $allcount_fetch['allcount'];
								while($result=mysqli_fetch_assoc($query1))
								{
									$id = $result['id'];
									$track_title = $result['track_title'];
									
									?>
									<tr class="post track_row_<?php echo $id;?>" data-id="<?php echo $id;?>" id="post_<?php echo $id; ?>">
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
							   
							</tbody>
			
					   </table>
					   <h1 class="load-more">Load More</h1>
						<input type="hidden" id="row" value="0">
						<input type="hidden" id="all" value="<?php echo $allcount; ?>">
					</div>
				 </div>
			  </div>
			</div>
		  </div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/Javascript"></script>
		<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/Javascript"></script>
		<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js" type="text/Javascript"></script>
		<script>
		var shop_id = <?php echo $shop_id; ?>;
		</script>
		<script src="upload_tracks_script.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var page_id=<?php echo $page_id;?>;
			var shop_id=<?php echo $shop_id;?>;
				
			$(document).on('click', '#track_list_table tbody tr td:not(.action_td)', function(){	

				var track_id = $(this).closest('tr').data("id");
				$(".overlay").show();
				 $.ajax ({
					 
					 url:'add_track_to_page.php',
					 type:'post',
					 data: {track_id: track_id, page_id: page_id,shop_id:shop_id},dataType:'json',
					 success:function(response){
						$(".overlay").hide();
						if(response.result == 'success'){
							$('#id01').hide();
							
							$('#display_total_page_track').html('Showing '+response.total_count+' tracks');
							$( "#page_track_list_table tbody" ).prepend( '<tr class="row_page_track_'+response.data.track_id+'"><td><img src="">'+response.data.track_name+'<a data-id="'+response.data.track_id+'" class="remove_track_from_page" href="javascript:void(0);"><i class="fa fa-trash trash_a_track"></i></a></td></tr>' ); 
							
						}
						else{
							alert(response.msg);
						}
					 }
				});
			});
			
			
			$(document).on('click', '.delete_track', function(){
				
				
				var delete_id = $(this).data('id');
				$(".overlay").show();
				$.ajax ({
					 url:'remove_track.php',
					 type:'post',
					 data: {delete_id: delete_id,page_id:page_id,shop_id:shop_id},
					 dataType:'json',
					 success:function(response){
						$(".overlay").hide();	
						if(response.result == 'success'){
							
							$('.track_row_'+response.data.delete_id).remove();
							
						}
						else{
							alert(response.msg);
						}
					 }
				});
			});
			
			$(document).on('click', '.remove_track_from_page', function(){
				var delete_id = $(this).data('id');
				$(".overlay").show();
				$.ajax ({
					 url:'remove_track_from_page.php',
					 type:'post',
					 data: {delete_id: delete_id,page_id: page_id,shop_id:shop_id},dataType:'json',
					 success:function(response){
						$(".overlay").hide();	
						if(response.result == 'success'){
							
							$('.row_page_track_'+response.data.delete_id).remove();
							$('#display_total_page_track').html('Showing '+response.data.total_remaining+' tracks');
							
						}
						else{
							alert(response.msg);
						}
					 }
				});
			});
			// Load more data
				$('.load-more').click(function(){
					var row = Number($('#row').val());
					var allcount = Number($('#all').val());
					row = row + 3;

					if(row <= allcount){
						$("#row").val(row);

						$.ajax({
							url: 'load_more_track.php',
							type: 'post',
							data: {row:row},
							beforeSend:function(){
								$(".load-more").text("Loading...");
							},
							success: function(response){

								// Setting little delay while displaying new content
								setTimeout(function() {
									// appending posts after last post with class="post"
									$(".post:last").after(response).show().fadeIn("slow");

									var rowno = row + 3;

									// checking row value is greater than allcount or not
									if(rowno > allcount){

										// Change the text and background
										$('.load-more').text("Hide");
										$('.load-more').css("background","darkorchid");
									}else{
										$(".load-more").text("Load more");
									}
								}, 2000);


							}
						});
					}else{
						$('.load-more').text("Loading...");

						// Setting little delay while removing contents
						setTimeout(function() {

							// When row is greater than allcount then remove all class='post' element after 3 element
							$('.post:nth-child(3)').nextAll('.post').remove().fadeIn("slow");

							// Reset the value of row
							$("#row").val(0);

							// Change the text and background
							$('.load-more').text("Load more");
							$('.load-more').css("background","#15a9ce");

						}, 2000);


					}

				});

			});

		</script>
                
	</body>

</html>
<?php
}	
?>


