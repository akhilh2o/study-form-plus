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
                        <img src="{{ $course->thumb() }}" alt="thumbnail" class="rounded w-100">
                    </div>
                    <div class="col-md-8">
                        <h4 class="title mb-4">{{ $course?->title }}</h4>
                        <h6 class="mb-4">{{ $course?->sub_title }}</h6>
                        <p class="lead">
                            <b>Price: </b>
                            <span>{!! currencySymbol() !!} {{ $course?->sale_price }}</span>
                            <del>{!! currencySymbol() !!} {{ $course?->net_price }}</del>
                        </p>
                        <div class="col-md-12 mb-3">
                            @if ($course->order_type_download)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="order_type" id="order_type1"
                                        value="download" checked>
                                    <label class="form-check-label" for="order_type1">Download</label>
                                </div>
                            @endif
                            @if ($course->order_type_pendrive)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="order_type" id="order_type2"
                                        value="pendrive" checked>
                                    <label class="form-check-label" for="order_type2">Pendrive</label>
                                </div>
                            @endif
                        </div>
                        <button type="submit"
                            class="btn px-3 rounded-pill {{ auth()->user()?->wishlists?->pluck('id')?->contains($course->id)? 'btn-danger': 'btn-dark' }}"
                            style="height:auto" name="submit" value="wishlist">
                            <i class="fas fa-heart"></i>
                        </button>
                        <button type="submit" class="btn btn-dark px-3 rounded-pill" style="height:auto" name="submit"
                            value="add-to-cart">
                            <i class="fas fa-shopping-cart"></i> Add to cart
                        </button>
                        <hr />
                        <div class="description">
                            <h6 class="mb-4">More Information</h6>
                            {!! $course?->description !!}

                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Language</strong>
                                </div>
                                <div class="col-md-9">
                                    {{ $course?->language }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Faculties / Teacher Name</strong>
                                </div>
                                <div class="col-md-9">
                                    {{ $course?->faculties }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Duration</strong>
                                </div>
                                <div class="col-md-9">
                                    {{ $course?->duration }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Exam Validity</strong>
                                </div>
                                <div class="col-md-9">
                                    {{ $course?->exam_validity }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Doubt Solving Faculties</strong>
                                </div>
                                <div class="col-md-9">
                                    {{ $course?->faculties }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Study Material</strong>
                                </div>
                                <div class="col-md-9">
                                    <span>
                                        {{ $course?->order_type_download ? 'Download' : '' }}
                                    </span>,
                                    <span>
                                        {{ $course?->order_type_pendrive ? 'Pendrive' : '' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ~~~ Course Section ~~~ -->
</x-app-layout>
