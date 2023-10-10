<x-app-layout>
    <!-- ~~~ Hero Section ~~~ -->
    <section class="hero-section banner-overlay bg_img" data-img="{{ asset('assets/frontend/images/banner/banner-bg.jpg') }}">
        <div class="custom-container">
            <div class="hero-content">
                <h1 class="title uppercase cl-white">{{ $page?->title }}</h1>
                <ul class="breadcrumb cl-white p-0 m-0">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        {{ $page?->title }}
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ~~~ Hero Section ~~~ -->


    <!-- ~~~ Blog Section ~~~ -->
    <div class="blog-section pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <article class="pr-xl-20 blog-posts">
                        <div class="post-item post-details p-0">
                            <div class="post-thumb">
                                <img src="{{ $page->banner() }}" alt="{{ $page?->title }}">
                            </div>
                            <div class="post-content">
                                {!! $page?->content !!}
                            </div>
                        </div>

                    </article>
                </div>
            </div>
        </div>
    </div>
    <!-- ~~~ Blog Section ~~~ -->

</x-app-layout>
