<x-app-layout>
    <x-breadcrumb title="Profile" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Profile']]" />

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
                                    <h3>Edit <span class="text-danger font-weight-400">Profile</span></h3>
                                </div>
                            </div>
                            <hr>
                            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Full Name*</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ auth()?->user()?->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Mobile*</label>
                                            <input type="tel" class="form-control" name="mobile"
                                                value="{{ auth()?->user()?->mobile }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Email*</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ auth()?->user()?->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Avatar*</label>
                                            <input type="file" class="form-control" name="avatar">
                                        </div>
                                    </div>
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-lg btn-dark px-4 rounded-pill">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
