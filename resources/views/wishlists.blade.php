<x-app-layout>
    <x-breadcrumb title="Wishlists" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Wishlists']]" />

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
                        <a href="" class="badge bg-success">
                            <i class="fas fa-shopping-cart"></i> Move To Cart
                        </a>
                        <a href="" class="badge bg-danger">
                            <i class="fas fa-times"></i> Remove
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
