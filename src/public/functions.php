<?php
function add_app_option( $option_name, $option_value )
{
	global $db;

	$q = "INSERT INTO app_options SET option_name = '$option_name', option_value = '$option_value'";
	mysqli_query($db,$q);
}




function update_app_option( $option_name, $option_value )
{
	global $db;
	
	$q1 = "SELECT * FROM  app_options WHERE option_name = '$option_name'";
	$q_res = mysqli_query($db,$q1);
	if(mysqli_num_rows($q_res) > 0){
		$q2 = "UPDATE  app_options SET option_value = '$option_value' WHERE option_name = '$option_name'";
		if(mysqli_query($db,$q2)){
			return true;
		}
		else{
			return false;
		}
	}
	else{
		$q2 = "INSERT INTO  app_options SET option_name = '$option_name', option_value = '$option_value'";
		if(mysqli_query($db,$q2)){
			return true;
		}
		else{
			return false;
		}
	}
}


function get_app_option( $option_name )
{
	global $db;
	$q = "SELECT option_value FROM  app_options WHERE option_name = '$option_name'";
	$query = mysqli_query($db,$q);
	$row = mysqli_fetch_array($query);
	return $row['option_value'];
}

function delete_app_option( $option_name ){
	global $db;
	$q = "DELETE FROM  app_options WHERE option_name = '$option_name'";
	mysqli_query($db,$q);
}

function hwegenerateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function add_install( $store, $nonce, $access_token )
{
	global $db;

    $q = "INSERT INTO install SET store = '$store', nonce = '$nonce', access_token = '$access_token'";
	mysqli_query($db,$q);
}

function update_install( $store, $nonce, $access_token )
{
	global $db;
	
	$q1 = "SELECT * FROM  install WHERE store = '$store'";
	$q_res = mysqli_query($db,$q1);
	if(mysqli_num_rows($q_res) > 0){
		$q2 = "UPDATE install SET nonce = '$nonce', access_token = '$access_token' WHERE store = '$store'";
		if(mysqli_query($db,$q2)){
			return true;
		}
		else{
			return false;
		}
	}
	else{
		$q2 = "INSERT INTO  install SET nonce = '$nonce', access_token = '$access_token', store = '$store'";
		if(mysqli_query($db,$q2)){
			return true;
		}
		else{
			return false;
		}
	}
}


function get_install_by_shop( $store )
{
	global $db;
	$q = "SELECT * FROM  install WHERE store = '$store'";
	$query = mysqli_query($db,$q);
	
	$total = mysqli_num_rows($query);
	if($total > 0){
	    $row = mysqli_fetch_array($query);
	    return $row;
	}
	else{
	    return false;
	}
}

function rest_api($token, $shop, $api_endpoint, $query = array(), $method = 'GET', $request_headers = array()) {
	$url = "https://" . $shop . $api_endpoint;
	if (!is_null($query) && in_array($method, array('GET', 	'DELETE'))) $url = $url . "?" . http_build_query($query);

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, TRUE);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

	$request_headers[] = "";
	$headers[] = "Content-Type: application/json";
	if (!is_null($token)) $request_headers[] = "X-Shopify-Access-Token: " . $token;
	curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);

	if ($method != 'GET' && in_array($method, array('POST', 'PUT'))) {
		if (is_array($query)) $query = json_encode($query);
		curl_setopt ($curl, CURLOPT_POSTFIELDS, $query);
	}
    
	$response = curl_exec($curl);
	$error_number = curl_errno($curl);
	$error_message = curl_error($curl);
	curl_close($curl);

	if ($error_number) {
		return $error_message;
	} else {

		$response = preg_split("/\r\n\r\n|\n\n|\r\r/", $response, 2);
		$headers = array();
		$header_data = explode("\n",$response[0]);
		$headers['status'] = $header_data[0];
		array_shift($header_data);
		foreach($header_data as $part) {
			$h = explode(":", $part);
			$headers[trim($h[0])] = trim($h[1]);
		}

		return array('headers' => $headers, 'data' => $response[1]);

	}
    
}
?>