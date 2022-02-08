<?php
require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'helpers.php';



//$recurring_application_charges = performShopifyRequest( 'watches-international.myshopify.com', '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', 'recurring_application_charges', array(), "GET" ); 


/*$plan_active = false;
foreach($recurring_application_charges['recurring_application_charges'] as $r_application_charges){
	if($r_application_charges['status'] == 'active'){
		$plan_active = true;
	}
}*/
///$recurring_application_charges = performShopifyRequest( 'watches-international.myshopify.com', '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', 'recurring_application_charges/12013207670/activate', array(), "POST" ); 

//print_r($recurring_application_charges);




/*
$PEM = array( 'application_charge' => array(
																'name' => 'Simple Rest API Monthly Charge',
																'price' => '19.95',
																'return_url' =>'https://5luckydevelopers.com/simple-rest-api/src/public/install.php?accesstoken=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&shop=watches-international.myshopify.com',
																'test' => true
																//'trial_days' => 0
															));

		$results = performShopifyRequest( 'watches-international.myshopify.com', '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', 'application_charges', $PEM, "POST" ); 
		
		print_r($results);
	
		$linkredirect = $results['application_charges']['confirmation_url'];
		echo $linkredirect;*/
?>