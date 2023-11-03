<x-app-layout>
    <x-breadcrumb title="Faculties" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Faculties']]" />
    <!-- ~~~ faculties Section ~~~ -->
    <section class="course-section pt-120 pb-120">
        <div class="container">
            <div class="row g-3 justify-content-center mb-30-none">
                @foreach ($faculties ?? [] as $faculty)
                    <div class="col-lg-3 col-sm-6">
                        <x-faculty-card :faculty="$faculty" />
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
