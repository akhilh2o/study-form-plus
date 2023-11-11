<?php

namespace App\Http\Controllers;

use App\Models\Ebook\Category;
use App\Models\Course;
use App\Models\Ebook\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
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

        $courses = Course::when($category, function ($query) use ($category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('id', $category?->id);
            });
        })->paginate()
            ->withQueryString();

        return view('courses')->with([
            'courses'       => $courses,
            'categories'    => $categories,
            'category'      => $category
        ]);
    }

    public function detail(Category $category)
    {
        $courses = Course::select('id', 'title')->where('status', true)->get();
        return view('ebook')->with('category', $category)->with('courses', $courses);
    }
    public function download(Request $request, Category $category)
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'mobile'        => 'required',
            'course_id'     => 'required',
        ]);

        Download::create($request->except('_token'));
        //PDF file is stored under project/public/download/info.pdf
        $downloadable_file = $category->downloadable_file();

        $headers = array(
            'Content-Type: application/pdf',
        );
        // return Storage::disk('public')->download($downloadable_file);
        return response()->download($downloadable_file, $category->slug, $headers);
        // return response()->download($downloadable_file);
    }
}
