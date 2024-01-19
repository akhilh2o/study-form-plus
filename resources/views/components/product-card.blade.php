<div class="course-item">
    <div class="thumb">
        <a href="{{ route('course', [$product]) }}">
            <img src="{{ $product?->thumb() }}" alt="{{ $product?->title }}">
        </a>
    </div>
    <div class="content">
        <h6 class="title mb-3">
            <a href="{{ route('course', [$product]) }}" class="lc-2">
                {{ $product?->title }}
            </a>
        </h6>
        <p class="fs-6">
            <b>Price: </b>
            <span>{!! currencySymbol() !!} {{ ($product?->variations_min_sale_price_download) ? $product?->variations_min_sale_price_download : $product?->variations_min_sale_price_pendrive }}</span>
            -
            <span>{!! currencySymbol() !!} {{ ($product?->variations_max_sale_price_download) ? $product?->variations_max_sale_price_download : $product?->variations_max_sale_price_pendrive }}</span>
        </p>
        <hr />
        <div class="text-center">
            <a href="{{ route('wishlists.toggle', [$product, 'course_type' => 'download', 'exam_attempt' => $product?->variations->first()?->exam_attempt]) }}"
                class="wishlistsBtn btn btn-sm px-2 rounded-pill {{ auth()->user()?->wishlists?->pluck('id')?->contains($product->id)? 'btn-danger': 'btn-secondary text-white' }}">
                <i class="fas fa-heart"></i>
                <!-- Add to wishlist -->
            </a>
            <a href="{{ route('course', [$product]) }}" class="btn btn-sm btn-dark px-3 rounded-pill">
                <i class="fas fa-info-circle"></i> Details
            </a>
            <a href="{{ route('buy-now', [$product]) }}" class="btn btn-sm btn-success buyNowBtn"><i class="fas fa-shopping-bag me-2"></i>Buy now</a>
        </div>
    </div>
</div>
