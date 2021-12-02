<?php

if (!function_exists('IsRoute')) {
    # middleware use
    # output: true or false
    function IsRoute($request, $segment)
    { 
        return $request->is($segment);
    }
}


if (!function_exists('RouteName')) {
    function RouteName()
    { 
		return \Route::currentRouteName();
    }
}
