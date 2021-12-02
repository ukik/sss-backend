<?php

if (!function_exists('is_iframe')) {
    function is_iframe()
    {
        return isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] == 'iframe';
    }   
}

if (!function_exists('SchemeAndHttpHost')) {
    function SchemeAndHttpHost()
    {
    	return request()->getSchemeAndHttpHost();
    }	
}

if (!function_exists('host')) {
    function host()
    {
    	return SchemeAndHttpHost(); 
    }	
}
