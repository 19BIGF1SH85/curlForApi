<?php
/**
 * CURL for API is class for using CURL in php and make http request
 */
class curlforapi
{
    protected $url; //HTTP request URL
    protected $postParameters; //HTTP request POST Parameters (optionnal)
    protected $headerParameters; //HTTP Header request (optionnal)
    protected $authentication; //HTTP Basic authentication (optionnal)
    protected $curlReturn; //CURL return HTTP

    function __construct($constructUrl, $constructPost = NULL, $constructHeader = NULL, $constructAuthentication = NULL)
    {
        $this->url = $constructUrl;
        $this->postParameters = $constructPost;
        $this->headerParameters = $constructHeader;
        $this->authentication = $constructAuthentication;
        $this->curlReturn = NULL;
        return true;
    }
    //end of __construct

    //seters
    public function setUrl($constructUrl)
    {
        $this->url = $constructUrl;
        return true;
    }
    public function setPostParameters($constructPost)
    {
        $this->postParameters = $constructPost;
        return true;
    }
    public function setHaderParameters($constructHeader)
    {
        $this->headerParameters = $constructHeader;
        return true;
    }
    //end of seters

    //execute request
    public function curlExecute()
    {
        $curl = curl_init(); //initialization of CURL
        curl_setopt($curl, CURLOPT_URL, $this->url); //request URL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_COOKIESESSION, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //Throw SSL error
        //if defined POST Parameters
        if(!is_null($this->postParameters))
        {
            curl_setopt($curl, CURLOPT_POST, true); //to POST to the URL
            curl_setopt($curl, CURLOPT_POSTFIELDS, $this->postParameters); //POST ARRAY
        }
        //if defined Header Parameters
        if(!is_null($this->headerParameters))
        {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headerParameters); //custom HTTP Header
        }
        //if defined Basic HTTP Authentication
        if(!is_null($this->authentication))
        {
            curl_setopt($curl, CURLOPT_USERPWD, $this->authentication); //basic HTTP autentication
        }

        $this->curlReturn = curl_exec($curl); //return variable (page content)
        curl_close($curl); //close of curl variable
        return true;
    }
    //end of curlExecute

    public function getReturn()
    {
        return $this->curlReturn;
    }
}
