
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="{{asset('backend')}}/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                
                                            <!-- Email Address -->
                                            <div>
                                                <x-label for="email" :value="__('Email')" />
                                
                                                <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                                            </div>
                                
                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-label for="password" :value="__('Password')" />
                                
                                                <x-input id="password" class="block mt-1 w-full form-control"
                                                                type="password"
                                                                name="password"
                                                                required autocomplete="current-password" />
                                            </div>
                                
                                            <!-- Remember Me -->
                                            <div class="block mt-4">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                            </div>
                                
                                            <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif
                                                <br>
                                                <br>
                                                <x-button class="ml-5 btn btn-primary">
                                                    {{ __('Log in') }}
                                                </x-button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend')}}/js/scripts.js"></script>
    </body>
</html>
