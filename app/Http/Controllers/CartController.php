<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $carts = collect(session('cart', []));
        $courses = Course::whereIn('id', $carts->pluck('id'))->get();

        // dd($carts,$courses);
        return view('carts')
            ->with('carts', $carts)
            ->with('courses', $courses);
    }

    public function addtoCart($id, Request $request)
    {
        if ($request?->submit == 'wishlist') {
            return to_route('wishlists.toggle', [
                $id,
                'course_type' => $request->order_type,
                'exam_attempt' => $request->exam_attempt
            ]);
        }
        $course = Course::where('status', true)->findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $cart[$id]['order_type']    = $request?->order_type;
            $cart[$id]['exam_attempt']  = $request?->exam_attempt;
        } else {
            $cart[$id] = [
                "id"            => $course->id,
                "quantity"      => 1,
                "order_type"    => $request?->order_type,
                "exam_attempt"  => $request?->exam_attempt
            ];
        }
        session()->put('cart', $cart);
        return to_route('carts.index')->with('success', 'Course has been added to cart!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"]     = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Course added to cart.');
        }
    }

    public function deleteFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Course successfully deleted!');
        }
    }
}
