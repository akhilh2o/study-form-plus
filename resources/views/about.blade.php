<x-app-layout>
    <x-breadcrumb title="About Us" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'About Us']]" />


    <!-- ~~~ About Section ~~~ -->
    <section class="about-section pt-40 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-end d-none d-lg-block">
                    <div class="about-thumb rtl">
                        <img src="{{ asset('assets/frontend/images/about/about.png') }}" alt="about">
                    </div>
                </div>
                <div class="col-lg-6 pb-120">
                    <div class="section-header text-lg-left mb-0">
                        <h2 class="title"><span>WELCOME to SFP Classes </span> Study Form Plus</h2>
                        <p>In response to the dynamic changes in the world, a transformation in the 
                        education system becomes imperative. In the contemporary landscape, 
                        the inclination is towards optimizing time, eliminating the need for travel 
                        or relocation for educational pursuits. With the guiding principle that 
                        "If a student is ready, the teacher will appear!".</p>
                        <p>The goal is to provide conceptual knowledge to all or any commerce 
                        students instead of mugging up books. Video classes are provided for 
                        CA/CMA/CS/B.Com-M.Com XI-XII (commerce) students in Pen-Drive/SD card/Download link 
                        mode which may run on Windows 7 & above laptop/computer or android phone. We promise you that, 
                        if we see you bringing one step forward then we'll take you to level up by our support and 
                        care in getting the concepts clear for once and all.</p>
                        <a href="#forms" class="custom-button theme-one">get in touch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ About Section ~~~ -->

        <!-- ~~~ Feature Section ~~~ -->
    <section class="feature-section pt-120 pb-120">
        <div class="container">
            <div class="section-header">
                <span class="category">Features</span>
                <h2 class="title"><span>Our Special</span> Features</h2>
            </div>
            <div class="row justify-content-center mb-30-none">
                <div class="col-xl-4 col-md-4 col-sm-10">
                    <div class="feature-item">
                        <div class="icon">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Books</h6>
                            <span class="shape"></span>
                            <p class="fs-sm">Updated books specially with latest amendments from institutes and universities</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-10">
                    <div class="feature-item">
                        <div class="icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Video Classes</h6>
                            <span class="shape"></span>
                            <p class="fs-sm">HD-Quality videos lesson accessible in low network zone as well with pen drive facility too</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-10">
                    <div class="feature-item">
                        <div class="icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Expert Mentor</h6>
                            <span class="shape"></span>
                            <p class="fs-sm">Gain insights and guidance from an expert mentor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Feature Section ~~~ -->


    <!-- ~~~ Counter Section ~~~ -->
    <section class="counter-section pt-120 pb-120 title-lay bg_img"
        data-img="{{ asset('assets/frontend/images/counter/counter-bg.jpg') }}" id="forms">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="odo-area">
                    <div class="odo-wrap">
                        <div class="odo-item">
                            <div class="odo-in">
                                <div class="odo-head">
                                    <h2 class="title odometer" data-odo="25">0</h2>
                                    <h2 class="title">+</h2>
                                </div>
                                <h5 class="subtitle">Teachers</h5>
                            </div>
                        </div>
                        <div class="odo-item">
                            <div class="odo-in">
                                <div class="odo-head">
                                    <h2 class="title odometer" data-odo="5">0</h2>
                                    <h2 class="title">k+</h2>
                                </div>
                                <h5 class="subtitle">Students</h5>
                            </div>
                        </div>
                        <div class="odo-item">
                            <div class="odo-in">
                                <div class="odo-head">
                                    <h2 class="title odometer" data-odo="50">0</h2>
                                    <h2 class="title">+</h2>
                                </div>
                                <h5 class="subtitle">Courses</h5>
                            </div>
                        </div>
                        <div class="odo-item">
                            <div class="odo-in">
                                <div class="odo-head">
                                    <h2 class="title odometer" data-odo="10">0</h2>
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


    <!-- ~~~ Testimonial Section ~~~ -->
    <section class="testimonial-section pb-120 pt-120 pos-rel">
        <div class="schedule-left-shape">
            <img src="{{ asset('assets/frontend/images/course/course-top-shape.png') }}" alt="course">
        </div>
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
                                @for ($i=0;$i<$testimonial->rating;$i++)
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


    <!-- ~~~ Instructor Section ~~~ -->
    <section class="instructor-section pt-120 pb-120 gradient-bg">
        <div class="container">
            <div class="section-header">
                <span class="category">our teachers</span>
                <h2 class="title"><span>Awesome </span>Faculties</h2>
            </div>
            <div class="row justify-content-center mb-30-none">
                @foreach ($faculties ?? [] as $faculty)
                    <div class="col-lg-3 col-sm-6">
                        <div class="instructor-item">
                            <div class="instructor-thumb">
                                <a href="{{ route('faculty', [$faculty]) }}"><img src="{{ $faculty->avatarUrl() }}"
                                        alt="instructor"></a>
                            </div>
                            <div class="instructor-content">
                                <h6 class="title"><a href="{{ route('faculty', [$faculty]) }}">{{ $faculty?->title }}</a></h6>
                                <span class="details">{{ strtoupper($faculty?->subtitle) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
               
            </div>
        </div>
    </section>
    <!-- ~~~ Instructor Section ~~~ -->


</x-app-layout>
