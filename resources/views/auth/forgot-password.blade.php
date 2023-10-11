<x-app-layout>
    <x-breadcrumb title="Forgot Password" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Forgot Password']]" />
    <x-auth-card>

        <div class="mb-4 text-sm text-success">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" >Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus />
            </div>

            <div class="d-flex justify-content-between mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
