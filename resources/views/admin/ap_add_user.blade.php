@model dynamic

@{
    ViewData["Title"] = ViewBag.corePageName;
}

<div class="col-lg-9 col-md-9 col-sm-12">
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
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a asp-area="" asp-controller="Admin" asp-action="@ViewBag.prevPageLink">
                            @ViewBag.prevPageName
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @ViewBag.corePageName
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">

                <div class="form_blocs_wrap">
                        <div class="row justify-content-between">


                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">


                                <div class="tab-content" id="v-pills-tabContent">
                                    <!-- Basic -->
                                    <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                                        @using (Html.BeginForm("AddAUser", "Admin", FormMethod.Post))
                                        {
                                            <div class="form-group smalls">
                                                <label>Username(Business name/ Fullname) *</label>
                                                <input type="text" required name="Username" max="50" maxlength="50" min="3" value="@TempData["Username"]" class="form-control" placeholder="Enter a username for this user" maxlength="50" />
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Email</label>
                                                <div class="row m-0">
                                                <input name="Email" type="email" maxlength="50" max="50" min="7" class="form-control" placeholder="What is this customer's email address" value="@TempData["Email"]" />
                                                </div>
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Phone Number *</label>
                                            <input type="number" name="PhoneNumber" value="@TempData["PhoneNumber"]" required class="form-control" placeholder="What is this customer's phone number" />
                                            </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="crp_box fl_color">
                                                    <div class="row align-items-center">
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                            <div class="dro_140">
                                                                <div class="dro_141">
                                                                    <input type="checkbox" name="IsEmailVerified" class="form-control" />
                                                                </div>
                                                                <div class="dro_142">
                                                                    <h6>Is Email Verified?</h6>
                                                                    <p>If the email address you provided above is verified, please check this section.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                            <div class="dro_140">
                                                                <div class="dro_141">
                                                                    <input type="checkbox" name="IsPhoneNumberVerified" checked required class="form-control" />
                                                                </div>
                                                                <div class="dro_142">
                                                                    <h6>Is Phone Number Verified?</h6>
                                                                    <p>All registered users must have a verified phone number that belongs to the user.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <br />

                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn text-white full-width theme-bg">Submit</button>
                                                </div>
                                            </div>

                                            <br />
                                            <br />
                                        }
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>
