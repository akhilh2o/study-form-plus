<x-app-layout>
    <x-breadcrumb title="Courses" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Courses']]" />

    <!-- ~~~ Course Section ~~~ -->
    <section class="course-section pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center section-header">
                <div class="col-lg-7">
                    <div class="section-header left-style mb-low mb-lg-0">
                        <h2 class="title"><span>{{ $category?->name ?? 'All' }}</span> Courses</h2>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex flex-wrap justify-content-lg-end m--10">
                        <div class="course-select-item">
                            <select class="select-bar">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->slug }}" @selected($category?->id == $cat->id)>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="course-select-item">
                            <select class="select-bar">
                                <option value="o1">Select Order</option>
                                <option value="o2">Latest</option>
                                <option value="o3">Oldest</option>
                                <option value="o3">Price (Low - High)</option>
                                <option value="o3">Price (High - Low)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-30-none">
                @foreach ($courses ?? [] as $course)
                    <div class="col-xl-4 col-md-6 col-sm-10">
                       <x-product-card :product="$course" />
                    </div>
                @endforeach
            </div>
            <div class="text-center load-more mt-5">
                {{ $courses->links() }}
            </div>
        </div>
    </section>
    <!-- ~~~ Course Section ~~~ -->

</x-app-layout>
