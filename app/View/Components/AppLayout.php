<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Ebook\Category as EbookCategory;
use Illuminate\View\Component;
use Illuminate\View\View;
use Takshak\Adash\Models\Page;

class AppLayout extends Component
{
    public $pages;
    public $categories;
    public $ebookCategories;
    public function __construct()
    {
        $this->pages = Page::orderBy('title', 'ASC')->get();
        $this->categories = cache()->remember('home_categories', 3600 * 24, function () {
            return Category::query()
                ->with('children.children.children')
                ->where('parent_id', 0)
                ->orderBy('name', 'ASC')
                ->get();
        });

        $this->ebookCategories = EbookCategory::query()
            ->with('children')
            ->where('parent_id', 0)
            ->orderBy('name', 'ASC')
            ->get();
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
