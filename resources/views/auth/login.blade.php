<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - HRMS admin template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/font-awesome.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

    <!-- HTML5 shim and Respond.js') }} IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('backend/assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body class="account-page">

<!-- Main Wrapper -->
<div class="main-wrapper">
    <div class="account-content">
        <div class="container">

            <!-- Account Logo -->
            <div class="account-logo">
                <a href="index.html"><img src="{{ asset('backend/assets/img/logo2.png') }}" alt="Dreamguy's Technologies"></a>
            </div>
            <!-- /Account Logo -->

            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Login</h3>
                    <p class="account-subtitle">Access to our dashboard</p>
                    @include('admin.partials.message')

                    <!-- Account Form -->
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            {{ Form::email('email','',['class'=>'form-control '.($errors->has('email') ?'is-invalid':''),'required'=>true,'placeholder'=>'Enter Email Here.....']) }}
                            @error('email')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label>Password</label>
                                </div>
                                <div class="col-auto">
                                    <a class="text-muted" href="forgot-password.html">
                                        Forgot password?
                                    </a>
                                </div>
                            </div>
                            {{ Form::password('password',['class'=>'form-control '.($errors->has('password') ?'is-invalid':''),'required'=>true,'placeholder'=>'Enter Password Here.....']) }}
                            @error('password')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Login</button>
                        </div>
                        <div class="account-footer">
                            <p>Don't have an account yet? <a href="{{ route('register') }}">Register</a></p>
                        </div>
                    </form>
                    <!-- /Account Form -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{ asset('backend/assets/js/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>

</body>
</html>
