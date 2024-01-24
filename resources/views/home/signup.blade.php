
<div class="clearfix"></div>
<!-- ============================ Login Wrap ================================== -->
<section>
    <div class="container">
        <div class="row justify-content-center">
           
            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
               
                    <form method="POST" action="/createUser">
                        @csrf
                        <div class="crs_log_wrap">
                            <br />
                            {{-- @if (TempData["SuccessMessage"] != null)
                            {
                                <div class="form-group">
                                    <div class="alert alert-success">
                                        ✔ @TempData["SuccessMessage"]
                                    </div>
                                </div>
                            }

                           --}}
                           {{-- error section starts --}}
                            @error("Email")
                            <div class="form-group">
                                <div class="alert alert-warning">
                                    ⚠ {{$message}}
                                </div>
                            </div>
                            @enderror
                            @error("Fullname")
                            <div class="form-group">
                                <div class="alert alert-warning">
                                    ⚠ {{$message}}
                                </div>
                            </div>
                            @enderror

                            @error("Password")
                            <div class="form-group">
                                <div class="alert alert-warning">
                                    ⚠ {{$message}}
                                </div>
                            </div>
                            @enderror

                            @error("PhoneNumber")
                            <div class="form-group">
                                <div class="alert alert-warning">
                                    ⚠ {{$message}}
                                </div>
                            </div>
                            @enderror
                           {{-- error section ends --}}
                            <div class="crs_log__thumb">
                                <img src="~/assets/img/SignUpBG.png" class="img-fluid" alt="" />
                            </div>
                            <div class="crs_log__caption">
                                <div class="rcs_log_123">
                                    <div class="rcs_ico"><i class="fas fa-lock"></i></div>
                                </div>
                             
                                        <div class="rcs_log_124">
                                            <div class="Lpo09"><h4>Sign Up To Get Started</h4></div>
                                            <div class="form-group">
                                                <label>Email</label>

                                                <input type="email" name="Email" class="form-control"  placeholder="Enter your email address" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="Password" class="form-control" placeholder="*******" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="ConfirmPassword" class="form-control" placeholder="*******" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="Fullname" class="form-control" placeholder="*******" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="number" name="PhoneNumber"  class="form-control" placeholder="Enter your phone number" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Referral Code (Optional)</label>
                                                <input type="text" name="RefCode" class="form-control" placeholder="Enter a referral code" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn full-width btn-md theme-bg text-white">Sign Up</button>
                                            </div>
                                        </div>
                                <div class="rcs_log_124">
                                            <div class="Lpo09"><h4>Sign Up To Get Started</h4></div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="Email" class="form-control" placeholder="Enter your email address" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="Password" class="form-control" placeholder="*******" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="ConfirmPassword" class="form-control" placeholder="*******" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="Fullname" class="form-control" placeholder="*******" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="number" name="PhoneNumber" class="form-control" placeholder="Enter your phone number" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Referral Code (Optional)</label>
                                                <input type="text" name="RefCode" class="form-control" placeholder="Enter a referral code" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn full-width btn-md theme-bg text-white">Sign Up</button>
                                            </div>
                                        </div>
                                    

                           
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
                                <div class="fhg_45"><p class="musrt">Have an have account? <a asp-area="" asp-controller="Home" asp-action="Signin" class="theme-cl">Sign In</a></p></div>
                            </div>
                        </div>
                    </form>
               
            </div>

        </div>
    </div>
</section>
<!-- ============================ Login Wrap ================================== -->
