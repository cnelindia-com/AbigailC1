<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require 'config.php';
require 'helpers.php';


$dotenv = new Dotenv\Dotenv(__DIR__ . str_repeat(DIRECTORY_SEPARATOR . '..', 2));
$dotenv->load();

$config = [
  'apiKey' => $_ENV['API_KEY'],
  'secret' => $_ENV['SECRET'],
  'host' => $_ENV['HOST']
];

$app = new \Slim\App($config);

if(isset($_REQUEST['hmac']) && isset($_REQUEST['locale']) && isset($_REQUEST['shop']) && isset($_REQUEST['timestamp'])){
  echo "<script>";
  echo "window.top.location.href = 'https://".$_REQUEST['shop']."/admin/apps/sound-soulful-audio-player-1/AbigailC1/src/public/welcome.php';";
  echo "</script>";
  die();
}

// install route
$app->get('/', function (Request $request, Response $response) {
	$apiKey = $this->get('apiKey');
	$host = $this->get('host');
	$shop = $request->getQueryParam('shop');
	if (!validateShopDomain($shop)) {
		return $response->getBody()->write("Invalid shop domain!");
	}

  	$redirectUri = $host . $this->router->pathFor('oAuthCallback');
  
  	$scope = 'read_content,write_content,read_themes,write_themes,read_script_tags,write_script_tags';
  
  	$installUrl = "https://{$shop}/admin/oauth/authorize?client_id={$apiKey}&scope={$scope}&redirect_uri={$redirectUri}";

  	return $response->withRedirect($installUrl);
});

// callback route
$app->get('/auth/shopify/callback', function (Request $request, Response $response) {
	$params = $request->getQueryParams();
	$apiKey = $this->get('apiKey');
	$secret = $this->get('secret');
	$validHmac = validateHmac($params, $secret);
	$validShop = validateShopDomain($params['shop']);
	$shop = $params['shop'];

	
	
	if ($validHmac && $validShop) {
		$accessToken = getAccessToken($shop, $apiKey, $secret, $params['code']);

		update_install( $shop, $accessToken, $accessToken );
		
	} else {
		return $response->getBody()->write("This request is NOT from Shopify!");
	}

	//update_install( $shop, $accessToken, $accessToken );
	$linkredirect="https://{$shop}/admin/apps";
	return $response->withRedirect($linkredirect);
})->setName('oAuthCallback');

$app->run();