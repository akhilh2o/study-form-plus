<section class="pb-10 pt-10 banner-overlay bg_img">
    <div class="container">
        <div class="hero-content">
            <ul class="breadcrumb cl-white p-0 m-0" style="justify-content: start">
                @foreach ($links as $link)
                    <li>
                        @if (!$loop->last)
                            <a href="{{ isset($link['url']) ? $link['url'] : 'javascript:void(0)' }}">
                                {{ $link['text'] }}
                            </a>
                        @else
                            {{ $link['text'] }}
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

{{-- 
<section class="hero-section banner-overlay bg_img" data-img="{{ asset('assets/frontend/images/banner/banner-bg.jpg') }}">
    <div class="container">
        <div class="hero-content">
            @if ($title)
                <h1 class="title cl-white">{{ substr($title, 0, 60) }}</h1>
            @endif

            <ul class="breadcrumb cl-white p-0 m-0">
                @foreach ($links as $link)
                    <li>
                        @if (!$loop->last)
                            <a href="{{ isset($link['url']) ? $link['url'] : 'javascript:void(0)' }}">
                                {{ $link['text'] }}
                            </a>
                        @else
                            {{ $link['text'] }}
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section> --}}
