<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function thumbnail()
    {
        return $this->thumbnail ? storage($this->thumbnail) : 'https://picsum.photos/600/500';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variations()
    {
        return $this->hasMany(CourseVariation::class);
    }

}
