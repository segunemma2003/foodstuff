@{
    ViewData["Title"] = ViewBag.corePageName;
}
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Last Purchase</h1>
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
<!-- ============================ Page Title End ================================================ -->
<!-- ============================ Last Purchase Starts ================================== -->
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

        <div class="row">

			<div class="col-lg-12 col-md-12">
				<!-- Total Items -->
				<div class="card style-2">
					<div class="card-header">
						<h4 class="mb-0">Last Purchase</h4>
					</div>
					<div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    @{
                                        if (Model.LastPurchase != null)
                                        {
                                            int i = 0;
                                            foreach (var Data in Model.LastPurchase)
                                            {
                                                i++;
                                            }

                                            if (i > 0)
                                            {
                                                <table class="table table-striped wishlist">
                                                    <tbody>
                                                        @{
                                                            int count = 0;
                                                            foreach (var Data in Model.LastPurchase)
                                                            {
                                                                count++;
                                                                <tr>
                                                                    <td>@count.</td>
                                                                    <td><div class="tb_course_thumb"><img src="@Data.Image" class="img-fluid" alt="" /></div></td>
                                                                    <th>
                                                                        @Data.Name
                                                                    </th>
                                                                    <td><span class="wish_price theme-cl">₦@Data.Price</span></td>
                                                                    <td>
                                                                        @using (Html.BeginForm("AddToCart", "Home", FormMethod.Post))
                                                                        {
                                                                            <input type="text" name="ProductID" value="@Data.ProductID" hidden />
                                                                            <button type="submit" class="btn btn-md full-width theme-bg text-white">Add To Cart</button>
                                                                        }
                                                                    </td>
                                                                </tr>
                                                            }
                                                        }

                                                    </tbody>
                                                </table>
                                            }
                                            else
                                            {
                                                <div class="row justify-content-center">

                                                    <div class="col-lg-6 col-md-10">
                                                        <div class="text-center">

                                                            <img src="~/assets/img/NotFound.png" style="width:50%;" class="img-fluid" alt="" />
                                                            <br /><br />
                                                            <h4>
                                                                Your have no shopping saga with us, return to store now.
                                                            </h4>
                                                            <br />
                                                            <a asp-area="" asp-controller="Home" asp-action="Store" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            }
                                        }
                                        else
                                        {
                                            <div class="row justify-content-center">

                                                <div class="col-lg-6 col-md-10">
                                                    <div class="text-center">

                                                        <img src="~/assets/img/NotFound.png" style="width:50%;" class="img-fluid" alt="" />
                                                        <br /><br />
                                                        <h4>
                                                            Your have no shopping saga with us, return to store now.
                                                        </h4>
                                                        <br />
                                                        <a asp-area="" asp-controller="Home" asp-action="Store" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
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

        
    </div>
</section>
<!-- ============================ Last Purchase Ends ================================== -->