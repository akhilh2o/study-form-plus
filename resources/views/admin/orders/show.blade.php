<x-admin.layout>
    <x-admin.breadcrumb title='Order Detail' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Order', 'url' => route('admin.orders.index')],
                ['text' => 'Detail']
			]" :actions="[
                ['text' => 'All Orders', 'icon' => 'fas fa-list', 'url' => route('admin.orders.index'), 'class' => 'btn-dark btn-loader'],
            ]" />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td><b>Name:</b></td>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <td><b>Mobile:</b></td>
                            <td>{{ $order->mobile }}</td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <td><b>Address:</b></td>
                            <td>
                                {{ $order->address }}
                                <div class="text-small">
                                    {{ $order->city }}
                                    {{ $order->state }}
                                    {{ $order->landmark }}
                                    {{ $order->pincode }}
                                    {{ $order->country }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Payment Status:</b></td>
                            <td>{{ $order?->payment_status ? 'Paid' : 'Unpaid' }}</td>
                        </tr>
                        <tr>
                            <td><b>Order Status:</b></td>
                            <td> {!! Str::ucfirst($order->status) !!}</td>
                        </tr>
                        <tr>
                            <td><b>Total Amount:</b></td>
                            <td>{{ $order?->total }}</td>
                        </tr>
                        <tr>
                            <td><b>Created at:</b></td>
                            <td>{{ date('d-M-y h:i A', strtotime($order->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><h4>Order Items</h4></td>
                        </tr>
                        @foreach ($order->items as $item)
                        <tr>
                            <td><b>Title:</b></td>
                            <td>{{ $item->title }}</td>
                        </tr>
                        <tr>
                            <td><b>Sub Title:</b></td>
                            <td>{{ $item->sub_title }}</td>
                        </tr>
                        <tr>
                            <td><b>Price:</b></td>
                            <td>{{ $item->price }}</td>
                        </tr>
                        <tr>
                            <td><b>Order Type:</b></td>
                            <td>{{ $item->order_type }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-admin.layout>
