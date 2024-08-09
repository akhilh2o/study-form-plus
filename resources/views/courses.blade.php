<x-app-layout>
    @push('styles')
    <style>
        .course-item:hover .thumb img {
            -webkit-transform: scale(1.1) !important;
            -ms-transform: scale(1.1) !important ;
            transform: scale(1.1) !important ;
        }
    </style>
    @endpush
    @section('meta_title', 'Courses | ' . config('app.name'))
    @section('meta_description', $category?->name ? $category?->name . ' Courses | ' . config('app.name') : 'All ' .
        'Courses | ' . config('app.name'))

        <x-breadcrumb title="Courses" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Courses']]" />


        @if ($categories)
            <!-- ~~~ Category Section ~~~ -->
            <section class="course-section pt-50 pb-120">
                <div class="container">
                    <div class="row align-items-center section-header">
                        <div class="col-lg-7">
                            <div class="section-header left-style mb-low mb-lg-0">
                                <h2 class="title"><span>{{ $category?->name ?? 'All' }}</span> {{ $category?->name ? '' : 'Categories' }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-30-none">
                        @foreach ($categories ?? [] as $categ)
                            <div class="col-xl-4 col-md-6 col-sm-10">
                                <div class="course-item">
                                    <div class="thumb">
                                        <a href="{{ route('courses', ['category' => $categ->slug]) }}">
                                            <img src="{{ $categ?->imageThumb() }}" alt="{{ $categ?->name }}">
                                        </a>
                                    </div>
                                    <div class="content">
                                     
                                        <h6 class="title mb-3">
                                            <a href="{{ route('courses', ['category' => $categ->slug]) }}" class="lc-2">
                                                {{ $categ?->name }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                                
                            </div>
                        @endforeach

                        @if (!$categories->count())
                            <div class="col-md-6 mx-auto">
                                <div class="card mt-5">
                                    <div class="card-body text-center">
                                        <div class="display-1 text-danger">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                        <h3 class="my-4 text-danger">Sorry!! Nothing found.</h3>
                                        <p class="lead">
                                            We don't have something in this area yet. We are continuously improving the
                                            contents for you. Please check another day or you can browse something else.
                                        </p>

                                        <a href="{{ url('/') }}" class="btn btn-dark px-4">
                                            Home
                                        </a>
                                        <a href="{{ route('courses') }}" class="btn btn-dark px-4">
                                            All Category
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
            <!-- ~~~ Category Section ~~~ -->
        @else
            <!-- ~~~ Course Section ~~~ -->
            <section class="course-section pt-50 pb-120">
                <div class="container">
                    <div class="row align-items-center section-header">
                        <div class="col-lg-7">
                            <div class="section-header left-style mb-low mb-lg-0">
                                <h2 class="title"><span>{{ $category?->name ?? 'All' }}</span> Courses</h2>
                            </div>
                        </div>
                        {{-- <div class="col-lg-5">
                            <div class="d-flex flex-wrap justify-content-lg-end m--10">
                                <div class="course-select-item">
                                    <select id="category" name="category" class="form-select"
                                        onchange="window.location.href='{{ route('courses') }}?category=' + this.value;">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories ?? [] as $cat)
                                            <option value="{{ $cat->slug }}" @selected($category?->id == $cat->id)>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="row mb-30-none">
                        @foreach ($courses ?? [] as $course)
                            <div class="col-xl-4 col-md-6 col-sm-10">
                                <x-product-card :product="$course" />
                            </div>
                        @endforeach

                        @if (!$courses->count())
                            <div class="col-md-6 mx-auto">
                                <div class="card mt-5">
                                    <div class="card-body text-center">
                                        <div class="display-1 text-danger">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                        <h3 class="my-4 text-danger">Sorry!! Nothing found.</h3>
                                        <p class="lead">
                                            We don't have something in this area yet. We are continuously improving the contents
                                            for you. Please check another day or you can browse something else.
                                        </p>

                                        <a href="{{ url('/') }}" class="btn btn-dark px-4">
                                            Home
                                        </a>
                                        <a href="{{ route('courses') }}" class="btn btn-dark px-4">
                                            All Courses
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>


                    <div class="text-center load-more mt-5">
                        {{ $courses->links() }}
                    </div>
                </div>
            </section>
            <!-- ~~~ Course Section ~~~ -->
        @endif
    </x-app-layout>
