<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Optional: Add custom styles for Owl Carousel */
        .banner-content {
            position: relative;
            z-index: 10;
        }
        .banner-thumb {
            position: absolute;
            bottom: 0;
            right: 0;
        }
        .banner-section {
    position: relative;
}

.owl-dots {
    text-align: center; /* Center the dots */
    position: absolute;
    bottom: 20px; /* Adjust the distance from the bottom */
    width: 100%;
    z-index: 10; /* Ensure dots are above other elements */
}

.owl-dot {
    background: rgba(0, 0, 0, 0.5); /* Background color for inactive dots */
    border-radius: 50%;
    width: 12px; /* Size of dots */
    height: 12px; /* Size of dots */
    margin: 0 5px; /* Spacing between dots */
    display: inline-block;
    position: relative;
    top: 50px;
}

.owl-dot.active {
    background: #fff; /* Background color for the active dot */
}

.owl-carousel .owl-nav {
    display: none; /* Hide default navigation arrows */
}

#main-carousel{
    z-index: 9999;
}
.notice-board{
    z-index: 9;
    border: 5px solid #F7941F;
    border-radius: 10px;
    padding: 20px 0;
    background-color: #10147B;
    height: max-content;
}

.notice-board .box p{
    color: #F7941F;
}
.notice-board .box ul li button{
    background-color: #F7941F;
    width: 100%;
    color: white;
    border: none;
    border-radius: 10px;
}
    </style>
<x-app-layout>
    <!-- ~~~ Banner Section ~~~ -->
    <section class="banner-section banner-overlay bg_img"
         data-img="{{ asset('assets/frontend/images/banner/banner-bg.jpg') }}">
    <div class="container-fluid" >
        <div class="row mx-lg-3 mx-md-2  gap-lg-0 g-3 " >
            <!-- Left Column -->
            <div class="col-lg-3 col-md-6 notice-board" >
                <div class="box text-center p-3">
                 
                   <span >
                      <h6 class="bg-white py-2 w-100 rounded-3 fw-bold"> NOTICE BOARD</h6>
                   </span>
                   <p class="mt-4 fw-bold">IMPORTANT REMINDER</p>
                   <hr>
                   <ul class="text-white px-4" style="list-style: disc; text-align:left;">
                    <li style="list-style: disc; ">
                    Daily Live Classes are Taking Place On COC Commerce School
                    </li>
                    <li style="list-style: disc; ">
                    Get Latest Studio Recorded Classes For CMA & CA June/Dec 24 Attempt
                    </li>
                    <li style="list-style: disc; ">
                    Get Latest Studio Recorded Classes For CMA & CA June/Dec 24 Attempt
                    </li>
                   </ul>
                </div>
            </div>
            
            <!-- Middle Column with .banner-thumb Carousel -->
            <div class="col-lg-6 col-md-6 d-lg-block d-md-none d-none">
           
        <div id="bannerCarousel" class="owl-carousel owl-theme">
            <!-- Slide 1 -->
            <div class="item">
          
        <img src="{{ asset('assets/frontend/images/banner/banner.png') }}" alt="banner">
    

            </div>
            <div class="item">
          
        <img src="{{ asset('assets/frontend/images/banner/banner.png') }}" alt="banner">
  

            </div>
            <div class="item">
            
        <img src="{{ asset('assets/frontend/images/banner/banner.png') }}" alt="banner">
    

            </div>
            </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-3 col-md-6  notice-board" >
                <div class="box text-center p-3">
                 
                  <p>Click & Visit Our</p>
                   <p class="mt-4 fw-bold">👇Different Courses👇</p>
                   <hr>
                   <ul class="text-white px-4" style="list-style: disc; text-align:left;">
                    <li>
                   <button>CA (Chartered Accountant)</button>
                    </li>
                    <li>
                   <button>CMA (Cost and management accounting)</button>
                    </li>
                    <li>
                   <button>11th</button>
                    </li>
                    <li>
                   <button>12th</button>
                    </li>
                    <li>
                   <button>B.COM</button>
                    </li>
                   
                   </ul>
                </div>
            </div>
        </div>
    </div>
</section>






    <!-- ~~~ Banner Section ~~~ -->
    @if (setting('general_settings')?->option_value['banner_text'])
        <section class="notice-section pt-10 pb-9 justify" style="background-color: red;">
            <div class="container text-center">
                <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                    <h6 class="text-white my-0">
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
                <x-category-course-section :category="$category" style="margin-bottom: 5rem;" />
                @foreach ($category->children as $child)
                    <x-category-course-section :category="$child" style="margin-bottom: 5rem;" />
                @endforeach
            @endforeach
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
                            <p class="fs-sm"><p>
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
                            <p class="fs-sm"></p>
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
                            <p class="fs-sm"></p>
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
                            <p class="fs-sm"></p>
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

    @push('scripts')


 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function(){
        $("#bannerCarousel").owlCarousel({
            loop: true,                // Infinite loop
            margin: 10,                // Margin between slides
            nav: false,                // Disable navigation arrows
            dots: true,                // Enable dots
            autoplay: true,           // Enable autoplay
            autoplayTimeout: 3000,    // Autoplay timeout in milliseconds
            items: 1,                  // Number of items to display
            autoplayHoverPause: true  // Pause autoplay on hover
        });
    });
</script>


        <style>
            .course_slider .owl-nav {
                position: absolute;
                top: -3rem;
                right: 0;
            }
        </style>
        <script type="text/javascript">
            /*$('.course_slider').owlCarousel({
                loop: false,
                margin: 10,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayHoverPause: true,
                navText: [
                    '<span class="btn btn-sm btn-dark me-1"><i class="fas fa-arrow-left"></i></span>',
                    '<span class="btn btn-sm btn-dark"><i class="fas fa-arrow-right"></i></span>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            });*/

            let items = document.querySelectorAll('.carousel .carousel-item')
            items.forEach((el) => {
                const minPerSlide = 4
                let next = el.nextElementSibling
                for (var i = 1; i < minPerSlide; i++) {
                    if (!next) {
                        // wrap carousel by using first child
                        next = items[0]
                    }
                    let cloneChild = next.cloneNode(true)
                    el.appendChild(cloneChild.children[0])
                    next = next.nextElementSibling
                }
            });
        </script>
    @endpush
</x-app-layout>
