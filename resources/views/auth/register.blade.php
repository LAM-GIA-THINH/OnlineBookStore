
<x-app-layout>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>                    
                    <span></span> Register
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Create an Account</h3>
                                        </div>                                        
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div>
                                                <x-label for="name" value="{{ __('Name') }}" />
                                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                            </div>

                                            <div class="mt-4">
                                                <x-label for="email" value="{{ __('Email') }}" />
                                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                            </div>

                                            <div class="mt-4">
                                                <x-label for="password" value="{{ __('Password') }}" />
                                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                            </div>

                                            <div class="mt-4">
                                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                            </div>

                                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                                <div class="mt-4">
                                                    <x-label for="terms">
                                                        <div class="flex items-center">
                                                            <x-checkbox name="terms" id="terms" required />

                                                            <div class="ml-2">
                                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                    </x-label>
                                                </div>
                                            @endif

                                            <div class="flex items-center justify-end mt-20 ml-160">
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                                    {{ __('Already registered?') }}
                                                </a>

                                                <x-button class="ml-50">
                                                    {{ __('Register') }}
                                                </x-button>
                                            </div>
                                        </form>                                     
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-lg-6">
                               <img src="assets/imgs/login.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>