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
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
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
    <!-- /Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                        <h6 class="m-0">Manage Invoice</h6>
                    </div>
                </div>

                @using (Html.BeginForm("SearchInvoice", "Admin", FormMethod.Post))
                {
                    <div class="row align-items-end mb-5">
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Search</label>
                                <div class="smalls input-with-icon">
                                    <input type="text" name="SearchField" class="form-control" value="@ViewBag.initialSearchKeyword">
                                    <input type="text" name="CorePageLink" value="@ViewBag.corePageLink" hidden>
                                    <i class="ti-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Year</label>
                                <div class="smalls">
                                    <select id="prc" name="Year" class="form-control">
                                        @{
                                            var yearList = new List<KeyValuePair<string, string>>() {
                                    new KeyValuePair<string, string>("All", "all"),
                                    new KeyValuePair<string, string>("2020", "2020"),
                                    new KeyValuePair<string, string>("2021", "2021"),
                                    new KeyValuePair<string, string>("2022", "2022"),
                                    new KeyValuePair<string, string>("2023", "2023"),
                                    new KeyValuePair<string, string>("2024", "2024"),
                                    new KeyValuePair<string, string>("2025", "2025"),
                                    new KeyValuePair<string, string>("2026", "2026"),
                                    new KeyValuePair<string, string>("2027", "2027"),
                                    new KeyValuePair<string, string>("2028", "2028"),
                                    new KeyValuePair<string, string>("2029", "2029"),
                                    new KeyValuePair<string, string>("2030", "2030"),
                                    };

                                            foreach (var Data in yearList)
                                            {
                                                if (ViewBag.selectedInvoiceYear == Data.Value)
                                                {
                                                    <option value="@Data.Value" selected>@Data.Key</option>
                                                }
                                                else
                                                {
                                                    <option value="@Data.Value">@Data.Key</option>
                                                }
                                            }
                                        }
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Bill</label>
                                <div class="smalls">
                                    <select id="prc" name="Paid" class="form-control">
                                        @{
                                            var billList = new List<KeyValuePair<string, string>>() {
                                    new KeyValuePair<string, string>("All", "all"),
                                    new KeyValuePair<string, string>("Paid", "true"),
                                    new KeyValuePair<string, string>("Owing", "false"),
                                    };

                                            foreach (var Data in billList)
                                            {
                                                if (ViewBag.selectedInvoiceBill == Data.Value)
                                                {
                                                    <option value="@Data.Value" selected>@Data.Key</option>
                                                }
                                                else
                                                {
                                                    <option value="@Data.Value">@Data.Key</option>
                                                }
                                            }
                                        }
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Rows</label>
                                <div class="smalls">
                                    <select id="prc" name="Rows" class="form-control">
                                        @{
                                            var list = new List<KeyValuePair<int, int>>() {
                                                new KeyValuePair<int, int>(10, 10),
                                                new KeyValuePair<int, int>(25, 25),
                                                new KeyValuePair<int, int>(50, 50),
                                                new KeyValuePair<int, int>(100, 100),
                                                new KeyValuePair<int, int>(250, 250),
                                                new KeyValuePair<int, int>(500, 500),
                                                new KeyValuePair<int, int>(1000, 1000),
                                                new KeyValuePair<int, int>(5000, 5000),
                                                new KeyValuePair<int, int>(10000, 10000),
                                            };

                                            foreach (var Data in list)
                                            {
                                                if (ViewBag.selectedInvoiceListLimit == Data.Value)
                                                {
                                                    <option value="@Data.Value" selected>@Data.Key</option>
                                                }
                                                else
                                                {
                                                    <option value="@Data.Value">@Data.Key</option>
                                                }
                                            }
                                        }
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="smalls">
                                    <select id="prc" name="Status" class="form-control">
                                        @{
                                            var list2 = new List<KeyValuePair<string, string>>() {
                                                new KeyValuePair<string, string>("All", "all"),
                                                new KeyValuePair<string, string>("Approved", "approved"),
                                                new KeyValuePair<string, string>("Pending", "pending"),
                                                new KeyValuePair<string, string>("Dispatched", "dispatched"),
                                                new KeyValuePair<string, string>("Canceled", "canceled"),
                                                new KeyValuePair<string, string>("Refunded", "refunded"),
                                                new KeyValuePair<string, string>("Delivered", "delivered")
                                            };

                                            foreach (var Data in list2)
                                            {
                                                if (ViewBag.selectedInvoiceStatus == Data.Value)
                                                {
                                                    <option value="@Data.Value" selected>@Data.Key</option>
                                                }
                                                else
                                                {
                                                    <option value="@Data.Value">@Data.Key</option>
                                                }
                                            }
                                        }
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <button type="submit" class="btn text-white full-width theme-bg">Filter</button>
                            </div>
                        </div>
                    </div>
                }

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                        <div class="table-responsive">

                            @{
                                if (Model.Invoices != null)
                                {
                                    int i = 0;
                                    foreach (var Data in Model.Invoices)
                                    {
                                        i++;
                                    }

                                    if (i > 0)
                                    {

                                        <table class="table dash_list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Customer</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Invoice ID</th>
                                                    <th scope="col">Budget</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Total (Without Tax)</th>
                                                    <th scope="col">
                                                        <a class="btn btn-action" asp-area="" asp-controller="Admin" asp-action="APManageInvoice" target="_blank" title="Create Invoice">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @{
                                                    int count = 0;
                                                    foreach (var Data in Model.Invoices)
                                                    {
                                                        count++;

                                                        <tr>
                                                            <th scope="row">@count</th>
                                                            <td><h6>@Data.Fullname</h6><p>Date: <span>@Data.ServerDateTime</span></p></td>
                                                            <td><div class="dhs_tags">@Data.Address</div></td>
                                                            <td><span class="smalls">@Data.InvoiceID</span></td>
                                                            <td><span class="smalls">₦@Data.Budget</span></td>
                                                            <td><span class="dhs_tags">@Data.Status</span></td>
                                                            <td>
                                                                <span class="smalls">₦@Data.Total</span> &nbsp;
                                                                @if(Data.Paid == "true")
                                                                {
                                                                    <span class="trip text-white bg-info">&nbsp;Paid&nbsp;</span>
                                                                }
                                                                else
                                                                {
                                                                    <span class="trip theme-cl theme-bg-light">UnPaid</span>
                                                                }
                                                            </td>
                                                            @{
                                                                if (Data.Status != "delivered" && Data.Status != "refunded" && Data.Status != "canceled")
                                                                {
                                                                    <td>
                                                                        <div class="dropdown show">
                                                                            <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="fas fa-ellipsis-h"></i>
                                                                            </a>
                                                                            <div class="drp-select dropdown-menu">
                                                                                @{
                                                                                    if (Data.Status == "pending")
                                                                                    {
                                                                                        @using (Html.BeginForm("SignInvoice", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <input type="text" name="Signature" value="approved" hidden />
                                                                                            <button type="submit" class="dropdown-item">Approve Invoice</button>
                                                                                        }
                                                                                        @using (Html.BeginForm("SignInvoice", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <input type="text" name="Signature" value="dispatched" hidden />
                                                                                            <button type="submit" class="dropdown-item">Dispatch Package</button>
                                                                                        }
                                                                                        @using (Html.BeginForm("SignInvoice", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <input type="text" name="Signature" value="delivered" hidden />
                                                                                            <button type="submit" class="dropdown-item">Sign As Delivered</button>
                                                                                        }
                                                                                        @using (Html.BeginForm("SignInvoice", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <input type="text" name="Signature" value="canceled" hidden />
                                                                                            <button type="submit" class="dropdown-item">Cancel</button>
                                                                                        }

                                                                                    }
                                                                                    else if (Data.Status == "dispatched")
                                                                                    {
                                                                                        @using (Html.BeginForm("SignInvoice", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <input type="text" name="Signature" value="delivered" hidden />
                                                                                            <button type="submit" class="dropdown-item">Sign As Delivered</button>
                                                                                        }
                                                                                        @using (Html.BeginForm("SignInvoice", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <input type="text" name="Signature" value="refunded" hidden />
                                                                                            <button type="submit" class="dropdown-item">Refund</button>
                                                                                        }
                                                                                        @using (Html.BeginForm("ReIssueInvoice", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <input type="text" name="InvoiceID" value="@Data.InvoiceID" hidden />
                                                                                            <button type="submit" class="dropdown-item">Reissue Invoice</button>
                                                                                        }
                                                                                    }
                                                                                    else if (Data.Status == "approved")
                                                                                    {
                                                                                        @using (Html.BeginForm("SignInvoice", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <input type="text" name="Signature" value="dispatched" hidden />
                                                                                            <button type="submit" class="dropdown-item">Dispatch Package</button>
                                                                                        }
                                                                                        @using (Html.BeginForm("SignInvoice", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <input type="text" name="Signature" value="delivered" hidden />
                                                                                            <button type="submit" class="dropdown-item">Sign As Delivered</button>
                                                                                        }
                                                                                        @using (Html.BeginForm("SignInvoice", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <input type="text" name="Signature" value="refunded" hidden />
                                                                                            <button type="submit" class="dropdown-item">Refund</button>
                                                                                        }
                                                                                    }
                                                                                }
                                                                                @using (Html.BeginForm("ManageInvoice", "Admin", FormMethod.Post))
                                                                                {
                                                                                    <input type="text" name="uuid" value="@Data.UUID" hidden />
                                                                                    <input type="text" name="InvoiceID" value="@Data.InvoiceID" hidden />
                                                                                    <button type="submit" class="dropdown-item">Manage Invoice</button>
                                                                                }
                                                                                <a href="https://foodstuff.store/Apps/InvoicePreview?InvoiceID=@Data.InvoiceID" target="_blank" class="dropdown-item pl-4"><h6>Preview Invoice</h6></a>
                                                                                <a href="mailto:@Data.UserEmail" type="text/plain" class="dropdown-item pl-4"><h6>Mail User</h6></a>
                                                                                <a href="tel:@Data.Phone" type="text/plain" class="dropdown-item pl-4"><h6>Call User</h6></a>
                                                                                <a href="#" type="text/plain" class="dropdown-item pl-4" data-toggle="modal" data-target="#deleteinvoice"><h6>Delete Invoice</h6></a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                }
                                                                else
                                                                {
                                                                    <td>
                                                                        <div class="dropdown show">
                                                                            <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="fas fa-ellipsis-h"></i>
                                                                            </a>
                                                                            <div class="drp-select dropdown-menu">
                                                                                @using (Html.BeginForm("ReIssueInvoice", "Admin", FormMethod.Post))
                                                                                {
                                                                                    <input type="text" name="uuid" value="@Data.UUID" hidden />
                                                                                    <input type="text" name="InvoiceID" value="@Data.InvoiceID" hidden />
                                                                                    <input type="text" name="Fullname" value="@Data.Fullname" hidden />
                                                                                    <input type="text" name="Address" value="@Data.Address" hidden />
                                                                                    <input type="text" name="Budget" value="@Data.Budget" hidden />
                                                                                    <input type="text" name="Status" value="@Data.Status" hidden />
                                                                                    <input type="text" name="Total" value="@Data.Total" hidden />
                                                                                    <input type="text" name="IsCartOrder" value="@Data.IsCartOrder" hidden />
                                                                                    <input type="text" name="PaymentMethod" value="@Data.PaymentMethod" hidden />
                                                                                    <button type="submit" class="dropdown-item">Reissue Invoice</button>
                                                                                }
                                                                                @using (Html.BeginForm("SetInvoicePaidStatus", "Admin", FormMethod.Post))
                                                                                {
                                                                                    <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                    <input type="text" name="Paid" value="@Data.Paid" hidden />
                                                                                    <input type="text" name="InvoiceID" value="@Data.InvoiceID" hidden />
                                                                                    @if (Data.Paid != "true")
                                                                                    {
                                                                                        <button type="submit" class="dropdown-item">Set As Paid</button>
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        <button type="submit" class="dropdown-item">Undo Payment</button>
                                                                                    }
                                                                                }
                                                                                @using (Html.BeginForm("ManageInvoice", "Admin", FormMethod.Post))
                                                                                {
                                                                                    <input type="text" name="uuid" value="@Data.UUID" hidden />
                                                                                    <input type="text" name="InvoiceID" value="@Data.InvoiceID" hidden />
                                                                                    <button type="submit" class="dropdown-item">Manage Invoice</button>
                                                                                }
                                                                                <a href="https://foodstuff.store/Apps/InvoicePreview?InvoiceID=@Data.InvoiceID" target="_blank" class="dropdown-item pl-4"><h6>Preview Invoice</h6></a>
                                                                                <a href="mailto:@Data.UserEmail" type="text/plain" class="dropdown-item pl-4"><h6>Mail User</h6></a>
                                                                                <a href="tel:@Data.Phone" type="text/plain" class="dropdown-item pl-4"><h6>Call User</h6></a>
                                                                                <a href="#" type="text/plain" class="dropdown-item pl-4" data-toggle="modal" data-target="#deleteinvoice"><h6>Delete Invoice</h6></a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                }
                                                            }
                                                        </tr>

                                                        <!-- Confirm Sign Out Modal -->
                                                        <div class="modal fade" id="deleteinvoice" tabindex="-1" role="dialog" aria-labelledby="loginoutmodal" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl login-pop-form" role="document">
                                                                <div class="modal-content overli" id="loginmodal">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Confirm</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="login-form">
                                                                            @using (Html.BeginForm("DeleteInvoice", "Admin", FormMethod.Post))
                                                                            {
                                                                                    <input type="text" name="ID" value="@Data.ID" hidden />
                                                                                    <input type="text" name="uuid" value="@Data.UUID" hidden />
                                                                                    <input type="text" name="InvoiceId" value="@Data.InvoiceID" hidden />
                                                                                    <input type="text" name="IsCartOrder" value="@Data.IsCartOrder" hidden />
                                                                                    <div class="rcs_log_125 pt-2 pb-3">
                                                                                        <span>Are you sure you want to delete invoice #@Data.InvoiceID?</span>
                                                                                    </div>
                                                                                    <div class="rcs_log_126 full">
                                                                                        <ul class="social_log_45 row">
                                                                                            <li class="col-xl-6 col-lg-6 col-md-6 col-6"><button type="button" class="close sl_btn" data-dismiss="modal">Cancel</button></li>
                                                                                            <li class="col-xl-6 col-lg-6 col-md-6 col-6"><button type="submit" class="btn btn-md full-width theme-bg text-white">Yes</button></li>
                                                                                        </ul>
                                                                                    </div>
                                                                            
                                                                            }
                                                                        </div>
                                                                    </div>

                                                                    <div class="crs_log__footer d-flex justify-content-between mt-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End of Confirm Sign Out Modal -->

                                                    }
                                                }
                                            </tbody>
                                        </table>
                                    }
                                    else
                                    {
                                        <table class="table dash_list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Fullname</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Invoice ID</th>
                                                    <th scope="col">Budget</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Total (Without Tax)</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <div class="row justify-content-center">

                                            <div class="col-lg-6 col-md-10">
                                                <div class="text-center">

                                                    <img src="~/assets/img/NotFound.png" style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                                    <br /><br />
                                                    <h5 style="color:#818181;">
                                                        No invoice found. Might as well adjust your search for a different result.
                                                    </h5>

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
                                                <th scope="col">Email</th>
                                                <th scope="col">Fullname</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Invoice ID</th>
                                                <th scope="col">Budget</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Total (Without Tax)</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <div class="row justify-content-center">
                                        <div></div>
                                        <div class="col-lg-6 col-md-10">
                                            <div class="text-center">

                                                <img src="~/assets/img/NotFound.png" style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                                    <br /><br />
                                                    <h5 style="color:#818181;">
                                                        No invoice found. Might as well adjust your search for a different result.
                                                    </h5>

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
