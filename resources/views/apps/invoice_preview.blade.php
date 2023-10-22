@*
    For more information on enabling MVC for empty projects, visit https://go.microsoft.com/fwlink/?LinkID=397860
*@
@{
    ViewData["Title"] = TempData["FullName"] +" - "+ TempData["Date"] + "_FSS Invoice";
}

<div class="row justify-content-center">
    <div class="col-xxl-9">
        <div class="card" id="demo">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-header border-bottom-dashed p-4">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <img src="../../assets/img/FSSLOGO1.png" class="card-logo card-logo-dark" alt="logo dark" height="50">
                                <img src="../../assets/img/FSSLOGO1.png" class="card-logo card-logo-light" alt="logo light" height="50">
                                <div class="mt-sm-5 mt-4">
                                    <h6 class="text-muted text-uppercase fw-semibold">Address</h6>
                                    <p class="text-muted mb-1" id="address-details">Suite B15 Abraham Plaza, Utako,</p>
                                    <p class="text-muted mb-0" id="zip-code"><span>Abuja,</span> Nigeria.</p>
                                </div>
                            </div>
                            <div class="flex-shrink-0 mt-sm-0 mt-3">
                                <h6><span class="text-muted fw-normal">Legal Registration No:</span><span id="legal-register-no"> RC18310280</span></h6>
                                <h6><span class="text-muted fw-normal">Email:</span><span id="email"> dianadennistenebe@foodstuff.store</span></h6>
                                <h6><span class="text-muted fw-normal">Website:</span><a href="https://foodstuff.store/" class="link-primary" target="_blank" id="website"> www.foodstuff.store</a></h6>
                                <h6 class="mb-0"><span class="text-muted fw-normal">Contact No: </span><span id="contact-no">+(234) 906 828 0610</span></h6>
                            </div>
                        </div>
                    </div>
                    <!--end card-header-->
                </div><!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Invoice No</p>
                                <h5 class="fs-14 mb-0">#FSS<span id="invoice-no">@TempData["InvoiceID"]</span></h5>
                            </div>
                            <!--end col-->
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                <h5 class="fs-14 mb-0"><span id="invoice-date">@TempData["Date"]</span></h5>
                            </div>
                            <!--end col-->
                            <div class="col-lg-2 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Payment</p>
                                @if(TempData["Paid"] != null)
                                {
                                    if (TempData["Paid"].ToString() == "true")
                                    {
                                        <span class="badge badge-soft-success fs-11" id="payment-status">Paid</span>
                                    }
                                    else
                                    {
                                        <span class="badge badge-soft-warning fs-11" id="payment-status">UnPaid</span>
                                    }
                                }
                            </div>
                            <!--end col-->
                            <div class="col-lg-2 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Status</p>
                                @if (TempData["Status"] != null)
                                {
                                    if (TempData["Status"].ToString() == "delivered")
                                    {
                                        <span class="badge badge-soft-success fs-11" id="payment-status">Delivered</span>
                                    }
                                    else if (TempData["Status"].ToString() == "dispatched")
                                    {
                                        <span class="badge badge-soft-warning fs-11" id="payment-status">Dispatched</span>
                                    }
                                    else if (TempData["Status"].ToString() == "approved")
                                    {
                                        <span class="badge badge-soft-info fs-11" id="payment-status">Approved</span>
                                    }
                                    else if (TempData["Status"].ToString() == "canceled")
                                    {
                                        <span class="badge badge-soft-dark fs-11" id="payment-status">Order Canceled</span>
                                    }
                                    else
                                    {
                                        <span class="badge badge-soft-danger fs-11" id="payment-status">Pending Approval</span>
                                    }
                                }
                            </div>
                            <!--end col-->
                            <div class="col-lg-2 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                <h5 class="fs-14 mb-0">₦<span id="total-amount">@TempData["InvoiceTotal"]</span></h5>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div><!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4 border-top border-top-dashed">
                        <div class="row g-3">
                            <div class="col-6">
                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Billing / Shipping Address</h6>
                                <p class="fw-medium mb-2" id="billing-name">@TempData["FullName"]</p>
                                <p class="text-muted mb-1" id="billing-address-line-1">@TempData["Address"]</p>
                                @if(TempData["Email"] != null){
                                    <p class="text-muted mb-0"><span>Email: </span><span id="billing-tax-no">@TempData["Email"]</span> </p>
                                }
                                <p class="text-muted mb-1"><span>Phone: +</span><span id="billing-phone-no">@TempData["Phone"]</span></p>
                            </div>
                            <!--end col-->
                            @*<div class="col-6">
                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Shipping Address</h6>
                                <p class="fw-medium mb-2" id="shipping-name">David Nichols</p>
                                <p class="text-muted mb-1" id="shipping-address-line-1">305 S San Gabriel Blvd</p>
                                <p class="text-muted mb-1"><span>Phone: +</span><span id="shipping-phone-no">(123) 456-7890</span></p>
                            </div>*@
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div><!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4">
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
                                        <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr class="table-active">
                                                    <th scope="col" style="width: 50px;">#</th>
                                                    <th scope="col">Product Details</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Unit Price</th>
                                                    <th scope="col" class="text-end">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="products-list">
                                            @{
                                                int count = 0;
                                                foreach (var Data in Model.ShoppingList)
                                                {
                                                    count++;

                                                        <tr>
                                                            <th scope="row">@count</th>
                                                            <td class="text-start">
                                                                <span class="fw-medium">@Data.Name</span>
                                                                <p class="text-muted mb-0">Unit: @Data.Unit</p>
                                                            </td>
                                                            <td>@Data.Quantity</td>
                                                            <td>₦@Data.Price</td>
                                                            @{
                                                                double output = double.Parse(Data.Price) * double.Parse(Data.Quantity);
                                                                <td class="text-end">₦@output</td>
                                                            }                                                            
                                                        </tr>
                                                }
                                            }
                                            </tbody>
                                        </table>
                                    }
                                }
                            }
                        </div>
                        <div class="border-top border-top-dashed mt-2">
                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                <tbody>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td class="text-end">₦@TempData["Total"]</td>
                                    </tr>
                                    <tr>
                                        <td>Discount <small class="text-muted">(FSSPRMO)</small></td>
                                        <td class="text-end">- ₦0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Delivery/Tax Charge</td>
                                        <td class="text-end">@TempData["ShippingAndTaxCost"]% - ₦@TempData["ShippingAndTaxCostInMoney"]</td>
                                    </tr>
                                    <tr class="border-top border-top-dashed fs-15">
                                        <th scope="row">Total Amount</th>
                                        <th class="text-end">₦@TempData["InvoiceTotal"]</th>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <div class="mt-3">
                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                            <p class="text-muted mb-1">Payment Method: <span class="fw-medium" id="payment-method">@TempData["PaymentMethod"]</span></p>
                            <p class="text-muted mb-1">Card Holder: <span class="fw-medium" id="card-holder-name">n/a</span></p>
                            <p class="text-muted mb-1">Card Number: <span class="fw-medium" id="card-number">xxx xxxx xxxx xxxx</span></p>
                            <p class="text-muted">Total Amount: <span class="fw-medium" id="">₦ </span><span id="card-total-amount">@TempData["InvoiceTotal"]</span></p>
                        </div>
                        <div class="mt-4">
                            <div class="alert alert-info">
                                <p class="mb-0">
                                    <span class="fw-semibold">NOTES:</span>
                                    <span id="note">
                                        All accounts are to be paid within 3 days from receipt of invoice. To be paid by cheque or
                                        credit card or direct payment online. If account is not paid within 3
                                        days the credits details supplied as confirmation of work undertaken
                                        will be charged the agreed quoted fee noted above.
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                            <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Print</a>
                            <a href="javascript:void(0);" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                        </div>
                    </div>
                    <!--end card-body-->
                </div><!--end col-->
            </div><!--end row-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->
