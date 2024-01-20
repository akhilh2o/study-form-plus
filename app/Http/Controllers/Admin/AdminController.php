<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Order;
use App\Models\User;
use Takshak\Adash\Traits\Controllers\Admin\AdminTrait;

class AdminController extends Controller
{
    use AdminTrait;

    public function index($value = '')
    {
        $categories_count  = Category::count();
        $courses_count  = Course::count();
        $orders_count  = Order::count();
        $faculties_count  = Faculty::count();
        $users_count  = User::count();

        return view('admin.dashboard', [
            'categories_count' => $categories_count,
            'courses_count' => $courses_count,
            'orders_count' => $orders_count,
            'users_count' => $users_count,
            'faculties_count' => $faculties_count,
        ]);
    }
}
