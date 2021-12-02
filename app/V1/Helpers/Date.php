<?php

if (!function_exists('Jam_Sekarang')) {
    function Jam_Sekarang()
    {
        return date('H:i:s');
    }
}

if (!function_exists('Sekarang')) {
    function Sekarang()
    {
        return date('Y-m-d H:i:s');
    }
}

if (!function_exists('Hari_Ini')) {
    function Hari_Ini()
    {
        // $today = (new \Carbon\Carbon("today"))->format('Y-m-d');
        return date('Y-m-d');
    }
}

if (!function_exists('Total_Hari')) {
    function Total_Hari()
    {
        return date('t');
    }
}

if (!function_exists('Hari_Ke')) {
    function Hari_Ke()
    {
        return date('d', strtotime(Today()));
    }
}

