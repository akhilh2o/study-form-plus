<x-app-layout>
    <x-breadcrumb title="Wishlists" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Wishlists']]" />

    <section class="carts pt-120 pb-120">
        <div class="container">
            @forelse (auth()->user()?->wishlists ?? [] as $wishlist)
            <div class="card cart_item">
                <div class="card-body d-flex gap-3">
                    <div class="my-auto">
                        <img src="{{ $wishlist->thumbnail() }}" alt="" class="rounded course_img">
                    </div>
                    <div class="my-auto">
                        <h6 class="mb-3 lh-1">{{ $wishlist?->title }}</h6>
                        <p class="mb-2">
                            <b>Course Type:</b>
                            <span>{{ Str::ucfirst($wishlist?->pivot?->course_type); }}</span>
                        </p>
                        <p class="mb-2">
                            <b>Price:</b>
                            <span>{!! currencySymbol() !!} {{ $wishlist?->sale_price }}</span>
                            <del>{!! currencySymbol() !!} {{ $wishlist?->net_price }}</del>
                        </p>
                        <a href="{{ route('wishlists.move_to_cart',[$wishlist,'order_type'=> $wishlist?->pivot?->course_type ]) }}" class="badge bg-success">
                            <i class="fas fa-shopping-cart"></i> Move To Cart
                        </a>
                        <a href="{{ route('wishlists.remove',[$wishlist]) }}" class="badge bg-danger">
                            <i class="fas fa-times"></i> Remove
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center">
                <p>No items found.</p>
            </div>
            @endforelse
        </div>
    </section>
</x-app-layout>
