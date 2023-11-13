<x-app-layout>
    <x-breadcrumb title="Change Password" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Change Password']]" />

    <section class="carts pt-120 pb-120">
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
                                    <h3>Change <span class="text-danger font-weight-400">Password</span></h3>
                                </div>
                            </div>
                            <hr>
                            <form action="{{ route('user.password.update') }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Current Password*</label>
                                            <input type="password" class="form-control" name="current_password" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Choose Password*</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Confirm Password*</label>
                                            <input type="password" class="form-control" name="password_confirmation" required>
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
