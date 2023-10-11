<x-app-layout>
    <x-breadcrumb title="Reset Password" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Reset Password']]" />
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" >Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" >Password</label>
                <input id="password" class="form-control" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation" >Confirm Password</label>
                <input id="password_confirmation" class="form-control"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="d-flex justify-content-between mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
