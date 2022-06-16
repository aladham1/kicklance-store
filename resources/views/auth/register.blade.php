<x-front-layout>
    <x-auth-card>
        <div class="container login-container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="" :errors="$errors"/>

                <form method="POST" class="auth-form" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                    <div>
                        <x-label for="name" :value="__('Name')"/>

                        <x-input id="name" class="form-control" type="text" name="name" :value="old('name')"
                                 required autofocus/>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-2">
                        <x-label for="email" :value="__('Email')"/>

                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                                 required/>
                    </div>

                    <!-- Password -->
                    <div class="mt-2">
                        <x-label for="password" :value="__('Password')"/>

                        <x-input id="password" class="form-control"
                                 type="password"
                                 name="password"
                                 required autocomplete="new-password"/>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-2">
                        <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                        <x-input id="password_confirmation" class="form-control"
                                 type="password"
                                 name="password_confirmation" required/>
                    </div>

                    <div class="flex items-center justify-end mt-2">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 d-block mb-1"
                           href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="btn btn-dark btn-md d-block w-100">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </x-auth-card>
</x-front-layout>
