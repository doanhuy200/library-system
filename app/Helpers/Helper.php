<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('classActivePath')) {
    function classActivePath($value)
    {
        if (!is_array($value)) {
            return Route::currentRouteName()  == $value ? 'menu-open' : '';
        }
        foreach ($value as $v) {
            if (Route::currentRouteName() == $v) {
                return 'menu-open';
            }
        }
        return '';
    }
}

if (!function_exists('classActiveSegment')) {
    function classActiveSegment($value)
    {
        if (!is_array($value)) {
            return Route::currentRouteName() == $value ? 'active' : '';
        }
        foreach ($value as $v) {
            if (Route::currentRouteName() == $v) {
                return 'active';
            }
        }
        return '';
    }
}
