<?php

namespace App\Lib;

class CurlRequest
{

    /**
    * GET request using curl
    *
    * @return mixed
    */
	public static function curlContent($url,$header = null)
	{
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	    if ($header) {
	    	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    }
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $result = curl_exec($ch);
	    if (curl_errno($ch)) {
	        $error_msg = curl_error($ch);
	    }
	    curl_close($ch);
	    if (isset($error_msg)) {
	        throw new \Exception($error_msg);
	    }
	    return $result;
	}


    /**
    * POST request using curl
    *
    * @return mixed
    */
	public static function curlPostContent($url, $postData = null, $header = null)
	{
	    $params = is_array($postData) ? http_build_query($postData) : $postData;

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	    if ($header) {
	        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    }
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $result = curl_exec($ch);
	    if (curl_errno($ch)) {
	        $error_msg = curl_error($ch);
	    }
	    curl_close($ch);
	    if (isset($error_msg)) {
	        throw new \Exception($error_msg);
	    }
	    return $result;
	}
}