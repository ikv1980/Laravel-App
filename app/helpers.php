<?php

use Illuminate\Support\Facades\Route;

// Выделение активной вкладки
if (!function_exists('active_link')) {
    function active_link(string $tab, string $class = 'active text-success'): string
    {
        return Route::is($tab) ? $class : '';
    }
}

// Информационное сообщение вверху
if (!function_exists('message')) {
    function message(string $text, string $style): void
    {
        session([
            'alert' => $text,
            'alert_style' => $style,
        ]);
    }
}

// Валидация данных
if (!function_exists('validate')) {
    function validate(array $attributes, array $rule): array
    {
        return validator($attributes, $rule)->validate();
    }
}
