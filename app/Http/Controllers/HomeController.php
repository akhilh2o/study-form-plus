<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        $courses = Course::where('popular', true)->limit(3)->get();
        $testimonials = Testimonial::select(['avatar', 'title', 'subtitle', 'rating', 'content'])->limit(4)->get();
        $faculties = Faculty::select(['id','avatar', 'title', 'subtitle',])->limit(8)->get();
        return view('home')->with('courses', $courses)
            ->with('testimonials', $testimonials)
            ->with('faculties', $faculties);
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        $testimonials = Testimonial::select(['avatar', 'title', 'subtitle', 'rating', 'content'])->get();
        return view('about')->with('testimonials', $testimonials);
    }

    public function page(Page $page)
    {
        return view('page')->with('page', $page);
    }
}
