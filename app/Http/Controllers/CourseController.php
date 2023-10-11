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
        if ($request->get('category')) {
            $category = Category::query()
                ->where('id', $request->category)
                ->orWhere('slug', $request->category)
                ->first();
        }

        $categories = Category::select('id', 'name')->get();
        $courses = Course::paginate(20);
        return view('courses')->with([
            'courses' => $courses,
            'categories' => $categories,
            'category' => $category
        ]);
    }

    public function detail(Course $course)
    {
        return view('course')->with('course', $course);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
