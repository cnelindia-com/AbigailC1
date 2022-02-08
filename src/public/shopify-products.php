<?php
require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'helpers.php';

if(isset($_GET['shop'])){
	$shop_domain = $_GET['shop'];
	$shop_row = get_install_by_shop($_GET['shop']);
	$access_token = $shop_row['access_token'];
	
	$query = $_GET['q'];
	
	$args = array(
		'fields' => 'id,title',
		'limit' => 250
	);
	
	
	$check_products_data = performShopifyRequest( $shop_domain, $access_token, 'products', array('title' => $query, 'fields' => 'id,title', 'limit' => 250), "GET" ); 
	
	$products_data = array();
	
	if(isset($check_products_data['products']) && count($check_products_data['products']) > 0){
		$products = $check_products_data['products'];
		foreach($products as $product){
			$products_data[] = array('value' => $product['id'], 'label' => $product['title']);
		}
	}
	else{
		
		$shopify_products_data = performShopifyRequest( $shop_domain, $access_token, 'products', $args, "GET" ); 
		$products = $shopify_products_data['products'];
		if(!empty($query)){
			foreach($products as $product){
				if( stripos( $product['title'], $query ) !== false ) {
					$products_data[] = array('value' => $product['id'], 'label' => $product['title']);
				}
			}
		}
		else{
			foreach($products as $product){
				$products_data[] = array('value' => $product['id'], 'label' => $product['title']);
			}
		}
	}
	

	echo json_encode($products_data);
	die();
}
?>	
