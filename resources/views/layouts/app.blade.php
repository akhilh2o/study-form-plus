<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Eduac - Online Education HTML Template</title>

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/frontend/images/favicon.png') }}" type="image/x-icon">

    @stack('styles')
</head>

<body>
    <x-alertt-alert />
    <div class="all-sections">
        <!-- ~~~ Loader & Go-Top ~~~ -->
        <div class="overlayer"></div>
        <div class="loader">
            <div class="inner"></div>
        </div>
        <span class="go-top">
            <i class="fas fa-angle-up"></i>
        </span>
        <!-- ~~~ Loader & Go-Top ~~~ -->

                <!-- ~~~ Header Section ~~~ -->
                <header>
                    <div class="custom-container">
                        <div class="header-area">
                            <div class="logo">
                                <a href="index-2.html">
                                    <img src="assets/images/logo/logo.png" alt="logo">
                                </a>
                            </div>
                            <ul class="menu d-none d-lg-flex flex-wrap">
                                <li>
                                    <a href="#0">Home</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="index-2.html">Home 1</a>
                                        </li>
                                        <li>
                                            <a href="index-3.html">Home 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.html">About Us</a>
                                </li>
                                <li>
                                    <a href="#0">Courses</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="courses.html">Courses</a>
                                        </li>
                                        <li>
                                            <a href="course-details.html">Course Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#0">Pages</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="instructor.html">Instructor</a>
                                        </li>
                                        <li>
                                            <a href="gallery.html">Gallery</a>
                                        </li>
                                        <li>
                                            <a href="events.html">Event</a>
                                        </li>
                                        <li>
                                            <a href="upcoming-events.html">Upcoming Events</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#0">Blog</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="blog.html">Blogs</a>
                                        </li>
                                        <li>
                                            <a href="blog-details.html">Blog Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                            <div class="header-bar ml-4">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <form class="course-search-form ml-auto mr-4">
                                <select class="select-bar rounded">
                                    <option value="01">Category</option>
                                    <option value="02">Physics</option>
                                    <option value="03">Chemistry</option>
                                    <option value="04">History</option>
                                    <option value="05">Geometry</option>
                                    <option value="06">LoremIp</option>
                                    <option value="07">UI/UX</option>
                                    <option value="08">Laravel</option>
                                </select>
                                <input type="text" name="name" placeholder="Search Courses" class="rounded">
                                <button type="submit" class="rounded"><i class="flaticon-loupe"></i></button>
                            </form>
                            <a href="#0" class="custom-button"><i class="fas fa-user"></i><span>Sign Up</span></a>
                        </div>
                    </div>
                </header>
                <!-- ~~~ Header Section ~~~ -->

                <!-- ~~~ Mobile Menu ~~~ -->
                <div class="mobile-menu">
                    <span class="close-mobile-menu">
                        <i class="fas fa-times"></i>
                    </span>
                    <div class="w-100 d-flex flex-wrap justify-content-center align-items-center">
                        <form class="course-search-form mr-sm-4">
                            <select class="select-bar rounded">
                                <option value="01">Category</option>
                                <option value="02">Physics</option>
                                <option value="03">Chemistry</option>
                                <option value="04">History</option>
                                <option value="05">Geometry</option>
                                <option value="06">LoremIp</option>
                                <option value="07">UI/UX</option>
                                <option value="08">Laravel</option>
                            </select>
                            <input type="text" name="name" placeholder="Search Courses" class="rounded">
                            <button type="submit" class="rounded"><i class="flaticon-loupe"></i></button>
                        </form>
                        <a href="#0" class="custom-button"><i class="fas fa-user"></i><span>Sign Up</span></a>
                        <div class="w-100 d-lg-none">
                            <ul class="menu">
                                <li>
                                    <a href="#0">Home</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="index-2.html">Home 1</a>
                                        </li>
                                        <li>
                                            <a href="index-3.html">Home 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.html">About Us</a>
                                </li>
                                <li>
                                    <a href="#0">Courses</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="courses.html">Courses</a>
                                        </li>
                                        <li>
                                            <a href="course-details.html">Course Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#0">Pages</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="instructor.html">Instructor</a>
                                        </li>
                                        <li>
                                            <a href="gallery.html">Gallery</a>
                                        </li>
                                        <li>
                                            <a href="events.html">Event</a>
                                        </li>
                                        <li>
                                            <a href="upcoming-events.html">Upcoming Events</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#0">Blog</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="blog.html">Blogs</a>
                                        </li>
                                        <li>
                                            <a href="blog-details.html">Blog Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ~~~ Mobile Menu ~~~ -->

        {{ $slot }}


        <!-- ~~~ Footer Section ~~~ -->
        <footer class="bg_img mt-80" data-img="{{ asset('assets/frontend/images/footer/footer-bg.jpg') }}">
            <div class="footer-support">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="footer-support-item">
                                <div class="icon">
                                    <i class="flaticon-phone-call"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">+216 499 49 47</h5>
                                    <span class="info">Free Support Line</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="footer-support-item">
                                <div class="icon">
                                    <i class="flaticon-headphone"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">Support Center</h5>
                                    <span class="info">365 days full support</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="footer-support-item">
                                <div class="icon">
                                    <i class="flaticon-live"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">Live Support</h5>
                                    <span class="info">Write Online Now</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-section oh pos-rel">
                <div class="course-top-shape">
                    <img src="{{ asset('assets/frontend/images/course/course-top-shape.png') }}" alt="course">
                </div>
                <div class="course-bottom-shape">
                    <img src="{{ asset('assets/frontend/images/course/course-bottom-shape.png') }}" alt="course">
                </div>
                <div class="container">
                    <div class="footer-top">
                        <div class="footer-area">
                            <div class="footer-widget widget-link">
                                <h5 class="title">Talk to Us</h5>
                                <ul>
                                    <li>
                                        <a href="#0">About us</a>
                                    </li>
                                    <li>
                                        <a href="#0">Registration</a>
                                    </li>
                                    <li>
                                        <a href="#0">Blog</a>
                                    </li>
                                    <li>
                                        <a href="#0">Events</a>
                                    </li>
                                    <li>
                                        <a href="#0">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-widget widget-link">
                                <h5 class="title">Information</h5>
                                <ul>
                                    <li>
                                        <a href="#0">Membership</a>
                                    </li>
                                    <li>
                                        <a href="#0">Purchase guide</a>
                                    </li>
                                    <li>
                                        <a href="#0">Privacy policy</a>
                                    </li>
                                    <li>
                                        <a href="#0">Terms of service</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-widget widget-link">
                                <h5 class="title">Support</h5>
                                <ul>
                                    <li>
                                        <a href="#0">Documentation</a>
                                    </li>
                                    <li>
                                        <a href="#0">FAQs</a>
                                    </li>
                                    <li>
                                        <a href="#0">Condition</a>
                                    </li>
                                    <li>
                                        <a href="#0">Release Status</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-widget widget-info">
                                <h5 class="title">Contact Us</h5>
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="content">
                                            <span>12/A, Hamilton City Way, Newyork, US</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="content">
                                            <a href="Tel:+880551251558">+8987 5675 754 6</a>
                                            <a href="Tel:+880551251558">+8987 5675 754 6</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-envelope-open-text"></i>
                                        </div>
                                        <div class="content">
                                            <a href="Mailto:info@exampleweb.com"><span class="__cf_email__"
                                                    data-cfemail="6c05020a032c09140d011c00091b090e420f0301">[email&#160;protected]</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h5 class="title">Subscribe Newsletter</h5>
                                <form class="footer-subscribe-form">
                                    <input type="text" placeholder="Enter Your Email" name="email">
                                    <button type="submit">Subscribe Now</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <div class="thumb">
                                    <a href="index-2.html">
                                        <img src="{{ asset('assets/frontend/images/footer/footer-bottom.png') }}"
                                            alt="footer">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-area">
                        <div class="left">
                            <p>&copy; Copyright 2023. All Rights Reserved.</p>
                        </div>
                        <div class="right">
                            <ul class="social-icons">
                                <li>
                                    <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#0" class="active"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ~~~ Footer Section ~~~ -->
    </div>
    <script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
    </script>
    <script src="assets/frontend/js/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/magnific-popup.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
