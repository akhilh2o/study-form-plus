<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryIds = collect([]);
        if ($request->get('category')) {
            $category = Category::query()
                ->with('children')
                ->where('id', $request->category)
                ->orWhere('slug', $request->category)
                ->first();

            $categoryIds = collect([$category->id])->merge($category->children->pluck('id'));
        }

        $categories = Category::select('id', 'name', 'slug')->get();

        $courses = Course::query()
            ->when($categoryIds->count(), function ($query) use ($categoryIds) {
                $query->whereHas('category', function ($query) use ($categoryIds) {
                    $query->whereIn('id', $categoryIds);
                });
            })
            ->withMax('variations', 'sale_price_download')
            ->withMin('variations', 'sale_price_download')
            ->withMax('variations', 'sale_price_pendrive')
            ->withMin('variations', 'sale_price_pendrive')
            ->paginate(24)
            ->withQueryString();

        return view('courses')->with([
            'courses'       => $courses,
            'categories'    => $categories,
            'category'      => $category
        ]);
    }

    public function detail(Course $course, Request $request)
    {
        $course->load('variations');
        $course->load('category');
        if ($request->attempt) {
            $attempt = $request->attempt;
        } else {
            $attempt = $course?->variations?->first()?->exam_attempt;
        }
        // return $course;
        return view('course')->with('course', $course)->with('attempt', $attempt);
    }
}
