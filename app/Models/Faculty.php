<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Faculty extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function avatarUrl()
    {
        return $this->avatar && Storage::disk('public')->exists($this->avatar)
            ? storage($this->avatar)
            : route('imgr.placeholder', ['w' => 300, 'h' => 300, 'text' => $this->title, 'text_size' => 24, 'text_color' => '#666', 'text_angle' => 45]);
    }
}
