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

    <!-- ~~~ Feature Section ~~~ -->
    <section class="feature-section pt-120 pb-120">
        <div class="container">
            <div class="section-header">
                <span class="category">Features</span>
                <h2 class="title"><span>Our Special</span> Features</h2>
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

    <!-- ~~~ Course Section ~~~ -->
    <section class="course-section pt-120 pb-120 section-bg oh pos-rel">
        <div class="course-top-shape">
            <img src="{{ asset('assets/frontend/images/course/course-top-shape.png') }}" alt="course">
        </div>
        <div class="course-bottom-shape">
            <img src="{{ asset('assets/frontend/images/course/course-bottom-shape.png') }}" alt="course">
        </div>
        <div class="container">
            <div class="section-header">
                <span class="category">TOP COURSES</span>
                <h2 class="title"><span>Featured</span> Online Courses</h2>
            </div>
            <div class="row justify-content-center mb-30-none">
                <div class="col-xl-4 col-md-6 col-sm-10">
                    <div class="course-item">
                        <div class="thumb">
                            <a href="#0">
                                <img src="{{ asset('assets/frontend/images/course/01.png') }}" alt="course">
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="title">
                                <a href="course-details.html">Strategic Social Media & Marketing Policy</a>
                            </h5>
                            <div class="meta-area">
                                <div class="meta">
                                    <div class="meta-item">
                                        <i class="fas fa-user"></i>
                                        <span>Mark Parker</span>
                                    </div>
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
                                    $29.99
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-10">
                    <div class="course-item">
                        <div class="thumb">
                            <a href="#0">
                                <img src="{{ asset('assets/frontend/images/course/02.png') }}" alt="course">
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="title">
                                <a href="course-details.html">Strategic Social Media & Marketing Policy</a>
                            </h5>
                            <div class="meta-area">
                                <div class="meta">
                                    <div class="meta-item">
                                        <i class="fas fa-user"></i>
                                        <span>Mark Parker</span>
                                    </div>
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
                                    $29.99
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-10">
                    <div class="course-item">
                        <div class="thumb">
                            <a href="#0">
                                <img src="{{ asset('assets/frontend/images/course/03.png') }}" alt="course">
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="title">
                                <a href="course-details.html">Strategic Social Media & Marketing Policy</a>
                            </h5>
                            <div class="meta-area">
                                <div class="meta">
                                    <div class="meta-item">
                                        <i class="fas fa-user"></i>
                                        <span>Mark Parker</span>
                                    </div>
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
                                    $29.99
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Course Section ~~~ -->

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

    <!-- ~~~ Testimonial Section ~~~ -->
    <section class="testimonial-section pt-120 pb-120">
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
                    <div class="testimonial-item">
                        <div class="rating-area">
                            <div class="ratings cl-theme">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="quote">
                                "Best Services"
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Donec scelerisque tortor at neque
                            viverra posuere. Nam ut tortor viverra, accumsan felis sed, faci lisis est. Donec et mattis
                            purus. Etiam leo lacus, luctus sit.</p>
                        <div class="clients">
                            <div class="thumb">
                                <img src="{{ asset('assets/frontend/images/client/client01.png') }}" alt="client">
                            </div>
                            <div class="content">
                                <h6 class="title">Mark Parker</h6>
                                <span class="cl-1 fs-sm">CEO Of Fiverr</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="rating-area">
                            <div class="ratings cl-theme">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="quote">
                                "Best Services"
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Donec scelerisque tortor at neque
                            viverra posuere. Nam ut tortor viverra, accumsan felis sed, faci lisis est. Donec et mattis
                            purus. Etiam leo lacus, luctus sit.</p>
                        <div class="clients">
                            <div class="thumb">
                                <img src="{{ asset('assets/frontend/images/client/client02.png') }}" alt="client">
                            </div>
                            <div class="content">
                                <h6 class="title">Mark Parker</h6>
                                <span class="cl-1 fs-sm">CEO Of Fiverr</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="rating-area">
                            <div class="ratings cl-theme">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="quote">
                                "Best Services"
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Donec scelerisque tortor at neque
                            viverra posuere. Nam ut tortor viverra, accumsan felis sed, faci lisis est. Donec et mattis
                            purus. Etiam leo lacus, luctus sit.</p>
                        <div class="clients">
                            <div class="thumb">
                                <img src="{{ asset('assets/frontend/images/client/client03.png') }}" alt="client">
                            </div>
                            <div class="content">
                                <h6 class="title">Mark Parker</h6>
                                <span class="cl-1 fs-sm">CEO Of Fiverr</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="rating-area">
                            <div class="ratings cl-theme">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="quote">
                                "Best Services"
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Donec scelerisque tortor at neque
                            viverra posuere. Nam ut tortor viverra, accumsan felis sed, faci lisis est. Donec et mattis
                            purus. Etiam leo lacus, luctus sit.</p>
                        <div class="clients">
                            <div class="thumb">
                                <img src="{{ asset('assets/frontend/images/client/client04.png') }}" alt="client">
                            </div>
                            <div class="content">
                                <h6 class="title">Mark Parker</h6>
                                <span class="cl-1 fs-sm">CEO Of Fiverr</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="rating-area">
                            <div class="ratings cl-theme">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="quote">
                                "Best Services"
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Donec scelerisque tortor at neque
                            viverra posuere. Nam ut tortor viverra, accumsan felis sed, faci lisis est. Donec et mattis
                            purus. Etiam leo lacus, luctus sit.</p>
                        <div class="clients">
                            <div class="thumb">
                                <img src="{{ asset('assets/frontend/images/client/client03.png') }}" alt="client">
                            </div>
                            <div class="content">
                                <h6 class="title">Mark Parker</h6>
                                <span class="cl-1 fs-sm">CEO Of Fiverr</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="rating-area">
                            <div class="ratings cl-theme">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="quote">
                                "Best Services"
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Donec scelerisque tortor at neque
                            viverra posuere. Nam ut tortor viverra, accumsan felis sed, faci lisis est. Donec et mattis
                            purus. Etiam leo lacus, luctus sit.</p>
                        <div class="clients">
                            <div class="thumb">
                                <img src="{{ asset('assets/frontend/images/client/client01.png') }}" alt="client">
                            </div>
                            <div class="content">
                                <h6 class="title">Mark Parker</h6>
                                <span class="cl-1 fs-sm">CEO Of Fiverr</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Testimonial Section ~~~ -->
</x-app-layout>
