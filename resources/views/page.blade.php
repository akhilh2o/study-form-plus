<x-app-layout>
    <x-breadcrumb :title="$page?->title" :links="[['text' => 'Home', 'url' => route('home')], ['text' => $page?->title]]" />


    <!-- ~~~ Blog Section ~~~ -->
    <div class="blog-section pt-50 pb-120">
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
