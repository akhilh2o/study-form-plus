<x-app-layout>
    <x-breadcrumb title="Carts" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Carts']]" />

    <section class="carts pt-40 pb-120">
        <div class="container">
            @if (session('cart'))
                @php $total = 0 @endphp
                @foreach ($courses ?? [] as $id => $course)
                    <div class="card cart_item">
                        <div class="card-body d-flex gap-3">
                            <div class="my-auto">
                                <img src="{{ $course->thumb() }}" alt="" class="rounded course_img">
                            </div>
                            <div class="my-auto">
                                <h6 class="mb-3 lh-1">{{ $course?->title }}</h6>
                                @if ($carts[$course?->id]['order_type']=='download')
                                    <p class="mb-2">
                                        <b>Download Price: </b>
                                        <span>{!! currencySymbol() !!} {{ number_format($course?->salePriceForDownload($carts[$course?->id]['exam_attempt']),2) }}</span>
                                        <del>{!! currencySymbol() !!} {{ number_format($course?->netPriceForDownload($carts[$course?->id]['exam_attempt']),2) }}</del>
                                    </p>
                                @endif
                                @if ($carts[$course?->id]['order_type']=='pendrive')
                                    <p class="mb-2">
                                        <b>Pendrive Price:</b>
                                        <span>{!! currencySymbol() !!} {{ number_format($course?->salePriceForPendrive($carts[$course?->id]['exam_attempt']), 2) }}</span>
                                        <del>{!! currencySymbol() !!} {{ number_format($course?->netPriceForPendrive($carts[$course?->id]['exam_attempt']), 2) }}</del>
                                    </p>
                                @endif
                                <p class="mb-2">
                                    <b>Course Type:</b>
                                    <span>{{ Str::ucfirst($carts[$course?->id]['order_type']) }}</span>
                                </p>
                                <a href="{{ route('carts.delete', ['id' => $course->id]) }}" class="badge bg-danger">
                                    <i class="fas fa-times"></i> Remove
                                </a>
                            </div>
                        </div>
                    </div>
                    @php 
                        if($carts[$course?->id]['order_type']=='download'){
                            $total += $course?->salePriceForDownload($carts[$course?->id]['exam_attempt']);
                        }
                        if ($carts[$course?->id]['order_type']=='pendrive'){
                            $total += $course?->salePriceForPendrive($carts[$course?->id]['exam_attempt']);
                        }
                    @endphp
                @endforeach

                <div class="mt-4 text-end d-flex gap-4 justify-content-between">
                    <div class="my-auto">
                        <h4>Total: {!! currencySymbol() !!} {{ number_format($total, 2) }}</h4>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn btn-lg btn-dark px-4 rounded-pill">
                        Procceed Checkout
                    </a>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="border border-danger border-3 p-lg-5 p-sm-4 p-3 rounded">
                            <div class="text-center">
                                <i class="far fa-times-circle display-1"></i>

                                <h2 class="mt-0 mb-3">Cart is empty.</h2>
                                <p class="lh-1">You can browse the couses and explore more stuffs around the site.
                                    Click on the links below to browse our courses.</p>

                                <div class="mt-4"></div>
                                <a href="{{ url('/') }}" class="btn btn-dark px-3">
                                    Home
                                </a>
                                <a href="{{ route('courses') }}" class="btn btn-dark px-3">
                                    Courses
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
