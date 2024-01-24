@extends('shared.layout')
@section('Title', "Sign Up")
@section('content')
<div class="clearfix"></div>
<!-- ============================ Login Wrap ================================== -->
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                {{-- <form method="POST" action="{{ route('home.RegularSignUpUser') }}"> --}}
                <form method="POST" action="/createuser">
                    @csrf
                    <div class="crs_log_wrap">
                        @error("UserEmail")
                            <div class="form-group">
                                <div class="alert alert-warning">
                                    ⚠ {{$message}}
                                </div>
                            </div>
                            @enderror
                            @error("Passphrase")
                            <div class="form-group">
                                <div class="alert alert-warning">
                                    ⚠ {{$message}}
                                </div>
                            </div>
                            @enderror
                            @error("Username")
                            <div class="form-group">
                                <div class="alert alert-warning">
                                    ⚠ {{$message}}
                                </div>
                            </div>
                            @enderror
                            @error("Phone")
                            <div class="form-group">
                                <div class="alert alert-warning">
                                    ⚠ {{$message}}
                                </div>
                            </div>
                            @enderror
                        <br />
                        <div class="crs_log__thumb">
                            <img src="{{ asset('assets/img/SignUpBG.png') }}" class="img-fluid" alt="" />
                        </div>
                        <div class="crs_log__caption">
                            <div class="rcs_log_123">
                                <div class="rcs_ico"><i class="fas fa-lock"></i></div>
                            </div>
                          
                                <div class="rcs_log_124">
                                    <div class="Lpo09"><h4>Sign Up To Get Started 99</h4></div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="UserEmail" class="form-control" value="{{ Session::get('EmailText') }}" placeholder="Enter your email address" required />
                                       
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="Passphrase"  class="form-control" placeholder="*******" required />
                                        @error("email")
                                        <p class="text-red-500 text-xs">
                                            {{
                                                $message
                                            }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="Passphrase_confirmation" class="form-control" placeholder="*******" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="Username" class="form-control" placeholder="*******" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="number" name="Phone"  class="form-control" placeholder="Enter your phone number" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Referral Code (Optional)</label>
                                        <input type="text" name="RefCode"  class="form-control" placeholder="Enter a referral code" />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn full-width btn-md theme-bg text-white">Sign Up</button>
                                    </div>
                                </div>
                          
                            <div class="fhg_45"><p class="musrt">Or do you own a google account?</p></div>
                            <div id="g_id_onload"
                                data-client_id="193554266046-ebjgoql9ju8pqsnjvspe4iden8bivufk.apps.googleusercontent.com"
                                data-login_uri="https://localhost:5001/Home/Welcome"
                                data-auto_select="false"
                                data-callback="getGoogleAccountInfo"
                                data-auto_prompt="false">
                            </div>
                            <div class="g_id_signin"
                                data-type="standard"
                                data-size="large"
                                data-width="200"
                                data-theme="filled_black"
                                data-text="signup_with"
                                data-shape="rectangular"
                                data-logo_alignment="left">
                            </div>
                        </div>
                        <div class="crs_log__footer d-flex justify-content-between">
                            <div class="fhg_45"><p class="musrt">Have an have account? 
                                {{-- <a href="{{ route('home.Signin') }}" class="theme-cl"> --}}
                                <a href="" class="theme-cl">
                                    Sign In
                                </a></p></div>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</section>

@endsection