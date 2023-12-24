<x-app-layout>
    <x-breadcrumb :title="$faculty?->title" :links="[
        ['text' => 'Home', 'url' => route('home')],
        ['text' => 'Courses', 'url' => route('faculties')],
        ['text' => $faculty?->title],
    ]" />

    <!-- ~~~ Faculty Section ~~~ -->
    <section class="course-details-section pt-50 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $faculty->avatarUrl() }}" alt="thumbnail" class="rounded w-100">
                </div>
                <div class="col-md-8">
                    <h4 class="title mb-4">{{ $faculty?->title }}</h4>
                    <p class="lead">
                        <b>{{ $faculty?->subtitle }} </b>
                    </p>
                    <div class="description">
                        {!! $faculty?->content !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Faculty Section ~~~ -->
</x-app-layout>
