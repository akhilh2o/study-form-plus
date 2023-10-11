<?php

namespace App\Actions;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Takshak\Imager\Facades\Imager;
use Illuminate\Support\Str;

class CourseAction
{
    public function save($course, $request): Course
    {
        $course->category_id               =  $request->post('category_id');
        $course->title                     =  $request->post('title');
        $course->sub_title                 =  $request->post('sub_title');
        $course->slug                      =  Str::slug($request->post('title'));
        $course->description               =  $request->post('description');
        $course->download_link             =  $request->post('download_link');
        $course->status                    =  $request->post('status');
        $course->popular                   =  $request->post('popular');
        $course->meta_title                =  $request->post('meta_title');
        $course->meta_keyword              =  $request->post('meta_keyword');
        $course->meta_description          =  $request->post('meta_description');

        if ($request->file('thumbnail')) {

            if($course->thumbnail) {
                Storage::disk('public')->delete($course->thumbnail);
            }

            $course->thumbnail = 'courses/' . time() . '.' . $request->file('thumbnail')->extension();
            Imager::init($request->file('thumbnail'))
                ->resizeFit(600, 500)
                ->inCanvas('#fff')
                ->save(Storage::disk('public')->path($course->thumbnail));
        }
        $course->save();

        return $course;
    }
}
