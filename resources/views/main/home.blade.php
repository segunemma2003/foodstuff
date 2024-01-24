@extends('shared.layout')
@section('Title', "home")
@section('content')
<!-- Top header  -->
<!-- ============================ Hero Banner  Start================================== -->
<div class="hero_banner image-cover image_bottom h6_bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="simple-search-wrap text-left">
                    <div class="hero_search-2">
                        <h1 class="banner_title mb-4">The All Raw<br>Organic Food Store<br><span class="light">Brings The Farm To Your Door</span></h1>
                        <p class="font-lg mb-4">
                            Get your food items from farms and industries that have a history of providing the best raw and processed food products from all over the world.
                        </p>
                        <div class="inline_btn">
                            <a asp-area="" asp-controller="Home" asp-action="RequestInvoice" class="btn theme-bg text-white">Create Shopping List</a>
                            <a href="#" onclick="playYoutubeVideo()" data-toggle="modal" data-target="#video" class="btn text-dark pl-sm-0"><span class="esli_vd"><i class="fa fa-play"></i></span>How It Works?</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="side_block extream_img">
                    <div class="list_crs_img">
                        <img src="assets/img/Carrots3D.png" class="img-fluid elsio cirl animate-fl-y" alt="" />
                        <img src="assets/img/Cattle3D.png" class="img-fluid elsio arrow animate-fl-x" alt="" />
                        <img src="assets/img/Grain3D.png" class="img-fluid elsio moon animate-fl-x" alt="" />
                    </div>
                    <img src="assets/img/Farmer1.png" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->
<!-- ================================ Tag Award ================================ -->

<section class="p-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="crp_box fl_color ovr_top">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="dro_140">
                                <div class="dro_141 de"><i class="fa fa-business-time"></i></div>
                                <div class="dro_142">
                                    <h6>Quick Delivery</h6>
                                    <p>Your packages are sorted and dispatched by your nearest local logistics businesses.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="dro_140">
                                <div class="dro_141 de"><i class="fa fa-star"></i></div>
                                <div class="dro_142">
                                    <h6>Quality Products</h6>
                                    <p>Order rare beverages, protiens, leaf, fruits and vegetables from any where in the world.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="dro_140">
                                <div class="dro_141 de"><i class="fa fa-cart-plus"></i></div>
                                <div class="dro_142">
                                    <h6>Online Market Place</h6>
                                    <p>The No.1 store where hospitals, restaurants, hotels and households shop for groceries.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ================================ Tag Award ================================ -->
<!-- ============================ Work Process Start ================================== -->
<section>
    <div class="container">

        <div class="row align-items-center justify-content-between mb-5">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="lmp_caption">
                    <h2 class="mb-3">
                        Resolving the Food distribution challenge in africa and globally
                    </h2>
                    <p>
                        In 2020  over 100 million Africans faced crisis, emergency, or catastrophic levels of food insecurity, an increase of more than 60% from the previous year.
                        In 2021, food insecurity is predicted to worsen much further.
                        As a result, the current distribution system's primary flaws are a lack of markets, inadequate transportation to markets,
                        and the inability to afford production and consumption prices. The number of markets and ways to access those markets in our existing food distribution
                        system is insufficient. Food Stuff Store provides the folowing services below to resolve food insecurity
                    </p>
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                <i class="fas fa-check"></i>
                            </div>
                            <h6 class="mb-0 ml-3">Global Market Space For Suppliers</h6>
                        </div>
                    </div>
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                <i class="fas fa-check"></i>
                            </div>
                            <h6 class="mb-0 ml-3">Serves As Middle Man For Farmers</h6>
                        </div>
                    </div>
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                <i class="fas fa-check"></i>
                            </div>
                            <h6 class="mb-0 ml-3">Facilitate The Procurement of Food Products</h6>
                        </div>
                    </div>
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                <i class="fas fa-check"></i>
                            </div>
                            <h6 class="mb-0 ml-3">Tracking And Traceability</h6>
                        </div>
                    </div>
                    <div class="text-left mt-4"><a href="{{ route('home.store') }}" class="btn btn-md text-light theme-bg">Store Front</a></div>
                </div>
            </div>

            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                <div class="lmp_thumb">
                    <img src="assets/img/FoodDistribution1.png" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-0">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="lmp_thumb">
                    <img src="assets/img/FoodDistribution2.png" class="img-fluid" alt="" />
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                <div class="lmp_caption">
                    <h2 class="mb-3">Invoicing</h2>
                    <p>Get an invoice as per your location and the kinds of food products you want delivered for your business or household.</p>
                    <ol class="list-unstyled p-0">
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">1</div>
                            </div>
                            <div class="ml-3 ml-md-4">
                                <h4>Visit Our Online Market Place</h4>
                                <p>
                                    Since you're already reading this, we assume you are on our website. To get started.
                                    Goto our <a href="{{ route('home.signin') }}"  style="color:#E10C2C;">Create Shopping List</a> page. You can also download our mobile application
                                    available on both the <a href="#" target="_blank" style="color:#E10C2C;">Apple Store</a> and the <a href="#" target="_blank" style="color:#E10C2C;">Play Store</a>.
                                </p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">2</div>
                            </div>
                            <div class="ml-3 ml-md-4">
                                <h4>Create A List</h4>
                                <p>
                                    Create a list of food products without having an account with Food Stuff Store. Our platform provides you with minimal yet suitable
                                    tools for creating a well detailed list of the food items you want. With our miminal {{ "interface" }} you can set the weight, color, size
                                    and price range of your listed items and we will see to it that we find the best deals available in the market to satisfy your list.
                                </p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">3</div>
                            </div>
                            <div class="ml-3 ml-md-4">
                                <h4>Clear Invoice</h4>
                                <p>
                                    Once we find and close with the best deal available we will get back to you as soon as we can via the email address and phone number you provided.
                                    Our invoicing is automated, so our response time ranges within 24-48 hours. You will receive all neccesary payment methods to clear your
                                    invoice via email and text message. Be adviced that your invoice may accrue more or less charges if suppliers are not willing to bend to
                                    our demands for you.
                                </p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">4</div>
                            </div>
                            <div class="ml-3 ml-md-4">
                                <h4>Receive Your Parcel</h4>
                                <p>
                                    We will send your parcel of food products to the address you provided before sending your list, Your parcel will arrive within 3-5days.
                                </p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>

    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Work Process End ================================== -->
<!-- ============================ Featured Categories Start ================================== -->
<section class="min gray">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h2>Most Favoured <span class="theme-cl">Categories</span></h2>
                    <p>
                        A variety of well curated raw and freshly preserved food products. Rare, popular and endermic to specific regions in the world.
                    </p>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <!-- Single Category -->
            @foreach($categories as $category)
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="crs_cate_wrap style_2">
                    <a href="{{ route('category.show', $category->Category) }}" class="crs_cate_box">
                        <div class="crs_cate_icon"><img src="assets/img/Category8.png" class="img-fluid" alt="" /></div>
                        <div class="crs_cate_caption"><span>{{ $category->Category }}</span></div>
                        <div class="crs_cate_count"><span>200+ Items</span></div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Featured Categories End ================================== -->
<!-- ============================ article Start ================================== -->
<section class="min">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h2>Must Read <span class="theme-cl">Article!</span></h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

                    @if (!$blogposts->isEmpty())
                    <div class="row">
                        @foreach ($blogposts as $data)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="blg_grid_box">
                                    <div class="blg_grid_thumb">
                                        <a href="{{ $data['Link'] }}" target="_blank"><img src="{{ $data['DisplayImage'] }}" class="img-fluid" alt="" /></a>
                                    </div>
                                    <div class="blg_grid_caption">
                                        <div class="blg_tag"><span>{{ $data['Category'] }}</span></div>
                                        <div class="blg_title"><h4><a href="{{ $data['Link'] }}" target="_blank">{{ $data['Header'] }}</a></h4></div>
                                        <div class="blg_desc"><p>{{ $data['Body'] }}</p></div>
                                    </div>
                                    <div class="crs_grid_foot">
                                        <div class="crs_flex">
                                            <div class="crs_fl_first">
                                                <div class="foot_list_info">
                                                    <ul>
                                                        <li>
                                                            <div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
                                                            <div class="elsio_tx">{{ $data['Source'] }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
                                                            <div class="elsio_tx">{{ $data['Date'] }}</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            <!-- Single Item -->


        </div>

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 mt-2">
                <div class="text-center">
                    <a asp-area=""  href="{{ route('home.blog') }}"  class="btn btn-md theme-bg-light theme-cl">Explore More</a>
                </div>
            </div>
        </div>

    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ article End ================================== -->
<!-- ============================ Download App ================================== -->
<section class="pb-0 gray">
    <div class="container">

        <div class="row align-items-center justify-content-between rounded m-0">
            <div class="col-lg-7 col-md-7">
                <div class="aps_crs_caption">
                    <h2 class="min_large mb-4">FoodStuff Store App</h2>
                    <p>
                        Have food products delivered to your door from thousands of local and national farmers and suppliers. Find
                        food products endermic to specific regions in the world, bring them to your city or town.
                        Negotiate deals with suppliers.
                        Track your orders in real time.
                    </p>
                    <div class="aps_buttons mt-4">
                        <a href="https://apps.apple.com/ng/app/foodstuffstore/id6475016761" class="btn_aps mr-4">
                            <div class="aps_wrapb theme-bg"><div class="aps_ico"><img src="assets/img/apple.png" class="img-fluid" alt="" /></div><div class="aps_capt"><span>Download On The</span><h4>App Store</h4></div></div>
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.foodstuff.store" target="_blank" class="btn_aps">
                            <div class="aps_wrapb"><div class="aps_ico"><img src="assets/img/google-play.png" class="img-fluid" alt="" /></div><div class="aps_capt"><span>Get It On</span><h4>Google Play</h4></div></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="aps_crs_img mt-5">
                    <img src="assets/img/MobileAppImg.png" class="img-fluid" alt="" />
                </div>
            </div>
        </div>

    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Download App ================================== -->
<!-- ============================ Call To Action ================================== -->
<section class="theme-bg call_action_wrap-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="call_action_wrap">
                    <div class="call_action_wrap-head">
                        <h3>Do You Have A Shopping List {{ "?" }} </h3>
                        <span>Based of your budget, we'll help you negotiate price with our suppliers and get back to you shortly.</span>
                    </div>
                    <a href={{route("home.signin")}} class="btn btn-call_action_wrap text-dark">Create Shopping List</a>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Call To Action End ================================== -->
<!-- Video Modal -->
<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="videomodal" aria-hidden="true" style="margin:auto;">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
        <div class="modal-content overli" id="loginmodal">
            <div class="modal-header">
                <h5 class="modal-title">Request Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form>
                        <iframe style="display:none; width:100%; height:300px" id="yt" src="https://www.youtube.com/embed/@ViewBag.howShoppingListsWorks" frameborder="0" allowfullscreen></iframe>
                    </form>
                </div>
            </div>
            <div class="crs_log__footer d-flex justify-content-between mt-0">
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    function playYoutubeVideo() {
        $("#content").hide();
        $("#yt")[0].src += "?autoplay=1";
        setTimeout(function () { $("#yt").show(); }, 200);
    }
</script>

@endsection
