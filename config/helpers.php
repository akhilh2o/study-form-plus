<?php

/**
 * write code for getting value of setting
 */

use App\Models\Course;
use App\Models\Setting;

if (!function_exists('setting')) {
    function setting($type)
    {
        return cache()->remember('settings_' . $type, 3600 * 24, function () use ($type) {
            return Setting::where('option_key', $type)
                ->select('id', 'option_key', 'option_value')
                ->first();
        });
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
        $cacheName = 'categories_courses_' . implode('_', $category_ids) . '_' . $limit . '_' . $popular;
        return cache()->remember($cacheName, 3600 * 24, function () use ($category_ids, $popular, $limit) {
            return Course::whereIn('category_id', $category_ids)
                ->with('variations')
                ->withMax('variations', 'sale_price_download')
                ->withMin('variations', 'sale_price_download')
                ->withMax('variations', 'sale_price_pendrive')
                ->withMin('variations', 'sale_price_pendrive')
                ->when($popular, fn ($q) => $q->where('popular', true))
                ->orderBy('priority', 'ASC')
                ->limit($limit)
                ->get();
        });
    }
}
