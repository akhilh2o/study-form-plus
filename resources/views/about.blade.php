<x-app-layout>
    <x-breadcrumb title="About Us" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'About Us']]" />


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


    <!-- ~~~ About Section ~~~ -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-end d-none d-lg-block">
                    <div class="about-thumb rtl">
                        <img src="{{ asset('assets/frontend/images/about/about.png') }}" alt="about">
                    </div>
                </div>
                <div class="col-lg-6 pb-120">
                    <div class="section-header text-lg-left mb-0">
                        <h2 class="title"><span>Read </span>About Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dui nulla,
                            finibus vitae blandit id, euismod vitae dolor. Nam eget tortor quam. Morbi
                            posuere, dolor a porttitor facilisis, odio ante suscipit felis, nec aliquet
                            ipsum dui sit amet massa. Nulla blandit mauris volutpat elit elementum,
                            sed posuere turpis vulputate. Suspendisse rhoncus ante rhoncus elit
                            ullamcorper egestas. Ut eu eleifend ipsum, vitae iaculis mauris. Aenean at
                            nisi feugiat, elementum sem sit amet, congue odio.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dui nulla,
                            finibus vitae blandit id, euismod vitae dolor. Nam eget tortor quam. Morbi
                            posuere, dolor a porttitor facilisis, odio.</p>
                        <a href="#0" class="custom-button theme-one">get in touch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ About Section ~~~ -->


    <!-- ~~~ Counter Section ~~~ -->
    <section class="counter-section pt-120 pb-120 title-lay bg_img"
        data-img="{{ asset('assets/frontend/images/counter/counter-bg.jpg') }}">
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
                <h2 class="title"><span>Awesome </span>Instructors</h2>
            </div>
            <div class="row justify-content-center mb-30-none">
                <div class="col-lg-3 col-sm-6">
                    <div class="instructor-item">
                        <div class="instructor-thumb">
                            <a href="#0"><img src="{{ asset('assets/frontend/images/instructor/01.png') }}"
                                    alt="instructor"></a>
                        </div>
                        <div class="instructor-content">
                            <h6 class="title"><a href="#0">SANDRA RILEY</a></h6>
                            <span class="details">TEACHER</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="instructor-item">
                        <div class="instructor-thumb">
                            <a href="#0"><img src="{{ asset('assets/frontend/images/instructor/02.png') }}"
                                    alt="instructor"></a>
                        </div>
                        <div class="instructor-content">
                            <h6 class="title"><a href="#0">Alison Bekar</a></h6>
                            <span class="details">TEACHER</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="instructor-item">
                        <div class="instructor-thumb">
                            <a href="#0"><img src="{{ asset('assets/frontend/images/instructor/03.png') }}"
                                    alt="instructor"></a>
                        </div>
                        <div class="instructor-content">
                            <h6 class="title"><a href="#0">Frank Armany</a></h6>
                            <span class="details">TEACHER</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="instructor-item">
                        <div class="instructor-thumb">
                            <a href="#0"><img src="{{ asset('assets/frontend/images/instructor/04.png') }}"
                                    alt="instructor"></a>
                        </div>
                        <div class="instructor-content">
                            <h6 class="title"><a href="#0">Manuel Nuer</a></h6>
                            <span class="details">TEACHER</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Instructor Section ~~~ -->


</x-app-layout>
