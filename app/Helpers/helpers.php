<?php


if (!function_exists('getRouterValue')) {
    function getRouterValue() {

        if (config('app.env') === 'production') {

            $__getRoutingValue = '/cork/laravel/modern-dark-menu/';

        } else if (config('app.env') === 'pre_production') {

            $__getRoutingValue = '/cork/laravel_cork_4/modern-dark-menu/';

        } else {

            $__getRoutingValue = '/';

        }

        return $__getRoutingValue;

    }
}

if (!function_exists('setting')) {
    function setting($name, $locale = null) {
        $setting = \App\Models\Setting::where('name', $name)->first();

        if (!$setting) return null;

        $locale = $locale ?? app()->getLocale();

        return $setting->isTranslatableAttribute('content')
            ? $setting->getTranslation('content', $locale)
            : $setting->content;
    }
}
