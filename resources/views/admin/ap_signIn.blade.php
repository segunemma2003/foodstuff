@{
    ViewData["Title"] = ViewBag.corePageName;
}
<!-- ============================ Login Wrap ================================== -->
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
            <img src="~/assets/img/AdminSignInBG.png" class="img-fluid" alt="" />
        </div>
        <div class="crs_log__caption">
            <div class="rcs_log_123">
                <div class="rcs_ico"><i class="fas fa-lock"></i></div>
            </div>
            @using (Html.BeginForm("SignInAdmin", "Admin", FormMethod.Post))
            {
                <div class="rcs_log_124">
                    <div class="Lpo09"><h4>Welcome Admin</h4></div>
                    <div class="form-group">
                        <label>Email or Username</label>
                        <input type="text" name="Username" value="@TempData["EmailText"]" class="form-control" placeholder="Enter your email or username" required />
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
                @Html.AntiForgeryToken();
            }
        </div>


    </div>

</div>

<!-- ============================ Login Wrap ================================== -->
