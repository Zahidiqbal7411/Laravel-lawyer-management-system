<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}
    </title>

    <link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/shared/all.min.css') }}" rel="stylesheet" type="text/css">
   <style>
    /* public/css/custom.css or in your Blade file */
.custom-navbar-brand {
    display: block;
    width: 100%;
    max-width: 120px;
    height: auto;
    object-fit: contain;
    margin: 5px auto;
    padding: 5px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
           /* White text */
    font-weight: 700;       /* Bold */
    font-size: 1.2rem;      /* Optional: Adjust size */
    text-align: center;     /* Optional: Center text */
    text-transform: uppercase
}

.custom-navbar-brand:hover {
    transform: scale(1.05);
}
.custom-logo{
   color:white;
}

   </style>

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-dark navbar-static py-2">
        <div class="container-fluid">
            <div class="navbar-brand custom-navbar-brand">
                <a href="index.html" class="d-inline-flex align-items-center custom-logo ">
                    Lawyer Management System
                </a>
            </div>

            <div class="d-flex justify-content-end align-items-center ms-auto">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
                            <div class="d-flex align-items-center mx-md-1">
                                <i class="ph-lifebuoy"></i>
                                <span class="d-none d-md-inline-block ms-2">Support</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
                            <div class="d-flex align-items-center mx-md-1">
                                <i class="ph-user-circle-plus"></i>
                                <span class="d-none d-md-inline-block ms-2">Register</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
                            <div class="d-flex align-items-center mx-md-1">
                                <i class="ph-user-circle"></i>
                                <span class="d-none d-md-inline-block ms-2">Login</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Content area -->
                <div class="content d-flex justify-content-center align-items-center">

                    <!-- Login form -->
                    <form class="login-form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                        <img src="{{ asset('assets/images/logo_icon.svg') }}" class="h-48px"
                                            alt="">
                                    </div>
                                    <h5 class="mb-0">Login to your account</h5>
                                    <span class="d-block text-muted">Enter your credentials below</span>
                                </div>

                                <!-- Email Field -->
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" placeholder="john@doe.com">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password Field -->
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="•••••••••••">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                </div>

                                <div class="text-center">
                                    <a href="login_password_recover.html">Forgot password?</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- /login form -->

                </div>
                <!-- /content area -->


                <!-- Footer -->

                <!-- /footer -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->


    <!-- Demo config -->

    <!-- /demo config -->
    <!-- Core JS files -->
    <script src="{{ asset('assets/demo/demo_configurator.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
