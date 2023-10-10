<x-app-layout>

    <!-- ~~~ Hero Section ~~~ -->
    <section class="hero-section banner-overlay bg_img"
        data-img="{{ asset('assets/frontend/images/banner/banner-bg.jpg') }}">
        <div class="custom-container">
            <div class="hero-content">
                <h1 class="title uppercase cl-white">Courses</h1>
                <ul class="breadcrumb cl-white p-0 m-0">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        Courses
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ~~~ Hero Section ~~~ -->


    <!-- ~~~ Course Section ~~~ -->
    <section class="course-section pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center section-header">
                <div class="col-lg-7">
                    <div class="section-header left-style mb-low mb-lg-0">
                        <span class="category">TOP COURSES</span>
                        <h2 class="title"><span>Featured</span> Online Courses</h2>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex flex-wrap justify-content-lg-end m--10">
                        <div class="course-select-item">
                            <select class="select-bar">
                                <option value="c1">Photoshop</option>
                                <option value="c2">Webdesign</option>
                                <option value="c3">English</option>
                                <option value="c4">History</option>
                                <option value="c5">Wordpress</option>
                                <option value="c6">Laravel</option>
                                <option value="c7">Python</option>
                                <option value="c8">Javascript</option>
                            </select>
                        </div>
                        <div class="course-select-item">
                            <select class="select-bar">
                                <option value="o1">Select Order</option>
                                <option value="o2">Webdesign</option>
                                <option value="o3">English</option>
                                <option value="o4">History</option>
                                <option value="o5">Wordpress</option>
                                <option value="o6">Laravel</option>
                                <option value="o7">Python</option>
                                <option value="o8">Javascript</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-30-none">
                @foreach ($courses ?? [] as $course)
                <div class="col-xl-4 col-md-6 col-sm-10">
                    <div class="course-item">
                        <div class="thumb">
                            <a href="{{ route('course',[$course]) }}">
                                <img src="{{ $course?->thumbnail() }}" alt="{{ $course?->title }}">
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="title">
                                <a href="{{ route('course',[$course]) }}">{{ $course?->title }}</a>
                            </h5>
                            <div class="meta-area">
                                <div class="meta">
                                    {{-- <div class="meta-item">
                                        <i class="fas fa-user"></i>
                                        <span>Mark Parker</span>
                                    </div> --}}
                                    <div class="meta-item">
                                        <i class="fas fa-photo-video"></i>
                                        <span>15 Lessons</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-user-graduate"></i>
                                        <span>25 Students</span>
                                    </div>
                                </div>
                            </div>
                            <div class="ratings-area">
                                <div class="ratings cl-theme">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span class="cl-theme-light"><i class="fas fa-star"></i></span>
                                    <span>(4.9/5.00)</span>
                                </div>
                                <div class="price cl-1">
                                    ${{ rand(20,50) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center load-more mt-5">
                {{ $courses->links() }}
                {{-- <a href="#" class="custom-button theme-one">load more courses <i
                        class="fas fa-angle-right"></i></a> --}}
            </div>
        </div>
    </section>
    <!-- ~~~ Course Section ~~~ -->

</x-app-layout>
