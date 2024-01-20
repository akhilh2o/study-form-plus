<?php

/**
 * write code for getting value of setting
 */

use App\Models\Course;

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

if (!function_exists('courseByCategory')) {
    function courseByCategory($category_ids, $limit = 3, $popular = false)
    {
        return Course::whereIn('category_id', $category_ids)
            ->withMax('variations', 'sale_price_download')
            ->withMin('variations', 'sale_price_download')
            ->withMax('variations', 'sale_price_pendrive')
            ->withMin('variations', 'sale_price_pendrive')
            ->when($popular, fn($q) => $q->where('popular', true))
            ->limit($limit)
            ->get();
    }
}
