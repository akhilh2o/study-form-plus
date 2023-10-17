<x-app-layout>
    <x-breadcrumb :title="$course?->title" :links="[
        ['text' => 'Home', 'url' => route('home')],
        ['text' => 'Courses', 'url' => route('courses')],
        ['text' => $course?->title],
    ]" />

    <!-- ~~~ Course Section ~~~ -->
    <section class="course-details-section pt-120 pb-120">
        <div class="container">
            <form action="{{ route('carts.add', $course->id) }}" method="GET" enctype="multipart/form-data">
                @csrf
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
                        <div class="col-md-12 mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="order_type" id="order_type1"
                                    value="download" checked>
                                <label class="form-check-label" for="order_type1">Download</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="order_type" id="order_type2"
                                    value="pendrive">
                                <label class="form-check-label" for="order_type2">Pendrive</label>
                            </div>
                        </div>
                        <button type="submit" class="btn px-3 rounded-pill {{ auth()->user()?->wishlists?->pluck('id')?->contains($course->id)? 'btn-danger': 'btn-dark' }}" style="height:auto" name="submit" value="wishlist">
                            <i class="fas fa-heart"></i>
                        </button>
                        <button type="submit" class="btn btn-dark px-3 rounded-pill" style="height:auto" name="submit" value="add-to-cart">
                            <i class="fas fa-shopping-cart"></i> Add to cart
                        </button>
                        <hr />
                        <div class="description">
                            <h6 class="mb-4">More Information</h6>
                            {!! $course?->description !!}
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ~~~ Course Section ~~~ -->

</x-app-layout>
