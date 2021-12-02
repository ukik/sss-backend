<?php

if(!function_exists('bearerToken')) {
    function bearerToken($request)
    {
    	return $request->bearerToken();
    	//return $request->header('Authorization');
        return explode('Bearer ', trim(explode(':', $request->header('Authorization'))[0]))[1];
    }    
}

if(!function_exists('TokenCheck')) {
    function TokenCheck($request)
    {
        return $request->header('Authorization') ? true : false;
    }    
}
