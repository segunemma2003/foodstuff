@extends('shared.layout')
@section('Title', "Store Distribution")
@section('content')

<!-- ============================ Page Title Start================================== -->
@if ($isWebView !== "true")
    <section class="page-title gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <h1 class="breadcrumb-title">Open A Restaurant!</h1>
                        <nav class="transparent">
                            <ol class="breadcrumb p-0">
                                {{-- <li class="breadcrumb-item">
                                    <a href="{{ route('home', ['controller' => 'Home', 'action' => $prevPageLink]) }}">
                                        {{ $prevPageName }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active theme-cl" aria-current="page">
                                    {{ $corePageName }}
                                </li> --}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- ============================ Page Title End ================================== -->
<!-- ============================ Download App ================================== -->
<section class="pb-0">
    <div class="container">

        <div class="row align-items-center justify-content-between rounded m-0">
            <div class="col-lg-12 col-md-12">                
                <div class="aps_crs_caption">
                    <h2 class="min_large mb-4">The Essence of Store Distribution</h2>
                    <p>
                       Store distribution refers to the process of exposing dishes from one restaurant on to multiple restaurants, apps or outlets where 
                       consumers can purchase them. It involves a complex network of software, partnerships, and strategies to ensure that products are 
                       efficiently shared, stocked, managed, and displayed in stores across different geographical locations.
                    </p>

                    <h2>Benefits of Store Distribution</h2>
                    <ul style="display: block; list-style-type: disc; margin-top: 1em; margin-bottom: 1em; margin-left: 0; margin-right: 0; padding-left: 40px;">
                        <li>
                            <b>Wider Market Reach:</b> Store distribution enables products to be accessible to a larger consumer base. By partnering with established retailers
                            or leveraging distribution networks, restaurants and fast foods can tap into existing customer foot traffic, expanding their market presence significantly.
                            Your products will be available on the following stores: Jumia Food, Glovo, Chowdeck, BoltFood.
                        </li>
                        <li>
                            <b>Increased Brand Visibility:</b> Placing products in prominent retail stores enhances brand visibility. Exposure to a diverse range of consumers,
                            both online and offline, can lead to increased brand recognition, loyalty, and ultimately, sales.
                            </li>
                        <li>
                            <b>Efficient Inventory Management:</b> Store distribution allows manufacturers to distribute their products across multiple locations, reducing the risk of stockouts and
                            inventory management in a particular store. This ensures a steady supply of goods to meet consumer demand.
                        </li>
                    </ul>
                    
                </div>
            </div>
            
        </div>
        <br/>
    </div>
</section>

<section class="gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h2>Our <span class="theme-cl">Top</span> Partners & Distributors</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- Single Item -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 pb-4">
                <div class="crs_partn">
                    <div class="p-3">
                        <img src="{{ asset('assets/img/JumiaFood.png') }}" class="img-fluid" alt="Jumia Food Logo" title="Jumia Food" />
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="crs_partn">
                    <div class="p-3">
                        <img src="{{ asset('assets/img/BoltFood.png') }}" class="img-fluid" alt="Bolt Food Logo" title="Bolt Food" />
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="crs_partn">
                    <div class="p-3">
                        <img src="{{ asset('assets/img/UberEats.png') }}" class="img-fluid" alt="Uber Eats Logo" title="Uber Eats" />
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="crs_partn">
                    <div class="p-3">
                        <img src="{{ asset('assets/img/Heyfood.png') }}" class="img-fluid" alt="Heyfood Logo" title="Heyfood" />
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="crs_partn">
                    <div class="p-3">
                        <img src="{{ asset('assets/img/Chowdeck.png') }}" class="img-fluid" alt="Chowdeck Logo" title="Chowdeck" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <div class="call_action mt-4 mb-4 text-center">
                    <h2 class="mb-4">In Other Words</h2>
                    <p>
                        Store distribution acts as a crucial link between manufacturers and consumers, enabling products to reach a wider market. With careful planning,
                        effective management, strong partnerships, and strategic marketing, businesses can maximize their chances of success in the competitive
                        retail landscape. By embracing store distribution, businesses can unlock new opportunities, drive sales growth, and create lasting brand impact.
                    </p>
                    {{-- @if (View::get('doesUserOwnARestaurant')) --}}
                        {{-- <a href="{{ route('restaurant.manage') }}" class="btn theme-bg text-white mt-2" target="_blank"> --}}
                        <a href="" class="btn theme-bg text-white mt-2" target="_blank">
                            Manage Restaurants
                        </a>
                    {{-- @else --}}
                        {{-- <a href="{{ route('restaurant.open') }}" class="btn theme-bg text-white mt-2" target="_blank"> --}}
                        <a href="" class="btn theme-bg text-white mt-2" target="_blank">
                            Open Restaurant
                        </a>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================ Call To Action End ================================== -->
@endsection