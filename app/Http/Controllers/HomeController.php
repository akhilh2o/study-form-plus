<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Course;
use App\Models\Faculty;
use Takshak\Adash\Models\Page;
use Takshak\Adash\Models\Testimonial;

class HomeController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->roles->contains('name', 'admin')) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    public function home()
    {
        $courses = Course::where('popular', true)
            ->withMax('variations', 'sale_price_download')
            ->withMin('variations', 'sale_price_download')
            ->withMax('variations', 'sale_price_pendrive')
            ->withMin('variations', 'sale_price_pendrive')
            ->orderBy('priority', 'ASC')
            ->limit(3)
            ->get();
        $testimonials = Testimonial::select(['avatar', 'title', 'subtitle', 'rating', 'content'])->limit(4)->get();
        $faculties = Faculty::select(['id', 'avatar', 'title', 'subtitle',])->limit(8)->get();
        $categories = Category::query()
            ->has('courses')
            ->where('parent_id', 0)
            ->with(['children' => function ($query) {
                $query->select('id', 'parent_id', 'name', 'slug');
                $query->has('courses');
            }])
            ->orderBy('name', 'ASC')
            ->withCount('courses')
            ->get();

        $banners = Banner::latest()->get();
        $notices = setting('notices') ?? NULL;

        return view('home')->with('courses', $courses)
            ->with('testimonials', $testimonials)
            ->with('categories', $categories)
            ->with('faculties', $faculties)
            ->with('banners', $banners)
            ->with('notices', $notices);
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        $faculties = Faculty::select(['id', 'avatar', 'title', 'subtitle',])->limit(4)->get();
        $testimonials = Testimonial::select(['avatar', 'title', 'subtitle', 'rating', 'content'])->get();
        return view('about')
            ->with('testimonials', $testimonials)
            ->with('faculties', $faculties);
    }

    public function page(Page $page)
    {
        return view('page')->with('page', $page);
    }
}
