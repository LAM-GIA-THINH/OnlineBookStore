
<x-app-layout>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>                    
                    <span></span> Login
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Login</h3>
                                        </div>
                                        <form method="post" action="{{ route('login') }}">
                                            @csrf
                                            <div>
                                                <x-label for="email" value="{{ __('Email') }}" />
                                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                            </div>

                                            <div class="mt-4">
                                                <x-label for="password" value="{{ __('Password') }}" />
                                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                            </div>

                                            <div class="block mt-4">
                                                <label for="remember_me" class="flex items-center">
                                                    <x-checkbox id="remember_me" name="remember" style="width: 20px; height: 15px; margin-top: 2px;" />
                                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                            </div>




                                            <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif

                                                <x-button class="ml-110">
                                                    {{ __('Log in') }}
                                                </x-button>
                                            </div>
                                            <div class="flex items-center justify-end mt-4">
                                                <a class="ml-60 btn btn-primary" href="{{ url('auth/facebook') }}" style="margin-top: 0px !important; background: white; color: #ffffff; padding: 5px; border-radius: 7px; border: none;" id="btn-fblogin">
                                                    <img src="{{ asset('assets/imgs/logo/facebook_icon.png') }}" alt="Facebook Icon" style="width: 50px; height: 50px;" />
                                                </a>
                                                <a class="ml-110 btn btn-primary" href="{{ url('auth/google') }}" style="margin-top: 0px !important; background: white; color: #ffffff; padding: 5px; border-radius: 7px; border: none;" id="btn-googlelogin">
                                                    <img src="{{ asset('assets/imgs/logo/google_login.png') }}" alt="Google Icon" style="width: 50px; height: 50px;" /> 
                                                </a>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
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
