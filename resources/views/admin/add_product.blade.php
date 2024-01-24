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
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">

                <div class="form_blocs_wrap">
                        <div class="row justify-content-between">


                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">


                                <div class="tab-content" id="v-pills-tabContent">
                                    <!-- Basic -->
                                    <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                                        @using (Html.BeginForm("AddAProduct", "Admin", FormMethod.Post, new {enctype = "multipart/form-data" }))
                                        {
                                            <div class="form-group smalls">
                                                <label>Product Name*</label>
                                                <input type="text" required name="Name" value="@TempData["Name"]" class="form-control" placeholder="Enter a name for this product" maxlength="50">
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Description*</label>
                                                <div class="row m-0">
                                                    <textarea rows="10" required name="Description" maxlength="1500" class="form-control" placeholder="Words related or similar to this products name and description">@TempData["Description"]</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Weight*</label>
                                                <input type="text" name="Weight" value="@TempData["Weight"]" required class="form-control" placeholder="">
                                            </div>
                                            
                                            <div class="form-group smalls">
                                                <label>Unit*</label>
                                                <input type="text" name="Unit" value="@TempData["Unit"]" required class="form-control" placeholder="">
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Brand Name</label>
                                                <input type="text" name="Brand" value="@TempData["Brand"]" class="form-control" placeholder="Enter a name for this product" maxlength="50">
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Category</label>
                                                <div class="simple-input">
                                                    <select id="cates" name="Category" class="form-control">
                                                        @{
                                                            var list = new List<KeyValuePair<string, string>>() {
                                                new KeyValuePair<string, string>("Vegetable", "Vegetable"),
                                                new KeyValuePair<string, string>("Proteins", "Protein"),
                                                new KeyValuePair<string, string>("Seasoning", "Seasoning"),
                                                new KeyValuePair<string, string>("Fruits", "Fruit"),
                                                new KeyValuePair<string, string>("Grains", "Grains"),
                                                new KeyValuePair<string, string>("Nuts", "Nuts"),
                                                new KeyValuePair<string, string>("Processed Food", "Processed"),
                                                new KeyValuePair<string, string>("Fluids", "Fluids"),
                                                new KeyValuePair<string, string>("Live Stock", "Live Stock"),
                                                new KeyValuePair<string, string>("Seeds", "Seeds")
                                            };

                                                            string category = "";

                                                            if (TempData["Category"] != null)
                                                            {
                                                                category = TempData["Category"].ToString();
                                                            }

                                                            foreach (var Data in list)
                                                            {
                                                                if (category == Data.Value)
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

                                            <div class="form-group smalls">
                                                <label>Tags*</label>
                                                <div class="row m-0">
                                                    <textarea name="Tags" required rows="10" maxlength="1500" class="form-control" placeholder="Words related or similar to this products name and description">@TempData["Tags"]</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Price(₦)</label>
                                                <input type="number" step=".01" name="Price" required value="@TempData["Price"]" class="form-control" placeholder="Enter Course Price">
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Status</label>
                                                <select id="cates" name="Status" class="form-control">
                                                    <option value="active" selected>Show On Store</option>
                                                    <option value="hidden">Hide From Store</option>
                                                </select>
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Product Policy</label>
                                                <div class="row m-0">
                                                    <textarea rows="10" maxlength="1500" name="ProductPolicy" class="form-control" placeholder="Words related or similar to this products name and description">@TempData["ProductPolicy"]</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Shipping</label>
                                                <div class="row m-0">
                                                    <textarea rows="10" maxlength="1500" name="Shipping" class="form-control" placeholder="Words related or similar to this products name and description">@TempData["Shipping"]</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Image *</label>
                                                <input type="file" required class="form-control" name="Image" placeholder="Upload one png, jpeg, or jpg file">
                                            </div>

                                            <br />

                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn text-white full-width theme-bg">Submit</button>
                                                </div>
                                            </div>

                                            <br />
                                            <br />
                                        }
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
