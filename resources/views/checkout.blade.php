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
                                            <input type="text" class="form-control" name="name" value="{{ auth()?->user()?->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Mobile*</label>
                                            <input type="tel" class="form-control" name="mobile" value="{{ auth()?->user()?->mobile }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Email*</label>
                                            <input type="email" class="form-control" name="email" value="{{ auth()?->user()?->email }}" required>
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
                                <span><strong>Course Type -:</strong> {{
                                    Str::ucfirst($carts[$course?->id]['order_type']) }}</span> <br>
                                <span><strong>Price -: </strong>{!! currencySymbol() !!} {{ number_format($course?->sale_price,2) }}</span>
                            </li>
                            @php $total += $course?->sale_price @endphp
                            @endforeach
                            @endif
                            <li class="list-group-item">
                                <h6 class="my-2">
                                    Sub Total: {!! currencySymbol() !!} {{ number_format($total, 2) }}
                                </h6>
                            </li>
                            <li class="list-group-item coupon-discount d-none">
                                <h6 class="my-2">
                                    Discount: {!! currencySymbol() !!} <span id="discount">0.00</span>
                                </h6>
                            </li>
                            <li class="list-group-item">
                                <h6 class="my-2" id="">
                                    Total: {!! currencySymbol() !!} <span id="total"> {{ number_format($total, 2) }}</span>

                                </h6>
                                <input type="hidden" name="total_amt" id="total_amt" value="{{ $total }}">
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-3 coupon-error d-none">
                                    <div class="col"></div>
                                    <div class="col-5">
                                        <small class="text-danger">Invalid coupon.</small>
                                    </div>
                                    <div class="col"></div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="col">
                                        <strong>
                                            <label for="coupon_code">Coupon</label>
                                        </strong>
                                    </div>
                                    <div class="col-5">
                                        <div class="from-group">
                                            <input type="text" class="form-control" name="coupon_code" id="coupon_code"
                                                placeholder="eg-: OFF50" style="text-transform: uppercase;">
                                            <input type="hidden" name="coupon_id" id="coupon_id">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-lg btn-dark px-4" id="coupon_add_btn"><i
                                                class="fas fa-plus"></i></button>
                                        <button type="button" class="btn btn-lg btn-danger px-4"
                                            id="coupon_remove_btn"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-lg btn-dark px-4 rounded-pill">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @push('scripts')
    <script>
        $(document).ready(function () {
            // Cache your jQuery objects to avoid redundant DOM traversal
            const $couponCode = $("#coupon_code");
            const $couponRemoveBtn = $("#coupon_remove_btn");
            const $couponAddBtn = $("#coupon_add_btn");
            const $totalAmt = parseFloat($('#total_amt').val());
            updateCouponState();

            $couponAddBtn.click(function (e) {
                e.preventDefault();
                sessionStorage.setItem("coupon_code", $couponCode.val());
                updateCouponState();
            });

            $couponRemoveBtn.click(function (e) {
                e.preventDefault();
                $couponCode.val('');
                sessionStorage.setItem("coupon_code", '');
                updateCouponState();
            });

            function updateCouponState(){
               let coupon_code =  sessionStorage.getItem("coupon_code");
               if(coupon_code){
                    verifyCoupon(coupon_code,$totalAmt);
                    $couponCode.val(coupon_code).attr('readonly', true);;
                    $couponRemoveBtn.show();
                    $couponAddBtn.hide();
                }else{
                    $(".coupon-error").addClass('d-none');
                    $couponCode.val('').attr('readonly', false);
                    $couponRemoveBtn.hide();
                    $couponAddBtn.show();
                    resetField();
                }
            }
            function verifyCoupon(coupon,amt){
                $.ajax({
                    type: 'POST',
                    url: "{{ route('checkout.verify-coupon') }}",
                    data: { coupon_code: coupon, amount:amt },
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // Include the CSRF token in the headers
                    },
                    success: function (response) {
                        if (response.discount > 0) {
                            let finalPrice = $totalAmt - response.discount;
                            $(".coupon-discount").removeClass('d-none');
                            $("#discount").text(parseFloat(response.discount).toFixed(2));
                            $('#total').text(finalPrice.toFixed(2));
                            $("#coupon_id").val(response.coupon_id);
                            $(".coupon-error").addClass('d-none');
                        } else {
                            $(".coupon-error").removeClass('d-none');
                            resetField();
                        }
                    },
                    error: function (error) {
                        alert('An error occurred while verifying the coupon.');
                    }
                });
            }
            function resetField(){
                $(".coupon-discount").addClass('d-none');
                $("#discount").text(0);
                $('#total').text($totalAmt.toFixed(2));
                $("#coupon_id").val(0);
            }
        });


    </script>
    @endpush
</x-app-layout>
