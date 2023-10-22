@model dynamic

@{
    ViewData["Title"] = ViewBag.corePageName;
}

<br />
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Generate & Request Invoice</h1>
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

<section>
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
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading center">
                    <h2>Populate <span class="theme-cl">Invoice</span> Below</h2>
                    <p>
                        Use the search field to browse through our catalog of products. If you're new to generating invoices or having difficulty requesting for one, please watch the video below.
                        <div class="inline_btn">
                            <a href="#" onclick="playYoutubeVideo()" data-toggle="modal" data-target="#video" class="btn text-dark pl-sm-0"><span class="esli_vd"><i class="fa fa-play"></i></span>How to generate and request for an invoice by submitting your shopping list?</a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="dashboard_wrap">

                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="form-group smalls row align-items-center">
                                <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                    <h5 class="m-0">Invoice ID: @ViewBag.invoiceID</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            @using (Html.BeginForm("AddFoodStuffToShoppingList", "Home", FormMethod.Post))
                            {
                                <div class="row align-items-end mb-5">
                                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12">

                                        <div class="form-group">
                                            <div class="smalls">
                                                <select id="cates" name="FoodItem" class="form-control">
                                                    @{
                                                        foreach (var Data in Model.FoodStuffs)
                                                        {
                                                            if (ViewBag.selectedRIProduct == Data.Name)
                                                            {
                                                                <option value="@Data.Name" selected>@Data.Name (@Data.Weight)</option>
                                                            }
                                                            else
                                                            {
                                                                <option value="@Data.Name">@Data.Name (@Data.Weight)</option>
                                                            }
                                                        }
                                                    }
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn text-white full-width theme-bg">Add Item</button>
                                        </div>
                                    </div>
                                </div>
                                @Html.AntiForgeryToken();
                            }
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                            <div class="table-responsive">


                                @{
                                    if (Model.ShoppingList != null)
                                    {
                                        int i = 0;
                                        foreach (var Data in Model.ShoppingList)
                                        {
                                            i++;
                                        }

                                        if (i > 0)
                                        {

                                            <table class="table dash_list">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Food Item</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                @{
                                                    int count = 0;
                                                    foreach (var Data in Model.ShoppingList)
                                                    {
                                                        count++;
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">@count</th>
                                                                <td><div class="smalls lg">@Data.Name</div></td>
                                                                <td><div class="dhs_tags">@Data.Quantity</div></td>
                                                                <td>
                                                                    <div class="dropdown show">
                                                                        <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fas fa-ellipsis-h"></i>
                                                                        </a>
                                                                        <div class="drp-select dropdown-menu">
                                                                            @using (Html.BeginForm("AddQuantityShoppingListItem", "Home", FormMethod.Post))
                                                                            {
                                                                                <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                <button class="dropdown-item" type="submit">Add Quantity</button>
                                                                            }
                                                                            @using (Html.BeginForm("RemoveQuantityShoppingListItem", "Home", FormMethod.Post))
                                                                            {
                                                                                <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                <button class="dropdown-item" type="submit">Remove Quantity</button>
                                                                            }
                                                                            @using (Html.BeginForm("DeleteShoppingListItem", "Home", FormMethod.Post))
                                                                            {
                                                                                <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                <button class="dropdown-item" type="submit">Delete Item</button>
                                                                            }
                                                                            @using (Html.BeginForm("ResetQuantityShoppingListItem", "Home", FormMethod.Post))
                                                                            {
                                                                                <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                <button class="dropdown-item" type="submit">Reset Quantity</button>
                                                                            }
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                    }
                                                }
                                            </table>
                                        }
                                        else
                                        {
                                            <table class="table dash_list">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Food Item</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <div class="row justify-content-center">

                                                <div class="col-lg-6 col-md-10">
                                                    <div class="text-center">

                                                        <img src="~/assets/img/EmptyShoppingList.png" style="width:50%;" class="img-fluid" alt="" />
                                                        <br /><br />
                                                        <h4>
                                                            Your shopping list is empty, add some food items.
                                                        </h4>

                                                    </div>
                                                </div>

                                            </div>
                                        }
                                    }
                                    else
                                    {
                                        <table class="table dash_list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Food Item</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <div class="row justify-content-center">
                                            <div></div>
                                            <div class="col-lg-6 col-md-10">
                                                <div class="text-center">

                                                    <img src="~/assets/img/EmptyShoppingList.png" style="width:50%;" class="img-fluid" alt="" />
                                                    <br /><br />
                                                    <h4>
                                                        Your shopping list is empty, add some food items.
                                                    </h4>

                                                </div>
                                            </div>

                                        </div>
                                    }
                                }
                            </div>
                        </div>
                    </div>

                    <br />
                    <hr style="border-top:2px dashed #bbb;" />
                    <br />

                    <div class="row pt-4">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                            <h6 class="m-0">Fill Out Your Contact Information</h6>
                        </div>
                    </div>

                    @using (Html.BeginForm("WhatappOrderShoppingList", "Home", FormMethod.Post))
                    {
                        <div class="row align-items-end mb-5">
                            <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <div class="smalls">
                                        <input type="text" class="form-control" name="InvoiceID" value="@ViewBag.invoiceID" hidden required>
                                        <input type="text" class="form-control" name="UUID" value="@ViewBag.uuid" hidden required>
                                        <input type="text" class="form-control" name="FullName" value="@ViewBag.username" maxlength="50" placeholder="Your full name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-8 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Pick-Up Address</label>
                                    <div class="smalls">
                                        <input type="text" class="form-control" name="Address" value="@ViewBag.defaultResidenceialAddress" maxlength="500" placeholder="House NO, Street, City, State, Country" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <button type="submit" class="btn text-white full-width theme-bg">Whatsapp Order</button>
                                </div>
                            </div>
                        </div>

                        @Html.AntiForgeryToken();
                    }

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Modal -->
<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="videomodal" aria-hidden="true" style="margin:auto;">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
        <div class="modal-content overli" id="loginmodal">
            <div class="modal-header">
                <h5 class="modal-title">How To Generate A Shopping List</h5>
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

<script>function playYoutubeVideo() {
        $("#content").hide();
        $("#yt")[0].src += "?autoplay=1";
        setTimeout(function () { $("#yt").show(); }, 200);
    }</script>