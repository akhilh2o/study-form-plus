<x-app-layout>
    <x-breadcrumb title="eBooks" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'eBooks']]" />
    <!-- ~~~ Ebook Section ~~~ -->
    <section class="course-section pt-50 pb-120">
        <div class="container">
            <div class="row align-items-center section-header">
                <div class="col-lg-7">
                    <div class="section-header left-style mb-low mb-lg-0">
                        <h2 class="title"><span>{{ $category?->name ?? 'All' }}</span> eBooks</h2>
                    </div>
                </div>
                <div class="col-lg-5">
                </div>
            </div>
            <div class="row justify-content-center mb-30-none">
                @foreach ($ebooks ?? [] as $ebook)
                    <div class="col-xl-4 col-md-6 col-sm-10">
                        <div class="course-item">
                            <div class="thumb">
                                <a href="{{ route('ebooks.detail',[$ebook->slug]) }}">
                                    <img src="{{ $ebook?->image() }}" alt="{{ $ebook?->name }}">
                                </a>
                            </div>
                            <div class="content">
                                <h5 class="title mb-3">
                                    <a href="{{ route('ebooks.detail',[$ebook->slug]) }}">{{ $ebook?->name }}</a>
                                </h5>
                                <p class="fs-5">
                                    <b>By: </b>
                                    <span>{{ $ebook?->professor }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center load-more mt-5">
                {{ $ebooks->links() }}
            </div>
        </div>
    </section>
    <!-- ~~~ Ebook Section ~~~ -->

</x-app-layout>
