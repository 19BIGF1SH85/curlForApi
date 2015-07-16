<?php
require_once('vendor/autoload.php');
$request_url = 'https://api.github.com/user'; //GitHub Api for access to authenticate user informations
$request_auth = '<YOUR USERNAME>' . ":" . '<YOUR ACCESS TOKEN>'; //GitHub required Basic HTTP authentication with UserName and Token
$request_header = array('User-Agent: <YOUR USERNAME>'); //GitHub required User-Agent header
$request = new projet21\curlforapi($request_url, NULL, $request_header, $request_auth);
$request->curlExecute();
$return = json_decode($request->getReturn(), true);
echo '<pre>';
print_r($return);
echo '</pre>';
