<?php

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

if (!function_exists('Paginate')) {
    function Paginate($items, $perPage = 5, $page = null, $options = [])
    { 
        $options = ['path' => request()->url(), 'query' => request()->query()];

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}

if (!function_exists('LimitPaginateMobile')) {
    function LimitPaginateMobile($dekstop_row = 15, $mobile_row = 6)
    { 
    	return request()->desktop == 'true' ? $dekstop_row : $mobile_row;
    }
}
