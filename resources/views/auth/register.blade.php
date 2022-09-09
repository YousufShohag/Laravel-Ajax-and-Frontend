
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="{{asset('backend')}}/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                
                                            <!-- Name -->
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                
                                                        <x-input id="fname" class="p-4 block mt-1 w-full form-control" type="text" placeholder="First Name" name="fname" :value="old('fname')" required autofocus />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <x-input id="lname" class="p-4 block mt-1 w-full form-control" placeholder="Last Name" type="text" name="lname" :value="old('lname')" required autofocus />
                                                    </div>
                                                </div>


                                            </div>
                                
                                            <!-- Email Address -->
                                            <div class="mt-4">
                                
                                                <x-input id="email" class="p-4 block mt-1 w-full mt-1 form-control" placeholder="Email Address" type="email" name="email" :value="old('email')" required />
                                            </div>
                                
                                            <!-- Password -->
                                            <div class="row mt-4">
                                            <div class="col-md-6">
                                
                                                <x-input id="password" class="p-4 block mt-1 w-full form-control" placeholder="Password"
                                                                type="password"
                                                                name="password"
                                                                required autocomplete="new-password" />
                                            </div>
                                
                                            <!-- Confirm Password -->
                                            <div class="col-md-6">
                                
                                                <x-input id="password_confirmation" class="p-4 block mt-1 w-full form-control" placeholder=" Confirm Password"
                                                                type="password"
                                                                name="password_confirmation" required />
                                            </div>
                                        </div>
                                            <div class="flex items-center justify-end mt-4">
                                                
                                
                                                <x-button class="ml-4 form-control btn btn-primary">
                                                    {{ __('Register') }}
                                                </x-button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                            {{ __('Have an account? Go to login') }}
                                        </a>
                                    </div>
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
