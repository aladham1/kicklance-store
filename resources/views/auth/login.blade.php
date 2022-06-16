<x-front-layout>
    <x-auth-card>
        <!-- Session Status -->

        <div class="container login-container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <x-auth-session-status class="mb-4" :status="session('status')"/>
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <form method="POST" action="{{ route('login') }}" class="auth-form">
                    @csrf
                        <div>
                            <x-label for="password" class=""
                                     :value="__('Login')"/>

                            <x-input id="email" class="form-input form-wide" type="email" name="email"
                                     :value="old('email')"
                                     required autofocus/>
                        </div>

                        <!-- Password -->
                        <div class="mt-2">
                            <x-label for="password" class="" :value="__('Password')"/>

                            <x-input id="password" class="form-input form-wide"
                                     type="password"
                                     name="password"
                                     required autocomplete="current-password"/>
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-2">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-2">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 mb-1 d-block"
                               href="{{ route('register') }}">
                                {{ __('Create account') }}
                            </a>

                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 mb-1 d-block"
                                   href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="btn btn-dark btn-md d-block w-100">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </x-auth-card>
</x-front-layout>
