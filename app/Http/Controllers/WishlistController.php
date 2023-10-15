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

    public function detachFromWishlist(Course $course)
    {
        if (auth()->user()?->wishlists?->pluck('id')?->contains($course->id)) {
            auth()->user()->wishlists()->detach($course->id);
            return back()->withSuccess('SUCCESS !! Course is removed from wishlist');
        }
    }

    public function moveToCart(Course $course)
    {
        if (auth()->user()?->wishlists?->pluck('id')?->contains($course->id)) {
            auth()->user()->wishlists()->detach($course->id);

            $course = Course::findOrFail($course->id);
            $cart = session()->get('cart', []);
            if (isset($cart[$course->id])) {
                $cart[$course->id]['quantity']++;
            } else {
                $cart[$course->id] = [
                    "id"        => $course->id,
                    "quantity"  => 1,
                ];
            }
            session()->put('cart', $cart);
            return to_route('carts.index')->with('success', 'SUCCESS !! Course has been move to cart!');
        }
    }
}
