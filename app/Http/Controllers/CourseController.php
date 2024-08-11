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
        $category = null;
        $categories = null;
        $categoryIds = collect([]);

        if ($request->get('category')) {
            $category = Category::query()
                ->with('children')
                ->withCount('children')
                ->where('id', $request->category)
                ->orWhere('slug', $request->category)
                ->first();


            if ($category?->children_count) {
                $categories = $category?->children;
            }

            $categoryIds = collect([$category->id]);
        } else {
            $categories = Category::select('id', 'name', 'slug')
                ->where('parent_id', 0)
                ->get();
        }

        $courses = Course::query()
            ->whereHas('category', function ($query) use ($categoryIds) {
                $query->whereIn('id', $categoryIds);
            })
            ->with('variations')
            ->withMax('variations', 'sale_price_download')
            ->withMin('variations', 'sale_price_download')
            ->withMax('variations', 'sale_price_pendrive')
            ->withMin('variations', 'sale_price_pendrive')
            ->where('status', true)
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

        $relatedCourses = Course::query()
            ->where('category_id', $course->category_id)
            ->where('status', true)
            ->with('variations')
            ->withMax('variations', 'sale_price_download')
            ->withMin('variations', 'sale_price_download')
            ->withMax('variations', 'sale_price_pendrive')
            ->withMin('variations', 'sale_price_pendrive')
            ->orderBy('priority', 'ASC')
            ->limit(6)
            ->get();

        return view('course')
            ->with('course', $course)
            ->with('attempt', $attempt)
            ->with('relatedCourses', $relatedCourses);
    }
}
