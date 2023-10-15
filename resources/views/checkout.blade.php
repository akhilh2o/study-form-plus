<x-app-layout>
    <x-breadcrumb title="Checkout"
        :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Carts', 'url' => route('carts.index')], ['text' => 'Checkout']]" />

    <section class="carts pt-120 pb-120">
        <div class="container">
            <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Name*</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Mobile*</label>
                                            <input type="tel" class="form-control" name="mobile" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Email*</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Address Line 1*</label>
                                            <input type="text" class="form-control" name="address_link_1" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Landmark*</label>
                                            <input type="text" class="form-control" name="landmark">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">City*</label>
                                            <input type="text" name="city" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">State*</label>
                                            <input type="text" name="state" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Pincode*</label>
                                            <input type="number" name="pincode" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Country*</label>
                                            <input type="text" name="country" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="list-group mb-4">
                            @php $total = 0 @endphp
                            @if(session('cart'))
                            @foreach($courses ?? [] as $id => $course)
                            <li class="list-group-item">
                                <span class="fw-bold d-block">{{ $course?->title }}</span>
                                <span>{{ number_format($course?->sale_price,2) }} x {{ $carts[$course?->id]['quantity']
                                    }}</span>
                                <span class="mx-2">=</span>
                                <span>{{ $course?->sale_price * $carts[$course?->id]['quantity'] }}</span>
                            </li>
                            @php $total += $course?->sale_price * $carts[$course?->id]['quantity'] @endphp
                            @endforeach
                            @endif
                            <li class="list-group-item">
                                <h6 class="my-2">
                                    Total: {{ number_format($total, 2) }}
                                </h6>
                            </li>
                        </div>
                        <div class="text-end">
                            {{-- <a href="{{ route('checkout') }}" class="btn btn-lg btn-dark px-4 rounded-pill">
                                Place Order
                            </a> --}}
                            <button type="submit" class="btn btn-lg btn-dark px-4 rounded-pill">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
