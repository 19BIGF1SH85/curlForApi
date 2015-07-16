# PhP Class : CurlForApi

This Class is an easily to use class for making HTTP Request using CURL

## Composents  

You can easily :

* Set up the request URL
* Set up a POST array for the request URL
* Set up a custom HTTP header for the request URL
* Set up a HTTP basic autentication for the request URL

## Install

### Composer

### Manual Install
```php
require_once('src/curlforapi.php');
$request = new projet21\curlforapi($request_url, $request_post, $request_header, $request_auth);
//see below for methods
```

## Methods

### construct

Construct object

```php
BOOL curlforapi.__construct (STRING $constructUrl [, ARRAY $constructPost [, ARRAY $constructHeader [, STRING $constructAuthentication]]]);
```
__Parameters__

Parameter | Description
------------ | -------------
$constructUrl | The HTTP request URL
$constructPost | _optionnal_ An array containing POST parameters for HTTP request
$constructHeader | _optionnal_ An array containing HTTP header request
$constructAuthentication | _optionnal_ user:password format for basic HTTP authentication

_You can set an optionnal parameter to NULL if you don't need to use it_

__Return__
Return true

### setUrl

Set request URL

```php
BOOL curlforapi.setUrl (STRING $constructUrl);
```
__Parameters__

Parameter | Description
------------ | -------------
$constructUrl | The HTTP request URL

__Return__
Return true

### setPostParameters

Set POST parameters URL

```php
BOOL curlforapi.setPostParameters (ARRAY $constructPost);
```
__Parameters__

Parameter | Description
------------ | -------------
$constructPost | An array that contain all the HTTP Post parameters

```php
$constructPost = array(
    'foo' => 'bar',
    'gnn' => 'iegfoiregnreoi',
    'bfefbieuz' => 'hizeufhiuez'
);
```
__Return__
Return true

### setHaderParameters

Set HTTP custom header

```php
BOOL curlforapi.setHaderParameters (ARRAY $constructHeader);
```
__Parameters__

Parameter | Description
------------ | -------------
$constructHeader | An array that contain all the HTTP header

```php
$constructHeader = array(
    'User-Agent: MyApp',
    'Auth-Token: 12235678499bdezfb'
);
```
__Return__
Return true

### setAuthentication

Set basic HTTP authentication

```php
BOOL curlforapi.setAuthentication (STRING $constructAuthentication);
```
__Parameters__

Parameter | Description
------------ | -------------
$constructAuthentication | String format user:password

```php
$constructAuthentication = 'myuser:mypassword'
```
__Return__
Return true

### curlExecute

Execute the request

```php
BOOL curlforapi.curlExecute ();
```
__Parameters__
No parameters nedded

__Return__
Return true

### getReturn

Get the request return

```php
STRING curlforapi.getReturn ();
```
__Parameters__
No parameters nedded

__Return__
Return the curl request


## Exemple

We are doing a request to the GitHub api using a [Personal access tokens](https://github.com/settings/tokens)
```php
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


```
