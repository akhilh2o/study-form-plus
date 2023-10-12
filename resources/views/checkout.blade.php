<x-app-layout>
    <x-breadcrumb title="Checkout" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Carts', 'url' => route('carts.index')], ['text' => 'Checkout']]" />

    <section class="carts pt-120 pb-120">
        <div class="container">
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
                                        <input type="text" class="form-control" name="landmark" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">City*</label>
                                        <input type="text" name="city" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">State*</label>
                                        <input type="text" name="state" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Pincode*</label>
                                        <input type="number" name="pincode" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Country*</label>
                                        <input type="text" name="country" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="list-group mb-4">
                        <li class="list-group-item">
                            <span class="fw-bold d-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                            <span>150 x 2</span>
                            <span class="mx-2">=</span>
                            <span>300</span>
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold d-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                            <span>150 x 2</span>
                            <span class="mx-2">=</span>
                            <span>300</span>
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold d-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                            <span>150 x 2</span>
                            <span class="mx-2">=</span>
                            <span>300</span>
                        </li>
                        <li class="list-group-item">
                            <h6 class="my-2">
                                Total: 650.00
                            </h6>
                        </li>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('checkout') }}" class="btn btn-lg btn-dark px-4 rounded-pill">
                            Place Order
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
