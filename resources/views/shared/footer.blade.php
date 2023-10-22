<footer class="dark-footer skin-dark-footer style-2">
    <div class="footer-middle">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-5">
                    <div class="footer_widget">
                        <a asp-area="" asp-controller="Home" asp-action="Welcome">
                            <img src="{{ asset('assets/img/FSSLOGO3.png') }}" class="img-footer small mb-2" alt="" />
                        </a>
                        <h4 class="extream mb-3">Do you need help with<br>anything?</h4>
                        <p>Receive updates, hot deals, tutorials, discounts sent straignt in your inbox every month for free. You can unsubscribe anytime.</p>
                        {{--  @using (Html.BeginForm("SubscribeClientToNewsletters", "Home", FormMethod.Post))  --}}
                        {{--  {  --}}
                            {{--  SubscribeClientToNewsletters  --}}
                            <form method="post">
                            <div class="foot-news-last">
                                <div class="input-group">
                                    <input type="email" class="form-control" name="Email" placeholder="Email address" required>
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text theme-bg b-0 text-light">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                            </form>

                        {{--  }  --}}
                    </div>
                </div>

                <div class="col-lg-6 col-md-7 ml-auto">
                    <div class="row">

                        <div class="col-lg-4 col-md-4">
                            <div class="footer_widget">
                                <h4 class="widget_title">Company</h4>
                                <ul class="footer-menu">
                                    <li><a asp-area="" asp-controller="Home" asp-action="Welcome">Welcome</a></li>
                                    <li><a asp-area="" asp-controller="Home" asp-action="OurStory">Our Story</a></li>
                                    <li><a asp-area="" asp-controller="Home" asp-action="OurApps">Career Enroll</a></li>
                                   @auth
                                            <li><a asp-area="" asp-controller="Home" asp-action="Activities">Activity</a></li>

                                        @else

                                            <li><a asp-area="" asp-controller="Home" asp-action="SignUp">Sign Up</a></li>

                                    @endauth
                                    <li><a asp-area="" asp-controller="Home" asp-action="HelpCenter">Help Center</a></li>
                                    <li><a asp-area="" asp-controller="Home" asp-action="Contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="footer_widget">
                                <h4 class="widget_title">Services</h4>
                                <ul class="footer-menu">
                                    <li><a asp-area="" asp-controller="Home" asp-action="RequestInvoice">Create Shopping List<span class="new">New</span></a></li>
                                    <!-- <li><a asp-area="" asp-controller="Home" asp-action="StoreDistribution">Store Distribution</a></li> -->
                                    <li><a asp-area="" asp-controller="Home" asp-action="OurApps">Logistics and Distribution</a></li>
                                    <li><a asp-area="" asp-controller="Home" asp-action="BuyNowPayLater">Buy Now Pay Later<span class="new">New</span></a></li>
                                    <li><a href="#" target="_blank">Download Android App</a></li>
                                    <li><a href="#" target="_blank">Download IOS App</a></li>
                                    <li><a href="#">Affiliate Program</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="footer_widget">
                                <h4 class="widget_title">Legal</h4>
                                <ul class="footer-menu">
                                    <li><a asp-area="" asp-controller="Home" asp-action="TermsAndConditions">Terms And Conditions</a></li>
                                    <li><a asp-area="" asp-controller="Home" asp-action="PrivacyPolicy">Privacy Policy</a></li>
                                    <li><a asp-area="" asp-controller="Home" asp-action="RefundPolicy">Return & Refund Policy</a></li>
                                    <li><a asp-area="" asp-controller="Home" asp-action="CookiePolicy">Cookie Policy</a></li>
                                    <li><a asp-area="" asp-controller="Home" asp-action="ShippingPolicy">Shipping Policy</a></li>
                                    <li><a asp-area="" asp-controller="Home" asp-action="EULA">EULA<span class="update">Update</span></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> FoodStuff Store. All Rights Reserved - RC18310280.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
