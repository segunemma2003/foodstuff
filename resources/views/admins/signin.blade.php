@extends('shared.layout')
@section('Title', "Admin - Sign In")
@section('content')

<div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
    <div class="crs_log_wrap">
        <br />
        @if (session('SuccessMessage'))
            <div class="form-group">
                <div class="alert alert-success">
                    ✔ {{ session('SuccessMessage') }}
                </div>
            </div>
        @endif

        @if (session('ErrorMessage'))
            <div class="form-group">
                <div class="alert alert-warning">
                    ⚠ {{ session('ErrorMessage') }}
                </div>
            </div>
        @endif

        <div class="crs_log__thumb">
            <img src="{{ asset('assets/img/AdminSignInBG.png') }}" class="img-fluid" alt="" />
        </div>
        <div class="crs_log__caption">
            <div class="rcs_log_123">
                <div class="rcs_ico"><i class="fas fa-lock"></i></div>
            </div>
            {{-- <form method="POST" action="{{ route('admin.SignInAdmin') }}"> --}}
            <form method="POST" action="">
                @csrf
                <div class="rcs_log_124">
                    <div class="Lpo09"><h4>Welcome Admin</h4></div>
                    <div class="form-group">
                        <label>Email or Username</label>
                        <input type="text" name="Username" value="{{ old('Username') }}" class="form-control" placeholder="Enter your email or username" required />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="Password" class="form-control" id="passwordInput" placeholder="*******" required />
                        <!-- An element to toggle between password visibility -->
                        <input type="checkbox" style="margin-top:20px; margin-bottom:20px; margin-right:5px;" class="btn-primary" onclick="toggleShowPassword()"> Show Password
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn full-width btn-md theme-bg text-white">Sign In</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection