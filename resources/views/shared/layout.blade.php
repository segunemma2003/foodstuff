<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("Title") - FoodStuff Store</title>
    <meta name="author" content="Themezhub" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom CSS -->
    <link href="/assets/css/styles.css" rel="stylesheet">
    <link href="/assets/css/store.css" rel="stylesheet">
    <link href="/assets/css/snackbar.css" rel="stylesheet">
    <link rel="icon" href="/assets/img/FoodStuffStoreLogoHead.png">
</head>
<body>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        {{--  @if (ViewBag.isWebView != "true")  --}}
        @if(1==0)
        @else
            @include('shared.nav')
        @endif
        {{--  //iswebview  --}}
        @yield('content')
        {{--  if(ViewBag.isWebView != "true"){  --}}
        @if(1==0)
        @else

            @include('shared.footer')
        @endif
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
                            <form method="POST" action="/login">
                                @csrf <!-- Laravel CSRF protection -->

                                <div class="form-group">
                                    <label>Email/Phone Number</label>
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" name="UserEmail/Phone" placeholder="Enter your email or phone number" required />
                                        <i class="ti-user"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-with-icon">
                                        <input type="password" class="form-control" name="Passphrase" id="passwordInput" placeholder="*******" required />
                                        <i class="ti-unlock"></i>
                                    </div>
                                    <!-- An element to toggle between password visibility -->
                                    <input type="checkbox" style="margin-top: 20px; margin-bottom: 20px; margin-right: 5px;" class="btn-primary" onclick="toggleShowPassword()"> Show Password
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width theme-bg text-white">Sign In</button>
                                </div>
                            </form>


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
                        <div class="fhg_45"><p class="musrt">Don't have account? <a  href="{{ route('home.signup') }}"  class="theme-cl">Sign Up</a></p></div>
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
                                <form method="POST">
                                    @csrf
                                    <div class="rcs_log_125 pt-2 pb-3">
                                        <span>Are you sure you want to leave?</span>
                                    </div>
                                    <div class="rcs_log_126 full">
                                        <ul class="social_log_45 row">
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-6"><button type="button" class="close sl_btn" data-dismiss="modal">Cancel</button></li>
                                            <li class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                <a href="{{ route('logmeout') }}" type="submit" class="btn btn-md full-width theme-bg text-white">Yes</a>

                                            </li>
                                        </ul>
                                    </div>
                                </form>
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
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Loads google service client library required for google signin-->
    <script src="https://accounts.google.com/gsi/client" async defer></script>

    @if(session('SweetAlertDialogHeader'))
        <script>
            swal({
                title: "{{ session('SweetAlertDialogHeader') }}",
                text: "{{ session('SweetAlertDialogBody') }}",
                icon: "{{ session('SweetAlertDialogType', 'success') }}",
                button: {
                    text: "Okay",
                    className: "btn color-bg float-btn"
                }
            });
        </script>
    @endif

   {{--  // ViewBag.isWebView  --}}
    @if ( 1==2)

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
    @endif

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

    {{--  @Html.Raw(ViewBag.liveChatJSCode)  --}}

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
