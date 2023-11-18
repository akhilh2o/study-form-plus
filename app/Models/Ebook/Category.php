<?php

namespace App\Models\Ebook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'ebook_categories';
    protected $guarded = [];

    public function imageThumb()
    {
        if ($this->image_thumb) {
            return storage($this->image_thumb);
        } else {
            return 'https://ui-avatars.com/api/?name=NIL&background=random';
        }
    }

    public function image()
    {
        if ($this->image) {
            return storage($this->image);
        } else {
            return 'https://ui-avatars.com/api/?name=NIL&background=random';
        }
    }

    public function downloadable_file()
    {
        if ($this->download_file) {
            return public_path('storage/'.$this->download_file);
        } else {
            return 'https://ui-avatars.com/api/?name=NIL&background=random';
        }
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategory()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('is_ebook',false);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
}
