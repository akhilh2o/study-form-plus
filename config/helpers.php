<?php

/**
 * write code for getting value of setting
 */
if (!function_exists('setting')) {
    function setting($type)
    {
        return \App\Models\Setting::where('option_key', $type)
            ->select('id', 'option_key', 'option_value')
            ->first();
    }
}

if (!function_exists('currencySymbol')) {
    function currencySymbol()
    {
        return '<i class="fas fa-rupee-sign"></i>';
    }
}
