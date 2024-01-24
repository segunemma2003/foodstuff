@extends('shared.layout')
@section('Title', "Logistics")
@section('content')

<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Logistics & Distribution</h1>
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

<!-- ============================ Article Start ================================== -->
<section class="pt-0">
    <div class="container">
        <br />
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h2>About Our <span class="theme-cl">Logistics & Distribution Process</span></h2>
                    <p>
                        The logistics of food is one of the activities that has gained traction in recent years.
                        We can eat things made anywhere in the world thanks to it, even if we aren't aware of it.
                    </p>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-between rounded m-0 pb-5">
            <div class="col-lg-7 col-md-7">
                <div class="aps_crs_caption">
                    <h2 class="min_large mb-4">Innovating the Way People Shop for and Access Food</h2>
                    <p>
                        FoodStuff Store includes all types of foods, including cattle, fruits and vegetables, ingredients, processed food
                        and precooked food, regardless of format or presentation. This makes the overall supply chain's safety critical
                        and it pushes us to think about things like distance between origin and destination, temperature control,
                        cross contamination, driver training, and laws.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="aps_crs_img mt-5">
                    <img src="~/assets/img/Farmer2.png" class="img-fluid" alt="" />
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-between pt-5">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="side_block extream_img">
                    <div class="list_crs_img">
                        <img src="~/assets/img/Grocery3D.png" class="img-fluid elsio cirl animate-fl-y" alt="" />
                        <img src="~/assets/img/SmartPhone3D.png" class="img-fluid elsio arrow animate-fl-x" alt="" />
                        <img src="~/assets/img/Van3D.png" class="img-fluid elsio moon animate-fl-x" alt="" />
                    </div>
                    <img src="~/assets/img/DeliveryMan1.png" class="img-fluid" alt="" />
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                <div class="lmp_caption">
                    <h2 class="mb-3">Our supply chain's stages</h2>
                    <p>
                        The FoodStuff Store supply chain satisfies the various category of foodstuffs we offer.
                    </p>
                    <ol class="list-unstyled p-0">
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">1</div>
                            </div>
                            <div class="ml-3 ml-md-4">
                                <h4>
                                    Preparation
                                </h4>
                                <p>
                                    Refers to the planning of production and to the loading of products in isothermal containers.
                                </p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">2</div>
                            </div>
                            <div class="ml-3 ml-md-4">
                                <h4>Transportation</h4>
                                <p>
                                    Refers to the specific placement of foods in the transportation units to avoid any possible contamination
                                    or lack of hermeticity.
                                </p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">3</div>
                            </div>
                            <div class="ml-3 ml-md-4">
                                <h4>
                                    Grouping
                                </h4>
                                <p>
                                    Refers to matching of orders that have the same delivery date and region to the nearest farms
                                    and warehouses to speed up the delivery supply chain processs.
                                </p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">4</div>
                            </div>
                            <div class="ml-3 ml-md-4">
                                <h4>
                                    Dispatched
                                </h4>
                                <p>
                                    Refers the final phase of the supply chain when packages are on there way to customers
                                    pick-up address.
                                </p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-cover" style="background:#f7f8f9 url(assets/img/call-bg.png)no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <div class="call_action mt-4 mb-4 text-center">
                    <h2 class="mb-4">Experience How We Are Changing The Way You Buy Food Stuffs</h2>
                    <p class="mb-4">
                        Request for an invoice by generating and submitting your shopping list.
                        Provide your address and a budget. Once invioce has been cleard, we'll see to it that
                        you recieve your parcel on time.
                    </p>
                    <a asp-area="" asp-controller="Home" asp-action="RequestInvoice" class="btn theme-bg text-white">
                        Request Invoice
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Product Description End ================================== -->

@endsection