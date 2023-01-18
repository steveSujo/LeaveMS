@extends('app')
@section('head')
    <title>Login page</title>
@endsection
@section('appContent')
    <div class="inner-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox shadow-sm grow">
                    <div class="login-left">
                        <img class="img-fluid" src="{{ asset('LeMS Design/assets/img/logo.png') }}" style="border-radius: 15%;"
                            style="border-radius: 15%;" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>

                            <form action="{{ route('login.employee') }}">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block"
                                        type="submit">Login</button>
                                </div>
                            </form>

                            <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
                            <div class="login-or">
                                <span class="or-line"></span>
                            </div>
                            <div class="text-center forgotpass"><a href="{{ route('login.admin') }}">Admin Login</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--
    <script src="{{ asset('LeMS Design/assets/js/jquery-3.2.1.min.jsj') }}"></script>
    <script src="{{ asset('LeMS Design/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('LeMS Design/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('LeMS Design/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset('LeMS Design/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset('LeMS Design/assets/js/script.js') }}"></script> --}}
    @stack('scripts')
@endsection
