<x-app-layout>
    <x-breadcrumb title="Login Here" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Login']]" />
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                    required autofocus />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="d-flex justify-content-between mt-4">
                <div class="my-auto">
                    <div>
                        New user ?
                        <a class="" href="{{ route('register') }}">
                            Register here.
                        </a>
                    </div>
                    <a class="d-block" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
