@using foodstuffstore.Functions;
@{
    ViewData["Title"] = ViewBag.corePageName;
}
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">
                        Cart
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
<!-- ============================ Cart ================================== -->
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
                <div class="table-responsive">
                    @{
                    if (Model.Cart != null)
                        {
                            int i = 0;
                        foreach (var Data in Model.Cart)
                            {
                                i++;
                            }

                            if (i > 0)
                            {
                                <table class="table table-striped wishlist">
                                    <tbody>
                                        @{
                                        foreach (var Data in Model.Cart)
                                            {
                                                <tr>
                                                    <td>
                                                        @using (Html.BeginForm("DeleteCartItem", "Home", FormMethod.Post))
                                                        {
                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                            <button class="remove_cart" type="submit" title="Remove from cart"><i class="ti-close"></i></button>
                                                        }
                                                    </td>
                                                    <td><div class="tb_course_thumb"><img src="@Data.Image" class="img-fluid" alt="" /></div></td>
                                                    <th>
                                                        @Data.Name
                                                        <span class="tb_date">
                                                            @{

                                                                if (ValueHelper.ISADecimal(Data.Price) && ValueHelper.ISANumber(Data.Quantity))
                                                                {
                                                                    int sum = int.Parse(Data.Price) * int.Parse(Data.Quantity);
                                                                    <p>Sum: ₦@sum</p>
                                                                }
                                                            }
                                                        </span>
                                                    </th>
                                                    <td><span class="wish_price theme-cl">₦@Data.Price</span></td>
                                                    <td><input type="number" id="input_@Data.ID" style="background-color: transparent; width:75px; border: none;" onkeypress="this.style.width = ((this.value.length + 1) * 18) + 'px';" value="@Data.Quantity" /></td>
                                                    <td>
                                                        <div class="dropdown show">
                                                            <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-h"></i>
                                                            </a>
                                                            <div class="drp-select dropdown-menu">
                                                                @using (Html.BeginForm("SaveQuantity", "Home", FormMethod.Post))
                                                                {
                                                                    <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                    <input type="text" id="quantityInput_@Data.ID" name="Quantity" hidden />
                                                                    <button onclick="SaveQuantityFunc('@Data.ID')" class="dropdown-item" type="submit">Save Changes</button>
                                                                }
                                                                @using (Html.BeginForm("AddQuantityCartItem", "Home", FormMethod.Post))
                                                                {
                                                                    <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                    <button class="dropdown-item" type="submit">Add Quantity</button>
                                                                }
                                                                @using (Html.BeginForm("RemoveQuantityCartItem", "Home", FormMethod.Post))
                                                                {
                                                                    <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                    <button class="dropdown-item" type="submit">Remove Quantity</button>
                                                                }
                                                                @using (Html.BeginForm("ResetQuantityCartItem", "Home", FormMethod.Post))
                                                                {
                                                                    <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                    <button class="dropdown-item" type="submit">Reset Quantity</button>
                                                                }
                                                            </div>
                                                        </div>
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

                                            <img src="~/assets/img/EmptyCart.png" style="width:50%;" class="img-fluid" alt="" />
                                            <br /><br />
                                            <h4>
                                                Your cart is empty! return to store, then add some food items.
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

                                        <img src="~/assets/img/EmptyCart.png" style="width:50%;" class="img-fluid" alt="" />
                                        <br /><br />
                                        <h4>
                                            Your cart is empty! return to store, then add some food items.
                                        </h4>
                                        <br />
                                        <a asp-area="" asp-controller="Home" asp-action="Store" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
                                    </div>
                                </div>

                            </div>
                        }


                    }
                </div>

                @{
                    if (ViewBag.cartItemCount.ToString() != "0")
                    {
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="dash_crs_cat">
                                <div class="dash_crs_cat_caption">
                                    <div class="dash_crs_cat_body">
                                        <ul>
                                            <li>

                                                @{
                                                    if (int.Parse((ViewBag.cartItemCount).ToString()) > 1)
                                                    {
                                                        <h6>
                                                            You have @ViewBag.cartItemCount items in your cart
                                                        </h6>
                                                    }
                                                    else
                                                    {
                                                        <h6>You have just @ViewBag.cartItemCount item in your cart</h6>
                                                    }
                                                }
                                            </li>
                                            <li><h6>Tax: <span>@ViewBag.shippingCost%</span></h6></li>
                                            <li><h6>Sub Total: <span>₦@ViewBag.cartTotal</span></h6></li>
                                            <li>
                                                <h6>
                                                    Total:
                                                    <span>
                                                        @{
                                                            double total = double.Parse((ViewBag.cartTotal).ToString()) + (double.Parse((ViewBag.cartTotal).ToString()) * (double.Parse((ViewBag.shippingCost).ToString()) / 100));
                                                            string total2 = ValueHelper.BalanceFormatter("₦", total);
                                                            @total2
                                                        }
                                                    </span>
                                                </h6>
                                            </li>
                                            <li>
                                                <a asp-area="" asp-controller="Home" asp-action="Checkout" class="btn btn-md full-width theme-bg text-white">Checkout</a>
                                            </li>
                                            <li>
                                                @using (Html.BeginForm("JumpToHome", "Home", FormMethod.Post))
                                                {
                                                    <button type="submit" style="color:#E10C2C; background-color:transparent; border:none;"><span> ← </span>Continue Shopping</button>
                                                }
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    }
                }
            </div>

        
    </div>
</section>
<!-- ============================ Cart End ================================== -->

@*Save quantity value to hidden input field*@
<script>function SaveQuantityFunc(inputID) {
    document.getElementById('quantityInput_' + inputID).value = document.getElementById("input_"+inputID).value;
    }
</script>