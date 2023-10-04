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
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        } else {
            return 'https://picsum.photos/370/210';
        }
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
