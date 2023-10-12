<x-app-layout>
    <x-breadcrumb title="Carts" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Carts']]" />

    <section class="carts pt-120 pb-120">
        <div class="container">
            <div class="card cart_item">
                <div class="card-body d-flex gap-3">
                    <div class="my-auto">
                        <img src="https://picsum.photos/300/250" alt="" class="rounded course_img">
                    </div>
                    <div class="my-auto">
                        <h6 class="mb-3 lh-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h6>
                        <p class="mb-2">
                            <b>Price:</b>
                            <span>150.00</span>
                            <del>185.00</del>
                        </p>
                        <p class="mb-2">
                            <b>Quantity:</b> <span>1</span>
                        </p>
                        <a href="" class="badge bg-danger">
                            <i class="fas fa-times"></i> Remove
                        </a>
                    </div>
                </div>
            </div>
            <div class="card cart_item">
                <div class="card-body d-flex gap-3">
                    <div class="my-auto">
                        <img src="https://picsum.photos/300/250" alt="" class="rounded course_img">
                    </div>
                    <div class="my-auto">
                        <h6 class="mb-3 lh-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h6>
                        <p class="mb-2">
                            <b>Price:</b>
                            <span>150.00</span>
                            <del>185.00</del>
                        </p>
                        <p class="mb-0">
                            <b>Quantity:</b> <span>1</span>
                        </p>
                        <a href="" class="badge bg-danger">
                            <i class="fas fa-times"></i> Remove
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-end d-flex gap-4 justify-content-between">
                <div class="my-auto">
                    <h4>Total: 1250.00</h4>
                </div>
                <a href="{{ route('checkout') }}" class="btn btn-lg btn-dark px-4 rounded-pill">
                    Procceed Checkout
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
