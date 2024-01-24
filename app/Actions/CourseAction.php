<?php

namespace App\Actions;

use App\Models\Course;
use App\Models\CourseVariation;
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
        $course->demo_link                 =  $this->getYoutubeEmbedUrl($request->post('demo_link'));
        $course->faculties                 =  implode(', ', $request->post('faculties'));
        $course->doubt_solving_faculties   =  $request->post('doubt_solving_faculties');
        $course->language                  =  $request->post('language');
        $course->duration                  =  $request->post('duration');
        // $course->exam_validity             =  $request->post('exam_validity');
        $course->order_type_pendrive       =  $request->post('order_type_pendrive') ?? false;
        $course->order_type_download       =  $request->post('order_type_download') ?? false;
        // $course->net_price                 =  $request->post('net_price');
        // $course->sale_price                =  $request->post('sale_price');
        $course->status                    =  $request->post('status');
        $course->popular                   =  $request->post('popular');
        $course->meta_title                =  $request->post('meta_title');
        $course->meta_keyword              =  $request->post('meta_keyword');
        $course->meta_description          =  $request->post('meta_description');
        $course->priority          =  $request->post('priority');
        $course->with_handbook              =  $request->boolean('with_handbook');

        if ($request->file('thumbnail')) {

            if ($course?->thumbnail) {
                Storage::disk('public')->delete($course?->thumbnail);
            }

            $course->thumbnail = 'courses/' . time() . '.' . $request->file('thumbnail')->extension();
            Imager::init($request->file('thumbnail'))
                ->resizeFit(600, 500)
                ->inCanvas('#fff')
                ->save(Storage::disk('public')->path($course?->thumbnail));
        }
        $course->save();

        if ($course->variations()->count() > 0) {
            $course->variations()->delete();
        }

        foreach ($request->exam_attempt ?? [] as $key => $variation) {
            CourseVariation::create([
                'course_id'          => $course->id,
                'exam_attempt'          => $variation,
                'net_price_download'    => $request->net_price_download[$key],
                'net_price_pendrive'    => $request->net_price_pendrive[$key],
                'sale_price_download'   => $request->sale_price_download[$key],
                'sale_price_pendrive'   => $request->sale_price_pendrive[$key],
            ]);
        }

        return $course;
    }

    public function getYoutubeEmbedUrl($url)
    {
        $youtube_id = '';
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        if ($youtube_id) {
            return 'https://www.youtube.com/embed/' . $youtube_id;
        } else {
            return $url;
        }
    }
}
