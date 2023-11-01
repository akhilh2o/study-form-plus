<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Takshak\Adash\Actions\TestimonialAction;
use Takshak\Imager\Facades\Imager;
use Illuminate\Support\Str;

class FacultyController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('faculties_access');
        $faculties = Faculty::latest()->get();
        return view('admin.faculties.index', compact('faculties'));
    }

    public function create()
    {
        $this->authorize('faculties_create');
        return view('admin.faculties.create');
    }

    public function store(Request $request, TestimonialAction $action)
    {
        $this->authorize('faculties_create');
        $request->validate([
            'avatar'    =>  'nullable|image',
            'title'     =>  'required|max:200',
            'subtitle'  =>  'nullable|max:255',
            'content'   =>  'required',
        ]);

        $faculty = new Faculty;

        if ($request->file('avatar')) {
            $faculty->avatar    = 'faculties/' . Str::of(microtime())->slug('-') . '.';
            $faculty->avatar    .= $request->file('avatar')->extension();

            Imager::init($request->file('avatar'))
                ->resizeFit(300, 300)
                ->inCanvas('#fff')
                ->save(Storage::disk('public')->path($faculty->avatar));
        }

        $faculty->title     = $request->post('title');
        $faculty->subtitle  = $request->post('subtitle');
        $faculty->content   = $request->post('content');
        $faculty->save();

        return to_route('admin.faculties.index')->withSuccess('SUCCESS !! New Faculty is successfully added.');
    }

    public function edit(Faculty $faculty)
    {
        $this->authorize('faculties_update');
        return view('admin.faculties.edit', compact('faculty'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        $this->authorize('faculties_update');
        $request->validate([
            'avatar'    =>  'nullable|image',
            'title'     =>  'required|max:200',
            'subtitle'  =>  'nullable|max:255',
            'content'   =>  'required',
        ]);

        if ($request->file('avatar')) {
            $faculty->avatar    = 'faculties/' . Str::of(microtime())->slug('-') . '.';
            $faculty->avatar    .= $request->file('avatar')->extension();

            Imager::init($request->file('avatar'))
                ->resizeFit(300, 300)
                ->inCanvas('#fff')
                ->save(Storage::disk('public')->path($faculty->avatar));
        }

        $faculty->title     = $request->post('title');
        $faculty->subtitle  = $request->post('subtitle');
        $faculty->content   = $request->post('content');
        $faculty->save();

        return to_route('admin.faculties.index')->withSuccess('SUCCESS !! Faculty is successfully updated.');
    }

    public function destroy(Faculty $faculty)
    {
        $this->authorize('faculties_delete');
        if ($faculty->avatar) {
            Storage::delete([$faculty->avatar]);
        }
        $faculty->delete();

        return to_route('admin.faculties.index')->withSuccess('SUCCESS !! Faculty is not successfully created.');
    }
}
