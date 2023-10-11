<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CourseAction;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Takshak\Imager\Facades\Imager;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::query()
            ->when($request->get('search'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->get('search') . '%');
                });
            })
            ->with('category')
            ->latest()
            ->paginate(25)
            ->withQueryString();

        return view('admin.courses.index')
            ->with('courses', $courses);
    }

    public function create()
    {
        $categories = Category::where('parent_id', 0)->with('children')->get();
        return view('admin.courses.create')->with('categories', $categories);
    }

    public function store(Request $request, CourseAction $action)
    {
        $request->validate([
            'title'               =>  'required',
            'category_id'         =>  'required',
            'sub_title'           =>  'nullable',
            'description'         =>  'nullable',
            'status'              =>  'required',
            'popular'             =>  'required',
            'thumbnail'           =>  'nullable|image',
            'download_link'       =>  'nullable',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $action->save(new Course(), $request);

        return to_route('admin.courses.index')->withSuccess('SUCCESS !! New Course is successfully created');
    }


    public function show(Course $course)
    {
        return view('admin.courses.show')->with('course', $course);
    }

    public function edit(Course $course)
    {
        $categories = Category::where('parent_id', 0)->with('children')->get();
        return view('admin.courses.edit')->with('course', $course)
            ->with('categories', $categories);
    }


    public function update(Request $request, Course $course, CourseAction $action)
    {
        $request->validate([
            'title'               =>  'required',
            'category_id'         =>  'required',
            'sub_title'           =>  'nullable',
            'description'         =>  'nullable',
            'status'              =>  'required',
            'popular'             =>  'required',
            'thumbnail'           =>  'nullable|image',
            'download_link'       =>  'required',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $action->save($course, $request);
        return to_route('admin.courses.index')->withSuccess('SUCCESS !! Course is successfully updated');
    }


    public function destroy(Course $course)
    {
        Storage::disk('public')->delete($course->thumbnail);
        $course->delete();
        return to_route('admin.courses.index')->withErrors('Course has been successfully deleted.');
    }

    public function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }

    public function statusToggle(Course $course)
    {
        $course->update(['status' => $course->status ? false : true]);
        return back()->withSuccess('Status successfully updated');
    }
}
