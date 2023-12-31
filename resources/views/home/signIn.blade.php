﻿@{
    ViewData["Title"] = ViewBag.corePageName;
}
<div class="clearfix"></div>
<!-- ============================ Login Wrap ================================== -->



<section>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                @using (Html.BeginForm("SignInUser", "Home", FormMethod.Post))
                {
                    <form>
                        <div class="crs_log_wrap">
                                <br />
                                @if (TempData["SuccessMessage"] != null)
                                {
                                    <div class="form-group">
                                        <div class="alert alert-success">
                                            ✔ @TempData["SuccessMessage"]
                                        </div>
                                    </div>
                                }
                                @if (TempData["ErrorMessage"] != null)
                                {
                                    <div class="form-group">
                                        <div class="alert alert-warning">
                                            ⚠ @TempData["ErrorMessage"]
                                        </div>
                                    </div>
                                }
                            <div class="crs_log__thumb">
                                <img src="~/assets/img/SignInBG.png" class="img-fluid" alt="" />
                            </div>
                            <div class="crs_log__caption">
                                <div class="rcs_log_123">
                                    <div class="rcs_ico"><i class="fas fa-lock"></i></div>
                                </div>

                                <div class="rcs_log_124">
                                    <div class="Lpo09"><h4>Sign In Your Account</h4></div>
                                    <div class="form-group">
                                        <label>Email/Phone Number</label>
                                        <input type="text" name="Email" class="form-control" value="@TempData["EmailText"]" placeholder="Enter your email address or phone number" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="Password" class="form-control" placeholder="*******" id="passwordInput" required />
                                        <input type="password" value="Regular" name="AccountType" class="form-control" placeholder="*******" required hidden />
                                        <!-- An element to toggle between password visibility -->
                                        <input type="checkbox" style="margin-top:20px; margin-bottom:20px; margin-right:5px;" class="btn-primary" onclick="toggleShowPassword()"> Show Password
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn full-width btn-md theme-bg text-white">Sign In</button>
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
                                     data-text="signin_with"
                                     data-shape="rectangular"
                                     data-logo_alignment="left">
                                </div>
                            </div>
                            <div class="crs_log__footer d-flex justify-content-between">
                                <div class="fhg_45"><p class="musrt">Don't have account? <a asp-area="" asp-controller="Home" asp-action="SignUp" class="theme-cl">Sign Up</a></p></div>
                                <div class="fhg_45"><p class="musrt"><a asp-area="" asp-controller="Home" asp-action="ForgotPassword" class="text-danger">Forgot Password?</a></p></div>
                            </div>
                        </div>
                    </form>
                    @Html.AntiForgeryToken();
                }
            </div>

        </div>
    </div>
</section>
<!-- ============================ Login Wrap ================================== -->
