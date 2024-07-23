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

    <div class="row g-2 course_slider mb-5">
        @foreach (courseByCategory($categoryIds, 6, true) ?? [] as $course)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <x-product-card :product="$course" class="mb-0" />
            </div>
        @endforeach
    </div>
</div>
