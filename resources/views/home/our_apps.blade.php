@{
    ViewData["Title"] = ViewBag.corePageName;
}
<br />
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Our Apps</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a asp-area="" asp-controller="Home" asp-action="@ViewBag.prevPageLink">
                                    @ViewBag.prevPageName
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                @ViewBag.corePageName
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->
<!-- ============================ Download App ================================== -->
<section class="pb-0">
    <div class="container">

        <div class="row align-items-center justify-content-between rounded m-0">
            <div class="col-lg-7 col-md-7">
                <div class="aps_crs_caption">
                    <h2 class="min_large mb-4">Food Stuff Store App</h2>
                    <p>
                        Have food products delivered to your door from thousands of local and national farmers and suppliers. Find
                        food products endermic to specific regions in the world, bring them to your city or town.
                        Negotiate deals with suppliers.
                        Track your orders in real time.
                    </p>
                    <div class="aps_buttons mt-4">
                        <a href="#" class="btn_aps mr-4">
                            <div class="aps_wrapb theme-bg"><div class="aps_ico"><img src="~/assets/img/apple.png" class="img-fluid" alt="" /></div><div class="aps_capt"><span>Download On The</span><h4>App Store</h4></div></div>
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.foodstuff.store" target="_blank" class="btn_aps">
                            <div class="aps_wrapb"><div class="aps_ico"><img src="~/assets/img/google-play.png" class="img-fluid" alt="" /></div><div class="aps_capt"><span>Get It On</span><h4>Google Play</h4></div></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="aps_crs_img mt-5">
                    <img src="~/assets/img/MobileAppImg.png" class="img-fluid" alt="" />
                </div>
            </div>
        </div>

    </div>
</section>
<section class="pb-0 gray">
    <div class="container">

        <div class="property_video radius lg">
            <div class="thumb">
                <img class="pro_img img-fluid w100" src="~/assets/img/YoutubeMobileAPpThumbnail.png" alt="7.jpg">
                <div class="overlay_icon">
                    <div class="bb-video-box">
                        <div class="bb-video-box-inner">
                            <div class="bb-video-box-innerup">
                                <a href="https://www.youtube.com/watch?v=@ViewBag.aboutOurMobileApp" onclick="playYoutubeVideo()" data-toggle="modal" data-target="#video" class="theme-cl"><i class="ti-control-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="pb-0 gray">
    <div class="container">

        <div class="edu_wraper">
            <h4 class="edu_title">Core Features</h4>
            <ul class="lists-3 row">
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Push Notification</li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">PayStack Payment Gateway</li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Flutterwave Payment Gateway</li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Social Media Login</li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Parcel Tracking</li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Store Front & Carting</li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Shopping List Order</li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Monitor Affiliate Earnings </li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Buy Now Pay Later - Backed By Swipe NG</li>
            </ul>
        </div>

        <div class="edu_wraper">
            <h4 class="edu_title">Preferrences</h4>
            <ul class="lists-3 row">
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Multi - Lingual</li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Dark Mode</li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Push Notifications</li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Currency Switcher</li>
                <li class="col-xl-4 col-lg-6 col-md-6 m-0">Location</li>
            </ul>
        </div>

    </div>
    <br />
</section>
<!-- ============================ Download App ================================== -->
<!-- Video Modal -->
<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="videomodal" aria-hidden="true" style="margin:auto;">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
        <div class="modal-content overli" id="loginmodal">
            <div class="modal-header">
                <h5 class="modal-title">FoodStuff Store App</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form>
                        <iframe style="display:none; width:100%; height:300px" id="yt" src="https://www.youtube.com/embed/@ViewBag.aboutOurMobileApp" frameborder="0" allowfullscreen></iframe>
                    </form>
                </div>
            </div>
            <div class="crs_log__footer d-flex justify-content-between mt-0">
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>function playYoutubeVideo() {
        $("#content").hide();
        $("#yt")[0].src += "?autoplay=1";
        setTimeout(function () { $("#yt").show(); }, 200);
    }</script>