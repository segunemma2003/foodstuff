@{
    ViewData["Title"] = ViewBag.corePageName;
}
<div class="clearfix"></div>
<!-- ============================ Login Wrap ================================== -->



<section>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
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
                                <img src="~/assets/img/ForgotPasswordBG.png" class="img-fluid" alt="" />
                            </div>
                        @using (Html.BeginForm("ChangePasswordWithOTP", "Home", FormMethod.Post))
                        {
                            <div class="crs_log__caption">
                                <div class="rcs_log_123">
                                    <div class="rcs_ico"><i class="fas fa-lock"></i></div>
                                </div>

                                <div class="rcs_log_124">
                                    <div class="Lpo09"><h4>Change Password</h4></div>
                                    <div class="form-group">
                                        <label>One Time Password(OTP)</label>
                                        <input type="text" name="OTP" class="form-control" placeholder="Enter one time password or verification code" required />
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="Password" class="form-control" placeholder="Enter a new password" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="ConfirmPassword" class="form-control" placeholder="Re-enter new password" required />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn full-width btn-md theme-bg text-white">Submit</button>
                                    </div>
                                </div>
                            </div>
                            @Html.AntiForgeryToken();
                            }
                            @if (TempData["SuccessMessage"] != null)
                            {
                                <div class="crs_log__footer d-flex justify-content-between">
                                    <div class="fhg_45">
                                        <p class="musrt">
                                            <a asp-area="" asp-controller="Home" asp-action="SignIn" class="text-danger">
                                                Return To Sign In
                                            </a>
                                        </p>
                                    </div>
                                    <div class="fhg_45" id="resendotpdiv" style="display:none;">
                                        <p class="musrt">
                                        @using (Html.BeginForm("RequestPasswordResetLink", "Home", FormMethod.Post))
                                        {
                                            <input type="text" name="Email" value="@TempData["EmailText"]" required hidden/>
                                            <button type="submit" style="border:none; background-color:transparent;" class="text-danger">
                                                Resend OTP
                                            </button>
                                        }
                                        </p>
                                    </div>
                                    <div id="countdown" class="fhg_45 musrt"></div>
                                </div>
                            }
                            @if (TempData["ErrorMessage"] != null)
                            {
                                <div class="crs_log__footer d-flex justify-content-between">
                                    <div class="fhg_45">
                                        <p class="musrt">
                                            <a asp-area="" asp-controller="Home" asp-action="SignIn" class="text-danger">
                                                Remember Password?
                                            </a>
                                        </p>
                                    </div>
                                    <div id="countdown" class="fhg_45 musrt"></div>
                                </div>
                            }
                            
                        </div>               
            </div>

        </div>
    </div>
</section>
<!-- ============================ Login Wrap ================================== -->

<script>
    var secondsleft = 60;
    var minuteleft = 2;
    var downloadTimer = setInterval(function () {
        if (minuteleft <= 0 && secondsleft <= 0) {
            clearInterval(downloadTimer);
            var x = document.getElementById("resendotpdiv");
            var y = document.getElementById("countdown");
            x.style.display = "block";
            y.style.display = "none";
        } else {
            document.getElementById("countdown").innerHTML = "Resend OTP in 0" + minuteleft + ":" + (secondsleft <= 10 ? "0" : "") + (secondsleft - 1);
        }
        secondsleft -= 1;
        if (secondsleft <= 0 && minuteleft > 0) {
            minuteleft -= 1;
            secondsleft = 59;
        }
    }, 1000);
</script>