<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


<div {{ $attributes }}>
    <div class="section-header mt-3 mb-2">
        @php
            $words = explode(' ', $category->name);
            $firstWord = head($words);
            $secondWord = count($words) > 1 ? $words[1] : null;

            $categoryIds = [$category?->id];
            if($category->children->count()){
                $categoryIds = $category->children->pluck('id')->push($category?->id)->toArray();
            }
        @endphp
        <h2 class="title mb-0 pb-0">
            <span>{{ $firstWord }}</span>{{ $secondWord ? ' ' . $secondWord : '' }}
            <a href="{{ route('courses', ['category' => $category->slug]) }}" class="fs-5">[View all]</a>
        </h2>
    </div>

    <div class="owl-carousel owl-theme mb-5 course-cards">
        @foreach (courseByCategory($categoryIds, 6, true) ?? [] as $course)
            <div class="item">
                <x-product-card :product="$course" class="mb-0" />
            </div>
        @endforeach
    </div>
</div>

<!-- jQuery (necessary for Owl Carousel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$(document).ready(function(){
    $(".owl-carousel.course-cards").owlCarousel({
        items: 4,              // Number of items to display
        margin: 10,            // Margin between items
        loop: true,            // Loop the items
        nav: true,             // Show next/prev buttons
        dots: false,           // Hide dots navigation
        autoplay: true,        // Autoplay the slider
        responsive: {
            0: {
                items: 1       // Number of items on small screens
            },
            600: {
                items: 2       // Number of items on medium screens
            },
            1000: {
                items: 4       // Number of items on large screens
            }
        }
    });
});
</script>
