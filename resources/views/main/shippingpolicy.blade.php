@extends('shared.layout')
@section('Title', "Shipping Policy")
@section('content')
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Shipping And Delivery Policy</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
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
<!-- ============================ Product Description ================================== -->
<section class="pt-0">
    <div class="container">

        <div class="row">

            <div class="col-lg-10 col-md-12 col-sm-12">

                <div class="tab-content tabs_content_creative" id="myTabContent">

                    <!-- general Query -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                        <!-- Start Terms & Condition page -->
                        <section class="ec-page-content section-space-p">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="section-title">
                                            <h1>Shipping and Delivery Policy</h1>
                                            <p class="sub-title mb-3">Updated at 2022-22-05</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="ec-common-wrapper">
                                            <div class="ec-faq-wrapper">
                                                <div class="ec-faq-container">
                                                    <h1>Shipping Policy</h1>
                                                    <p>This Shipping & Delivery Policy is part of our Terms and Conditions ("Terms") and should be therefore read alongside our main Terms: <a asp-area="" asp-controller="Home" asp-action="TermsAndConditions" target="_blank" style="color:#E10C2C;">Read Terms</a>.</p>
                                                    <p>Please carefully review our Shipping & Delivery Policy when purchasing our products. This policy will apply to any order you place with us.</p>
                                                    <h2>WHAT ARE MY SHIPPING & DELIVERY OPTIONS?</h2>
                                                    <p>We offer various shipping options. In some cases a third-party supplier may be managing our inventory and will be responsible for shipping your products.</p>
                                                    <br />
                                                    <h3>Free Shipping</h3>
                                                    <p>We offer free Large Weight shipping on orders above 1,500,000.00 NGN</p>

                                                    <h3>Expedited Shipping Fees</h3>
                                                    <p>We also offer expedited shipping at the following rates</p>
                                                    <table class="table dash_list">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Amount (NGN)</th>
                                                                <th scope="col">Local Delivery Within 1 Week</th>
                                                                <th scope="col">International Delivery Within 1 Week</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td><div class="smalls lg"> > 1,500,000.00 NGN </div></td>
                                                                <td><span class="dhs_tags">0%</span></td>
                                                                <td><span class="dhs_tags">0%</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td><div class="smalls lg"> < 1,500,000.00 NGN </div></td>
                                                                <td><span class="dhs_tags">4%</span></td>
                                                                <td><span class="dhs_tags">4%</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p>If you select an expedited shipping option, we will follow up after you have placed the order with any additional shipping information.</p>
                                                    <p>All times and dates given for delivery of the products are given in good faith but are estimates only.</p>
                                                    <p>For U and UK costomers: This does not affect your statutory rights. Unless specifically noted, estimated delivery times rflect the earliest available delivery, and deliveries will be made within 30days after the day we accept your orders. FOr more information please refer to our  <a asp-area="" asp-controller="Home" asp-action="TermsAndConditions" target="_blank" style="color:#E10C2C;">Terms</a>.</p>
                                                    <h2>DO YOU DELIVER INTERNATIONALLY?</h2>
                                                    <p>
                                                        We offer international shipping to most countries. Infortunately, we are unable to deliver to the following countires:
                                                    </p>
                                                    <ul>
                                                        <li>
                                                            &nbsp; ➼ North Korea
                                                        </li>
                                                        <li>
                                                            &nbsp; ➼ Afghanistan
                                                        </li>
                                                    </ul>
                                                    <p>Free Large Weight shipping is valid on international orders.</p>
                                                    <br />
                                                    <p>Please note, we may be subject to varius rules and restrictions in relation to some uinternational deliveries and you may be subjected to additional taxes and duties over which we have no control. If such cases apply, you are responsible for complying with the laws applicat=ble to the country where you live and will be responsible for any such additional costs or taxes.</p>
                                                    <h2>QUESTIONS ABOUT RETURNS?</h2>
                                                    <p>If you have questions about returns, please review our <a target="_blank" style="color:#E10C2C;" asp-area="" asp-controller="Home" asp-action="RefundPolicy">Return Policy</a></p>

                                                    <h3>HOW CAN YOU CONTACT US ABOUT THIS POLICY?</h3>
                                                    <p>Don't hesitate to contact us if you have any questions.</p>
                                                    <ul>
                                                        <li>
                                                            &nbsp; ➼ Via Email:
                                                            <a title="click me" href="mailto: info@foodstuff.store" class="__cf_email__" data-cfemail="9eedebeeeef1eceadef0ebf3fbf0efebf1eaffb0fdf1f3">[email&#160;protected]</a>
                                                        </li>
                                                        <li>&nbsp; ➼ Via this Link: <a href="https://foodstuff.store/Home/Contact" target="_blank"><u>Contact Page</u></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End Terms & Condition page -->
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
<!-- ============================ Product Description End ================================== -->

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>



@endsection