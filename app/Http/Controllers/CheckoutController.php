<?php

namespace App\Http\Controllers;

use App\Mail\OrderSuccess;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public $courses;
    public $carts;
    public function index(Request $request)
    {
        $this->cartItems();
        return view('checkout')
            ->with('carts', $this->carts)
            ->with('courses', $this->courses);
    }

    public function checkout(Request $request)
    {
        $this->cartItems();
        // return $request;
        // dd($this->carts, $this->courses);
        $request->validate([
            'name'              => 'required',
            'mobile'            => 'required',
            'email'             => 'required|email',
            'address_link_1'    => 'required',
            'landmark'          => 'required',
            'city'              => 'required',
            'state'             => 'required',
            'pincode'           => 'required',
            'country'           => 'required',
        ]);
        $total = 0;
        foreach ($this->courses ?? [] as $course) {
            $course?->sale_price * $this->carts[$course?->id]['quantity'];
            $total += $course?->sale_price * $this->carts[$course?->id]['quantity'];
            $orderItems[] = [
                'course_id'  => $course->id,
                'title'      => $course->title,
                'sub_title'  => $course->sub_title,
                'price'      => $course->sale_price,
                'slug'       => $course->slug,
                'thumbnail'   => $course->thumbnail,
                'demo_link'   => $course->demo_link,
                'description' => $course->description,
                'order_type'  => 'download'
            ];
        }

        $order = new Order;
        $order->name    = $request->name;
        $order->mobile  = $request->mobile;
        $order->email   = $request->email;
        $order->address = $request->address_link_1;
        $order->landmark = $request->landmark;
        $order->city     = $request->city;
        $order->state    = $request->state;
        $order->pincode  = $request->pincode;
        $order->country  = $request->country;
        $order->user_id  = auth()?->user()?->id;
        $order->total       = $total;
        $order->payment_status   = true;
        $order->save();

        $order->items()->createMany($orderItems);
        session()->put('cart', []);

        Mail::to($order->email)->send(new OrderSuccess($order));

        return to_route('checkout.success')
            ->with('success', 'Your Order has been completed');
    }
    public function cartItems()
    {
        $this->carts = collect(session('cart', []));
        $this->courses = Course::whereIn('id', $this->carts->pluck('id'))->get();
    }

    public function success()
    {
        return view('checkout_success');
    }
}
