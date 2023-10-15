<x-app-layout>
    <x-breadcrumb :title="$course?->title" :links="[
        ['text' => 'Home', 'url' => route('home')],
        ['text' => 'Courses', 'url' => route('courses')],
        ['text' => $course?->title],
    ]" />

    <!-- ~~~ Course Section ~~~ -->
    <section class="course-details-section pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $course->thumbnail() }}" alt="thumbnail" class="rounded w-100">
                </div>
                <div class="col-md-8">
                    <h4 class="title mb-4">{{ $course?->title }}</h4>
                    <h6 class="mb-4">{{ $course?->sub_title }}</h6>
                    <p class="lead">
                        <b>Price: </b>
                        <span>{{ $course?->sale_price }}</span>
                        <del>{{ $course?->net_price }}</del>
                    </p>
                    <a href="{{ route('wishlists.toggle', [$course]) }}"
                        class="btn px-3 rounded-pill {{ auth()->user()?->wishlists?->pluck('id')?->contains($course->id)? 'btn-danger': 'btn-dark' }}">
                        <i class="fas fa-heart"></i>
                    </a>
                    <a href="{{ route('carts.add', $course->id) }}" class="btn btn-dark px-3 rounded-pill">
                        <i class="fas fa-shopping-cart"></i> Add to cart
                    </a>
                    <hr />
                    <div class="description">
                        <h6 class="mb-4">More Information</h6>
                        {!! $course?->description !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Course Section ~~~ -->

</x-app-layout>
