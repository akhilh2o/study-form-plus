<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;
use Takshak\Adash\Models\Page;

class AppLayout extends Component
{
    public $pages;
    public $categories;
    public function __construct()
    {
        $this->pages = Page::orderBy('title', 'ASC')->get();
        $this->categories = Category::orderBy('name', 'ASC')->get();
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
