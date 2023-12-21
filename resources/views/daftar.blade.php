<!DOCTYPE html>
<html lang="en" data-layout="topnav" data-topbar-color="dark">

<head>
    <meta charset="utf-8" />
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('arsip/template/assets/images/favicon.ico')}}">

    <!-- Theme Config Js -->
    <script src="{{asset('arsip/template/assets/js/hyper-config.js')}}"></script>

    <!-- App css -->
    <link href="{{asset('arsip/template/assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{asset('arsip/template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="card-body d-flex flex-column h-100 gap-3">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="index.html" class="logo-dark">
                        <span><img src="{{asset('arsip/template/assets/images/1.png')}}" alt="dark logo" height="22"></span>
                    </a>
                    <a href="index.html" class="logo-light">
                        <span><img src="{{asset('arsip/template/assets/images/2.png')}}" alt="logo" height="22"></span>
                    </a>
                </div>

                <div class="my-auto">
                    <!-- title-->
                    <h4 class="mt-0">Sign Up</h4>
                    <p class="text-muted mb-4">Create a new account to access Baba Kasir.</p>

                    <!-- form -->
                    <form action="{{route('daftar')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input class="form-control" type="text" name="name" required="" placeholder="Enter your name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" name="username" required="" placeholder="Enter your username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" name="password" required="" placeholder="Enter your password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Repeat your password">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-account-plus"></i> Sign Up </button>
                        </div>
                    </form>
                    <!-- end form-->
                </div>

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Already have an account? <a href="{{route('login')}}" class="text-muted ms-1"><b>Log In</b></a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">Welcome To Baba Kasir</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> Jalani Harimu dengan Senyuman . <i class="mdi mdi-format-quote-close"></i>
                </p>
                <p>
                    - Weh
                </p>
            </div> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->
    <!-- Vendor js -->
    <script src="{{asset('arsip/template/assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('arsip/template/assets/js/app.min.js')}}"></script>

</body>

</html>
