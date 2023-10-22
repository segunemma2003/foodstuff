@{
    ViewData["Title"] = ViewBag.corePageName;
}

<!-- ============================================================== -->
<section class="error-wrap" style="margin-top:40px;">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-10">
                <div class="text-center">

                    <img src="~/assets/img/404.png" class="img-fluid" alt="" />
                    <p>
                        The page you're searching for does not exist. It may have been deleted, renamed, or is temporarily unavailable.
                    </p>
                    <a asp-area="" asp-controller="Home" asp-action="Welcome" class="btn theme-bg text-white">Back To Home</a>

                </div>
            </div>

        </div>
    </div>
</section>