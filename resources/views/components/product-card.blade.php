<div class="course-item">
    <div class="thumb">
        <a href="{{ route('course', [$product]) }}">
            <img src="{{ $product?->thumbnail() }}" alt="{{ $product?->title }}">
        </a>
    </div>
    <div class="content">
        <h5 class="title mb-3">
            <a href="{{ route('course', [$product]) }}">{{ $product?->title }}</a>
        </h5>
        <p class="fs-5">
            <b>Price: </b>
            <span>150</span>
            <del>175</del>
        </p>
        <hr />
        <div class="text-center">
            <a href="{{ route('wishlists.toggle', [$product]) }}"
                class="btn px-3 rounded-pill {{ auth()->user()?->wishlists?->pluck('id')?->contains($product->id)? 'btn-danger': 'btn-dark' }}">
                <i class="fas fa-heart"></i>
            </a>
            <a href="{{ route('course', [$product]) }}" class="btn btn-dark px-3 rounded-pill">
                <i class="fas fa-info-circle"></i> More Details
            </a>
        </div>
    </div>
</div>
