<div class="header header-transparent dark-text">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="#">
                    <img src="assets/img/FSSLOGO1.png" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        {{--  @{
                            if (ViewBag.uuid != "")
                            {  --}}
                            @auth
                                <li>
                                    <a href="#" class="alio_green" data-toggle="modal" title="Sign Out" data-target="#logout">
                                        <i class="fas fa-sign-out-alt mr-1"></i>
                                    </a>
                                </li>
                            {{--  }
                            else
                            {  --}}
                            @else
                                <li>
                                    <a href="#" class="alio_green" data-toggle="modal" data-target="#login">
                                        <i class="fas fa-sign-in-alt mr-1 mt-1"></i>Sign In
                                    </a>
                                </li>
                        @endif
                        {{--  @{
                            if (ViewBag.uuid != "")
                            {  --}}
                            @auth
                                {{--  int i = ViewBag.cartItemCount;

                                if (i < 1)
                                {  --}}
                                @if(1===0)
                                    <li>
                                        <a asp-area="" asp-controller="Home" asp-action="Cart" class="crs_yuo12">
                                            <span class="embos_45"><i class="fas fa-shopping-basket"></i></span>
                                        </a>
                                    </li>
                                {{--  }
                                else
                                {  --}}
                                @else
                                    <li>
                                        <a asp-area="" asp-controller="Home" asp-action="Cart" class="crs_yuo12">
                                            <span class="embos_45">
                                                <i class="fas fa-shopping-basket"></i><i class="embose_count">
                                                    <input id="cartItemCount" type="number" style="width:18px; text-align:center; height:20px; background-color:transparent; border:none; color:white;" value="@ViewBag.cartItemCount" disabled />
                                                </i>
                                            </span>
                                        </a>
                                    </li>
                             @endif
                        @endauth
                        <li>
                            <a href="{{ route('home.store') }}" asp-area="" asp-controller="Home" asp-action="Store" class="crs_yuo12 w-auto text-white theme-bg">
                                <span class="embos_45">Store</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">


                    {{--  @{
                        if (ViewBag.corePageLink == "Welcome")
                        {  --}}
                        @if(true)
                            <li class="active">
                                <a asp-area="" asp-controller="Home" asp-action="Welcome">Welcome</a>
                            </li>
                        {{--  }
                        else
                        {  --}}
                        @else
                            <li>
                                <a asp-area="" asp-controller="Home" asp-action="Welcome">Welcome</a>
                            </li>
                   @endif
                    {{--  }
                    @{
                        if (ViewBag.corePageLink == "Store")
                        {  --}}
                        @if(false)
                            <li class="active">
                                <a asp-area="" href="{{ route('home.store') }}" asp-controller="Home" asp-action="StoreReset">Store</a>
                            </li>
                       @else
                            <li>
                                <a asp-area="" href="{{ route('home.store') }}" asp-controller="Home" asp-action="StoreReset">Store</a>
                            </li>
                      @endif

                    {{--  @{
                        if (ViewBag.corePageLink == "RequestInvoice")
                        {  --}}
                        @if(false)
                            <li class="active">
                                <a asp-area="" asp-controller="Home" asp-action="RequestInvoice">Create Shopping List</a>
                            </li>
                      @else
                            <li>
                                <a asp-area="" asp-controller="Home" asp-action="RequestInvoice">Create Shopping List</a>
                            </li>
                      @endif

                    {{--  @{
                        if (ViewBag.corePageLink == "LogisticsAndDistribution" || ViewBag.corePageLink == "OurApps" || ViewBag.corePageLink == "BuyNowPayLater" || ViewBag.corePageLink == "AffiliateProgram")
                        {  --}}
                        @if(1==0)
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
                    @else
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
                  @endif

                    {{--  @{
                        if (ViewBag.corePageLink == "OurStory" || ViewBag.corePageLink == "Blog" || ViewBag.corePageLink == "HelpCenter" || ViewBag.corePageLink == "TermsAndConditions" || ViewBag.corePageLink == "PrivacyPolicy" || ViewBag.corePageLink == "RefundPolicy" || ViewBag.corePageLink == "CookiePolicy" || ViewBag.corePageLink == "ShippingPolicy" || ViewBag.corePageLink == "EULA")
                        {  --}}
                        @if(false)
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
                       @else
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
                     @endif

                    {{--  @{
                        if (ViewBag.corePageLink == "Contact")
                        {  --}}
                        @if(false)
                            <li class="active">
                                <a asp-area="" asp-controller="Home" asp-action="Contact">Say Hello</a>
                            </li>
                      @else
                            <li>
                                <a asp-area="" asp-controller="Home" asp-action="Contact">Say Hello</a>
                            </li>
                    @endif

                    {{--  @{
                        if (ViewBag.uuid != "")
                        {  --}}

                        @auth
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
                                            {{--  @{
                                                if (ViewBag.accountType == "Regular")
                                                {  --}}
                                                @if(1==0)
                                                    <li><a asp-area="" asp-controller="Home" asp-action="ChangePassword">Change Password</a></li>
                                             @endif

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
                   @endauth
                </ul>




                <ul class="nav-menu nav-menu-social align-to-right">
                    {{--  @{
                        if (ViewBag.uuid != "")
                        {  --}}
                        @auth
                            {{--  int i = ViewBag.cartItemCount;

                            if (i < 1)
                            {  --}}
                            @if(1==0)
                                <li>
                                    <a asp-area="" asp-controller="Home" asp-action="Cart" class="crs_yuo12">
                                        <span class="embos_45"><i class="fas fa-shopping-basket"></i></span>
                                    </a>
                                </li>
                           @else
                                <li>
                                    <a asp-area="" asp-controller="Home" asp-action="Cart" class="crs_yuo12">
                                        <span class="embos_45">
                                            <i class="fas fa-shopping-basket"></i><i id="cartCount" class="embose_count">
                                                <input id="cartItemCount" disabled type="text" style="width: 18px; height: 20px; text-align: center; background-color: transparent; border: none; color: white;" value="@ViewBag.cartItemCount" />
                                            </i>
                                        </span>
                                    </a>
                                </li>
                         @endif
                    @endauth

                    {{--  @{
                        if (ViewBag.uuid != "")
                        {  --}}
                        @auth
                            <li>
                                <a href="#" class="alio_green" data-toggle="modal" data-target="#logout">
                                    <i class="fas fa-sign-out-alt mr-1"></i><span class="dn-lg">Sign Out</span>
                                </a>
                            </li>
                       @else
                            <li>
                                <a href="#" class="alio_green" data-toggle="modal" data-target="#login">
                                    <i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
                                </a>
                            </li>
                    @endauth
                    <li class="add-listing theme-bg">
                        <a asp-area="" asp-controller="Home" asp-action="StoreReset" class="text-white">Store</a>
                    </li>
                </ul>



            </div>
        </nav>
    </div>
{{--  @if(ViewBag.isErrorPage != "true"){  --}}
        {{--  @if (ViewData["Title"].ToString() == "Store")
        {  --}}
        @if(false)
            @if(false)
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    {{--  @using (Html.BeginForm("SearchFoodStuffs", "Home", FormMethod.Post))  --}}
                    {{--  {  --}}
                        <form method="post">
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
                                            @php
                                                $data = [
                                                    ['label' => 'All Category', 'value' => 'All'],
                                                    ['label' => 'Vegetable', 'value' => 'Vegetable'],
                                                    ['label' => 'Proteins', 'value' => 'Protein'],
                                                    ['label' => 'Seasoning', 'value' => 'Seasoning'],
                                                    ['label' => 'Fruits', 'value' => 'Fruit'],
                                                    ['label' => 'Grains', 'value' => 'Grains'],
                                                    ['label' => 'Nuts', 'value' => 'Nuts'],
                                                    ['label' => 'Processed Food', 'value' => 'Processed'],
                                                    ['label' => 'Fluids', 'value' => 'Fluids'],
                                                    ['label' => 'Live Stock', 'value' => 'Live Stock'],
                                                    ['label' => 'Seeds', 'value' => 'Seeds'],
                                                ];
                                                @endphp


                                                @foreach ($list as $data)
                                                    @if ($data['value'] == $selectedCategory)
                                                        <option value="{{ $data['value'] }}" selected>{{ $data['label'] }}</option>
                                                    @else
                                                        <option value="{{ $data['value'] }}">{{ $data['label'] }}</option>
                                                    @endif
                                                @endforeach

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
                    </form>
                </nav>
            </div>
      @endif
    @endif


</div>
