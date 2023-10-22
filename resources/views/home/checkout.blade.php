@using foodstuffstore.Functions;
@{
    ViewData["Title"] = ViewBag.corePageName;
}

<style>
    #paystack-button {
        cursor: pointer;
        position: relative;
        background-color: #23A6DA;
        color: #fff;
        max-width: 30%;
        padding: 10px;
        font-weight: 600;
        font-size: 14px;
        border-radius: 10px;
        border: none;
        transition: all .1s ease-in;
    }

    #flutterwave-button {
        cursor: pointer;
        position: relative;
        background-color: #FB9C1D;
        color: #303030;
        max-width: 30%;
        padding: 10px;
        font-weight: 600;
        font-size: 14px;
        border-radius: 10px;
        border: none;
        transition: all .1s ease-in;
    }
</style>
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">
                        Checkout
                    </h1>
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
<!-- ============================ Page Title End ================================== -->
<!-- ============================ Checkout ================================== -->
<section class="gray-simple">

    <div class="container">
        <br />
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
        <!-- row Start -->
        <div class="row frm_submit_block">
            <div class="col-lg-8 col-md-12 col-sm-12">

                <div class="panel-group pay_opy980" id="payaccordion">
                    <!-- Default PickUp Address -->
                    <div class="panel panel-default border">
                        <div class="panel-heading" id="pay">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#" aria-expanded="true" aria-controls="payPal" class="">
                                    Delivery Address
                                </a>
                            </h4>
                            <p class="">
                                @ViewBag.defaultPickUpAddress
                            </p>
                            <a asp-area="" asp-controller="Home" asp-action="ManageAddresses" style="color:#E10C2C;">Change address</a>
                        </div>
                    </div>
                </div>

                <div class="submit-page mb-4">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="a-2" class="checkbox-custom-label">Select a payment method below</label>
                            </div>
                        </div>

                    </div>
                    <!--/row -->
                </div>

                <div class="panel-group pay_opy980" id="payaccordion">

                    <!-- Pay By Account Balance -->
                    <div class="panel panel-default border">
                        <div class="panel-heading" id="pay">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#accountbalance" aria-expanded="true" aria-controls="payPal" class="">Pay With Account Balance<img src="assets/img/paypal.png" class="img-fluid" alt=""></a>
                            </h4>
                        </div>
                        <div id="accountbalance" class="panel-collapse collapse show" aria-labelledby="pay" data-parent="#payaccordion">
                            <div class="panel-body">
                                <form>
                                    <div class="form-group">
                                        @{
                                            if (!ValueHelper.IsNullOrEmptyOrAllSpaces(ViewBag.credit) && ValueHelper.ISADecimal(ViewBag.credit))
                                            {
                                                string formattedBalance = ValueHelper.BalanceFormatter("₦", double.Parse(ViewBag.credit));

                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-5">
                                                    <div class="foot-news-last">
                                                        <label>Account Balance</label>
                                                        <div class="input-group">
                                                            <h4>
                                                                @formattedBalance
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            }
                                        }
                                    </div>
                                    <div class="form-group">
                                        <a href="@ViewBag.accountBalancePaymentLink" class="btn btn-md full-width theme-bg text-white">Pay</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 col-sm-12 mt-5">

                            <div class="crp_box fl_color ovr_top">
                                <div class="row align-items-center">

                                    @{
                                        if (ViewBag.usePaystackPG.ToString() == "true")
                                        {
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-3">
                                                <!-- Pay By Paystack -->
                                                <form id="paymentForm">
                                                    <input type="number" value="@ViewBag.total" class="form-control" id="amount" hidden required />
                                                    <input type="hidden" id="email" value="@ViewBag.memberEmail" />
                                                    <input type="hidden" name="accountType" value="@ViewBag.accountType" />
                                                    <input type="text" id="first-name" value="@ViewBag.username" hidden />
                                                    <input type="text" id="last-name" value="" hidden />


                                                    <div class="dro_140">
                                                        <div class="dro_141">
                                                            <img src="~/assets/img/PaystackLogo2.png" width="30" height="30" alt="Paystack brand logo">
                                                        </div>
                                                        <div class="dro_142">
                                                            <h6>Pay with Paystack</h6>
                                                        </div>
                                                        <div class="dro_142">
                                                        </div>
                                                        <button type="submit" onclick="payWithPaystack()" id="paystack-button">Pay</button>
                                                    </div>

                                                </form>
                                            </div>
                                        }
                                    }

                                    @{
                                        if (ViewBag.useSwipePG.ToString() == "true")
                                        {
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-3">
                                            <p>It Shows</p>
                                                <!-- Pay By Flutterwave -->
                                                <swipe-pay-widget merchant-id="999612213216313344"
                                                              pay-amount='@ViewBag.total'
                                                              fallback-url='https://app.swipe.ng/'></swipe-pay-widget>

                                                
                                            </div>
                                        }
                                    }
                                    
                                    @{
                                        if (ViewBag.useFlutterwavePG.ToString() == "true")
                                        {
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-3">
                                                <!-- Pay By Flutterwave -->
                                                <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                                                    <input type="number" value="@ViewBag.total" class="form-control" name="amount" hidden required />
                                                    <input type="hidden" name="public_key" value="FLWPUBK_TEST-bc53d85035a42cf5e6a708a256678ccf-X" />
                                                    <input type="hidden" name="customer[email]" value="@ViewBag.memberEmail" />
                                                    <input type="hidden" name="customer[name]" value="@ViewBag.username" />
                                                    <input type="hidden" name="tx_ref" value="bitethtx-019203" />

                                                    <input type="hidden" name="currency" value="NGN" />
                                                    <input type="hidden" name="meta[token]" value="54" />
                                                    <input type="hidden" name="redirect_url" id="redirectURL" value="@ViewBag.flutterwaveRedirectURL" />


                                                    <div class="dro_140">
                                                        <div class="dro_141">
                                                            <img src="~/assets/img/FlutterwaveLogo2.png" width="35" height="30" alt="Flutterwave brand logo">
                                                        </div>
                                                        <div class="dro_142">
                                                            <h6>Pay with Flutterwave</h6>
                                                        </div>
                                                        <div class="dro_142">
                                                        </div>
                                                        <button type="submit" id="flutterwave-button">Pay</button>
                                                    </div>

                                                </form>
                                            </div>
                                        }
                                    }

                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <!-- Col-lg 4 -->
            <div class="col-lg-4 col-md-12 col-sm-12">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3>Your Order</h3>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pro_product_wrap">
                        <h5>Premium</h5>
                        <ul>
                            <li><strong>Total Items</strong>@ViewBag.cartItemCount</li>
                            <li><strong>Subtotal</strong>₦@ViewBag.cartTotal</li>
                            <li><strong>Tax</strong>@ViewBag.shippingCost%</li>
                            <li>
                                <strong>Total</strong>@{
                                    double total = double.Parse((ViewBag.cartTotal).ToString()) + (double.Parse((ViewBag.cartTotal).ToString()) * (double.Parse((ViewBag.shippingCost).ToString()) / 100));
                                    string total2 = ValueHelper.BalanceFormatter("₦", total);
                                    @total2
                                }
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    @using (Html.BeginForm("JumpToHome", "Home", FormMethod.Post))
                    {
                        <button type="submit" style="color:#E10C2C; background-color:transparent; border:none;"><span> ← </span>Continue Shopping</button>
                    }
                </div>

            </div>
            <!-- /col-lg-4 -->
        </div>
        <!-- /row -->

    </div>

</section>
<!-- ============================ Checkout End ================================== -->
@*Script 1 for Paystack payment*@
<script src="https://js.paystack.co/v1/inline.js"></script>
@*Script 2 for Paystack payment*@
<script>const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);
    function payWithPaystack(e) {
        e.preventDefault();
        let handler = PaystackPop.setup({
            key: '@ViewBag.paystackPublicKey', // Replace with your public key
            email: document.getElementById("email").value,
            amount: document.getElementById("amount").value * 100,
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function () {
                alert('Payment canceled.');
            },
            callback: function (response) {
                let ourReference = response.reference;
                let ourMessage = response.message;
                let ourStatus = response.status;

                if (ourMessage == "Approved" && ourStatus == "success") {
                    var eml = document.getElementById("email").value
                    var topupamount = document.getElementById("amount").value
                    /**/
                    window.location.href = "https://foodstuff.store/Home/Checkout?Email=" + eml + "&topup=" + topupamount + "&paymentmethod=Paystack&status=success&transaction_id=" + ourReference + "";
                    /**/
                }
            }
        });
        handler.openIframe();
    }</script>

<script src="https://cdn.jsdelivr.net/npm/swipe-pay@2.0.1"></script>
<script type="text/javascript" src="swipe-pay-widget.js"></script>