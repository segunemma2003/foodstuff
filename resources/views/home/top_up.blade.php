@using foodstuffstore.Functions;
@model dynamic

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
                    <h1 class="breadcrumb-title">Top Up</h1>
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
<!-- ============================ Top Up ================================== -->
<section class="pt-0">
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
        <div class="row justify-content-center">
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

            <br />

            <div class="col-lg-12 col-md-12 col-sm-12 mt-5">

                <div class="crp_box fl_color ovr_top">
                    <div class="row align-items-center">

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mt-3">
                            <form id="paymentForm">
                                <div>
                                    <input type="number" placeholder="Enter an amount" class="form-control" id="amount" value="" required />
                                </div>
                                <input type="hidden" id="email" value="@ViewBag.memberEmail" />
                                <input type="hidden" name="accountType" value="@ViewBag.memberEmail" />
                                <input type="text" id="first-name" value="Jack" hidden />
                                <input type="text" id="last-name" value="Richardson" hidden />


                                <div class="dro_140">
                                    <div class="dro_141">
                                        <img src="~/assets/img/PaystackLogo2.png" width="30" height="30" alt="Paystack brand logo">
                                    </div>
                                    <div class="dro_142">
                                        <h6>TopUp with Paystack</h6>
                                    </div>
                                    <button type="submit" onclick="payWithPaystack()" id="paystack-button">Top Up</button>
                                </div>

                            </form>
                        </div>

                        @{
                            if (ViewBag.useFlutterwavePG.ToString() == "true")
                            {
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mt-3">
                                    <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                                        <div>
                                            <input type="number" placeholder="Enter an amount" class="form-control" name="amount" value="" required />
                                        </div>
                                        <input type="hidden" name="public_key" value="FLWPUBK_TEST-bc53d85035a42cf5e6a708a256678ccf-X" />
                                        <input type="hidden" name="customer[email]" value="@ViewBag.memberEmail" />
                                        <input type="hidden" name="customer[name]" value="@ViewBag.username" />
                                        <input type="hidden" name="tx_ref" value="bitethtx-019203" />

                                        <input type="hidden" name="currency" value="NGN" />
                                        <input type="hidden" name="meta[token]" value="54" />
                                        <input type="hidden" name="redirect_url" id="redirectURL" value="" />


                                        <div class="dro_140">
                                            <div class="dro_141">
                                                <img src="~/assets/img/FlutterwaveLogo2.png" width="35" height="30" alt="Flutterwave brand logo">
                                            </div>
                                            <div class="dro_142">
                                                <h6>TopUp with Flutterwave</h6>
                                            </div>
                                            <button type="submit" id="flutterwave-button">Top Up</button>
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
</section>
<!-- ============================ Top Up End ================================== -->
<hr style="border-top:2px dashed #bbb;" />
<!-- ============================ Recent Transactions ================================== -->
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading center">
                    <h2>Recent <span class="theme-cl">Transactions</span> Below</h2>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="dashboard_wrap">

                    <div class="row pt-4">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                            <div class="table-responsive">


                                @{
                                    if (Model != null)
                                    {
                                        int i = 0;
                                        foreach (var Data in Model)
                                        {
                                            i++;
                                        }

                                        if (i > 0)
                                        {

                                            <table class="table dash_list">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Transaction</th>
                                                        <th scope="col">Date</th>
                                                    </tr>
                                                </thead>

                                                @{
                                                    int count = 0;
                                                    foreach (var Data in Model)
                                                    {
                                                        count++;
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">@count.</th>
                                                                <td><div class="smalls lg">@Data.Message</div></td>
                                                                <td><div class="dhs_tags">@Data.ServerDateTime</div></td>
                                                            </tr>
                                                        </tbody>

                                                    }
                                                }
                                            </table>
                                        }
                                        else
                                        {
                                            <div class="row justify-content-center">

                                                <div class="col-lg-6 col-md-10">
                                                    <div class="text-center">

                                                        <img src="~/assets/img/EmptyActivity.png" style="width:50%;" class="img-fluid" alt="" />
                                                        <br /><br />
                                                        <h4>
                                                            Nothing to see here, view other activities.
                                                        </h4>
                                                        <br />
                                                        <a asp-area="" asp-controller="Home" asp-action="Activities" class="btn btn-md full-width theme-bg text-white">View Other Activities</a>
                                                    </div>
                                                </div>

                                            </div>
                                        }
                                    }
                                    else
                                    {
                                        <div class="row justify-content-center">
                                            <div></div>
                                            <div class="col-lg-6 col-md-10">
                                                <div class="text-center">

                                                    <img src="~/assets/img/EmptyActivity.png" style="width:50%;" class="img-fluid" alt="" />
                                                    <br /><br />
                                                    <h4>
                                                        Nothing to see here, view other activities.
                                                    </h4>
                                                    <br />
                                                    <a asp-area="" asp-controller="Home" asp-action="Activities" class="btn btn-md full-width theme-bg text-white">View Other Activities</a>
                                                </div>
                                            </div>

                                        </div>
                                    }
                                }
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Recent Transactions End================================== -->
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
                    window.location.href = "https://foodstuff.store/Home/TopUp?Email=" + eml + "&topup=" + topupamount + "&paymentmethod=Paystack&status=success&transaction_id=" + ourReference + "";
    /**/
}
}
});
handler.openIframe();
}</script>
@*Script for Flutterwave payment*@
<script>
    /* event listener */
    document.getElementsByName("amount")[0].addEventListener('change', doThing);

    var eml = document.getElementById("email").value
    /* function */
    function doThing() {
        document.getElementById("redirectURL").value = "https://foodstuff.store/Home/TopUp?Email=" + eml + "&topup=" + this.value + "&paymentmethod=Flutterwave";
        @*alert('Horray! Someone wrote "' +  + '"!');*@
    }
</script>