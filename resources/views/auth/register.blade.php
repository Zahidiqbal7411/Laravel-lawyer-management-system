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
    <!-- /theme JS files -->

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-dark navbar-static py-2">
        <div class="container-fluid">
            <div class="navbar-brand">
                <a href="index.html" class="d-inline-flex align-items-center">
                    <img src="{{ asset('assets/images/logo_icon.svg') }}" alt="">
                    <img src="{{ asset('assets/images/logo_text_light.svg') }}"
                        class="d-none d-sm-inline-block h-16px ms-3" alt="">
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

                    <!-- Registration form -->
                    <form class="login-form" action="{{ route('register') }}" method="POST" id="registrationForm">
                        @csrf
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                        <img src="{{ asset('assets/images/logo_icon.svg') }}" class="h-48px"
                                            alt="">
                                    </div>
                                    <h5 class="mb-0">Create account</h5>
                                    <span class="d-block text-muted">Please fill all required fields</span>
                                </div>

                                <!-- Username -->
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" placeholder="Muhammad">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                    @error('name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" placeholder="john@doe.com">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-at text-muted"></i>
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="tel" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone') }}" placeholder="+1234567890">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-phone text-muted"></i>
                                        </div>
                                    </div>
                                    @error('phone')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="form-control-feedback form-control-feedback-start position-relative">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror pr-5"
                                            placeholder="•••••••••••">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                        <button type="button" class="btn btn-link p-0 position-absolute"
                                            style="right: 10px; top: 50%; transform: translateY(-50%); z-index: 10;"
                                            tabindex="-1" onclick="togglePassword('password')">
                                            <i class="ph-eye text-muted" id="password-icon"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="form-control-feedback form-control-feedback-start position-relative">
                                        <input type="password" name="password_confirmation"
                                            id="password_confirmation" class="form-control pr-5"
                                            placeholder="•••••••••••">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                        <button type="button" class="btn btn-link p-0 position-absolute"
                                            style="right: 10px; top: 50%; transform: translateY(-50%); z-index: 10;"
                                            tabindex="-1" onclick="togglePassword('password_confirmation')">
                                            <i class="ph-eye text-muted" id="password_confirmation-icon"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="d-flex justify-content-between">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="submit" class="btn btn-teal">Create Account <i
                                            class="ph-check ms-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <!-- /registration form -->

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

    <button type="button" class="btn btn-light d-none" id="sweet_success">Launch <i
            class="icon-play3 ml-2"></i></button>
    <!-- Demo config -->

    <!-- /demo config -->
    <script src="{{ asset('assets/demo/demo_configurator.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Registration Steps JavaScript -->
    <script>
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(inputId + '-icon');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('ph-eye');
            icon.classList.add('ph-eye-slash');
            icon.classList.remove('text-muted');
            icon.classList.add('text-teal');
        } else {
            input.type = 'password';
            icon.classList.remove('ph-eye-slash');
            icon.classList.add('ph-eye');
            icon.classList.remove('text-teal');
            icon.classList.add('text-muted');
        }
    }
</script>

</body>

</html>
