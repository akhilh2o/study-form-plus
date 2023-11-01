<?php

namespace App\Http\Controllers;

use App\Mail\OrderSuccess;
use App\Models\Coupon;
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
        // return $request;
        $this->cartItems();
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
            'coupon_code'       => 'nullable',
            'coupon_id'         => 'nullable',
        ]);
        $total = 0;
        foreach ($this->courses ?? [] as $course) {
            $total += $course?->sale_price;
            $orderItems[] = [
                'course_id'  => $course->id,
                'title'      => $course->title,
                'sub_title'  => $course->sub_title,
                'price'      => $course->sale_price,
                'slug'       => $course->slug,
                'thumbnail'   => $course->thumbnail,
                'demo_link'   => $course->demo_link,
                'description' => $course->description,
                'order_type'  => $this->carts[$course?->id]['order_type']
            ];
        }


        $order              = new Order;
        $order->name        = $request->name;
        $order->mobile      = $request->mobile;
        $order->email       = $request->email;
        $order->address     = $request->address_link_1;
        $order->landmark    = $request->landmark;
        $order->city        = $request->city;
        $order->state       = $request->state;
        $order->pincode     = $request->pincode;
        $order->country     = $request->country;
        $order->user_id     = auth()?->user()?->id;
        $order->sub_total   = $total;
        $order->total       = $total;

        // checking the coupon code and apply
        if ($request->coupon_code) {
            $coupon = $this->getCoupon($request->coupon_code);
            if ($coupon) {
                $order->coupon_discount_amount = $coupon->discount($total);
                $order->coupon_code            = $request->coupon_code;
                $order->coupon_discount_remark = $request->coupon_code . ' coupon has been applied.';
                $order->total                  = $total - $order->coupon_discount_amount;
            }
        }

        $order->payment_status   = true;
        $order->save();

        $order->items()->createMany($orderItems);
        session()->put('cart', []);

        Mail::to($order->email)->send(new OrderSuccess($order));

        return to_route('checkout.success', [$order])
            ->with('success', 'Your Order has been completed');
    }
    public function cartItems()
    {
        $this->carts = collect(session('cart', []));
        $this->courses = Course::whereIn('id', $this->carts->pluck('id'))->get();
    }

    public function success(Order $order)
    {
        $order->load('items');
        return view('checkout_success')->with('order', $order);
    }

    public function verifyCoupon(Request $request)
    {
        $coupon_id = 0;
        $discountAmount = 0;
        $couponCode = $request->input('coupon_code');
        if ($couponCode && $request->amount) {
            $coupon = $this->getCoupon($couponCode);
            if ($coupon) {
                $coupon_id      = $coupon->id;
                $discountAmount = $coupon->discount($request->amount);
            }
        }

        return response()->json([
            'discount' => $discountAmount,
            'coupon_id' => $coupon_id
        ]);
    }
    public function getCoupon($couponCode)
    {
        return Coupon::where('status', true)->where('coupon_code', $couponCode)->first();
    }
}
