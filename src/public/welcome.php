<?php
require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'helpers.php';



if(isset($_GET['shop'])){
	
	$shop_row = get_install_by_shop($_GET['shop']);
	$shop_id = $shop_row['id'];
	$shop_domain = $_GET['shop'];
	$nonce = $shop_row['nonce'];
	$access_token = $shop_row['access_token'];
	
	$perameater=($_GET);
	$allperameater=http_build_query($perameater);

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

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
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
		#pages_list_table tbody tr{
			cursor:pointer;
		}
		</style>
	</head>
    
	<body>
        <div class="container">
            <h2 style="margin-top: 25px;">Pages</h2>
                
            <div class="table-responsive"> 
				<?php 
				/*$pages = rest_api($access_token, $shop_domain, "/admin/api/2022-01/pages.json", array('template_suffix' = 'audio'), 'GET');
				*/
				//$pages = json_decode($pages['data'], true);
				?>
				<!-- <ul id="product-list"> -->
					<?php
						/* foreach($pages as $page){ 
							foreach($page as $key => $value){ 
								echo '<li>' . $value['title'] . '</li>';
							}
						} */
					?>
				<!-- </ul> -->
		
		        
		        <table id="pages_list_table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						$sql = "SELECT * FROM pages WHERE shop_id = '$shop_id'";
						$query = mysqli_query($db, $sql);
						while($row = mysqli_fetch_assoc($query)){
							$page_id = $row['page_id'];
							$page_title = $row['page_title'];	
							$updated_at = $row['updated_at'];	
							?>
							<tr data-href="edit_page.php?page-id=<?php echo $page_id;?>&<?php echo $allperameater; ?>">
								<td><?php echo $page_title; ?></td>
								<td><?php echo date('Y-m-d h:i a',strtotime($updated_at)); ?></td>
							</tr>
							<?php
						}
						?>
                    </tbody>
                    
                </table>
                <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/Javascript"></script>
                <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/Javascript"></script>
                <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js" type="text/Javascript"></script>
                <script type="text/Javascript">
                $(document).ready(function() {
                    $('#pages_list_table').DataTable({
						"pageLength": 50,
						"lengthChange": false,
						"dom": "<'row'<'col-lg-12 col-md-12 col-xs-12'f>>" +
           "<'row'<'col-sm-12'tr>>" +
           "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        "language" : { search: "", searchPlaceholder: "Search pages"},
					});
					
					$('#pages_list_table tbody tr').click(function(){
						$edit_page_url=$(this).data("href");
						window.location = ($edit_page_url);
					});
                });
                </script>
            </div>
        </div>
	</body>
</html>
<?php
}
?>