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
                        <h6 class="m-0">Admin Management</h6>
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
                                                if (ViewBag.selectedAdminListLimit == Data.Value)
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
                                <label>Roll</label>
                                <div class="smalls">
                                    <select id="prc" name="Filter" class="form-control">
                                        @{
                                            var list2 = new List<KeyValuePair<string, string>>() {
                                                new KeyValuePair<string, string>("All", "all"),
                                                new KeyValuePair<string, string>("Master", "master"),
                                                new KeyValuePair<string, string>("Creator", "create"),
                                                new KeyValuePair<string, string>("Read Only", "read"),
                                                new KeyValuePair<string, string>("Update", "update"),
                                                new KeyValuePair<string, string>("Delete", "delete")
                                            };

                                            foreach (var Data in list2)
                                            {
                                                if (ViewBag.selectedAdminRoll == Data.Value)
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
                                if (Model.Admins != null)
                                {
                                    int i = 0;
                                    foreach (var Data in Model.Admins)
                                    {
                                        i++;
                                    }

                                    if (i > 0)
                                    {

                                        <table class="table dash_list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Added By</th>
                                                    <th scope="col">Roll</th>
                                                    <th scope="col">EmpNumber</th>
                                                    <th scope="col">Access</th>
                                                    @{
                                                        if (ViewBag.AdminRoll == "root" || ViewBag.AdminRoll == "master")
                                                        {
                                                            <th scope="col">
                                                                Actions
                                                            </th>
                                                        }
                                                    }


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td><h6>@ViewBag.RootAdminEmail</h6></td>
                                                    <td><div class="smalls lg">FoodStuff Store</div></td>
                                                    <td><span class="smalls lg">Back Office</span></td>
                                                    <td><span class="trip text-white theme-bg">Root Admin</span></td>
                                                    <td><span class="dhs_tags"> ... </span></td>
                                                    <td><span class="dhs_tags">Granted</span></td>
                                                    <td></td>
                                                </tr>
                                                @{
                                                    int count = 1;
                                                    foreach (var Data in Model.Admins)
                                                    {
                                                        count++;

                                                        <tr>
                                                            <th scope="row">@count</th>
                                                            <td><h6>@Data.UserEmail</h6><p>Reg Date:<span>@Data.RegDate</span></p></td>
                                                            <td><div class="smalls lg">@Data.Username</div></td>
                                                            <td><div class="smalls">@Data.AddedBy</div></td>
                                                            <td><span class="smalls">@Data.Roll</span></td>
                                                            <td><span class="dhs_tags">@Data.EmpNumber</span></td>
                                                            <td><span class="dhs_tags">@Data.GrantAccess</span></td>
                                                            @{
                                                                if (ViewBag.AdminRoll == "root" || ViewBag.AdminRoll == "master")
                                                                {
                                                                    <td>
                                                                        <div class="dropdown show">
                                                                            <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="fas fa-ellipsis-h"></i>
                                                                            </a>
                                                                            <div class="drp-select dropdown-menu">
                                                                                @{
                                                                                    if (ViewBag.AdminRoll == "root")
                                                                                    {
                                                                                        @using (Html.BeginForm("UpdateAdminAccess", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <button type="submit" class="dropdown-item">Deny Access</button>
                                                                                        }
                                                                                    }
                                                                                }
                                                                                @{
                                                                                    if (ViewBag.AdminRoll == "root" || ViewBag.AdminRoll == "master")
                                                                                    {
                                                                                        @using (Html.BeginForm("ResetAdminPassword", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <button type="submit" class="dropdown-item">Reset Password</button>
                                                                                        }
                                                                                    }
                                                                                }
                                                                                @{
                                                                                    if (ViewBag.AdminRoll == "root" || ViewBag.AdminRoll == "master")
                                                                                    {
                                                                                        @using (Html.BeginForm("DeleteAdmin", "Admin", FormMethod.Post))
                                                                                        {
                                                                                            <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                            <button type="submit" class="dropdown-item">Delete Admin</button>
                                                                                        }
                                                                                    }
                                                                                }
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                }
                                                            }
                                                        </tr>


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
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Added By</th>
                                                    <th scope="col">Roll</th>
                                                    <th scope="col">EmpNumber</th>
                                                    <th scope="col">Access</th>
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
                                                        No admin found. Might as well adjust your search for a different result.
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
                                                <th scope="col">Username</th>
                                                <th scope="col">Added By</th>
                                                <th scope="col">Roll</th>
                                                <th scope="col">EmpNumber</th>
                                                <th scope="col">Access</th>
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
                                                    No admin found. Might as well adjust your search for a different result.
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
