@{
    ViewData["Title"] = ViewBag.corePageName;
}
<!-- ============================ Success ================================== -->
<br />
<br />
<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading center">
                    <div class="succ_121"><i class="fas fa-thumbs-up"></i></div>
                    <h4 class="mt-4">Thank you for your order</h4>
                    <p>
                        We will keep you posted via email and app notification. You can monitor your orders by visiting the activity page from the menu on the home page.
                    </p>
                    <div class="pt-3 pb-3">
                        <a asp-area="" asp-controller="Home" asp-action="Store" class="btn theme-bg text-white">Return To Store</a>
                    </div>
                    <a asp-area="" asp-controller="Home" asp-action="Activities" style="color:#E10C2C;">No, take me to my activities.</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Success ================================== -->
