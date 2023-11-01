<x-app-layout>
    <x-breadcrumb title="Faculties" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Faculties']]" />
    <!-- ~~~ faculties Section ~~~ -->
    <section class="course-section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center mb-30-none">
                @foreach ($faculties ?? [] as $faculty)
                <div class="col-lg-3 col-sm-6">
                    <div class="instructor-item">
                        <div class="instructor-thumb">
                            <a href="{{ route('faculty', [$faculty]) }}"><img src="{{ $faculty->avatarUrl() }}"
                                    alt="{{ $faculty?->title }}"></a>
                        </div>
                        <div class="instructor-content">
                            <h6 class="title"><a href="{{ route('faculty', [$faculty]) }}">{{ $faculty?->title }}</a>
                            </h6>
                            <span class="details">{{ strtoupper($faculty?->subtitle) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center load-more mt-5">
                {{ $faculties->links() }}
            </div>
        </div>
    </section>
    <!-- ~~~ faculties Section ~~~ -->

</x-app-layout>
