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
                        <h6 class="m-0">Change Log</h6>
                        <p class="dhs_tags" style="text-align:left; padding:10px; margin:10px;">
                            ⓘ Live mode features have been tested and have passed the testing phase. Live mode functionalities are working and are available to all users,
                            including admin and customers.
                        </p>
                        
                        <p class="dhs_tags" style="text-align:left; padding:10px; margin:10px;">
                            ⓘ Beta mode feature may be available or under-going the testing phase.
                            In the short term, if a beta mode feature is useful and effective it will be upgraded to Live mode, else, it'll be discontinued.
                        </p>
                        
                        <p class="dhs_tags" style="text-align:left; padding:10px; margin:10px;">
                            ⓘ Obsolete mode features or functionalities, are out of date, discontinued and are no longer in use.
                        </p>

                        <p class="dhs_tags" style="text-align:left; padding:10px; margin:10px;">
                            ⓘ Feature names are unique. They may appear more than once on different dates, versions and application modes.
                        </p>
                    </div>
                </div>

                @using (Html.BeginForm("SearchChangeLog", "Admin", FormMethod.Post))
                {
                    <div class="row align-items-end mb-5">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Search</label>
                                <div class="smalls input-with-icon">
                                    <input type="text" name="SearchField" class="form-control" value="@ViewBag.initialSearchKeyword">
                                    <input type="text" name="CorePageLink" value="@ViewBag.corePageLink" hidden>
                                    <i class="ti-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Mode</label>
                                <div class="smalls">
                                    <select id="prc" name="Mode" class="form-control">
                                        @{
                                            var modeList = new List<KeyValuePair<string, string>>() {
                                    new KeyValuePair<string, string>("All", "all"),
                                    new KeyValuePair<string, string>("Live Versions", "live"),
                                    new KeyValuePair<string, string>("Beta Versions", "beta"),
                                    new KeyValuePair<string, string>("Obsolete Versions", "obsolete"),
                                    };

                                            foreach (var Data in modeList)
                                            {
                                                if (ViewBag.selectedMode == Data.Value)
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
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
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
                                                if (ViewBag.selectedChangeLogRow == Data.Value)
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
                                if (Model.ChangeLog != null)
                                {
                                    int i = 0;
                                    foreach (var Data in Model.ChangeLog)
                                    {
                                        i++;
                                    }

                                    if (i > 0)
                                    {
                                        <table class="table dash_list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Feature</th>
                                                    <th scope="col">About</th>
                                                    <th scope="col">Mode</th>
                                                    <th scope="col">Current Version</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @{
                                                    int count = 0;
                                                    foreach (var Data in Model.ChangeLog)
                                                    {
                                                        count++;

                                                        <tr>
                                                            <th scope="row">@count</th>
                                                            <td><h6>@Data.LogName</h6><p>Last Updated: <span>@Data.LastEditedDate</span></p></td>
                                                            <td><div class="dhs_tags" style="text-align:left;">@Data.AboutLog</div></td>
                                                            <td>
                                                                @if(Data.Mode == "live")
                                                                {
                                                                    <span class="trip text-white bg-info">LIVE</span>
                                                                }
                                                                else if (Data.Mode == "beta")
                                                                {
                                                                    <span class="trip text-white bg-secondary">BETA</span>
                                                                }
                                                                else
                                                                {
                                                                    <span class="trip theme-cl theme-bg-light">OBSOLETE</span>
                                                                }
                                                            </td>
                                                            <td><span class="smalls">@Data.Version</span></td>
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
                                                    <th scope="col">Feature</th>
                                                    <th scope="col">About</th>
                                                    <th scope="col">Last Edited</th>
                                                    <th scope="col">Mode</th>
                                                    <th scope="col">Current Version</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <div class="row justify-content-center">

                                            <div class="col-lg-6 col-md-10">
                                                <div class="text-center">

                                                    <img src="~/assets/img/NotFound.png" style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                                    <br /><br />
                                                    <h5 style="color:#818181;">
                                                        No log found. Might as well adjust your search for a different result.
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
                                                <th scope="col">Feature</th>
                                                <th scope="col">About</th>
                                                <th scope="col">Last Edited</th>
                                                <th scope="col">Mode</th>
                                                <th scope="col">Current Version</th>
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
                                                    No log found. Might as well adjust your search for a different result.
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
