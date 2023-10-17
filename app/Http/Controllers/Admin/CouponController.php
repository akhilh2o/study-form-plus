<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('coupon_access');
        $query = Coupon::query();
        if ($request->get('search')) {
            $query->where('title', 'LIKE', '%' . $request->get('search') . '%');
        }
        if ($request->get('status') != null) {
            $query->where('status', $request->get('status'));
        }
        $coupons = $query->paginate(50);

        return view('admin.coupons.index')->with([
            'coupons' => $coupons,
        ]);
    }

    public function create()
    {
        $this->authorize('coupon_create');
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        $this->authorize('coupon_create');
        $request->validate([
            'title'             =>  'required',
            'coupon_code'       =>  'required|unique:coupons,coupon_code',
            'discount_type'     =>  'required|in:flat,percent',
            'discount'          =>  'required',
            'status'            =>  'required|boolean',
            'start_date'        =>  'sometimes',
            'end_date'          =>  'sometimes',
            'description'       =>  'sometimes',
        ]);

        $coupon = new Coupon();
        $coupon->title                   =  $request->post('title');
        $coupon->coupon_code             =  $request->post('coupon_code');
        $coupon->discount_type           =  $request->post('discount_type');
        $coupon->discount                =  $request->post('discount');
        $coupon->status                  =  $request->post('status');
        $coupon->start_date              =  $request->post('start_date');
        $coupon->end_date                =  $request->post('end_date');
        $coupon->description             =  $request->post('description');


        $coupon->save();
        return to_route('admin.coupons.index')->withSuccess('SUCCESS !! New Coupon has been added');
    }

    public function show(Coupon $coupon)
    {
        $this->authorize('coupon_show');
        return view('admin.coupons.show')->with([
            'coupon' =>  $coupon
        ]);
    }

    public function edit(Coupon $coupon)
    {
        $this->authorize('coupon_update');
        return view('admin.coupons.edit')->with([
            'coupon'  =>  $coupon,
        ]);
    }

    public function update(Request $request, Coupon $coupon)
    {
        $this->authorize('coupon_update');
        $request->validate([
            'title'             =>  'required',
            'coupon_code'       =>  'required|unique:coupons,coupon_code,' . $coupon->id,
            'discount_type'     =>  'required|in:flat,percent',
            'discount'          =>  'required',
            'status'            =>  'required|boolean',
            'start_date'        =>  'sometimes',
            'end_date'          =>  'sometimes',
            'description'       =>  'sometimes',
        ]);

        $coupon->title                   =  $request->post('title');
        $coupon->coupon_code             =  $request->post('coupon_code');
        $coupon->discount_type           =  $request->post('discount_type');
        $coupon->discount                =  $request->post('discount');
        $coupon->status                  =  $request->post('status');
        $coupon->start_date              =  $request->post('start_date');
        $coupon->end_date                =  $request->post('end_date');
        $coupon->description             =  $request->post('description');
        $coupon->save();

        return to_route('admin.coupons.index')->withSuccess('SUCCESS !! Coupon has been updated');
    }

    public function destroy(Coupon $coupon)
    {
        $this->authorize('coupon_delete');
        $coupon->delete();
        return to_route('admin.coupons.index')->withSuccess('SUCCESS !! Coupon has been successfully deleted');
    }
}
