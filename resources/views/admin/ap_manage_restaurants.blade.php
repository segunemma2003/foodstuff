@using foodstuffstore.Functions;
@model dynamic

@{
    ViewData["Title"] = ViewBag.corePageName;
}

<div class="col-lg-9 col-md-9 col-sm-12">
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

    <!-- Row -->
    <div class="row justify-content-between">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
            <div class="dashboard_wrap d-flex align-items-center justify-content-between">
                <div class="arion">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a asp-area="" asp-controller="Admin" asp-action="@ViewBag.prevPageLink">
                                    @ViewBag.prevPageName
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                @ViewBag.corePageName
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">

                <div class="form_blocs_wrap">
                    <div class="row justify-content-between">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="dashboard_wrap">
                                <div class="row pt-4">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                                        <div class="table-responsive">


                                            @{
                                                if (Model.Restaurants != null)
                                                {
                                                    int i = 0;
                                                    foreach (var Data in Model.Restaurants)
                                                    {
                                                        i++;
                                                    }

                                                    if (i > 0)
                                                    {

                                                        <table class="table dash_list">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Business</th>
                                                                    <th scope="col">Store Address</th>
                                                                    <th scope="col">Payment Methods</th>
                                                                    <th scope="col">Delivery Fee</th>                                                                    
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Actions</th>
                                                                </tr>
                                                            </thead>

                                                            @{
                                                                int count = 0;
                                                                foreach (var Data in Model.Restaurants)
                                                                {
                                                                    count++;
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">@count</th>
                                                                            <td>
                                                                                <h6>@Data.BusinessName</h6>
                                                                                <p>Owner: <span>@Data.FirstName @Data.LastName</span></p>
                                                                                <p>Email: <span>@Data.Email</span></p>
                                                                                <p>Phone: <span>@Data.PhoneNumber</span></p>
                                                                                <p>Reg No: <span>@Data.RegNumber</span></p>
                                                                            </td>
                                                                            <td>
                                                                                <h6>@Data.StoreAddress</h6>
                                                                                <p>Floor Suite: <span>@Data.FloorSuite</span></p>
                                                                                <p>No. Of Locations: <span>@Data.NumberOfLocations</span></p>
                                                                                <p>Store Hours: <span>@Data.StoreHours</span></p>
                                                                            </td>
                                                                            <td><div class="smalls lg">@Data.PaymentMethods</div></td>
                                                                            <td><div class="smalls lg">@Data.DeliveryFee</div></td>
                                                                            <td>
                                                                                @if (Data.Status == "approved")
                                                                                {
                                                                                    <span class="trip text-white bg-info" title="Approved">LIVE</span>
                                                                                }
                                                                                else
                                                                                {
                                                                                    <span class="trip text-white bg-secondary" title="Waiting Admin Approval">PENDING</span>
                                                                                }
                                                                            </td>
                                                                            <td>
                                                                                <div class="dropdown show">
                                                                                    <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        <i class="fas fa-ellipsis-h"></i>
                                                                                    </a>
                                                                                    <div class="drp-select dropdown-menu">
                                                                                        <a class="dropdown-item" href="#">Preview Menu</a>
                                                                                        <a class="dropdown-item" href="#">Preview Store Banner</a>                                                                                        
                                                                                        <a class="dropdown-item" href="#">Preview Valid Id</a>
                                                                                        <a class="dropdown-item" href="#">Preview Utility Bill</a>
                                                                                        @if (Data.Status == "pending")
                                                                                        {
                                                                                            @using (Html.BeginForm("ApproveRestaurant", "Admin", FormMethod.Post))
                                                                                            {
                                                                                                <button class="dropdown-item pl-0 ml-0" type="submit">Approve Restaurant</button>
                                                                                            }
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            @using (Html.BeginForm("RemoveInvoiceItem", "Admin", FormMethod.Post))
                                                                                            {
                                                                                                <button class="dropdown-item" type="submit">Take Down Restaurant</button>
                                                                                            }
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
                                                                    <th scope="col">Business</th>
                                                                    <th scope="col">Store Address</th>
                                                                    <th scope="col">Payment Methods</th>
                                                                    <th scope="col">Delivery Fee</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Actions</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <div class="row justify-content-center">

                                                            <div class="col-lg-6 col-md-10">
                                                                <div class="text-center">

                                                                    <img src="~/assets/img/NotFound.png" style="width:50%;" class="img-fluid" alt="" />
                                                                    <br /><br />
                                                                    <h4>
                                                                        No restaurants where found.
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
                                                                <th scope="col">Business</th>
                                                                <th scope="col">Store Address</th>
                                                                <th scope="col">Payment Methods</th>
                                                                <th scope="col">Delivery Fee</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Actions</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <div class="row justify-content-center">
                                                        <div></div>
                                                        <div class="col-lg-6 col-md-10">
                                                            <div class="text-center">

                                                                <img src="~/assets/img/NotFound.png" style="width:50%;" class="img-fluid" alt="" />
                                                                <br /><br />
                                                                <h4>
                                                                    No restaurants where found.
                                                                </h4>

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
        </div>
    </div>
    <!-- /Row -->
</div>

<script>
    function SaveInvoiceItemChnages(buttonId) {
        document.getElementById(buttonId).click();
    }
</script>