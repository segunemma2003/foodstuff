@using foodstuffstore.Functions;
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield("Title") - FoodStuff Store</title>
    <meta name="author" content="Themezhub" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom CSS -->
    <link href="~/assets/css/styles.css" rel="stylesheet">
    <link href="~/assets/css/store.css" rel="stylesheet">
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
        @if (ViewBag.isWebView != "true")
        {
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
                                        if (ViewBag.uuid != "")
                                        {
                                            <li>
                                                <a href="#" class="alio_green" data-toggle="modal" title="Sign Out" data-target="#logout">
                                                    <i class="fas fa-sign-out-alt mr-1"></i>
                                                </a>
                                            </li>
                                        }
                                        else
                                        {
                                            <li>
                                                <a href="#" class="alio_green" data-toggle="modal" data-target="#login">
                                                    <i class="fas fa-sign-in-alt mr-1 mt-1"></i>Sign In
                                                </a>
                                            </li>
                                        }
                                    }
                                    @{
                                        if (ViewBag.uuid != "")
                                        {
                                            int i = ViewBag.cartItemCount;

                                            if (i < 1)
                                            {
                                                <li>
                                                    <a asp-area="" asp-controller="Home" asp-action="Cart" class="crs_yuo12">
                                                        <span class="embos_45"><i class="fas fa-shopping-basket"></i></span>
                                                    </a>
                                                </li>
                                            }
                                            else
                                            {
                                                <li>
                                                    <a asp-area="" asp-controller="Home" asp-action="Cart" class="crs_yuo12">
                                                        <span class="embos_45">
                                                            <i class="fas fa-shopping-basket"></i><i class="embose_count">
                                                                <input id="cartItemCount" type="number" style="width:18px; text-align:center; height:20px; background-color:transparent; border:none; color:white;" value="@ViewBag.cartItemCount" disabled />
                                                            </i>
                                                        </span>
                                                    </a>
                                                </li>
                                            }
                                        }
                                    }
                                    <li>
                                        <a asp-area="" asp-controller="Home" asp-action="Store" class="crs_yuo12 w-auto text-white theme-bg">
                                            <span class="embos_45">Store</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-menus-wrapper">
                            <ul class="nav-menu">


                                @{
                                    if (ViewBag.corePageLink == "Welcome")
                                    {
                                        <li class="active">
                                            <a asp-area="" asp-controller="Home" asp-action="Welcome">Welcome</a>
                                        </li>
                                    }
                                    else
                                    {
                                        <li>
                                            <a asp-area="" asp-controller="Home" asp-action="Welcome">Welcome</a>
                                        </li>
                                    }
                                }
                                @{
                                    if (ViewBag.corePageLink == "Store")
                                    {
                                        <li class="active">
                                            <a asp-area="" asp-controller="Home" asp-action="StoreReset">Store</a>
                                        </li>
                                    }
                                    else
                                    {
                                        <li>
                                            <a asp-area="" asp-controller="Home" asp-action="StoreReset">Store</a>
                                        </li>
                                    }
                                }

                                @{
                                    if (ViewBag.corePageLink == "RequestInvoice")
                                    {
                                        <li class="active">
                                            <a asp-area="" asp-controller="Home" asp-action="RequestInvoice">Create Shopping List</a>
                                        </li>
                                    }
                                    else
                                    {
                                        <li>
                                            <a asp-area="" asp-controller="Home" asp-action="RequestInvoice">Create Shopping List</a>
                                        </li>
                                    }
                                }

                                @{
                                    if (ViewBag.corePageLink == "LogisticsAndDistribution" || ViewBag.corePageLink == "OurApps" || ViewBag.corePageLink == "BuyNowPayLater" || ViewBag.corePageLink == "AffiliateProgram")
                                    {
                                        <li class="active">
                                            <a href="#">Services<span class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu">
                                                <li><a asp-area="" asp-controller="Home" asp-action="RequestInvoice">Create Shopping List</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="LogisticsAndDistribution">Logistics and Distribution</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="OurApps">Our App</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="BuyNowPayLater">Buy Now Pay Later</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="AffiliateProgram">Affiliate Program</a></li>
                                            </ul>
                                        </li>
                                    }
                                    else
                                    {
                                        <li>
                                            <a href="#">Services<span class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu">
                                                <li><a asp-area="" asp-controller="Home" asp-action="RequestInvoice">Create Shopping List</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="StoreDistribution">Store Distribution</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="LogisticsAndDistribution">Logistics and Distribution</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="OurApps">Our App</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="BuyNowPayLater">Buy Now Pay Later</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="AffiliateProgram">Affiliate Program</a></li>
                                            </ul>
                                        </li>
                                    }
                                }

                                @{
                                    if (ViewBag.corePageLink == "OurStory" || ViewBag.corePageLink == "Blog" || ViewBag.corePageLink == "HelpCenter" || ViewBag.corePageLink == "TermsAndConditions" || ViewBag.corePageLink == "PrivacyPolicy" || ViewBag.corePageLink == "RefundPolicy" || ViewBag.corePageLink == "CookiePolicy" || ViewBag.corePageLink == "ShippingPolicy" || ViewBag.corePageLink == "EULA")
                                    {
                                        <li class="active">
                                            <a href="#">Resources<span class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu">
                                                <li><a asp-area="" asp-controller="Home" asp-action="OurStory">Our Story</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="Blog">Blog</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="HelpCenter">Help Center</a></li>
                                                <li>
                                                    <a href="#">Governance</a>
                                                    <ul class="nav-dropdown nav-submenu">
                                                        <li><a asp-area="" asp-controller="Home" asp-action="TermsAndConditions">Terms And Conditions</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="PrivacyPolicy">Privacy Policy</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="RefundPolicy">Return & Refund Policy</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="CookiePolicy">Cookie Policy</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="ShippingPolicy">Shipping Policy</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="EULA">EULA</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    }
                                    else
                                    {
                                        <li>
                                            <a href="#">Resources<span class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu">
                                                <li><a asp-area="" asp-controller="Home" asp-action="OurStory">Our Story</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="Blog">Blog</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="HelpCenter">Help Center</a></li>
                                                <li>
                                                    <a href="#">Governance</a>
                                                    <ul class="nav-dropdown nav-submenu">
                                                        <li><a asp-area="" asp-controller="Home" asp-action="TermsAndConditions">Terms And Conditions</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="PrivacyPolicy">Privacy Policy</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="RefundPolicy">Return & Refund Policy</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="CookiePolicy">Cookie Policy</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="ShippingPolicy">Shipping Policy</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="EULA">EULA</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    }
                                }

                                @{
                                    if (ViewBag.corePageLink == "Contact")
                                    {
                                        <li class="active">
                                            <a asp-area="" asp-controller="Home" asp-action="Contact">Say Hello</a>
                                        </li>
                                    }
                                    else
                                    {
                                        <li>
                                            <a asp-area="" asp-controller="Home" asp-action="Contact">Say Hello</a>
                                        </li>
                                    }
                                }

                                @{
                                    if (ViewBag.uuid != "")
                                    {
                                        <li>
                                            <a href="#">Account<span class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu">
                                                <li><a asp-area="" asp-controller="Home" asp-action="RequestInvoice">Create Shopping List</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="Cart">Cart</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="Likes">Likes</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="LastPurchase">Last Purchase</a></li>
                                                <li>
                                                    <a href="#">Settings</a>
                                                    <ul class="nav-dropdown nav-submenu">
                                                        <li><a asp-area="" asp-controller="Home" asp-action="EditProfile">Edit Profile</a></li>
                                                        @{
                                                            if (ViewBag.accountType == "Regular")
                                                            {
                                                                <li><a asp-area="" asp-controller="Home" asp-action="ChangePassword">Change Password</a></li>
                                                            }
                                                        }
                                                        <li><a asp-area="" asp-controller="Home" asp-action="ManageAddresses">Manage Addresses</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="TopUp">Top-Up</a></li>
                                                        <li><a asp-area="" asp-controller="Home" asp-action="ManageInvoice">Manage Invoice</a></li>
                                                    </ul>
                                                </li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="Activities">Activity</a></li>
                                                <li><a asp-area="" asp-controller="Home" asp-action="ManageRestaurants">My Restaurants</a></li>
                                                <li><a data-toggle="modal" data-target="#logout" href="#">Sign Out</a></li>
                                            </ul>
                                        </li>
                                    }
                                }

                            </ul>

                            <ul class="nav-menu nav-menu-social align-to-right">
                                @{
                                    if (ViewBag.uuid != "")
                                    {
                                        int i = ViewBag.cartItemCount;

                                        if (i < 1)
                                        {
                                            <li>
                                                <a asp-area="" asp-controller="Home" asp-action="Cart" class="crs_yuo12">
                                                    <span class="embos_45"><i class="fas fa-shopping-basket"></i></span>
                                                </a>
                                            </li>
                                        }
                                        else
                                        {
                                            <li>
                                                <a asp-area="" asp-controller="Home" asp-action="Cart" class="crs_yuo12">
                                                    <span class="embos_45">
                                                        <i class="fas fa-shopping-basket"></i><i id="cartCount" class="embose_count">
                                                            <input id="cartItemCount" disabled type="text" style="width: 18px; height: 20px; text-align: center; background-color: transparent; border: none; color: white;" value="@ViewBag.cartItemCount" />
                                                        </i>
                                                    </span>
                                                </a>
                                            </li>
                                        }
                                    }
                                }
                                @{
                                    if (ViewBag.uuid != "")
                                    {
                                        <li>
                                            <a href="#" class="alio_green" data-toggle="modal" data-target="#logout">
                                                <i class="fas fa-sign-out-alt mr-1"></i><span class="dn-lg">Sign Out</span>
                                            </a>
                                        </li>
                                    }
                                    else
                                    {
                                        <li>
                                            <a href="#" class="alio_green" data-toggle="modal" data-target="#login">
                                                <i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
                                            </a>
                                        </li>
                                    }
                                }
                                <li class="add-listing theme-bg">
                                    <a asp-area="" asp-controller="Home" asp-action="StoreReset" class="text-white">Store</a>
                                </li>
                            </ul>


                        </div>
                    </nav>
                </div>

                @if(ViewBag.isErrorPage != "true"){
                    @if (ViewData["Title"].ToString() == "Store")
                    {
                        <div class="container">
                            <nav id="navigation" class="navigation navigation-landscape">
                                @using (Html.BeginForm("SearchFoodStuffs", "Home", FormMethod.Post))
                                {
                                    <div class="row align-items-end">
                                        <div class="col-xl-9 col-lg-9 col-md-6 col-sm-11">
                                            <div class="form-group">
                                                <div class="smalls input-with-icon">
                                                    <input spellcheck="true" autocomplete="on" type="text" name="SearchKeyword" max="100" value="@ViewBag.SearchKeyWord" maxlength="100" placeholder="Name of the food stuff..." class="form-control" style="height:54px" required>
                                                    <i class="ti-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-11">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select id="cates" name="Category" class="form-control" style="width: 100%">
                                                        @{
                                                            var list = new List<KeyValuePair<string, string>>() {
                                        new KeyValuePair<string, string>("All Category", "All"),
                                        new KeyValuePair<string, string>("Vegetable", "Vegetable"),
                                        new KeyValuePair<string, string>("Proteins", "Protein"),
                                        new KeyValuePair<string, string>("Seasoning", "Seasoning"),
                                        new KeyValuePair<string, string>("Fruits", "Fruit"),
                                        new KeyValuePair<string, string>("Grains", "Grains"),
                                        new KeyValuePair<string, string>("Nuts", "Nuts"),
                                        new KeyValuePair<string, string>("Processed Food", "Processed"),
                                        new KeyValuePair<string, string>("Fluids", "Fluids"),
                                        new KeyValuePair<string, string>("Live Stock", "Live Stock"),
                                        new KeyValuePair<string, string>("Seeds", "Seeds")
                                        };

                                                            foreach (var Data in list)
                                                            {
                                                                if (ViewBag.selectedCategory == Data.Value)
                                                                {
                                                                    <option value="@Data.Value" selected>@Data.Key</option>
                                                                }
                                                                else
                                                                {
                                                                    <option value="@Data.Value">@Data.Key</option>
                                                                }
                                                            }
                                                        }
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button type="submit" class="input-group-text theme-bg b-0 text-light" style="border: none; width:54px; height:54px;">
                                                            <span class="ti-search"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                }
                            </nav>
                        </div>
                    }
                }

            </div>
        }




         <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        @yield('content')

        @if(ViewBag.isWebView != "true"){
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
                                @using (Html.BeginForm("SubscribeClientToNewsletters", "Home", FormMethod.Post))
                                {

                                    <div class="foot-news-last">
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="Email" placeholder="Email address" required>
                                            <div class="input-group-append">
                                                <button type="submit" class="input-group-text theme-bg b-0 text-light">Subscribe</button>
                                            </div>
                                        </div>
                                    </div>

                                }
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
                                            @{
                                                if (ViewBag.uuid != "")
                                                {
                                                    <li><a asp-area="" asp-controller="Home" asp-action="Activities">Activity</a></li>
                                                }
                                                else
                                                {
                                                    <li><a asp-area="" asp-controller="Home" asp-action="SignUp">Sign Up</a></li>
                                                }
                                            }
                                            <li><a asp-area="" asp-controller="Home" asp-action="HelpCenter">Help Center</a></li>
                                            <li><a asp-area="" asp-controller="Home" asp-action="Contact">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="footer_widget">
                                        <h4 class="widget_title">Services</h4>
                                        <ul class="footer-menu">
                                            <li><a asp-area="" asp-controller="Home" asp-action="RequestInvoice">Create Shopping List<span class="new">New</span></a></li>
                                            <!-- <li><a asp-area="" asp-controller="Home" asp-action="StoreDistribution">Store Distribution</a></li> -->
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
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> FoodStuff Store. All Rights Reserved - RC18310280.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        }



        <!-- ============================ Footer End ================================== -->
        <!-- Sign In Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
            <div class="modal-dialog modal-xl login-pop-form" role="document">
                <div class="modal-content overli" id="loginmodal">
                    <div class="modal-header">
                        <h5 class="modal-title">Login Your Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="login-form">
                            @using (Html.BeginForm("SignInUser", "Home", FormMethod.Post))
                            {

                                <div class="form-group">
                                    <label>Email/Phone Number</label>
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" name="Email" placeholder="Enter your email or phone number" required />
                                        <i class="ti-user"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-with-icon">
                                        <input type="password" class="form-control" name="Password" id="passwordInput" placeholder="*******" required />
                                        <i class="ti-unlock"></i>
                                    </div>
                                    <!-- An element to toggle between password visibility -->
                                    <input type="checkbox" style="margin-top:20px; margin-bottom:20px; margin-right:5px;" class="btn-primary" onclick="toggleShowPassword()"> Show Password
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width theme-bg text-white">Sign In</button>
                                </div>
                                @Html.AntiForgeryToken()
                                ;
                            }

                            <div class="fhg_45"><p class="musrt">Or do you own a google account?</p></div>
                            <div id="g_id_onload"
                                 data-client_id="193554266046-ebjgoql9ju8pqsnjvspe4iden8bivufk.apps.googleusercontent.com"
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
                    </div>
                    <div class="crs_log__footer d-flex justify-content-between mt-0">
                        <div class="fhg_45"><p class="musrt">Don't have account? <a asp-area="" asp-controller="Home" asp-action="SignUp" class="theme-cl">Sign Up</a></p></div>
                        <div class="fhg_45"><p class="musrt"><a asp-area="" asp-controller="Home" asp-action="ForgotPassword" class="text-danger">Forgot Password?</a></p></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Sign In Modal -->
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
                            @using (Html.BeginForm("SignOutUser", "Home", FormMethod.Post))
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

        <a id="back2Top" class="top-scroll" title="Back to top" href="#">
            <i class="ti-arrow-up"></i>
        </a>

        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-ab37dc14-e737-4fbe-a98e-92764cd46a11"></div>

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Loads google service client library required for google signin-->
    <script src="https://accounts.google.com/gsi/client" async defer></script>

    @if (TempData["SweetAlertDialogHeader"] != null)
    {
        @if (TempData["SweetAlertDialogType"] != null)
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
        else
        {
            <script>
                swal({
                    title: "@TempData["SweetAlertDialogHeader"]",
                    text: "@TempData["SweetAlertDialogBody"]",
                    icon: "success",
                    button: {
                        text: "Okay",
                        className: "btn color-bg float-btn",
                    }
                });
            </script>
        }
    }

    @if (ViewBag.isWebView != "true")
    {
        <script>
            var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?12297';
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url;
            var options = {
                "enabled": true,
                "chatButtonSetting": {
                    "backgroundColor": "#4dc247",
                    "ctaText": "Send Shopping List",
                    "borderRadius": "8",
                    "marginLeft": "15",
                    "marginBottom": "50",
                    "marginRight": "50",
                    "position": "left"
                },
                "brandSetting": {
                    "brandName": "FoodStuff Store",
                    "brandSubTitle": "Typically replies within a minute",
                    "brandImg": "https://lh3.googleusercontent.com/ogw/AAEL6shi4cJwnCOTir4QTWaZiG1R_aujy6vG1fm1Xfti=s32-c-mo",
                    "welcomeText": "Hi there!\nI can take your orders and answer your questions?",
                    "messageText": "Hello, Good day Sir/Ma. I would like to place an order for a shopping list I have curated.",
                    "backgroundColor": "#0a5f54",
                    "ctaText": "Query or Submit a Shopping List",
                    "borderRadius": "8",
                    "autoShow": false,
                    "phoneNumber": "@ViewBag.whatsappOrderNumber"
                }
            };
            s.onload = function () {
                CreateWhatsappChatWidget(options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        </script>
    }

    <script>
        function getGoogleAccountInfo(response) {
            const responsePayload = parseJwt(response.credential);

            console.log("Email: " + responsePayload.email);
            console.log("Full Name: " + responsePayload.name);
            console.log("Image: " + responsePayload.picture);

            window.open("https://foodstuff.store/Home/GoogleAuth?gemail=" + responsePayload.email + "&gname=" + responsePayload.name + "&gpicture=" + responsePayload.picture, "_self");

        }

        function parseJwt(token) {
            var base64Url = token.split('.')[1];
            var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
            var jsonPayload = decodeURIComponent(atob(base64).split('').map(function (c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));

            return JSON.parse(jsonPayload);
        };</script>

    @Html.Raw(ViewBag.liveChatJSCode)

    @yield("Scripts")

    <script type="text/javascript">
        //<![CDATA[
        var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
        document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
        //]]></script>

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
