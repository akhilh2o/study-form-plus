<x-app-layout>
    <x-breadcrumb title="Checkout"
        :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Carts', 'url' => route('carts.index')], ['text' => 'Payment']]" />

    <section class="carts pt-50 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info">
                                        <p><i class="fas fa-check"></i> Please pay {!! currencySymbol() !!} {{ $order?->total }} to complete your order.</p>
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
                                                <a href="javascript:void(0)" class="badge bg-warning text-white">{{ ucfirst($order?->status) }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="contact-info-item w-100">
                                        <strong class="title">Payment Status</strong>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="badge bg-danger text-white">{{ $order?->payment_status ? 'Paid' :
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
                                                <th scope="col">Attempt</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->items ?? [] as $item)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->exam_attempt }}</td>
                                                <td>{{ ucfirst($item?->order_type) }}</td>
                                                <td>{!! currencySymbol() !!} {{ $item?->price }}</td>
                                            </tr>
                                            @endforeach
                                            @if ($order?->coupon_code)
                                            <tr>
                                                <td colspan="3"></td>
                                                <th scope="row">Discount:</th>
                                                <td><strong>-</strong> {!! currencySymbol() !!} {{
                                                    $order?->coupon_discount_amount }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td colspan="3"></td>
                                                <th scope="row">Sub Total:</th>
                                                <td>{!! currencySymbol() !!} {{ $order?->sub_total }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"></td>
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
            <form action="{{ route('checkout.payment.success') }}" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="text-end">
                            <button type="submit" id="paynow" 
                            class="btn btn-lg btn-dark px-4 rounded-pill">Pay Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @push('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).ready(function () {
            let callbackUrl = "{{ route('checkout.payment.success') }}";
            var options = {
                "key": "{{ env('RAZOR_KEY') }}", 
                "amount": "{{ $razorpayOrder['amount'] }}",
                "currency": "{{ $razorpayOrder['currency'] }}",
                "name": "{{ config('app.name') }}", //your business name
                "description": "Payment for the order id {{ $razorpayOrder['id'] }}",
                "image": "https://www.studyforumplus.in/public/assets/images/logo.jpeg",
                "order_id": "{{ $razorpayOrder['id'] }}", 
                "callback_url": callbackUrl,
                "prefill": { 
                    "name": "{{ $order?->name }}", 
                    "email": "{{ $order?->email }}", 
                    "contact": "{{ $order?->mobile }}" 
                },
                "notes": {
                    "address": "{{ $order?->full_address }}"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };

            // document.getElementById('paynow').click();  

            var rzp1 = new Razorpay(options);

            document.getElementById('paynow').onclick = function(e){
                rzp1.open();
                e.preventDefault();
            }
        });

    </script>
    @endpush
</x-app-layout>
