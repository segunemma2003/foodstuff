<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@section("title", "") Portal - FoodStuff Store</title>
    <meta name="author" content="Themezhub" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom CSS -->
    <link href="~/assets/css/styles.css" rel="stylesheet">
    <link href="~/assets/css/snackbar.css" rel="stylesheet">
    <link rel="icon" href="~/assets/img/FoodStuffStoreLogoHead.png">
</head>
<body>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <div class="header header-transparent dark-text">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="#">
                            <img src="~/assets/img/FSSLOGO1.png" class="logo" alt="" />
                        </a>
                        <div class="nav-toggle"></div>
                        <div class="mobile_nav">
                            <ul>
                                @{
                                    if (ViewBag.adminID != string.Empty && ViewBag.adminRoll != string.Empty)
                                    {
                                        <li>
                                            <a href="#" class="alio_green" data-toggle="modal" title="Sign Out" data-target="#logout">
                                                <i class="fas fa-sign-out-alt mr-1"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a asp-area="" asp-controller="Home" asp-action="RequestInvoice" class="crs_yuo12 w-auto text-white theme-bg">
                                                <span class="embos_45">Request Invoice</span>
                                            </a>
                                        </li>
                                    }

                                }

                            </ul>
                        </div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <ul class="nav-menu">

                            <li><a asp-area="" asp-controller="Home" asp-action="Welcome" target="_blank">Welcome</a></li>
                            <li><a asp-area="" asp-controller="Home" asp-action="Store" target="_blank">Store</a></li>
                            <li class="@(ViewBag.corePageLink == "APDashboard" ? "active" : "" )"><a asp-area="" asp-controller="Admin" asp-action="APDashboard">Dashboard</a></li>
                            <li class="@(ViewBag.corePageLink == "APManageRestaurants" ? "active" : "" )"><a asp-area="" asp-controller="Admin" asp-action="APManageRestaurants">Restaurants</a></li>
                            <li class="@(ViewBag.corePageLink == "APChangeLog" ? "active" : "" )"><a asp-area="" asp-controller="Admin" asp-action="APChangeLog">Change Log</a></li>
                            <li class="@(ViewBag.corePageLink == "APAboutApp" ? "active" : "" )"><a asp-area="" asp-controller="Admin" asp-action="APAboutApp">About App</a></li>

                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">
                            @{
                                if (ViewBag.adminID != string.Empty && ViewBag.adminRoll != string.Empty)
                                {
                                    <li class="add-listing theme-bg">
                                        <a href="#" class="alio_green" data-toggle="modal" data-target="#logout" class="text-white">
                                            <i class="fas fa-sign-out-alt mr-1"></i><span class="dn-lg">Sign Out</span>
                                        </a>
                                    </li>
                                }


                            }

                        </ul>
                    </div>
                </nav>
            </div>
        </div>


        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- ============================ Dashboard: Dashboard Start ================================== -->
        <section class="gray pt-10">
            <div class="container-fluid">

                <div class="row justify-content-center">

                    @{
                        if (ViewBag.adminID != string.Empty && ViewBag.adminRoll != string.Empty)
                        {
                            <div class="col-lg-3 col-md-3">
                                <div class="dashboard-navbar">

                                    <div class="d-user-avater">
                                        <img src="../../assets/img/FoodStuffStoreLogoHead.png" class="img-fluid avater" alt="">
                                        <h4>@ViewBag.username</h4>
                                        <span class="trip text-white theme-bg">&nbsp;Rank: @ViewBag.adminRoll&nbsp;</span>
                                        <div class="elso_syu89">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                <li><a href="https://instagram.com/foodstuffstore" target="_blank"><i class="ti-instagram"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="elso_syu77">
                                            <a asp-area="" asp-controller="Admin" asp-action="APManageInvoice"><div class="one_third"><div class="one_45ic text-warning bg-light-warning"><i class="fas fa-plus"></i></div><span>Create Invoice</span></div></a>
                                            <a asp-area="" asp-controller="Admin" asp-action="APInvoices"><div class="one_third"><div class="one_45ic text-success bg-light-success"><i class="fas fa-file-invoice"></i></div><span>Manage Invoice</span></div></a>
                                            <a asp-area ="" asp-controller="Admin" asp-action="APUsers"><div class="one_third"><div class="one_45ic text-purple bg-light-purple"><i class="fas fa-user"></i></div><span>Manage Users</span></div></a>
                                        </div>
                                    </div>

                                    <div class="d-navigation">
                                        <ul id="side-menu">
                                            @if(ViewBag.corePageLink == "APDashboard")
                                            {
                                                <li class="active"><a asp-area="" asp-controller="Admin" asp-action="APDashboard"><i class="fas fa-th"></i>Dashboard</a></li>
                                            }
                                            else
                                            {
                                                <li><a asp-area="" asp-controller="Admin" asp-action="APDashboard"><i class="fas fa-th"></i>Dashboard</a></li>
                                            }

                                            @if(ViewBag.corePageLink == "APProducts")
                                            {
                                                <li class="active"><a asp-area="" asp-controller="Admin" asp-action="APProducts"><i class="fas fa-shopping-basket"></i>Products</a></li>
                                            }
                                            else
                                            {
                                                <li><a asp-area="" asp-controller="Admin" asp-action="APProducts"><i class="fas fa-shopping-basket"></i>Products</a></li>
                                            }

                                            @if(ViewBag.corePageLink == "APAdmins" || ViewBag.corePageLink == "APAppDefault" || ViewBag.corePageLink == "APNotifications" || ViewBag.corePageLink == "APActivities")
                                            {
                                                <li class="dropdown active">
                                                    <a href="javascript:void(0);"><i class="fas fa-user-shield"></i>Admin<span class="ti-angle-left"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APAdmins">Manage Admins</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APAppDefault">App Default</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APNotifications">Notifications</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APActivities">My Activity</a></li>
                                                    </ul>
                                                </li>
                                            }
                                            else
                                            {
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);"><i class="fas fa-user-shield"></i>Admin<span class="ti-angle-left"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APAdmins">Manage Admins</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APAppDefault">App Default</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APNotifications">Notifications</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APActivities">My Activity</a></li>
                                                    </ul>
                                                </li>
                                            }

                                            @if (ViewBag.corePageLink == "APUsers" || ViewBag.corePageLink == "APAddUser" || ViewBag.corePageLink == "APMailingList" || ViewBag.corePageLink == "APManageInvoice" || ViewBag.corePageLink == "APInvoices" || ViewBag.corePageLink == "APUserProfile")
                                            {
                                                <li class="dropdown active">
                                                    <a href="javascript:void(0);"><i class="fas fa-user"></i>Users<span class="ti-angle-left"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APAddUser">Add New User / Business</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APUsers">Manage Users</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APMailingList">Mailing List</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APManageInvoice">Create Invoice</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APInvoices">Manage Invoices</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APManageRestaurants">Restaurants</a></li>
                                                    </ul>
                                                </li>
                                            }
                                            else
                                            {
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);"><i class="fas fa-user"></i>Users<span class="ti-angle-left"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APAddUser">Add New User / Business</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APUsers">Manage Users</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APMailingList">Mailing List</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APManageInvoice">Create Invoice</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APInvoices">Manage Invoices</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APManageRestaurants">Restaurants</a></li>
                                                    </ul>
                                                </li>
                                            }

                                            @if(ViewBag.corePageLink == "APAboutApp")
                                            {
                                                <li class="dropdown active">
                                                    <a href="javascript:void(0);"><i class="fas fa-file"></i>Documentation<span class="ti-angle-left"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APChangeLog">Change Log</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APAboutApp">About App</a></li>
                                                    </ul>
                                                </li>
                                            }
                                            else
                                            {
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);"><i class="fas fa-file"></i>Documentation<span class="ti-angle-left"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APChangeLog">Change Log</a></li>
                                                        <li><a asp-area="" asp-controller="Admin" asp-action="APAboutApp">About App</a></li>
                                                    </ul>
                                                </li>
                                            }

                                            <li class=""><a href="#" class="alio_green" data-toggle="modal" data-target="#logout"><i class="fas fa-sign-out-alt"></i>Sign Out</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        }
                    }

                    @RenderBody()

                </div>

            </div>
        </section>
        <!-- ============================ Dashboard: Dashboard End ================================== -->
        <!-- ============================ Footer Start ================================== -->
        <footer class="dark-footer skin-dark-footer style-2">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-md-5">
                            <div class="footer_widget">
                                <a asp-area="" asp-controller="Home" asp-action="Welcome">
                                    <img src="~/assets/img/FSSLOGO3.png" class="img-footer small mb-2" alt="" />
                                </a>
                                <h4 class="extream mb-3">Do you need help with<br>anything?</h4>
                                <p>Receive updates, hot deals, tutorials, discounts sent straignt in your inbox every month for free. You can unsubscribe anytime.</p>

                                <div class="foot-news-last">
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="Email" placeholder="Email address" required>
                                        <div class="input-group-append">
                                            <button type="button" class="input-group-text theme-bg b-0 text-light">Subscribe</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-7 ml-auto">
                            <div class="row">

                                <div class="col-lg-4 col-md-4">
                                    <div class="footer_widget">
                                        <h4 class="widget_title">Company</h4>
                                        <ul class="footer-menu">
                                            <li><a asp-area="" asp-controller="Home" asp-action="Welcome">Welcome</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="OurStory">Our Story</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="OurApps">Career Enroll</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="SignUp">Sign Up</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="HelpCenter">Help Center</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="Contact">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="footer_widget">
                                        <h4 class="widget_title">Services</h4>
                                        <ul class="footer-menu">
                                            <li><a asp-area="" asp-controller="Home" asp-action="RequestInvoice">Request Invoice<span class="new">New</span></a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="OurApps">Logistics and Distribution</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="BuyNowPayLater">Buy Now Pay Later<span class="new">New</span></a></li>
                                            <li><a href="#" target="_blank">Download Android App</a></li>
                                            <li><a href="#" target="_blank">Download IOS App</a></li>
                                            <li><a href="#">Affiliate Program</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="footer_widget">
                                        <h4 class="widget_title">Legal</h4>
                                        <ul class="footer-menu">
                                            <li><a asp-area="" asp-controller="Home" asp-action="TermsAndConditions">Terms And Conditions</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="PrivacyPolicy">Privacy Policy</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="RefundPolicy">Return & Refund Policy</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="CookiePolicy">Cookie Policy</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="ShippingPolicy">Shipping Policy</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="EULA">EULA<span class="update">Update</span></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 text-center">
                            <p class="mb-0">© 2022 FoodStuff Store. All Rights Reserved - RC18310280.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ============================ Footer End ================================== -->
        @{
            if (ViewBag.corePageLink == "APUsers" || ViewBag.corePageLink == "APMailingList")
            {
                <!-- Bulk Mail Modal -->
                <div class="modal" id="bulkMailModal" tabindex="-1" role="dialog" aria-labelledby="couponModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Send Bulk Mail To Preferred Users</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="forms_block">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <select id="cates" class="form-control" style="width:100%">
                                                @{
                                                    if (ViewBag.corePageLink == "APUsers")
                                                    {
                                                        foreach (var Data in Model.Users)
                                                        {
                                                            <option value="@Data.UserEmail">@Data.UserEmail</option>
                                                        }
                                                    }
                                                    else
                                                    {
                                                        foreach (var Data in Model.MailingList)
                                                        {
                                                            <option value="@Data.UserEmail">@Data.UserEmail</option>
                                                        }
                                                    }
                                                }
                                            </select>
                                            <div class="input-group-append">
                                                <button type="button" onclick="AddBulkMailMember()" class="input-group-text theme-bg b-0 text-light" style="border: none; width:54px; height:54px;">
                                                    <span class="ti-plus"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group smalls">
                                        <label>Members</label>
                                        <textarea class="form-control" id="bulkMailMembers" placeholder="person1@domain.com,person2@domain.com,etc" rows="5"></textarea>

                                    </div>

                                    <div class="form-group smalls">
                                        <a href="#" id="bulkMailSubmit" class="btn full-width theme-bg text-white">Submit</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bulk Mail Modal Ends -->
            }
        }



        @{
            if (ViewBag.corePageLink == "APBlogger")
            {
                <!-- Blog Post Modal -->
                <div class="modal" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="couponModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create Blog Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @using (Html.BeginForm("AddBlogPost", "Admin", FormMethod.Post))
                                {
                                    <div class="form-group smalls">
                                        <label>Title</label>
                                        <input class="form-control" name="Header" placeholder="" />

                                        <label>Source</label>
                                        <input class="form-control" name="Source" placeholder="" />

                                        <label>Source Link</label>
                                        <input class="form-control" name="Link" placeholder=""/>

                                        <label>Category</label>
                                        <input class="form-control" name="Category" placeholder="" />

                                        <label>Display Image Path</label>
                                        <input class="form-control" name="DisplayImage" placeholder="" />

                                        <label>Date</label>
                                        <input class="form-control" name="Date" placeholder="" />

                                        <label>About Post</label>
                                        <textarea class="form-control" name="Body" placeholder="" rows="5"></textarea>

                                    </div>

                                    <div class="form-group smalls">
                                        <button id="bulkMailSubmit" type="submit" class="btn full-width theme-bg text-white">Submit</button>
                                    </div>

                                }
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Post Modal Ends -->
            }
        }
        <!-- Confirm Sign Out Modal -->
        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="loginoutmodal" aria-hidden="true">
            <div class="modal-dialog modal-xl login-pop-form" role="document">
                <div class="modal-content overli" id="loginmodal">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="login-form">
                            @using (Html.BeginForm("SignOutAdmin", "Admin", FormMethod.Post))
                            {
                                <form>
                                    <div class="rcs_log_125 pt-2 pb-3">
                                        <span>Are you sure you want to leave?</span>
                                    </div>
                                    <div class="rcs_log_126 full">
                                        <ul class="social_log_45 row">
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-6"><button type="button" class="close sl_btn" data-dismiss="modal">Cancel</button></li>
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-6"><button type="submit" class="btn btn-md full-width theme-bg text-white">Yes</button></li>
                                        </ul>
                                    </div>
                                </form>
                            }
                        </div>
                    </div>

                    <div class="crs_log__footer d-flex justify-content-between mt-0">
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Confirm Sign Out Modal -->

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="~/assets/js/jquery.min.js"></script>
    <script src="~/assets/js/popper.min.js"></script>
    <script src="~/assets/js/bootstrap.min.js"></script>
    <script src="~/assets/js/select2.min.js"></script>
    <script src="~/assets/js/slick.js"></script>
    <script src="~/assets/js/moment.min.js"></script>
    <script src="~/assets/js/daterangepicker.js"></script>
    <script src="~/assets/js/summernote.min.js"></script>
    <script src="~/assets/js/metisMenu.min.js"></script>
    <script src="~/assets/js/custom.js"></script>

    @{
        if (ViewBag.corePageLink == "APUsers" || ViewBag.corePageLink == "APMailingList")
        {
            <script>function AddBulkMailMember() {
                    var userEmail = document.getElementById('cates').value;
                    var textAreaValue = document.getElementById('bulkMailMembers').value;
                    document.getElementById('bulkMailMembers').value = textAreaValue + userEmail + ",";
                    document.getElementById("bulkMailSubmit").href = "mailto:" + textAreaValue + userEmail + ",";
                }</script>
        }
    }

    @if (TempData["SweetAlertDialogHeader"] != null)
    {
        <script>
            swal({
                title: "@TempData["SweetAlertDialogHeader"]",
                text: "@TempData["SweetAlertDialogBody"]",
                icon: "@TempData["SweetAlertDialogType"]",
                button: {
                    text: "Okay",
                    className: "btn color-bg float-btn",
                }
            });
        </script>
    }
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

    @await RenderSectionAsync("Scripts", required: false)

     <!-- Toggle show password on and off -->
    <script>
        function toggleShowPassword() {
            var x = document.getElementById("passwordInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }</script>

</body>
</html>
