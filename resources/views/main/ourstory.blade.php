@extends('shared.layout')
@section('Title', "Our Story")
@section('content')
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Who We Are?</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            {{-- <li class="breadcrumb-item"><a asp-area="" asp-controller="Home" asp-action="@ViewBag.prevPageLink">
                                @ViewBag.prevPageName
                            </a></li>
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
<!-- ============================ About Detail ================================== -->
<section>
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="lmp_caption">
                    <span class="theme-cl">About Us</span>
                    <h2 class="mb-3">What We Do & Our Aim</h2>
                    <p>
                        Foodstuff Store started as an answer to foodstuff shopping difficulties experienced during the COVID19 lockdown. <br />The difficulties experienced were:
                        </p>
                        <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h6 class="mb-0 ml-3">The loss of livelihood as the COVID19 restrictions made it difficult for vendors to sell.</h6>
                            </div>
                        </div>
                        <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h6 class="mb-0 ml-3">Difficulty accessing fresh products in the traditional marketplace.</h6>
                            </div>
                        </div>
                        <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h6 class="mb-0 ml-3">Convenience on the part of both vendor and consumer.</h6>
                            </div>
                        </div>

                    <p>With the realization of these difficulties, Foodstuff Store came into existence.</p>

                    Foodstuff Store aimed to make direct contact between buyers and sellers easy. However, this idea evolved after COVID19, especially with an increasing need for a more convenient and affordable foodstuff shopping experience.</p>
                
                    <br /><br />
                    <span class="theme-cl">Mission</span>
                    <h2 class="mb-3">Our Idea To Rebrand</h2>
                    <p>
                        It all started small in Abuja.<br />
                        A consumer ordered a large quantity of farm produce, and after reaching out to the market vendor and logistics company, we realized it was not cost-effective for the buyer.
                    </p><p>
                        Our team did more research; research that led to the discovery that the price of foodstuff in neighboring cities was more cost-effective than in the traditional market. The price gap was because the farmers were not closer to the traditional marketplaces and were only in direct contact with a few market sellers; This brought about the rebranded idea of FOODSTUFF STORE.
                    </p>
                    <p>
                        Today, we have become more than just an online marketplace connecting the vendors to the consumers; we are now your means to more cost-effective and fresh farm products. We connect you directly to our reliable vendors and can have any farm product delivered to you at a more affordable rate.
                    </p>
                    <br /><br />
                    <span class="theme-cl">Timeline</span>
                    <h2 class="mb-3">1st Project Launched</h2>

                    <p>
                        As a result of the rebranding,<br />
                        Foodstuff store will officially launch its first major project in early 2022; An application that will give everyone more access to a convenient, affordable, and refined traditional foodstuff market.
                    </p>
                    <p>We are already in touch with our vendors, you, and logistics companies.</p>
                    <p>
                        We are continuously researching to enable us serve you better, and we are committed to bringing the market to your doorstep; a very great move to let you “Eat fresh” and “Stay healthy”.
                    </p>
                </div>
            </div>

            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                <div class="lmp_thumb">
                    <img src="{{ asset('assets/img/OurStory1.png') }}" class="img-fluid" alt="" />
                </div>
                <br />
                <div class="lmp_thumb">
                    <img src="{{ asset('assets/img/OurStory2.png') }}" class="img-fluid" alt="" />
                </div>
                <br />
                <div class="lmp_thumb">
                    <img src="{{ asset('assets/img/OurStory3.png') }}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ About Detail ================================== -->

<!-- ============================ partner Start ================================== -->
<section class="gray">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h2><span class="theme-cl">Reliable</span> Partners & Investors</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <!-- Single Item -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="crs_partn">
                    <div class="p-3">
                        <img src="{{ asset('assets/img/PayStackLogo.png') }}" class="img-fluid" alt="Paystack Brand Logo" title="PayStack" />
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="crs_partn">
                    <div class="p-3">
                        <img src="{{ asset('assets/img/FlutterwaveLogo.png') }}" class="img-fluid" alt="Flutterwave Brand Logo" title="Flutterwave" />
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="crs_partn">
                    <div class="p-3">
                        <img src="{{ asset('assets/img/JedilabsLogo.png') }}" class="img-fluid" alt="Jedi Labs Brand Logo" title="Jedi Labs" />
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="crs_partn">
                    <div class="p-3">
                        <img src="{{ asset('assets/img/IntersectConsortium.png') }}" class="img-fluid" alt="Intersect Consortium Brand Logo" title="Intersect Consortium" />
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="crs_partn">
                    <div class="p-3">
                        <img src="{{ asset('assets/img/SwipeNGLogo.png') }}" class="img-fluid" alt="Swipe NG Brand Logo" title="Swipe NG" />
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ partner End ================================== -->

@endsection