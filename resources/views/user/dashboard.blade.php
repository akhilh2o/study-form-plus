<x-app-layout>
    <x-breadcrumb title="Dashboard" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Dashboard']]" />

    <section class="carts pt-40 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @include('user.sidebar')
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <h3>Free <span class="text-danger font-weight-400">Courses</span></h3>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <p><i>No record available...</i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-app-layout>
