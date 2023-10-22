@extends('shared.layout')
@section('Title', "Affilitate")
@section('content')

<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Become An Affiliate</h1>
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
<div class="clearfix"></div>
<!-- ============================ Page Title End ================================== -->
<section class="pt-0">
    <div class="container">
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
        <div class="row align-items-center justify-content-between mt-5">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="lmp_thumb">
                    <img src="~/assets/img/AffiliateProgram.png" class="img-fluid pb-4" alt="" />
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="lmp_caption">
                    <h2 class="mb-3">How It Works</h2>
                    <p>
                        Use your unique link to refer new customers to FoodStuff Store.
                        You earn a one-time 20% commission on any new transaction that's tied to your referral link.
                    </p>
                    <p>
                        But first, you need to get an affiliate ID. To get one
                        <a asp-area="" asp-controller="Home" asp-action="OurApp" style="color:#E10C2C;">Download The FoodStuff Store App</a>.
                        Created an account? Great! Now copy your affiliate link from the profile screen and start sharing.
                        You can always return here any time to monitor your earnings.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>
<div class="clearfix"></div>
<section class="pt-0">
    <div class="container">
        <div class="row align-items-center justify-content-between mt-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="lmp_caption">
                    <span class="theme-cl">Paid Over $200,000 in Affiliate Commission</span>
                    <h2 class="mb-3">Monitor Your Earnings</h2>
                    <p>
                        Withdraw your earnings from the app by placing a withdrawal request. Due to our 1week <a asp-area="" asp-controller="Home" asp-action="RefundPolicy" style="color:#E10C2C;">Refund Policy</a>,
                        funds earned from commissions will be automatically added to your FoodStuff Store balance after 7days has elapsed, from the day your
                        referral cleared their invoice.

                    </p>
                    <p>
                        A pending order is an order that may or may not have been paid for but is still in the return and refund stage.
                        An expired order is an order that was never paid for and they don't return commission, nevertheless you can still earn when
                        your referral places an order for a second time since we pay commissions on the first successful order from your referral.
                        <b>NB: </b>Funds will take longer than 7days to reflect on your FoodStuff Store balance for requested invoices if your
                        referral delays payment.
                    </p>
                    <br />
                </div>
                <br />
            </div>
        </div>

    </div>
</section>
<div class="clearfix"></div>
<section class="bg-cover" style="background:#f7f8f9 url(assets/img/call-bg.png)no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <div class="call_action mt-4 mb-4 text-center">
                    <h2 class="mb-4">Want To Become An Affiliate?</h2>
                    <p class="mb-4">
                        While helping <b>FoodStuff Store</b> customer base grow, your earning is easy because you're promoting a reliable business.
                        Transform the way people buy and access food in your town or internationally.
                        Follow the links below to become an affiliate and start earning.
                    </p>
                    <div class="aps_buttons mt-4">
                        <a href="#" class="btn_aps mr-4">
                            <div class="aps_wrapb theme-bg"><div class="aps_ico"><img src="~/assets/img/apple.png" class="img-fluid" alt="" /></div><div class="aps_capt"><span>Download On The</span><h4>App Store</h4></div></div>
                        </a>
                        <a href="#" class="btn_aps">
                            <div class="aps_wrapb"><div class="aps_ico"><img src="~/assets/img/google-play.png" class="img-fluid" alt="" /></div><div class="aps_capt"><span>Get It On</span><h4>Google Play</h4></div></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@endsection
