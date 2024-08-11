<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CourseAction;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Faculty;
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
                    $query->where('title', 'like', '%' . $request->get('search') . '%');
                    $query->orWhere('sub_title', 'like', '%' . $request->get('search') . '%');
                    $query->orWhere('slug', 'like', '%' . $request->get('search') . '%');
                    $query->orWhere('description', 'like', '%' . $request->get('search') . '%');
                });
            })
            ->columnFilter()
            ->with('category')
            ->with('variations')
            ->latest()
            ->paginate(50);

        $categories = collect();
        if ($request->get('filter')) {
            $categories = Category::where('parent_id', 0)->with('children.parent')->get();
        }

        return view('admin.courses.index')
            ->with('categories', $categories)
            ->with('courses', $courses);
    }

    public function create()
    {
        $categories = Category::where('parent_id', 0)->with('children')->get();
        $faculties = Faculty::select('id', 'title')->get();
        return view('admin.courses.create')->with(['categories' => $categories, 'faculties' => $faculties]);
    }

    public function store(Request $request, CourseAction $action)
    {
        // return $request;
        $request->validate([
            'title'                     =>  'required',
            'category_id'               =>  'required',
            'sub_title'                 =>  'nullable',
            'description'               =>  'nullable',
            'status'                    =>  'required',
            'popular'                   =>  'required',
            'thumbnail'                 =>  'nullable|image',
            'demo_link'                 =>  'nullable',
            'demo_link2'                =>  'nullable',
            'faculties'                 =>  'required|array',
            'doubt_solving_faculties'   =>  'required',
            'language'                  =>  'required',
            'duration'                  =>  'required',

            'exam_attempt'          =>  'required|array',
            'exam_attempt.*'        =>  'required|string',
            'net_price_download'    =>  'required|array',
            'net_price_download.*'  =>  'required',
            'net_price_pendrive'    =>  'required|array',
            'net_price_pendrive.*'  =>  'required',
            'sale_price_download'    =>  'required|array',
            'sale_price_download.*'  =>  'required',
            'sale_price_pendrive'    =>  'required|array',
            'sale_price_pendrive.*'  =>  'required',

            'order_type_pendrive' =>  'nullable',
            'order_type_download' =>  'nullable',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $action->save(new Course(), $request);
        cache()->flush();
        return to_route('admin.courses.index')->withSuccess('SUCCESS !! New Course is successfully created');
    }


    public function show(Course $course)
    {
        $course->load('variations');
        return view('admin.courses.show')->with('course', $course);
    }

    public function edit(Course $course)
    {
        $course->load('variations');
        $faculties = Faculty::select('id', 'title')->get();
        $categories = Category::where('parent_id', 0)->with('children')->get();
        return view('admin.courses.edit')->with('course', $course)
            ->with('categories', $categories)
            ->with('faculties', $faculties);
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
            'demo_link'           =>  'nullable',
            'demo_link2'          =>  'nullable',
            'faculties'           =>  'required|array',
            'doubt_solving_faculties'  =>  'required',
            'language'            =>  'required',
            'duration'            =>  'required',

            'order_type_pendrive' =>  'nullable',
            'order_type_download' =>  'nullable',

            'exam_attempt'          =>  'required|array',
            'exam_attempt.*'        =>  'required|string',
            'net_price_download'    =>  'required|array',
            'net_price_download.*'  =>  'required',
            'net_price_pendrive'    =>  'required|array',
            'net_price_pendrive.*'  =>  'required',
            'sale_price_download'    =>  'required|array',
            'sale_price_download.*'  =>  'required',
            'sale_price_pendrive'    =>  'required|array',
            'sale_price_pendrive.*'  =>  'required',

            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $action->save($course, $request);
        cache()->flush();
        return to_route('admin.courses.index')->withSuccess('SUCCESS !! Course is successfully updated');
    }


    public function destroy(Course $course)
    {
        if (File::exists(Storage::disk('public')->path($course?->thumbnail ?? ''))) {
            Storage::disk('public')->delete($course->thumbnail ?? '');
        }
        $course->delete();
        cache()->flush();
        return to_route('admin.courses.index')->withErrors('Course has been successfully deleted.');
    }

    public function statusToggle(Course $course)
    {
        $course->update(['status' => $course->status ? false : true]);
        return back()->withSuccess('Status successfully updated');
    }
}
