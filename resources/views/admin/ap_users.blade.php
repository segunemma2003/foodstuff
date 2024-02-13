﻿@model dynamic

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
                    <a href="#" class="add_new_btn" data-toggle="modal" data-target="#bulkMailModal"><i class="fas fa-envelope mr-1"></i>Send Bulk Mail</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

    <!-- /Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                        <h6 class="m-0">Users</h6>
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
                                                if (ViewBag.selectedUserListLimit == Data.Value)
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
                                    <select id="prc" name="Filter" class="form-control">
                                        @{
                                            var list2 = new List<KeyValuePair<string, string>>() {
                                                new KeyValuePair<string, string>("All", "all"),
                                                new KeyValuePair<string, string>("Active", "active"),
                                    new KeyValuePair<string, string>("Blocked", "suspended")
                                            };

                                            foreach (var Data in list2)
                                            {
                                                if (ViewBag.selectedUserStatus == Data.Value)
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
                                if (Model.Users != null)
                                {
                                    int i = 0;
                                    foreach (var Data in Model.Users)
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
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Fullname</th>
                                                    <th scope="col">Credit</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">
                                                        <a class="btn btn-action" asp-area="" asp-controller="Admin" asp-action="APAddUser" target="_blank" title="Add User / Business">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @{
                                                    int count = 0;
                                                    foreach (var Data in Model.Users)
                                                    {
                                                        count++;
                                                        <tr>
                                                            <th scope="row">@count</th>
                                                            <td><h6>@Data.UserEmail</h6><p>Registration: <span>@Data.AccountType Account - @Data.RegDateTime</span></p></td>
                                                            <td><div class="dhs_tags">@Data.Phone</div></td>
                                                            <td><div class="smalls">@Data.Username</div></td>
                                                            <td><span class="dhs_tags">@Data.Credit</span></td>
                                                            <td><span class="dhs_tags">@Data.Status</span></td>
                                                            <td>
                                                                <div class="dropdown show">
                                                                    <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-h"></i>
                                                                    </a>
                                                                    <div class="drp-select dropdown-menu">
                                                                        @using (Html.BeginForm("VisitUserProfile", "Admin", FormMethod.Post))
                                                                        {
                                                                            <input type="text" name="UUID" value="@Data.UUID" hidden />
                                                                            <input type="text" name="Username" value="@Data.Username" hidden />
                                                                            <button type="submit" class="dropdown-item">Customer Affairs</button>
                                                                        }
                                                                        @{
                                                                            if (ViewBag.AdminRoll == "root" || ViewBag.AdminRoll == "master")
                                                                            {
                                                                                @using (Html.BeginForm("BlockUser", "Admin", FormMethod.Post))
                                                                                {
                                                                                    if (@Data.Status != "blocked")
                                                                                    {
                                                                                        <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                        <input type="text" name="Signature" value="@Data.Status" hidden />
                                                                                        <button type="submit" class="dropdown-item">Block User</button>
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                        <button type="submit" class="dropdown-item">Unblock User</button>
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        @{
                                                                            if (ViewBag.AdminRoll == "root" || ViewBag.AdminRoll == "master")
                                                                            {
                                                                                @using (Html.BeginForm("ResetUsersPassword", "Admin", FormMethod.Post))
                                                                                {
                                                                                    <input type="text" name="IDLabel" value="@Data.ID" hidden />
                                                                                    <button type="submit" class="dropdown-item">Reset Password</button>
                                                                                }
                                                                            }
                                                                        }
                                                                        <a href="mailto:@Data.UserEmail" type="text/plain" class="dropdown-item pl-4"><h6>Mail User</h6></a>
                                                                        <a href="tel:@Data.Phone" type="text/plain" class="dropdown-item pl-4"><h6>Call User</h6></a>
                                                                        <a href="#" type="text/plain" class="dropdown-item pl-4"><h6>Generate Invoice</h6></a>

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
                                        <table class="table dash_list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Fullname</th>
                                                    <th scope="col">Credit</th>
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
                                                        No user found. Might as well adjust your search for a different result.
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
                                                <th scope="col">Phone</th>
                                                <th scope="col">Fullname</th>
                                                <th scope="col">Credit</th>
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
                                                    No user found. Might as well adjust your search for a different result.
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
