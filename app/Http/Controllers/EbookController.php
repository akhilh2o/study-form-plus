<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Ebook\Category;
use App\Models\Ebook\Download;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Category $parent, Category $child)
    {
        $ebooks = Category::where('parent_id', $child->id)->paginate(30)
            ->withQueryString();

        return view('ebooks')->with([
            'ebooks'        => $ebooks,
            'category'      => $child,
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

        Download::create($request->except('_token') + ['ebook_category_id' => $category->id]);
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
