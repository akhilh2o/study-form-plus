<x-app-layout>
    <!-- ~~~ Header Section ~~~ -->
    @section('meta_title', $course?->meta_title)
    @section('meta_description', $course?->meta_description)
    @section('meta_keyword', $course?->meta_keyword)
    <!-- ~~~ Breadcrumb Section ~~~ -->
    <x-breadcrumb :title="$course?->title" :links="[
        ['text' => 'Home', 'url' => route('home')],
        ['text' => 'Courses', 'url' => route('courses')],
        // ['text' => $course?->title],
    ]" />

    <!-- ~~~ Course Section ~~~ -->
    <section class="course-details-section pt-50 pb-120">
        <div class="container">
            <form action="{{ route('carts.add', $course->id) }}" method="GET" enctype="multipart/form-data"
                class="form-group row">
                @csrf
                <div class="col-md-4 col-sm-12 mb-4">
                    <img src="{{ $course->thumb() }}" alt="thumbnail" class="rounded w-100">
                </div>
                <div class="col-md-8 col-sm-12">
                    <h4 class="title mb-3">{{ $course?->title }}</h4>
                    <p class="mb-3">{{ $course?->category?->name }}</p>
                    <div class="row mb-3 gap-2">
                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                            <p class="d-flex gap-1 align-content-center">
                                <strong>By:</strong>
                                <a href="javasvcript:void(0)">{{ $course?->faculties }}</a>
                            </p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                            <a href="#demovideo" class="text-nowrap">
                                View Demo
                                <span><i class="fa fa-arrow-down"></i></span>
                            </a>
                        </div>
                    </div>
                    @if ($course->with_handbook)
                        <p class="text-dark fw-bold">
                            <u>With Handbook</u>
                        </p>
                    @endif
                    @if ($course->order_type_download)
                        <p class="">
                            <i class="fas fa-download me-2"></i><strong>D.Link: </strong>
                            <del>{!! currencySymbol() !!} {{ $course?->netPriceForDownload($attempt) }}</del>
                            <span class="text-danger">
                                {!! currencySymbol() !!}
                                {{ $course?->salePriceForDownload($attempt) }}
                            </span>
                            <span class="text-success">
                                <small>
                                    ({{ $course?->percentOff($course?->netPriceForDownload($attempt), $course?->salePriceForDownload($attempt)) }}%
                                    off)
                                </small>
                            </span>
                        </p>
                    @endif
                    @if ($course->order_type_pendrive)
                        <p class="">
                            <i class="fas fa-hdd me-2"></i><strong>Pendrive: </strong>
                            <del>{!! currencySymbol() !!} {{ $course?->netPriceForPendrive($attempt) }}</del>
                            <span class="text-danger">
                                {!! currencySymbol() !!}
                                {{ $course?->salePriceForPendrive($attempt) }}
                            </span>
                            <span class="text-success">
                                <small>
                                    ({{ $course?->percentOff($course?->netPriceForPendrive($attempt), $course?->salePriceForPendrive($attempt)) }}%
                                    off)
                                </small>
                            </span>
                        </p>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-4 mb-3">
                            <label for="order_type" class="form-label">Study Material</label>
                            <select name="order_type" id="order_type" class="form-select">
                                @if ($course->order_type_download)
                                    <option value="download">Download</option>
                                @endif
                                @if ($course->order_type_pendrive)
                                    <option value="pendrive">Pendrive</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="exam_attempt" class="form-label">Attempt</label>
                            <select name="exam_attempt" id="exam_attempt" class="form-select"
                                onchange="window.location.href='{{ route('course', $course->slug) }}?attempt=' + this.value;">
                                @foreach ($course?->variations as $variation)
                                    <option value="{{ $variation->exam_attempt }}" @selected($attempt == $variation->exam_attempt)>
                                        {{ $variation->exam_attempt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="submit"
                            class="btn btn-block wishlistsBtn rounded-pill {{ auth()->user()?->wishlists?->pluck('id')?->contains($course->id)? 'btn-danger': 'btn-secondary text-white' }}"
                            style="height:auto" name="submit" value="wishlist">
                            <i class="fas fa-heart text-white"></i>
                            <!-- Add to wishlist -->
                        </button>
                        <button type="submit" class="btn btn-dark px-3 rounded-pill" style="height:auto" name="submit"
                            value="add-to-cart">
                            <i class="fas fa-shopping-cart"></i> Add to cart
                        </button>
                        <button type="submit" name="submit" value="buy-now" class="btn btn-success buyNowBtn"
                            style="height: auto"><i class="fas fa-shopping-bag me-2"></i>Buy now</button>
                    </div>
                </div>
            </form>
            <div class="form-group row">
                @if ($course?->description)
                    <div class="col-lg-6 mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="py-2">Description</h5>
                            </div>
                            <div class="card-body">
                                <div class="description">
                                    {!! $course?->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="{{ $course?->description ? 'col-lg-6' : 'col-lg-12' }}  mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="py-2">More Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="description">
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
                                    <div class="col-md-3 col-6">
                                        <strong>Faculties / Teacher Name</strong>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <a href="javasvcript:void(0)">{{ $course?->faculties }}</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-6">
                                        <strong>Duration</strong>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        {{ $course?->duration }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-6">
                                        <strong>Exam Validity</strong>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        {{ $attempt }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-6">
                                        <strong>Doubt Solving Faculties</strong>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        {{ $course?->doubt_solving_faculties }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-6">
                                        <strong>Study Material</strong>
                                    </div>
                                    <div class="col-md-9 col-6">
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
                </div>
            </div>
            <div class="form-group row" id="demovideo">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="py-2">Demo Videos</h5>
                        </div>
                        <div class="card-body">
                            <div class="description">
                                <div class="row my-4">
                                    <div class="col-12 d-block d-md-none">
                                        <iframe id="ytplayer" type="text/html" width="100%" height="300"
                                            src="{{ $course?->demo_link }}" frameborder="0"></iframe>
                                    </div>
                                    <div class="col-12 d-none d-md-block">
                                        <iframe id="ytplayer" type="text/html" width="100%" height="650"
                                            src="{{ $course?->demo_link }}" frameborder="0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($relatedCourses->count())
                <h3 class="mt-5 mb-4">Related Courses</h3>
                <div class="row">
                    @foreach ($relatedCourses as $course)
                        <div class="col-lg-4 col-md-3 col-sm-6">
                            <x-product-card :product="$course" />
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!-- ~~~ Course Section ~~~ -->
</x-app-layout>
