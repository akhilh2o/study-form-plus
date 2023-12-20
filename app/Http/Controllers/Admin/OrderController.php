<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatusUpdate;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = Order::query()
            ->when($request->get('search'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->get('search') . '%');
                });
            })
            ->when($request->get('status'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('status', $request->get('status'));
                });
            })
            ->latest()
            ->paginate(25)
            ->withQueryString();

        return view('admin.orders.index')
            ->with('orders', $orders);
    }

    public function statusToggle(Order $order, Request $request)
    {
        $order->update(['status' => $request->status]);
        try {
            Mail::to($order->email)->send(new OrderStatusUpdate($order));
        } catch (\Throwable $th) {
            //throw $th;
        }
        return back()->withSuccess('Status successfully updated');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('items');
        return view('admin.orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
