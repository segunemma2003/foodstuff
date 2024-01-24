@{
    ViewData["Title"] = ViewBag.corePageName;
}
<div class="clearfix"></div>
<!-- ============================ Login Wrap ================================== -->



<section>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                @using (Html.BeginForm("RequestPasswordResetLink", "Home", FormMethod.Post))
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
                                <img src="~/assets/img/ForgotPasswordBG.png" class="img-fluid" alt="" />
                            </div>
                            <div class="crs_log__caption">
                                <div class="rcs_log_123">
                                    <div class="rcs_ico"><i class="fas fa-lock"></i></div>
                                </div>

                                <div class="rcs_log_124">
                                    <div class="Lpo09"><h4>Request Password Reset Link</h4></div>
                                    <div class="form-group">
                                        <label>Email/Phone Number</label>
                                        <input type="text" name="Email" value="@TempData["EmailText"]" class="form-control" placeholder="Enter your email address or phone number" required />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn full-width btn-md theme-bg text-white">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="crs_log__footer d-flex justify-content-between">
                                <div class="fhg_45"><p class="musrt"><a asp-area="" asp-controller="Home" asp-action="SignIn" class="text-danger">Remember Password?</a></p></div>
                                
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
