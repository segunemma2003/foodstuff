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
                <div class="elkios">
                    @if (TempData["InvoiceID"] != null)
                    {
                        <a href="https://foodstuff.store/Apps/InvoicePreview?InvoiceID=@TempData["InvoiceID"]" class="add_new_btn" target="_blank">
                            <i class="fas fa-eye mr-1"></i>
                            Preview Invoice
                        </a>
                    }
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


                        @if (TempData["InvoiceID"] == null)
                        {
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                                <div class="tab-content" id="v-pills-tabContent">
                                    <!-- Basic -->
                                    <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                                        @using (Html.BeginForm("CreateEmptyInvoice", "Admin", FormMethod.Post))
                                        {
                                            <div class="form-group smalls">
                                                <label>Customer / Business</label>
                                                <select id="cates" name="customer" class="form-control" style="width: 100%">
                                                    @{
                                                        foreach (var Data in Model.Users)
                                                        {
                                                            if (MailerHelper.IsValidEmail(Data.UserEmail))
                                                            {
                                                                <option value="@Data.UserEmail">
                                                                    @Data.Username (@Data.UserEmail | @Data.Phone)
                                                                </option>
                                                            }
                                                            else
                                                            {
                                                                <option value="@Data.Phone">
                                                                    @Data.Username (@Data.Phone)
                                                                </option>
                                                            }
                                                        }
                                                    }
                                                </select>
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Invoice Status</label>
                                                <select id="cates" name="Status" class="form-control" style="width: 100%">
                                                    <option value="delivered" selected>Delivered</option>
                                                    <option value="dispatched">Dispatched</option>
                                                    <option value="approved">Approved</option>
                                                    <option value="refunded">Refunded</option>
                                                </select>
                                            </div>

                                            <br />

                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn text-white full-width theme-bg">Create Invoice</button>
                                                </div>
                                            </div>

                                            <br />
                                            <br />
                                        }
                                    </div>
                                </div>
                            </div>
                        }

                        @if (TempData["InvoiceID"] != null)
                        {
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="dashboard_wrap">

                                    <div class="row justify-content-between">
                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                            <div class="form-group smalls row align-items-center">
                                                <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                                    <h6 class="m-0"><b>Invoice ID:</b><br /> @TempData["InvoiceID"].ToString()</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-8">
                                            @using (Html.BeginForm("AddToInvoice", "Admin", FormMethod.Post))
                                            {
                                                <div class="row align-items-end mb-5">
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                        <input name="InvoiceId" value="@TempData["InvoiceID"]" required hidden>
                                                        <input name="uuid" value="@TempData["UUID"]" required hidden>
                                                        <div class="form-group">
                                                            <div class="smalls">
                                                                <select id="cates" name="FoodItem" class="form-control">
                                                                    @{
                                                                        foreach (var Data in Model.FoodStuffs)
                                                                        {
                                                                            if (ViewBag.selectedRIProduct == Data.Name)
                                                                            {
                                                                                <option value="@Data.Name (@Data.Weight)₦@Data.Price#@Data.ProductID" selected>
                                                                                    @Data.Name (@Data.Weight)- ₦@Data.Price
                                                                                </option>
                                                                            }
                                                                            else
                                                                            {
                                                                                <option value="@Data.Name (@Data.Weight)₦@Data.Price#@Data.ProductID">
                                                                                    @Data.Name (@Data.Weight)- ₦@Data.Price
                                                                                </option>
                                                                            }
                                                                        }
                                                                    }
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">

                                                        <div class="form-group">
                                                            <div class="smalls">
                                                                <input type="number" class="form-control" name="Quantity" value="@TempData["Quantity"]" maxlength="11" placeholder="Quantity" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <button type="submit" title="Add Item" class="btn text-white full-width theme-bg">Add Item</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @Html.AntiForgeryToken()
                                                ;
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
                                                                        <th scope="col">Food Item/Weight</th>
                                                                        <th scope="col">Unit</th>
                                                                        <th scope="col">Price</th>
                                                                        <th scope="col">Quantity</th>
                                                                        <th scope="col">
                                                                            <a class="btn btn-action" href="#" target="_blank" title="Preview Invoice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        </th>
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
                                                                                @using (Html.BeginForm("SaveChangesToInvoiceItem", "Admin", FormMethod.Post))
                                                                                {
                                                                                    <input name="ID" value="@Data.ID" required hidden />
                                                                                    <input name="InvoiceId" value="@TempData["InvoiceID"]" required hidden />
                                                                                    <input name="uuid" value="@TempData["UUID"]" required hidden />
                                                                                    <td><div class="smalls lg"><input value="@Data.Name" name="Name" type="text" style="border:none;" /></div></td>
                                                                                    <td><div class="smalls lg"><input value="@Data.Unit" name="Unit" type="text" style="border:none;" /></div></td>
                                                                                    <td><div class="trip theme-cl theme-bg-light">₦<input value="@Data.Price" type="text" name="Price" style="border:none; width:75px; background-color:transparent;" /></div></td>
                                                                                    <td><div class="trip theme-cl theme-bg-light"><input value="@Data.Quantity" type="number" name="Quantity" style="border:none; width:75px; background-color:transparent;" /></div></td>
                                                                                    <button id="btn_@Data.ID" type="submit" hidden></button>
                                                                                }
                                                                                <td>
                                                                                    <div class="dropdown show">
                                                                                        <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                            <i class="fas fa-ellipsis-h"></i>
                                                                                        </a>
                                                                                        <div class="drp-select dropdown-menu">
                                                                                            <button class="dropdown-item" type="submit" onclick="SaveInvoiceItemChnages('btn_@Data.ID')">Save Changes</button>
                                                                                            @using (Html.BeginForm("RemoveInvoiceItem", "Admin", FormMethod.Post))
                                                                                            {
                                                                                                <input name="ID" value="@Data.ID" required hidden>
                                                                                                <input name="InvoiceId" value="@TempData["InvoiceID"]" required hidden>
                                                                                                <input name="uuid" value="@TempData["UUID"]" required hidden>
                                                                                                <button class="dropdown-item" type="submit">Delete Food Item</button>
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
                                                                        <th scope="col">Price</th>
                                                                        <th scope="col">Quantity</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                            <div class="row justify-content-center">

                                                                <div class="col-lg-6 col-md-10">
                                                                    <div class="text-center">

                                                                        <img src="~/assets/img/EmptyActivity.png" style="width:50%;" class="img-fluid" alt="" />
                                                                        <br /><br />
                                                                        <h4>
                                                                            This invoice is empty, add some food items.
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
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">Quantity</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <div class="row justify-content-center">
                                                            <div></div>
                                                            <div class="col-lg-6 col-md-10">
                                                                <div class="text-center">

                                                                    <img src="~/assets/img/EmptyActivity.png" style="width:50%;" class="img-fluid" alt="" />
                                                                    <br /><br />
                                                                    <h4>
                                                                        This invoice is empty, add some food items.
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
                                            <h6 class="m-0">Update Customer Contact Information</h6>
                                        </div>
                                    </div>

                                    @using (Html.BeginForm("UpdateInvoiceContactInfo", "Admin", FormMethod.Post))
                                    {
                                        <div class="row align-items-end mb-5">
                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Contact Name</label>
                                                    <div class="smalls">
                                                        <input type="text" class="form-control" name="FullName" value="@TempData["FullName"]" maxlength="50" placeholder="Your full name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <div class="smalls">
                                                        <input type="email" class="form-control" disabled value="@TempData["Email"]" maxlength="50" placeholder="Your email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <div class="smalls">
                                                        <input type="number" class="form-control" disabled value="@TempData["Phone"]" maxlength="14" placeholder="Your budget?" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-8 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Pick-Up Address</label>
                                                    <div class="smalls">
                                                        @{
                                                            if (Model.Addresses != null)
                                                            {
                                                                int i = 0;
                                                                foreach (var Data in Model.Addresses)
                                                                {
                                                                    i++;
                                                                }

                                                                if (i < 3)
                                                                {
                                                                    <input type="text" class="form-control" name="Address" value="@TempData["Address"]" maxlength="500" placeholder="House NO., Street, City, State, Country" required />
                                                                }
                                                                else
                                                                {
                                                                    <select id="cates" name="Address" class="form-control">
                                                                        @foreach (var Data in Model.Addresses)
                                                                        {
                                                                            <option value="@Data.Address">
                                                                                @Data.Address
                                                                            </option>
                                                                        }
                                                                    </select>
                                                                }
                                                            }
                                                        }
                                                        <input name="InvoiceId" value="@TempData["InvoiceID"]" required hidden>
                                                        <input name="uuid" value="@TempData["UUID"]" required hidden>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn text-white full-width theme-bg">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>

                                        @Html.AntiForgeryToken()
                                        ;
                                    }

                                    <br />
                                    <hr style="border-top:2px dashed #bbb;" />
                                    <br />

                                    <div class="row pt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                            <h6 class="m-0">Back-Date Invoice</h6>
                                        </div>
                                    </div>

                                    @using (Html.BeginForm("BackDateInvoice", "Admin", FormMethod.Post))
                                    {
                                        <div class="row align-items-end mb-5">
                                            <div class="col-xl-10 col-lg-10 col-md-8 col-sm-8">
                                                <div class="form-group">
                                                    <label>Order Date</label>
                                                    <div class="smalls">
                                                        <input type="text" class="form-control" name="Date" value="@TempData["Date"]" maxlength="50" placeholder="yyyy-mm-dd" required>
                                                        <input name="InvoiceID" value="@TempData["InvoiceID"]" required hidden>
                                                        <input name="uuid" value="@TempData["UUID"]" required hidden>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <button type="submit" class="btn text-white full-width theme-bg">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>

                                        @Html.AntiForgeryToken()
                                        ;
                                    }

                                    <br />
                                    <hr style="border-top:2px dashed #bbb;" />
                                    <br />

                                    <div class="row pt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                            <h6 class="m-0">Payment Information</h6>
                                        </div>
                                    </div>

                                    @using (Html.BeginForm("EditInvoicePaymentMethod", "Admin", FormMethod.Post))
                                    {
                                        <div class="row align-items-end mb-5">
                                            <div class="col-xl-4 col-lg-8 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Payment Status</label>
                                                    <div class="smalls">
                                                        <select id="cates" name="Paid" class="form-control">
                                                            @{
                                                                var list1 = new List<KeyValuePair<string, string>>() {
                                                    new KeyValuePair<string, string>("Paid", "true"),
                                                    new KeyValuePair<string, string>("UnPaid", "false"),
                                                    };

                                                                foreach (var Data in list1)
                                                                {
                                                                    if (TempData["PaymentStatus"].ToString() == Data.Value)
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
                                            <div class="col-xl-4 col-lg-8 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Payment Method</label>
                                                    <div class="smalls">
                                                        <select id="cates" name="PaymentMethod" class="form-control">
                                                            @{
                                                                var list2 = new List<KeyValuePair<string, string>>() {
                                                    new KeyValuePair<string, string>("Bank Transfer", "Bank Transfer"),
                                                    new KeyValuePair<string, string>("Cash", "Cash"),
                                                    new KeyValuePair<string, string>("Paystack", "Paystack Gateway"),
                                                    new KeyValuePair<string, string>("Flutterwave", "Flutterwave Gateway"),
                                                    new KeyValuePair<string, string>("Spectra(Buy Now, Pay Later)", "Specta"),
                                                    new KeyValuePair<string, string>("Swipe(Buy Now, Pay Later)", "Swipe"),
                                                    new KeyValuePair<string, string>("Other", "n/a"),
                                                    };

                                                                foreach (var Data in list2)
                                                                {
                                                                    if (TempData["PaymentMethod"].ToString() == Data.Value)
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
                                                        <input name="InvoiceID" value="@TempData["InvoiceID"]" required hidden>
                                                        <input name="uuid" value="@TempData["UUID"]" required hidden>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <button type="submit" class="btn text-white full-width theme-bg">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>

                                        @Html.AntiForgeryToken()
                                        ;
                                    }

                                    @if(TempData["InvoiceStatus"] != null)
                                    {
                                        <br />
                                        <hr style="border-top:2px dashed #bbb;" />
                                        <br />

                                        <div class="row pt-4">
                                            <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                                <h6 class="m-0">Invoice Status</h6>
                                            </div>
                                        </div>

                                        <div class="elkios">
                                            @if (TempData["InvoiceStatus"].ToString() == "PENDING")
                                            {
                                                <span class="trip text-white bg-primary">&nbsp;@TempData["InvoiceStatus"]&nbsp;</span>
                                            }
                                            else if (TempData["InvoiceStatus"].ToString() == "APPROVED")
                                            {
                                                <span class="trip text-white bg-warning">&nbsp;@TempData["InvoiceStatus"]&nbsp;</span>
                                            }
                                            else if (TempData["InvoiceStatus"].ToString() == "DISPATCHED")
                                            {
                                                <span class="trip text-white bg-purple">&nbsp;@TempData["InvoiceStatus"]&nbsp;</span>
                                            }
                                            else if (TempData["InvoiceStatus"].ToString() == "DELIVERED")
                                            {
                                                <span class="trip text-white bg-success">&nbsp;@TempData["InvoiceStatus"]&nbsp;</span>
                                            }
                                            else if (TempData["InvoiceStatus"].ToString() == "REFUNDED")
                                            {
                                                <span class="trip text-white bg-secondary">&nbsp;@TempData["InvoiceStatus"]&nbsp;</span>
                                            }
                                            else
                                            {
                                                <span class="dhs_tags">&nbsp;@TempData["InvoiceStatus"]&nbsp;</span>
                                            }
                                        </div>
                                    }                                   

                                </div>
                            </div>
                        }

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