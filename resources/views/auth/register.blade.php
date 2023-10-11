<x-app-layout>
    <x-breadcrumb title="Register Here" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Register']]" />
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}"
                    required autofocus />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                    required />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                    required />
            </div>

            <div class="d-flex justify-content-between mt-4">
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>

                <div class="my-auto text-end">
                    <a class="" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <a class="d-block" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
