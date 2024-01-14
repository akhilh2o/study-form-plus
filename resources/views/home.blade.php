<x-app-layout>
    <!-- ~~~ Banner Section ~~~ -->
    <section class="banner-section banner-overlay bg_img"
        data-img="{{ asset('assets/frontend/images/banner/banner-bg.jpg') }}">
        <div class="container">
            <div class="banner-content cl-white">
                <h3 class="subtitle">Looking to Explore</h3>
                <h1 class="title">Your Knowledge</h1>
                <p>Donec quis fermentum metus. Fusce nec eleifend urna. Sed id placerat erat. Aenean congue, metus sit
                    amet sagittis tincidunt, augue odio vulputate meg ipsum dolor sit amet, consectetur ad.</p>
                <div class="banner-button-area">
                    <a href="#" class="custom-button btn-md">view courses<i class="fas fa-play-circle"></i></a>
                    <a href="#apply" class="custom-button btn-md theme-one">Apply now<i class="flaticon-tap-1"></i></a>
                </div>
            </div>
        </div>
        <div class="banner-thumb">
            <div class="rounded-shape shape-1"></div>
            <div class="rounded-shape shape-2"></div>
            <div class="rounded-shape shape-3"></div>
            <img src="{{ asset('assets/frontend/images/banner/banner.png') }}" alt="banner">
        </div>
    </section>
    <!-- ~~~ Banner Section ~~~ -->
    @if (setting('general_settings')?->option_value['banner_text'])
        <section class="notice-section pt-10 pb-9 justify" style="background-color: red;">
            <div class="container text-center">
                <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                    <h6 class="text-white my-0">
                        {{-- NEED ASSISTANCE IN BUYING/ ORDERING? CALL 91XXXXXXXXX, 93XXXXXXXX NOW [Office Timing 10AM to 7PM] --}}
                        {{ setting('general_settings')?->option_value['banner_text'] }}
                    </h6>
                </marquee>
            </div>
        </section>
    @endif

    <!-- ~~~ Course Section ~~~ -->
    <section class="course-section pt-40 pb-40 section-bg oh pos-rel">
        <div class="course-top-shape">
            <img src="{{ asset('assets/frontend/images/course/course-top-shape.png') }}" alt="course">
        </div>
        <div class="course-bottom-shape">
            <img src="{{ asset('assets/frontend/images/course/course-bottom-shape.png') }}" alt="course">
        </div>
        <div class="container">
            @foreach ($categories ?? [] as $category)
            <div class="section-header mt-3">
                @php
                    $words = explode(' ', $category->name);
                    $firstWord = head($words);
                    $secondWord = count($words) > 1 ? $words[1] : null;
                    $category_ids = [$category?->id];
                    foreach ($category['children'] as $key => $child) {
                        $category_ids[]= $child['id'];
                    }
                @endphp
                <h2 class="title">
                    <span>{{ $firstWord }}</span>{{ $secondWord ? ' ' . $secondWord : '' }}
                </h2>
                {{-- <h2 class="title"><span>Featured</span> Online Courses</h2> --}}
            </div>
            
            <div class="row justify-content-center mb-30-none">
                @foreach (courseByCategory($category_ids) ?? [] as $course)
                    <div class="col-xl-4 col-md-6 col-sm-10">
                        <x-product-card :product="$course" />
                    </div>
                @endforeach
            </div>
            @endforeach


            {{-- <div class="section-header">
                <h2 class="title"><span>Featured</span> Online Courses</h2>
            </div>
            <div class="row justify-content-center mb-30-none">
                @foreach ($courses ?? [] as $course)
                    <div class="col-xl-4 col-md-6 col-sm-10">
                        <x-product-card :product="$course" />
                    </div>
                @endforeach
            </div> --}}
        </div>
    </section>
    <!-- ~~~ Course Section ~~~ -->

    <!-- ~~~ Feature Section ~~~ -->
    <section class="feature-section pt-100 pb-100">
        <div class="container">
            <div class="section-header">
                {{-- <span class="category">Features</span> --}}
                <h2 class="title"><span>Why</span> Study Form Plus</h2>
            </div>
            <div class="row justify-content-center mb-30-none">
                <div class="col-xl-3 col-md-6 col-sm-10">
                    <div class="feature-item">
                        <div class="icon">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Education Services</h6>
                            <span class="shape"></span>
                            <p class="fs-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis
                                fermentum metus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-10">
                    <div class="feature-item">
                        <div class="icon">
                            <i class="fas fa-laptop-house"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Online/Offline Class</h6>
                            <span class="shape"></span>
                            <p class="fs-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis
                                fermentum metus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-10">
                    <div class="feature-item">
                        <div class="icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Expert Mentor</h6>
                            <span class="shape"></span>
                            <p class="fs-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis
                                fermentum metus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-10">
                    <div class="feature-item">
                        <div class="icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Lifetime Support</h6>
                            <span class="shape"></span>
                            <p class="fs-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis
                                fermentum metus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Feature Section ~~~ -->



    <!-- ~~~ Counter Section ~~~ -->
    <section class="counter-section pt-120 pb-120 title-lay bg_img"
        data-img="{{ asset('assets/frontend/images/counter/counter-bg.jpg') }}" id="apply">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="odo-area">
                    <div class="odo-wrap">
                        <div class="odo-item">
                            <div class="odo-in">
                                <div class="odo-head">
                                    <h2 class="title odometer" data-odo="60">0</h2>
                                    <h2 class="title">+</h2>
                                </div>
                                <h5 class="subtitle">Teachers</h5>
                            </div>
                        </div>
                        <div class="odo-item">
                            <div class="odo-in">
                                <div class="odo-head">
                                    <h2 class="title odometer" data-odo="8">0</h2>
                                    <h2 class="title">k+</h2>
                                </div>
                                <h5 class="subtitle">Students</h5>
                            </div>
                        </div>
                        <div class="odo-item">
                            <div class="odo-in">
                                <div class="odo-head">
                                    <h2 class="title odometer" data-odo="75">0</h2>
                                    <h2 class="title">+</h2>
                                </div>
                                <h5 class="subtitle">Courses</h5>
                            </div>
                        </div>
                        <div class="odo-item">
                            <div class="odo-in">
                                <div class="odo-head">
                                    <h2 class="title odometer" data-odo="13">0</h2>
                                    <h2 class="title">+</h2>
                                </div>
                                <h5 class="subtitle">National Awards</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="apply-form-wrapper">
                    <h5 class="title">Apply Now</h5>
                    <form class="apply-form">
                        <div class="apply-group">
                            <label for="name" class="label-name">Full Name</label>
                            <label for="name" class="label-icon"><i class="fas fa-user"></i></label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="apply-group">
                            <label for="email" class="label-name">Enter Email</label>
                            <label for="email" class="label-icon"><i class="fas fa-envelope"></i></label>
                            <input type="text" id="email" name="email">
                        </div>
                        <div class="apply-group">
                            <label for="phone" class="label-name">Phone Number</label>
                            <label for="phone" class="label-icon"><i class="fas fa-phone"></i></label>
                            <input type="text" id="phone" name="phone">
                        </div>
                        <div class="apply-group mb-0">
                            <button type="submit">submit now <i class="fas fa-angle-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Counter Section ~~~ -->

    <!-- ~~~ Instructor Section ~~~ -->
    {{-- <section class="instructor-section pt-40 pb-40 gradient-bg">
        <div class="container">
            <div class="section-header">
                <span class="category">our faculties</span>
                <h2 class="title"><span>Awesome </span>faculties</h2>
            </div>
            <div class="row g-3 justify-content-center mb-30-none">
                @foreach ($faculties ?? [] as $faculty)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <x-faculty-card :faculty="$faculty" />
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    <section class="instructor-section pt-40 pb-40 gradient-bg">
        <div class="container">
            <div class="section-header">
                <h2 class="title"><span>Awesome </span>faculties</h2>
            </div>
            <div class="row mx-auto my-auto justify-content-center">
                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($faculties ?? [] as $key => $faculty)
                            <div class="carousel-item @if ($key == 0) active @endif">
                                <div class="col-md-3">
                                    <div class="card">
                                        <a href="{{ route('faculty', [$faculty]) }}"
                                            class="d-block fw-bold fs-5 mb-1">
                                            <img class="card-img-top" src="{{ $faculty->avatarUrl() }}"
                                                alt="Card image">
                                            <div class="card-body lh-1">
                                                {{ $faculty?->title }}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Instructor Section ~~~ -->

    <!-- ~~~ Testimonial Section ~~~ -->
    <section class="testimonial-section pt-100 pb-100">
        <div class="container">
            <div class="slider-header">
                <div class="section-header left-style">
                    <h2 class="title"><span>Our </span>Success Stories</h2>
                </div>
                <div class="slider-nav">
                    <div class="testimoni-prev">
                        <i class="fas fa-angle-left"></i>
                    </div>
                    <div class="testimoni-next active">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="m--15">
                <div class="testimonial-slider owl-theme owl-carousel">
                    @foreach ($testimonials ?? [] as $testimonial)
                        <div class="testimonial-item">
                            <div class="rating-area">
                                <div class="ratings cl-theme">
                                    @for ($i = 0; $i < $testimonial->rating; $i++)
                                        <span><i class="fas fa-star"></i></span>
                                    @endfor
                                </div>
                                {{-- <div class="quote">
                                "Best Services"
                            </div> --}}
                            </div>
                            <p>{{ $testimonial?->content }}</p>
                            <div class="clients">
                                <div class="thumb">
                                    <img src="{{ $testimonial->avatarUrl() }}" alt="{{ $testimonial?->title }}">
                                </div>
                                <div class="content">
                                    <h6 class="title">{{ $testimonial?->title }}</h6>
                                    <span class="cl-1 fs-sm">{{ $testimonial?->subtitle }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Testimonial Section ~~~ -->
</x-app-layout>
<script type="text/javascript">
    let items = document.querySelectorAll('.carousel .carousel-item')

    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i=1; i<minPerSlide; i++) {
            if (!next) {
                // wrap carousel by using first child
                next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
    })

</script>
