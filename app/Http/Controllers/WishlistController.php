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

    public function toggle(Course $course, Request $request)
    {
        if (auth()->user()?->wishlists?->pluck('id')?->contains($course->id)) {
            auth()->user()->wishlists()->detach($course->id);
            return back()->withSuccess('SUCCESS !! Course is removed from wishlist');
        } else {
            auth()->user()->wishlists()->attach($course->id, ['course_type' => $request?->course_type]);
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

    public function moveToCart(Course $course, Request $request)
    {
        if (auth()->user()?->wishlists?->pluck('id')?->contains($course->id)) {
            auth()->user()->wishlists()->detach($course->id);

            $course = Course::findOrFail($course->id);
            $cart = session()->get('cart', []);
            if (isset($cart[$course->id])) {
                $cart[$course->id]['quantity']++;
                $cart[$course->id]['order_type'] = $request?->order_type;
            } else {
                $cart[$course->id] = [
                    "id"            => $course->id,
                    "quantity"      => 1,
                    "order_type"    => $request?->order_type
                ];
            }
            session()->put('cart', $cart);
            return to_route('carts.index')->with('success', 'SUCCESS !! Course has been move to cart!');
        }
    }
}
