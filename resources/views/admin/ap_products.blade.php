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

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                        <h6 class="m-0">Manage Food Stock</h6>
                    </div>
                </div>

                @using (Html.BeginForm("Search", "Admin", FormMethod.Post))
                {
                    <div class="row align-items-end mb-5">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Search</label>
                                <div class="smalls input-with-icon">
                                    <input type="text" name="SearchField" class="form-control" value="@ViewBag.initialSearchKeyword">
                                    <i class="ti-search"></i>
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
                                                if (ViewBag.selectedProductListLimit == Data.Value)
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
                                <label>Category</label>
                                <div class="smalls">
                                    <select id="prc" name="Filter" class="form-control">
                                        @{
                                            var list2 = new List<KeyValuePair<string, string>>() {
                                                new KeyValuePair<string, string>("All Category", "all"),
                                                new KeyValuePair<string, string>("Vegetable", "Vegetable"),
                                                new KeyValuePair<string, string>("Proteins", "Protein"),
                                                new KeyValuePair<string, string>("Fruits", "Fruit"),
                                                new KeyValuePair<string, string>("Grains", "Grains"),
                                                new KeyValuePair<string, string>("Nuts", "Nuts"),
                                                new KeyValuePair<string, string>("Processed Food", "Processed"),
                                                new KeyValuePair<string, string>("Fluids", "Fluids"),
                                                new KeyValuePair<string, string>("Seasoning", "Seasoning"),
                                                new KeyValuePair<string, string>("Live Stock", "Live Stock"),
                                                new KeyValuePair<string, string>("Seeds", "Seeds")
                                            };

                                            foreach (var Data in list2)
                                            {
                                                if (ViewBag.selectedProductCategory == Data.Value)
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
                                if (Model.FoodStuffs != null)
                                {
                                    int i = 0;
                                    foreach (var Data in Model.FoodStuffs)
                                    {
                                        i++;
                                    }

                                    if (i > 0)
                                    {
                                        <table class="table dash_list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col" style="width:300px;">Name</th>
                                                    <th scope="col" >Price</th>
                                                    <th scope="col">Unit/Weight</th>
                                                    <th scope="col">Tags</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">
                                                        <a class="btn btn-action" asp-area="" asp-controller="Admin" asp-action="APAddProduct" target="_blank" title="Add Product">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @{
                                                    int count = 0;
                                                    foreach (var Data in Model.FoodStuffs)
                                                    {
                                                        count++;
                                                        @using (Html.BeginForm("EditFoodStuff", "Admin", FormMethod.Post))
                                                        {
                                                            <tr>
                                                                <th scope="row">@count.</th>
                                                                <td><img src="@Data.Image" class="img-fluid" width="50" alt="" /></td>
                                                                <td>
                                                                <div class="row" style="width:300px;">
                                                                        <input value="@Data.Name" name="Name" type="text" required style="border:none;" />
                                                                        <p>Details:<span>@Data.ProductID - @Data.AddDate.ToString().Substring(0, 10)</span></p>
                                                                        <div class="dhs_tags">Orders: @Data.Orders Sold in last 30days</div>
                                                                </div>
                                                                    
                                                                </td>
                                                                <td><div class="trip theme-cl theme-bg-light">₦<input value="@Data.Price" type="number" name="Price" required style="border:none; width:50px; background-color:transparent;" /></div></td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="trip theme-cl theme-bg-light">
                                                                            Unit: <input value="@Data.Unit" type="text" name="Unit" required style="border:none; width:50px; background-color:transparent;" />
                                                                        </div>
                                                                        <div class="trip theme-cl theme-bg-light">
                                                                            Weight: <input value="@Data.Weight" type="text" name="Weight" required style="border:none; width:50px; background-color:transparent;" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="smalls"><input value="@Data.Tags" type="text" required name="Tags" style="border:none;" /></span></td>
                                                                <td>

                                                                    <select id="prc" name="Category" class="form-control" style="width:150px;">
                                                                        @{
                                                                            var list3 = new List<KeyValuePair<string, string>>() {
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

                                                                            foreach (var Item in list3)
                                                                            {
                                                                                if (Item.Value == Data.Category)
                                                                                {
                                                                                    <option value="@Item.Value" selected>@Item.Key</option>
                                                                                }
                                                                                else
                                                                                {
                                                                                    <option value="@Item.Value">@Item.Key</option>
                                                                                }
                                                                            }
                                                                        }
                                                                    </select>

                                                                </td>
                                                                <td>
                                                                    <select id="prc" name="Status" class="form-control" style="width:100px;">
                                                                        @{
                                                                            var list4 = new List<KeyValuePair<string, string>>() {
                                                new KeyValuePair<string, string>("Active", "active"),
                                                new KeyValuePair<string, string>("Hidden", "hidden"),
                                            };

                                                                            foreach (var Item in list4)
                                                                            {
                                                                                if (Item.Value == Data.Status)
                                                                                {
                                                                                    <option value="@Item.Value" selected>@Item.Key</option>
                                                                                }
                                                                                else
                                                                                {
                                                                                    <option value="@Item.Value">@Item.Key</option>
                                                                                }
                                                                            }
                                                                        }
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown show">
                                                                        <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fas fa-ellipsis-h"></i>
                                                                        </a>
                                                                        <div class="drp-select dropdown-menu">

                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                            <input type="text" name="ProductID" value="@Data.ProductID" hidden />
                                                                            <button type="submit" class="dropdown-item">Save Changes</button>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        }
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
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Unit/Weight</th>
                                                    <th scope="col">Tags</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Status</th>
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
                                                        No product found. Might as well adjust your search for a different result.
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
                                                <th scope="col">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Unit/Weight</th>
                                                <th scope="col">Tags</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Status</th>
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
                                                    No product found. Might as well adjust your search for a different result.
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
    <!-- /Row -->
</div>
