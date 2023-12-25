<?php

use Illuminate\Support\Facades\DB;







if(!function_exists('menuActive')) {
    function menuActive(
        $uri,
        $output = "bg-gray-200 font-semibold text-slate-700
    font-semibold text-slate-700"
    ) {
        if(is_array($uri)) {
            foreach($uri as $u) {
                if(Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if(Route::is($uri)) {
                return $output;
            }
        }
    }
}
if(!function_exists('set_active_sub_admin')) {
    function subMenuActive(
        $uri,
        $output = "bg-gray-100 font-semibold text-slate-700
    font-semibold text-slate-700"
    ) {
        if(is_array($uri)) {
            foreach($uri as $u) {
                if(Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if(Route::is($uri)) {
                return $output;
            }
        }
    }
}