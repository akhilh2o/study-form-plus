<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        @yield('meta_title', setting('general_settings')?->option_value['meta_title'])
    </title>
    <meta name="description" content="@yield('meta_description', setting('general_settings')?->option_value['meta_description'])">
    <meta name="keywords" content="@yield('meta_keyword', setting('general_settings')?->option_value['meta_keyword'])">
    <meta name="author" content="{{ config('app.name') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
    @if (setting('general_settings')?->option_value['favicon'])
        <link rel="shortcut icon"
            href="{{ asset('storage/' . setting('general_settings')?->option_value['favicon']) }}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="{{ asset('assets/images/logo.jpeg') }}" type="image/x-icon">
    @endif

    @stack('styles')
</head>

<style>
 .mega-dropdown .dropdown-menu a {
  text-decoration: none;
  color: #000000;
}
.mega-dropdown .dropdown-menu a .d-flex {
  transition: all 0.5s;
}
.mega-dropdown .dropdown-menu .col-sm-6:nth-child(1) a:hover .d-flex {
  background-color: var(--bs-warning-bg-subtle);
}
.mega-dropdown .dropdown-menu .col-sm-6:nth-child(2) a:hover .d-flex {
  background-color: var(--bs-danger-bg-subtle);
}
.mega-dropdown .dropdown-menu .col-sm-6:nth-child(3) a:hover .d-flex {
  background-color: var(--bs-success-bg-subtle);
}
.mega-dropdown .dropdown-menu .col-sm-6:nth-child(4) a:hover .d-flex {
  background-color: var(--bs-secondary-bg-subtle);
}
.mega-dropdown .dropdown-menu .col-sm-6:nth-child(5) a:hover .d-flex {
  background-color: var(--bs-tertiary-bg);
}
.mega-dropdown .dropdown-menu .col-sm-6:nth-child(6) a:hover .d-flex {
  background-color: var(--bs-info-bg-subtle);
}
@media only screen and (min-width: 992px) {
 .mega-dropdown .dropdown-menu {
    width: 55vw;
  }
  .mega-dropdown:hover .dropdown-menu {
    display: flex;
  }
  .mega-dropdown .dropdown-menu.show {
    display: flex;
  }
}

.social-icons  li a .fab{
    position: relative;
    top: 6px;
}
</style>
<body>
    <x-alertt-alert />
    <div class="all-sections">
        <!-- ~~~ Loader & Go-Top ~~~ -->
        {{-- <div class="overlayer"></div> --}}
        {{-- <div class="loader">
            <div class="inner"></div>
        </div> --}}
        <span class="go-top">
            <i class="fas fa-angle-up"></i>
        </span>
        <!-- ~~~ Loader & Go-Top ~~~ -->

        <!-- ~~~ Header Section ~~~ -->
        <div class="custom-container top-header" style="background-color: #202c45!important;color: #aab1c6;">
            <div class="d-flex justify-content-end align-items-center justify-content-between py-2">
                <div class="text-end">
                    <p class="text-white m-0 small" style="line-height: 0px">
                        {{ config('app.name', 'Study Forum Plus') }}
                    </p>
                </div>
                <div class="right ">
                    <ul class="social-icons">
                        <li>
                            <a href="#0" class=""><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#0" class=""><i class="fab fa-twitter"></i></a>
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
        <header>

            <div class="container">

                <div class="header-area navbar navbar-expand-lg">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            @if (setting('general_settings')?->option_value['logo'])
                                <img src="{{ asset('storage/' . setting('general_settings')?->option_value['logo']) }}"
                                    alt="logo">
                            @else
                                <img src="{{ asset('assets/images/logo.jpeg') }}" alt="logo">
                            @endif
                        </a>
                    </div>
                    <button class="navbar-toggler navbar-togglerBtn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavbar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="menu d-lg-flex flex-wrap">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown">
                                    Courses
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('courses') }}">
                                            All Courses
                                        </a>
                                    </li>
                                    @foreach ($categories as $category)
                                        <li class="nav-item dropdown d-flex justify-content-between">
                                            <a href="{{ route('courses', ['category' => $category->slug]) }}">
                                                {{ $category->name }}
                                            </a>

                                            @if ($category->children->count())
                                                <a class="dropdown-item nav-link dropdown-toggle text-end"
                                                    role="button" data-bs-toggle="dropdown">
                                                </a>

                                                <ul class="dropdown-submenu">
                                                    @foreach ($category->children ?? [] as $childrens)
                                                        <li class="nav-item dropdown d-flex justify-content-between">
                                                            <a href="{{ route('courses', ['category' => $childrens->slug]) }}"
                                                                class="text-nowrap">
                                                                {{ $childrens->name }}
                                                            </a>
                                                            @if ($childrens->children->count())
                                                                <a class="dropdown-item nav-link dropdown-toggle text-end"
                                                                    role="button" data-bs-toggle="dropdown">
                                                                </a>

                                                                <ul class="dropdown-submenu">
                                                                    @foreach ($childrens->children ?? [] as $child)
                                                                        <li class="nav-item">
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('courses', ['category' => $child->slug]) }}">
                                                                                {{ $child->name }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>

                                        {{-- <li class="{{ $category->children->count() ? 'dropdown' : '' }}">
                                            <a class="dropdown-item "
                                                href="{{ route('courses', ['category' => $category->slug]) }}">
                                                {{ $category->name }}
                                            </a>
                                            @if ($category->children->count())
                                                <ul class="dropdown-submenu">
                                                    @foreach ($category->children ?? [] as $child)
                                                        <li class="nav-item dropdown">
                                                            <a class="dropdown-item nav-link dropdown-toggle"
                                                                href="{{ route('courses', ['category' => $child->slug]) }}"
                                                                role="button" data-bs-toggle="dropdown">
                                                                {{ $category->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li> --}}
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item mega-dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            All Courses
          </a>
          <div class="dropdown-menu px-3 rounded-3 border-0 shadow">
            <div class="row">
              <div class="col-sm-4">
                <a href="#">
                  <div class="d-flex align-items-center py-3 px-1 rounded-3">
                    <div class="icon px-3 bg-warning-subtle rounded-3 fs-1">
                      <i class="bi bi-tv"></i>
                    </div>
                    <div class="text ps-3">
                      <h5>CMA</h5>
                    
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-sm-4">
                <a href="#">
                  <div class="d-flex align-items-center py-3 px-1 rounded-3">
                    <div class="icon px-3 bg-danger-subtle rounded-3 fs-1">
                      <i class="bi bi-headphones"></i>
                    </div>
                    <div class="text ps-3">
                      <h5>CMA</h5>
                    
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-sm-4">
                <a href="#">
                  <div class="d-flex align-items-center py-3 px-1 rounded-3">
                    <div class="icon px-3 bg-success-subtle rounded-3 fs-1">
                      <i class="bi bi-phone"></i>
                    </div>
                    <div class="text ps-3">
                      <h5>CMA</h5>
                    
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-sm-4">
                <a href="#">
                  <div class="d-flex align-items-center py-3 px-1 rounded-3">
                    <div class="icon px-3 bg-secondary-subtle rounded-3 fs-1">
                      <i class="bi bi-laptop"></i>
                    </div>
                    <div class="text ps-3">
                      <h5>CMA</h5>
                    
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-sm-4">
                <a href="#">
                  <div class="d-flex align-items-center py-3 px-1 rounded-3">
                    <div class="icon px-3 bg-body-tertiary rounded-3 fs-1">
                      <i class="bi bi-smartwatch"></i>
                    </div>
                    <div class="text ps-3">
                      <h5>CMA</h5>
                    
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-sm-4">
                <a href="#">
                  <div class="d-flex align-items-center py-3 px-1 rounded-3">
                    <div class="icon px-3 bg-info-subtle rounded-3 fs-1">
                      <i class="bi bi-earbuds"></i>
                    </div>
                    <div class="text ps-3">
                      <h5>CMA</h5>
                    
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown">
                                    E-Books
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($ebookCategories ?? [] as $category)
                                        <li class="nav-item dropdown">
                                            <a class="dropdown-item nav-link dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown">
                                                {{ $category->name }}
                                            </a>
                                            @if ($category->children)
                                                <ul class="dropdown-submenu">
                                                    @foreach ($category->children ?? [] as $childrens)
                                                        <li class="nav-item dropdown">
                                                            <a class="dropdown-item nav-link dropdown-toggle"
                                                                href="{{ route('ebooks.category', ['parent' => $category, 'child' => $childrens]) }}"
                                                                role="button" data-bs-toggle="dropdown">
                                                                {{ $childrens->name }}
                                                            </a>
                                                            @if ($childrens->children)
                                                                <ul class="dropdown-submenu">
                                                                    @foreach ($childrens->children ?? [] as $child)
                                                                        <li class="nav-item">
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('ebooks.detail', [$child->slug]) }}">
                                                                                {{ $child->name }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('faculties') }}">Faculties</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">Contact</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown">
                                    {{ auth()->check() ? auth()->user()->name : 'My Account' }}
                                </a>
                                <ul class="dropdown-menu">
                                    @guest
                                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                    @else
                                        <li>
                                            <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                                Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('user.profile') }}">
                                                Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('wishlists.index') }}">
                                                Wishlist
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('user.orders') }}">
                                                Orders
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('user.password') }}">
                                                Change Password
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('login') }}"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    @endguest
                                </ul>
                            </li>
         

              
                        



                        </ul>
                        <ul class="menu d-lg-flex flex-wrap ms-auto">
                            <li class="wishlist me-3">
                                <a href="{{ route('wishlists.index') }}">
                                    <i class="fas fa-heart"></i> Wishlist
                                    <span class="badge bg-dark rounded-pill">
                                        @if (auth()->check())
                                            {{ auth()->user()?->wishlists->count() }}
                                        @else
                                            0
                                        @endif
                                    </span>
                                </a>
                            </li>
                            <li class="cart">
                                <a href="{{ route('carts.index') }}">
                                    <i class="fas fa-shopping-cart"></i> Cart
                                    <span class="badge bg-dark rounded-pill">
                                        {{ collect(session('cart', []))->count() }}
                                    </span>
                                </a>
                            </li>
                        </ul>

                    </div>

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
                <div class="w-100 d-lg-none">
                    <ul class="menu">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('courses') }}">Courses</a>
                        </li>
                        <li>
                            <a href="{{ route('faculties') }}">Faculties</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                        @auth
                            <li>
                                <a href="{{ route('dashboard') }}">My Account</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth
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
                        <div class="col-md-12 col-sm-10">
                            <div class="footer-support-item">
                                <div class="content title">
                                    <h5 class="title">
                                        <center>Experienced Faculties, Daily Doubt sessions, Ready to counsel any
                                            enquiry, supportive technical team and empowering staff is which
                                            differentiate</center>
                                    </h5>

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
                                <h5 class="title">Important Links</h5>
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('courses') }}">All Courses</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('faculties') }}">Faculties</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('login') }}">My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-widget widget-link">
                                <h5 class="title">Information</h5>
                                <ul>
                                    @foreach ($pages as $page)
                                        <li>
                                            <a href="{{ route('page', [$page]) }}">{{ $page?->title }}</a>
                                        </li>
                                    @endforeach
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
                                            <span>
                                                {{ setting('general_settings')?->option_value['company_address'] ??
                                                    '3078 Oberoi Garden Estate, B Wing Chandivali Farm Road, Saki Naka' }}
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="content">
                                            <a
                                                href="Tel:+{{ setting('general_settings')?->option_value['support_phone'] }}">
                                                {{ setting('general_settings')?->option_value['support_phone'] ?? '+91 9638-9638-9638' }}
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-envelope-open-text"></i>
                                        </div>
                                        <div class="content">
                                            <a
                                                href="Mailto:{{ setting('general_settings')?->option_value['support_email'] }}">
                                                {{ setting('general_settings')?->option_value['support_email'] ?? 'info@example.com' }}
                                            </a>
                                        </div>
                                    </li>
                                </ul>
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

        <div class="modal" id="quick_contact_popup">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('queries.store') }}" class="modal-content"
                    id="quick_contact_form">
                    @csrf
                    <!-- Modal Header -->
                    <div class="modal-header d-block" style="background-color: #202c45">
                        <h6 class="text-center fw-normal text-light">
                            Get classes of best faculties from
                            <br />
                            <b class="text-warning">Study Form Plus</b>
                            <br />
                            <span class="text-success">Call Now!</span>
                            <a href="tel:+918810344366" class="fw-bold text-light">+91 8810 344 366</a>
                            <br />
                            <span class="text-success">Or Register below</span> <span>We will contact you</span>
                        </h6>
                        <button type="button" class="btn-close " data-bs-dismiss="modal"
                            style="position: absolute; right: 1rem; top: 1rem;"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control mb-3" placeholder="Enter your name"
                            required>
                        <input type="tel" name="mobile" class="form-control" placeholder="Enter mobile no."
                            required>
                        <input type="hidden" name="subject" value="Quick contact">
                        <input type="hidden" name="title" value="Quick contact">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-start">
                        <button type="submit" class="btn btn-dark px-4">
                            <i class="fas fa-save"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
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
