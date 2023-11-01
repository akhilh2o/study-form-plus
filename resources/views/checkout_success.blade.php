<x-app-layout>
    <x-breadcrumb title="Checkout"
        :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Carts', 'url' => route('carts.index')], ['text' => 'Checkout']]" />
    <section class="carts pt-50 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <p>Your Order has been confirmed! please checkout your email to status.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"> Order Detail </strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="contact-info-item w-100">
                                        <strong class="title">Name</strong>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">{{ $order?->name }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="contact-info-item w-100">
                                        <strong class="title">Mobile</strong>
                                        <ul>
                                            <li>
                                                <a href="tel:{{ $order?->mobile }}">{{ $order?->mobile }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="contact-info-item w-100">
                                        <strong class="title">Email Address</strong>
                                        <ul>
                                            <li>
                                                <a href="Mailto:{{ $order?->email }}">{{ $order?->email }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="contact-info-item w-100">
                                        <strong class="title">Address</strong>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">{{ $order->fullAddress() }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="contact-info-item w-100">
                                        <strong class="title">Order Status</strong>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">{{ ucfirst($order?->status) }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="contact-info-item w-100">
                                        <strong class="title">Payment Status</strong>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">{{ $order?->payment_status ? 'Paid' :
                                                    'Unpaid' }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="contact-info-item w-100">
                                        <strong class="title">Payment Type</strong>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">{{ $order?->payment_type }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="contact-info-item w-100">
                                        <strong class="title">Transaction ID</strong>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">{{ $order->transaction_id }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <strong>Items</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->items ?? [] as $item)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ ucfirst($item?->order_type) }}</td>
                                                <td>{!! currencySymbol() !!} {{ $item?->price }}</td>
                                            </tr>
                                            @endforeach
                                            @if ($order?->coupon_code)
                                            <tr>
                                                <td colspan="2"></td>
                                                <th scope="row">Discount:</th>
                                                <td><strong>-</strong> {!! currencySymbol() !!} {{
                                                    $order?->coupon_discount_amount }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td colspan="2"></td>
                                                <th scope="row">Sub Total:</th>
                                                <td>{!! currencySymbol() !!} {{ $order?->sub_total }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <th scope="row">Total:</th>
                                                <td>{!! currencySymbol() !!} {{ $order?->total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</x-app-layout>
