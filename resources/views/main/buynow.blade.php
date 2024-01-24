@extends('shared.layout')
@section('Title', "Buy Now")
@section('content')


<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Buy Now, Pay Later!</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                {{-- <a href="{{ route('home', ['prevPageLink' => $prevPageLink]) }}"> --}}
                                <a href="">

                                    {{-- {{ $prevPageName }} --}}
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                {{-- {{ $corePageName }} --}}
                            </li>
                            {{-- <li class="breadcrumb-item">
                                <a asp-area="" asp-controller="Home" asp-action="@ViewBag.prevPageLink">
                                    @ViewBag.prevPageName
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                @ViewBag.corePageName
                            </li> --}}
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
                    <h2 class="min_large mb-4">Join over 41,905 people making payments with Swipe in bits</h2>
                    <p>
                        If you have a budget setup, but your budget does not meet the quota required
                        for clearing a pressing shopping lists invoice. You can try using our Buy Now Pay Later
                        package available for both cart lisitngs and Invoices. Our Buy Now Pay Later package is backed
                        by <a href="www.swipe.ng" target="_blank" style="color: #E10C2C;">Swipe NG</a>. At the point of payment, if you don't own
                        an account with Swipe, you will be required to create one.
                    </p>

                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="aps_crs_img mt-5">
                    <img
                    src="{{asset('assets/img/BuyNowPayLater.png')}}"
                    class="img-fluid" alt="" />
                </div>
            </div>
        </div>
        <br/>
    </div>
</section>
<!-- ============================ Call To Action ================================== -->
<section class="bg-cover" style="background: #f7f8f9 url(assets/img/call-bg.png) no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <div class="call_action mt-4 mb-4 text-center">
                    <h2 class="mb-4">Get The FoodStuff Store App!</h2>
                    <p class="mb-4">
                        Save money when you place orders and monitor invoices using our Buy Now Pay Later package. Closed invoices and orders with Swipe will be tagged on the app as: <b>Payment Method - Swipe NG</b>.
                        Follow the links below to get the app.
                    </p>
                    <div class="aps_buttons mt-4">
                        <a href="#" class="btn_aps mr-4">
                            <div class="aps_wrapb theme-bg">
                                <div class="aps_ico">
                                    <img src="{{ asset('assets/img/apple.png') }}" class="img-fluid" alt="" />
                                </div>
                                <div class="aps_capt">
                                    <span>Download On The</span>
                                    <h4>App Store</h4>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="btn_aps">
                            <div class="aps_wrapb">
                                <div class="aps_ico">
                                    <img src="{{ asset('assets/img/google-play.png') }}" class="img-fluid" alt="" />
                                </div>
                                <div class="aps_capt">
                                    <span>Get It On</span>
                                    <h4>Google Play</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="bg-cover" style="background:#f7f8f9 url(assets/img/call-bg.png)no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <div class="call_action mt-4 mb-4 text-center">
                    <h2 class="mb-4">Get The FoodStuff Store App!</h2>
                    <p class="mb-4">
                        Save money as when you place orders and monitor invoices using our Buy Now Pay Later package. Closed invoices and Orders with Swipe will be tagged on the app as: <b>Payment Method -  Swipe NG</b>.
                        Follow the links below to get the app.
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
</section> --}}
<!-- ============================ Call To Action End ================================== -->
<!-- ============================ Download App ================================== -->

@endsection
