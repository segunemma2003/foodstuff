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
                                        <button class="input-group-text theme-bg b-0 text-light">Subscribe</button>
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
                                    <li><a asp-area="" href={{route("home.index")}}>Welcome</a></li>
                                    <li><a asp-area="" href={{route("home.ourstory")}}>Our Story</a></li>
                                    <li><a asp-area="" href={{route("home.ourapp")}}>Career Enroll</a></li>
                                   @auth
                                            <li><a href={{route("home.activities")}}>Activity</a></li>

                                        @else

                                            <li><a href={{route("home.signup")}}>Sign Up</a></li>

                                    @endauth
                                    <li><a href={{route("home.help_center")}}>Help Center</a></li>
                                    <li><a href={{route("home.contact")}}>Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="footer_widget">
                                <h4 class="widget_title">Services</h4>
                                <ul class="footer-menu">
                                    <li><a href={{route("home.signin")}}>Create Shopping List<span class="new">New</span></a></li>
                                    <!-- <li><a asp-area="" asp-controller="Home" asp-action="StoreDistribution">Store Distribution</a></li> -->
                                    <li><a href={{route("home.ourapp")}}>Logistics and Distribution</a></li>
                                    <li><a href={{route("home.buynow")}}>Buy Now Pay Later<span class="new">New</span></a></li>
                                    <li><a href="https://play.google.com/store/apps/details?id=com.foodstuff.store">Download Android App</a></li>
                                    <li><a href="https://apps.apple.com/ng/app/foodstuffstore/id6475016761" target="_blank">Download IOS App</a></li>
                                    <li><a  href={{route("home.affiliate")}}>Affiliate Program</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="footer_widget">
                                <h4 class="widget_title">Legal</h4>
                                <ul class="footer-menu">
                                    <li><a  href={{route("home.terms")}}>Terms And Conditions</a></li>
                                    <li><a  href={{route("home.privacy")}}>Privacy Policy</a></li>
                                    <li><a  href={{route("home.refund")}}>Return & Refund Policy</a></li>
                                    <li><a href={{route("home.cookie")}} >Cookie Policy</a></li>
                                    <li><a href={{route("home.shippingpolicy")}}>Shipping Policy</a></li>
                                    <li><a href={{route("home.eula")}} >EULA<span class="update">Update</span></a></li>
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
