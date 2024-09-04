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

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('meta_title', setting('general_settings')?->option_value['meta_title'])" />
    <meta property="og:description" content="@yield('meta_description', setting('general_settings')?->option_value['meta_description'])" />
    <meta property="og:image" content="@yield('image',asset('assets/images/logo.jpeg'))" />



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
    <link rel="shortcut icon" href="{{ asset('storage/' . setting('general_settings')?->option_value['favicon']) }}" type="image/x-icon">
    @else
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.jpeg') }}" type="image/x-icon">
    @endif

    @stack('styles')
</head>

<style>
    .menu li a {
        width: auto;
    }

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

    /* .nav-item.dropdown:hover .dropdown-menu {
    display: block;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    padding: 1rem;
} */

    .form-model {
        position: fixed;
        display: none;
        bottom: 10px;
        left: 10px;
        width: 50px;
        height: 50px;
        background-color: black;
        font-size: 25px;
        color: #ffffff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
        overflow: hidden;
        z-index: 50;
        border: 0;
    }

    .modal-header {
        display: inline-grid !important;
        justify-content: center !important;
    }

    .modal-header .btn-close {
        position: absolute !important;
        right: 15px !important;
    }

    #vdz_cb_widget {
        position: fixed;
        left: 40px;
        bottom: 40px;
        width: 80px;
        height: 80px;
        line-height: 78px;
        border-radius: 50%;
        background-color: rgba(32, 152, 209, .5);
        text-align: center;
        z-index: 9999;
        overflow: visible;
        /* Ensure overflow is visible to allow animations to extend outside */
        display: flex;
        align-items: center;
        justify-content: center;
        /* Hide any part of the animation that goes outside of the button */
    }

    #vdz_cb_widget:before,
    #vdz_cb_widget:after {
        content: '';
        position: absolute;
        border-radius: 50%;
        z-index: -1;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #vdz_cb_widget:before {
        width: 150px;
        /* Larger size for the outer wave effect */
        height: 150px;
        border: 2px solid red;
        opacity: 0;
        animation: waveBefore 2s infinite;
    }

    #vdz_cb_widget:after {
        width: 250px;
        /* Larger size for the outer wave effect */
        height: 250px;
        background-color: rgba(32, 152, 209, .3);
        opacity: 0;
        animation: waveAfter 4s infinite;
    }

    @keyframes waveBefore {
        0% {
            transform: translate(-50%, -50%) scale(0);
            opacity: 0.6;
        }

        50% {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0;
        }

        100% {
            transform: translate(-50%, -50%) scale(1.5);
            /* Extend beyond the button */
            opacity: 0;
        }
    }

    @keyframes waveAfter {
        0% {
            transform: translate(-50%, -50%) scale(0);
            opacity: 0.4;
        }

        50% {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0;
        }

        100% {
            transform: translate(-50%, -50%) scale(2);
            /* Extend further beyond the button */
            opacity: 0;
        }
    }

    .vdz_cb_widget {
        display: block;
        position: relative;
        width: 100%;
        height: 100%;
        border: 2px solid transparent;
        border-radius: 50%;
        box-sizing: content-box !important;
    }

    .vdz_cb_widget span {
        display: block;
        width: 100%;
        height: 100%;
        vertical-align: middle;
        color: #fff;
        z-index: 1;
    }


    i.fa.fa-phone {
        font-size: 35px;
        position: absolute;
        left: 20px;
        top: 20px;
    }

    button.ButtonBase__ButtonContainer-sc-p43e7i-3.euBiGU.Bubble__BubbleComponent-sc-1hq47r8-0.kTfTfE {
        width: 80px !important;
        height: 75px !important;
    }

    .dHxKzM,
    .iCNyoS {
        height: 0 !important;
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
            <i class="fas fa-angle-up mt-2"></i>
        </span>
        <!-- ~~~ Loader & Go-Top ~~~ -->

        <!-- ~~~ Header Section ~~~ -->
        <div class="custom-container top-header" style="background-color: #202c45!important;color: #aab1c6;">
            <div class="d-flex justify-content-end align-items-center justify-content-between py-2 container">
                <div class="text-end">
                    <p class="text-white m-0 fs-6 fw-bold" style="line-height: 0px">
                        {{ config('app.name', 'Study Forum Plus') }}
                    </p>
                </div>
                <div class="right ">
                    <ul class="social-icons">
                        <li>
                            <a href="#0" class=""><i class="fab fa-facebook-f mt-1"></i></a>
                        </li>
                        <li>
                            <a href="#0" class=""><i class="fab fa-twitter mt-1"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-instagram mt-1"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-linkedin-in mt-1"></i></a>
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
                            <img src="{{ asset('storage/' . setting('general_settings')?->option_value['logo']) }}" alt="logo">
                            @else
                            <img src="{{ asset('assets/images/logo.jpeg') }}" alt="logo">
                            @endif
                        </a>
                    </div>
                    <button class="navbar-toggler navbar-togglerBtn" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="menu d-lg-flex flex-wrap">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
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
                                        <a href="{{ route('courses', ['category' => $category->slug]) }}" class="w-100">
                                            {{ $category->name }}
                                        </a>

                                        @if ($category->children->count())
                                        <a class="dropdown-item nav-link dropdown-toggle text-end" role="button" data-bs-toggle="dropdown">
                                        </a>

                                        <ul class="dropdown-submenu">
                                            @foreach ($category->children ?? [] as $childrens)
                                            <li class="nav-item dropdown d-flex justify-content-between">
                                                <a href="{{ route('courses', ['category' => $childrens->slug]) }}" class="text-nowrap">
                                                    {{ $childrens->name }}
                                                </a>
                                                @if ($childrens->children->count())
                                                <a class="dropdown-item nav-link dropdown-toggle text-end" role="button" data-bs-toggle="dropdown">
                                                </a>

                                                <ul class="dropdown-submenu">
                                                    @foreach ($childrens->children ?? [] as $child)
                                                    <li class="nav-item">
                                                        <a class="dropdown-item" href="{{ route('courses', ['category' => $child->slug]) }}">
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
                                    <a class="dropdown-item " href="{{ route('courses', ['category' => $category->slug]) }}">
                                        {{ $category->name }}
                                    </a>
                                    @if ($category->children->count())
                                    <ul class="dropdown-submenu">
                                        @foreach ($category->children ?? [] as $child)
                                        <li class="nav-item dropdown">
                                            <a class="dropdown-item nav-link dropdown-toggle" href="{{ route('courses', ['category' => $child->slug]) }}" role="button" data-bs-toggle="dropdown">
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
                        <!-- <li class="nav-item mega-dropdown">
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
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                E-Books
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($ebookCategories ?? [] as $category)
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                        {{ $category->name }}
                                    </a>
                                    @if ($category->children)
                                    <ul class="dropdown-submenu">
                                        @foreach ($category->children ?? [] as $childrens)
                                        <li class="nav-item dropdown">
                                            <a class="dropdown-item nav-link dropdown-toggle" href="{{ route('ebooks.category', ['parent' => $category, 'child' => $childrens]) }}" role="button" data-bs-toggle="dropdown">
                                                {{ $childrens->name }}
                                            </a>
                                            @if ($childrens->children)
                                            <ul class="dropdown-submenu">
                                                @foreach ($childrens->children ?? [] as $child)
                                                <li class="nav-item">
                                                    <a class="dropdown-item" href="{{ route('ebooks.detail', [$child->slug]) }}">
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
                        <li>
                            <a href="{{ route('blog.posts.index') }}">Blog</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
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
                                    <a class="dropdown-item" href="{{ route('login') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
                            <div class="footer-support-item justify-content-center">
                                <div class="content title ps-0">
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
                                        <a href="{{ route('courses') }}">All Courses</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('faculties') }}">Faculties</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog.posts.index') }}">Blog</a>
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
                                            <a href="Tel:+{{ setting('general_settings')?->option_value['support_phone'] }}">
                                                {{ setting('general_settings')?->option_value['support_phone'] ?? '+91 9638-9638-9638' }}
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-envelope-open-text"></i>
                                        </div>
                                        <div class="content">
                                            <a href="Mailto:{{ setting('general_settings')?->option_value['support_email'] }}">
                                                {{ setting('general_settings')?->option_value['support_email'] ?? 'info@example.com' }}
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-area d-flex justify-content-between ">
                        <div class="left">
                            <p>&copy; Copyright 2023. All Rights Reserved.</p>
                        </div>
                        <div class="center ms-lg-0 ms-md-0 ms-3 text-center">
                            <p>Developed by: <a href="https://texmith.com/" target="_blank" class="text-white">Texmith infotech</a></p>
                        </div>
                        <div class="right">
                            <ul class="social-icons">
                                <li>
                                    <a href="#0"><i class="fab fa-facebook-f  mt-2"></i></a>
                                </li>
                                <li>
                                    <a href="#0" class="active"><i class="fab fa-twitter  mt-2"> </i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-instagram  mt-2"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-linkedin-in  mt-2"></i></a>
                                </li>
                                <!-- style="top: 10px;" -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ~~~ Footer Section ~~~ -->

        <div class="modal" id="quick_contact_popup">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('queries.store') }}" class="modal-content" id="quick_contact_form">
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" style="position: absolute; right: 1rem; top: 1rem;"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control mb-3" placeholder="Enter your name" required>
                        <input type="tel" name="mobile" class="form-control" placeholder="Enter mobile no." required>
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


        <!-- course modal -->

        <div id="vdz_cb_widget">
            <a class="vdz_cb_widget vdz_cb_widget_btn" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">
                <span class="vdz_cb_widget_icon" aria-hidden="true">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </span>
            </a>
        </div>
        <!-- form -->
        <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('queries.store') }}">
                    @csrf
                    <div class="modal-header " style="background-color:#202c45;">
                        <h5 class="modal-title text-white text-center" id="contactModalLabel">Request A Call Back</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: 0; font-size: 1.5rem; color:white;"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="subject" value="Request a Call Back">
                        <input type="hidden" name="title" value="Request a Call Back">
                        <!-- Form fields here -->
                        <div class="form-row my-3">
                            <div class="form-group col-md-12">
                                <label for="fullName" style="font-weight: bold; font-size: 1.2rem;">Full Name</label>
                                <input type="text" class="form-control my-1" id="fullName" name="name" placeholder="Full Name" required style="padding: 10px; font-size: 1.2rem; background-color: whitesmoke;">
                            </div>
                        </div>
                        <div class="form-row my-3">
                            <div class="form-group col-md-12 my-3">
                                <label for="phone" style="font-weight: bold; font-size: 1.2rem;">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="mobile" placeholder="Phone Number" required maxlength="10" pattern="\d{10}" title="Please enter a 10-digit phone number" style="padding: 10px; font-size: 1.2rem; background-color: whitesmoke;">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email" style="font-weight: bold; font-size: 1.2rem;">Email</label>
                                <input type="email" class="form-control my-1" id="email" name="email" placeholder="Email" required style="padding: 10px; font-size: 1.2rem; background-color: whitesmoke;">
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <label for="assistance" style="font-weight: bold; font-size: 1.2rem;">Select Course</label>
                            <select id="assistance" class="form-control my-1" name="others[assistance]" required style="padding: 10px; font-size: 1.2rem; background-color: whitesmoke;">
                                <option value="">-- Please choose an option --</option>
                                <option>CA (Chartered Accountant)</option>
                                <option>CMA (Cost and management accounting)</option>
                                <option>11th</option>
                                <option>12th</option>
                                <option>B.COM</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="justify-content: center;">
                        <button type="submit" class="btn btn-primary" style="margin: 0 auto; background: black; border:0;">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- End course modal -->


    </div>
    <div class="elfsight-app-40d72caa-d4ac-4490-9b93-57a739145eaa" data-elfsight-app-lazy></div>
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>



    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/magnific-popup.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Function to close all open dropdowns
            function closeAllDropdowns() {
                $('.nav-item.dropdown.open').each(function() {
                    $(this).removeClass('open'); // Remove 'open' class from the li
                    $(this).find('.dropdown-menu').css('display', 'none'); // Hide the dropdown menu
                });
            }

            // Close dropdowns when scrolling
            $(window).on('scroll', function() {
                closeAllDropdowns();
            });

            // Optionally, handle click events to toggle dropdown
            $('.dropdown-toggle').on('click', function(e) {
                e.stopPropagation(); // Prevent click event from closing the dropdown immediately
                var $parent = $(this).parent('.nav-item.dropdown');

                // Close all other dropdowns
                closeAllDropdowns();

                // Toggle the current dropdown
                if ($parent.hasClass('open')) {
                    $parent.removeClass('open');
                    $(this).next('.dropdown-menu').css('display', 'none');
                } else {
                    $parent.addClass('open');
                    $(this).next('.dropdown-menu').css('display', 'block');
                }
            });

            // Close dropdowns when clicking outside
            $(document).on('click', function(event) {
                if (!$(event.target).closest('.dropdown-toggle, .dropdown-menu').length) {
                    closeAllDropdowns();
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to show the modal
            function showModal() {
                var modalElement = document.getElementById('contactModal');
                if (modalElement) {
                    var bootstrapModal = new bootstrap.Modal(modalElement);
                    bootstrapModal.show();
                }
            }

            // Check if the URL contains #contactModal
            if (window.location.hash === '#contactModal') {
                showModal();
            }

            // Function to hide the modal
            function hideModal() {
                var modalElement = document.getElementById('contactModal');
                if (modalElement) {
                    var bootstrapModal = bootstrap.Modal.getInstance(modalElement);
                    if (bootstrapModal) {
                        bootstrapModal.hide();
                    }
                }
            }
            var modalElement = document.getElementById('contactModal');
            if (modalElement) {
                modalElement.addEventListener('hidden.bs.modal', function() {
                    history.pushState('', document.title, window.location.pathname + window.location.search);
                });
                z
            }
        });
    </script>

    @stack('scripts')
</body>

</html>