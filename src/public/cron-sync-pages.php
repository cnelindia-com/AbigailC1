<?php
require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'helpers.php';


$get_stores = mysqli_query($db,"SELECT * FROM install WHERE id = '1'");
$row = mysqli_fetch_assoc($get_stores);

$shop_id = $row['id'];
$store_domain = $row['store'];
$access_token = $row['access_token'];

$limit = 250;

$since_id = file_get_contents('since_id.txt');
if(!empty($since_id)){
	$args['since_id'] = $since_id;
	$args['limit'] = $limit; 
	$args['fields'] = 'id,title,template_suffix,updated_at'; 
}
else{
	$args['order'] = 'updated_at asc';
	$args['limit'] = $limit; 
	$args['fields'] = 'id,title,template_suffix,updated_at'; 	
}


$pages_data = performShopifyRequest( $store_domain, $access_token, 'pages', $args, "GET" ); 

if(isset($pages_data['pages']) && count($pages_data['pages']) > 0){
	$pages = $pages_data['pages'];

	foreach($pages as $page){

		$page_id = $page['id'];
	    $page_title = $page['title'];
	    $updated_at = $page['updated_at'];
		$template_suffix = $page['template_suffix'];
		
		
		if($template_suffix == 'audio'){
			
			$updated_at = date('Y-m-d H:i:s', strtotime($updated_at));	
			$query1 = mysqli_query($db, "SELECT * FROM pages WHERE page_id = '$page_id' AND shop_id = '$shop_id'");
			$query_row1 = mysqli_num_rows($query1);
			if($query_row1 == 0){
			    $insert_sql = "INSERT INTO pages SET shop_id = '$shop_id', page_title = '$page_title', page_id = '$page_id', updated_at = '$updated_at'";
				mysqli_query($db, $insert_sql);
			}
			else{
			    $update_sql = "UPDATE pages SET page_title = '$page_title', updated_at = '$updated_at' WHERE shop_id = '$shop_id' AND page_id = '$page_id'";
				mysqli_query($db, $update_sql);
			}
		}
	}
	
	file_put_contents('since_id.txt',$page_id);
}
else{
	file_put_contents('since_id.txt', '');
}
?>