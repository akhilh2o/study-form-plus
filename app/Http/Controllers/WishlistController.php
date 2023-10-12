<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        return view('wishlists');
    }

    public function toggle(Course $course)
    {
        if (auth()->user()?->wishlists?->pluck('id')?->contains($course->id)) {
            auth()->user()->wishlists()->detach($course->id);
            return back()->withSuccess('SUCCESS !! Course is removed from wishlist');
        } else {
            auth()->user()->wishlists()->attach($course->id);
            return back()->withSuccess('SUCCESS !! Course is added to wishlist');
        }
    }
}
