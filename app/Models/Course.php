<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function thumb()
    {
        return $this->thumbnail ? storage($this->thumbnail) : 'https://picsum.photos/600/500';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function minNetPrice()
    {
        return $this->hasMany(CourseVariation::class)->min('net_price_download');
    }

    public function variations()
    {
        return $this->hasMany(CourseVariation::class);
    }

    public function netPriceForDownload($exam_attempt)
    {
        return CourseVariation::select('net_price_download')->where('course_id', $this->id)->where('exam_attempt', $exam_attempt)->pluck('net_price_download')[0];
    }
    public function netPriceForPendrive($exam_attempt)
    {
        return CourseVariation::select('net_price_pendrive')->where('course_id', $this->id)->where('exam_attempt', $exam_attempt)->pluck('net_price_pendrive')[0];
    }

    public function salePriceForDownload($exam_attempt)
    {
        return CourseVariation::select('sale_price_download')->where('course_id', $this->id)->where('exam_attempt', $exam_attempt)->pluck('sale_price_download')[0];
    }
    public function salePriceForPendrive($exam_attempt)
    {
        return CourseVariation::select('sale_price_pendrive')->where('course_id', $this->id)->where('exam_attempt', $exam_attempt)->pluck('sale_price_pendrive')[0];
    }

    function percentOff($netPrice, $salePrice)
    {
        // Ensure both input values are numeric and not zero
        if (!is_numeric($netPrice) || !is_numeric($salePrice) || $netPrice == 0) {
            return "0";
        }

        // Calculate the percentage off
        $percentOff = (($netPrice - $salePrice) / $netPrice) * 100;

        // Return the calculated percentage off
        return number_format($percentOff,2);
    }
}
