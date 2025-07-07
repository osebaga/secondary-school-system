<!DOCTYPE html>
<html lang="en" data-topbar-color="brand">

<!-- Mirrored from coderthemes.com/wb/minton/layouts/default/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Apr 2025 23:31:33 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Log In | Minton - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('loginAssets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('loginAssets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('loginAssets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <!-- icons -->
    <link href="{{ asset('loginAssets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ asset('loginAssets/js/config.js') }}"></script>
</head>

<body class="loading" style="margin-top: 10%">
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="index-2.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{ asset('assets/uploads/logo/logo.png') }}"
                                            style="opacity: .8; width:50%;" alt="Logo">
                                        </span>
                                    </a>                                 
                                </div>
                                <p class="text-muted mb-4 mt-3">Student Academic Management Information System</p>
                            </div>

                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (session('warning'))
                                    <div class="alert alert-warning">
                                        {{ session('warning') }}
                                    </div>
                                @endif
                                <div class="mb-2">
                                    <label for="username" class="form-label">Username</label>
                                    <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" id="username" name="login" required=""
                                        placeholder="Enter your username">
                               
                                        @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required=""
                                            placeholder="Enter your password">

                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>

                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" checked style="background-color: #977229">
                                        <label class="form-check-label" for="checkbox-signin">
                                            Remember me
                                        </label>
                                    </div>
                                </div>

                                <div class="d-grid mb-0 text-center">
                                    <button class="btn btn-primary" type="submit" style="background-color: #977229"> Log In </button>
                                </div>
                            </form>

                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p> <a href="{{ route('password.request') }}" class="text-muted ms-1">Forgot your password?</a></p>
                                    {{-- <p class="text-muted">Don't have an account? <a href="auth-register.html"
                                            class="text-primary fw-medium ms-1">Sign Up</a></p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    {{-- <footer class="footer footer-alt">
        <script>
            document.write(new Date().getFullYear())
        </script> &copy; Kange College of Health and Allied Sciences <a href="https://kacohas.ac.tz" class="text-dark">Kacohas</a>
    </footer> --}}
    <script src="{{ asset('loginAssets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('loginAssets/js/app.min.js') }}"></script>
</body>

</html>
