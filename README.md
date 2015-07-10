# PhP Class : CurlForApi

This Class is an easily to use class for making HTTP Request using CURL

## Composents  

You can easily :

* Set up the request URL
* Set up a POST array for the request URL
* Set up a custom HTTP header for the request URL
* Set up a HTTP basic autentication for the request URL

## Methods

## Exemple

We are doing a request to the GitHub api using a [Personal access tokens](https://github.com/settings/tokens)
```php
require_once 'curlforapi.class.php'; //Require the class file
$request_url = 'https://api.github.com/user'; //GitHub Api for access to authenticate user informations
$request_auth = 'ternoc' . ":" . '<YOUR PERSONNAL TOKEN HERE>'; //GitHub required Basic HTTP authentication with UserName and Token
$request_header = array('User-Agent: Ternoc'); //GitHub required User-Agent header
$request = new curlforapi($request_url, NULL, $request_header, $request_auth);
$request->curlExecute();
$return = json_decode($request->getReturn(), true);
?>
<pre><?php print_r($return); ?></pre>

```
