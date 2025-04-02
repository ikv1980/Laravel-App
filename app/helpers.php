<?php

use Illuminate\Support\Facades\Route;

// Выделение активной вкладки
if (!function_exists('active_link')) {
    function active_link(string $tab, string $class = 'active text-success'): string
    {
        return Route::is($tab) ? $class : '';
    }
}

if (!function_exists('message')) {
    function message(string $text, string $style): void
    {
        session([
            'alert' => $text,
            'alert_style' => $style,
        ]);
    }
}
