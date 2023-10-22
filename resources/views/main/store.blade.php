@extends('shared.layout')
@section('Title', "Store")
@section('content')

br />

<!-- ============================ Store Items ================================== -->
<section class="gray mt-5">
    <div class="container">

        <div class="row justify-content-center">
            @{
            if (Model.FoodStuffs != null)
            {
            int i = 0;
            foreach (var Data in Model.FoodStuffs)
            {
            i++;
            }

            if (i > 0)
            {
            foreach (var Data in Model.FoodStuffs)
            {
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                <div class="crs_grid shadow_none brd">
                    <div class="crs_grid_thumb">
                        <a href="#" data-toggle="modal" data-target="#desc_@Data.ID" class="crs_detail_link">

                            <img src="@Data.Image" class="img-fluid rounded" style="background-color: #F7F8F9;"
                                alt="@Data.Name" />
                        </a>
                        <div class="crs_video_ico">
                            @{
                            if (ViewBag.uuid != "")
                            {
                            <button type="button" onclick="SubmitLikeForm('@Data.ProductID')"
                                style="background-color:transparent; border:none;">
                                <i class="fa fa-heart"></i>
                            </button>
                            }
                            else
                            {
                            <a href="#" data-toggle="modal" data-target="#login">
                                <i class="fa fa-heart"></i>
                            </a>
                            }
                            }
                        </div>
                    </div>
                    <div class="crs_grid_caption">
                        <div class="crs_title">
                            <h6>
                                <a href="#" data-toggle="modal" data-target="#desc_@Data.ID" class="crs_title_link">
                                    @Data.Name
                                </a>
                            </h6>
                        </div>
                        <div class="crs_info_detail">
                            <ul>
                                <li>
                                    <div class="crs_fl_last">
                                        <div class="crs_price">
                                            <h4><span class="currency">₦</span><span class="theme-cl">@Data.Price</span>
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="preview_crs_info">
                            <input name="IDLabel" value="@Data.ID" hidden />
                            @{
                            if (ViewBag.uuid != "")
                            {
                            <button type="button" onclick="SubmitCartForm('@Data.ProductID')"
                                class="btn btn-md full-width theme-bg text-white">
                                <i class="fas fa-shopping-basket"></i>
                            </button>
                            }
                            else
                            {
                            <a href="#" data-toggle="modal" data-target="#login"
                                class="btn btn-md full-width theme-bg text-white" style="text-align:center;">
                                <i class="fas fa-shopping-basket"></i>
                            </a>
                            }
                            }
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Modal -->
            <div class="modal fade" id="desc_@Data.ID" tabindex="-1" role="dialog" aria-labelledby="loginoutmodal"
                aria-hidden="true">
                <div class="modal-dialog modal-xl login-pop-form" role="document">
                    <div class="modal-content overli" id="loginmodal">
                        <div class="modal-header">
                            <h5 class="modal-title">Product Description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="login-form">
                                <div class="rcs_log_125 pt-2 pb-3">
                                    <img src="@Data.Image" class="img-fluid rounded"
                                        style="background-color: #F7F8F9;" />
                                </div>
                                <div class="crs_grid_caption">
                                    <div class="crs_title">
                                        <h6>
                                            <a href="#" data-toggle="modal" data-target="#desc_@Data.ID"
                                                class="crs_title_link">
                                                @Data.Name
                                            </a>
                                        </h6>
                                    </div>
                                    <div class="crs_info_detail">
                                        <ul>
                                            <li>
                                                <div class="crs_fl_last">
                                                    <div class="crs_price">
                                                        <h4><span class="currency">₦</span><span
                                                                class="theme-cl">@Data.Price</span></h4>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="crs_title">
                                        <div class="property_block_wrap_header">
                                            <ul class="nav nav-tabs customize-tab tabs_creative col-12" id="myTab"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="general-tab" data-toggle="tab"
                                                        href="#general_@Data.ID" role="tab" aria-controls="general"
                                                        aria-selected="true">Description</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" id="payment-tab" data-toggle="tab"
                                                        href="#payment_@Data.ID" role="tab" aria-controls="payment"
                                                        aria-selected="false">More</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" id="upgrade-tab" data-toggle="tab"
                                                        href="#upgrade_@Data.ID" role="tab" aria-controls="upgrade"
                                                        aria-selected="false">Reviews</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="crs_title">
                                        <div class="tab-content tabs_content_creative" id="myTabContent">

                                            <!-- general Query -->
                                            <div class="tab-pane fade show active" id="general_@Data.ID" role="tabpanel"
                                                aria-labelledby="general-tab">
                                                <p><span>@Data.Description</span></p>
                                            </div>

                                            <!-- general Query -->
                                            <div class="tab-pane fade" id="payment_@Data.ID" role="tabpanel"
                                                aria-labelledby="payment-tab">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Product ID</th>
                                                                <td>#@Data.ProductID</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Unit/Weight</th>
                                                                <td>@Data.Unit / @Data.Weight</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Shipping</th>
                                                                <td>@Data.Shipping</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Warranty & Return Policy</th>
                                                                <td>@Data.ProductPolicy</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- general Query -->
                                            <div class="tab-pane fade" id="upgrade_@Data.ID" role="tabpanel"
                                                aria-labelledby="upgrade-tab">

                                                <div class="alert alert-warning" role="alert">
                                                    This item has no reviews yet
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="rcs_log_126 full">
                                    <ul class="social_log_45 row">
                                        <li class="col-xl-6 col-lg-6 col-md-6 col-6">
                                            <button type="button" class="close sl_btn"
                                                data-dismiss="modal">Close</button>
                                        </li>
                                        <li class="col-xl-6 col-lg-6 col-md-6 col-6">
                                            @{
                                            if (ViewBag.uuid != "")
                                            {
                                            <button type="button" onclick="SubmitCartForm('@Data.ProductID')"
                                                class="btn btn-md full-width theme-bg text-white">
                                                <i class="fas fa-shopping-basket"></i>
                                            </button>
                                            }
                                            else
                                            {
                                            <a asp-area="" asp-controller="Home" asp-action="SignIn"
                                                class="btn btn-md full-width theme-bg text-white"
                                                style="text-align:center;">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                            }
                                            }
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="crs_log__footer d-flex justify-content-between mt-0" style="margin-bottom:50px;">
                            <br />
                            <br />
                            <br />
                        </div>
                    </div>
                </div>
            </div>
            }

            @*Pagination Section Below*@


            }
            else
            {
            <div class="row justify-content-center">
                <div></div>
                <div class="col-lg-6 col-md-10">
                    <div class="text-center">

                        <img src="~/assets/img/EmptyActivity.png" style="width:50%;" class="img-fluid" alt="" />
                        <br /><br />
                        <p>
                            We found nothing!
                        </p>

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
                        <p>
                            We found nothing!
                        </p>

                    </div>
                </div>

            </div>
            }




            }
        </div>

        <div class="row align-items-center justify-content-between">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <p class="p-0">Showing @ViewBag.pageItemRangeDisplay of @ViewBag.totalRelatedFoodStuffItems</p>
            </div>
        </div>

        <div class="row align-items-center justify-content-between">

            @{
            int foodStuffListItemsLength = int.Parse(ViewBag.foodStuffItemsLength.ToString());
            int currentPage = int.Parse(ViewBag.ActiveStorePage.ToString());
            string relatedItems = ViewBag.totalRelatedFoodStuffItems.ToString();
            double result = double.Parse(relatedItems) / 20.00;
            var wholeNumber = Math.Round(result, 0, MidpointRounding.AwayFromZero);

            if (currentPage == 1)
            {


            <div class="col-xl-12 col-lg-12 col-md-12">
                <nav>
                    <ul class="pagination smalls m-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fas fa-arrow-circle-left"></i>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        @{
                        if (foodStuffListItemsLength > 19)
                        {
                        <li class="page-item">
                            <a href="#" onclick="navToNextStorePage()" class="page-link">
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </li>

                        }
                        else
                        {
                        <li class="page-item disabled">
                            <a href="#" class="page-link">
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </li>
                        }
                        }

                    </ul>
                </nav>
            </div>
            }
            else if (currentPage != 1 && foodStuffListItemsLength < 20) { <div class="col-xl-12 col-lg-12 col-md-12">
                <nav>
                    <ul class="pagination smalls m-0">
                        <li class="page-item">
                            <a class="page-link" onclick="navToPrevStorePage()" href="#" tabindex="-1">
                                <i class="fas fa-arrow-circle-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">@currentPage</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
        </div>
        }
        else
        {
        int prevPage = currentPage--;
        int nextPage = currentPage++;

        <div class="col-xl-12 col-lg-12 col-md-12">
            <nav>
                <ul class="pagination smalls m-0">
                    <li class="page-item">
                        <a class="page-link" onclick="navToPrevStorePage()" href="#" tabindex="-1">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">@currentPage</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" onclick="navToNextStorePage()" href="#">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        }
        }

    </div>

    <div class="row align-items-center justify-content-between mt-4">
        <div class="col-xl-12 col-lg-12 col-md-12">
            @using (Html.BeginForm("JumpToHome", "Home", FormMethod.Post))
            {
            <button type="submit" style="color:#E10C2C; background-color:transparent; border:none;"><span> ← </span>Back
                To Home</button>
            }
        </div>
    </div>
    </div>
</section>
<!-- ============================ Store Ends ================================== -->
<!-- End of Confirm Sign Out Modal -->

<div id="snackbar">
    <input id="alertSnackBar" type="text"
        style="text-align: center; background-color: transparent; border: none; color: white;" />
</div>

<form id="addToCartForm" action="https://foodstuffstore.net/FoodStuffStore.php" method="post">
    <input name="action" value="NEW_CART" hidden />
    <input name="uuid" value="@ViewBag.uuid" hidden />
    <input name="productid" id="productid" value="" hidden />
</form>

<form id="likeAnItemForm" action="https://foodstuffstore.net/FoodStuffStore.php" method="post">
    <input name="action" value="NEW_LIKE" hidden />
    <input name="uuid" value="@ViewBag.uuid" hidden />
    <input name="productid" id="productid2" value="" hidden />
</form>

@*This form will navigate users to the next store page*@
@using (Html.BeginForm("NavigateToNextStorePage", "Home", FormMethod.Post, new { id = "gotoNextPageForm" })) { }

@*This form will navigate users to the previous store page*@
@using (Html.BeginForm("NavigateToPrevStorePage", "Home", FormMethod.Post, new { id = "gotoPrevPageForm" })) { }

@*Hidden Field*@
<div hidden>
    <input id="email" value="@ViewBag.memberEmail" hidden />
    <input id="accountType" value="@ViewBag.accountType" hidden />
</div>

@*Add To Cart Script*@
<script>
    function SubmitCartForm(prodID) {
    document.getElementById("productid").value = prodID;

        $.ajax({
            url: 'https://foodstuffstore.net/FoodStuffStore.php',
            type: 'POST',
            data: $('#addToCartForm').serialize(),
            error: function (xhr, status, error) {
                
            },
            success: function (response) {
                
            }
        });
        document.getElementById("alertSnackBar").value = "🛍️  Item added to cart";
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);

        $('#cartItemCount').val(function (i, oldval) {
            return ++oldval;
        });

    }

    @*Like An Item Script*@

    function SubmitLikeForm(prodID) {
        document.getElementById("productid2").value = prodID;
        $.ajax({
            url: 'https://foodstuffstore.net/FoodStuffStore.php',
            type: 'POST',
            data: $('#likeAnItemForm').serialize(),
            error: function (xhr, status, error) {
               
            },
            success: function (response) {
              
            }
        });
        document.getElementById("alertSnackBar").value = "You ❤️ an item";
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);

    }



    int width = (Request.Browser.ScreenPixelsWidth) * 2 - 100;
    int height = (Request.Browser.ScreenPixelsHeight) * 2 - 100;


    @*Set data on description dialog*@

    function setDescription(img, name) {
        document.getElementById("descImage").src = img;
        document.getElementById('descNameLabel').innerHTML = name;
    }


    @*Navigate to next page*@

    function navToNextStorePage() {
        document.getElementById("gotoNextPageForm").submit();
    }

    function navToPrevStorePage() {
        document.getElementById("gotoPrevPageForm").submit();
    }
</script>

@endsection