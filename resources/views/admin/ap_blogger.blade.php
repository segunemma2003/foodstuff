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
                    <a href="#" class="add_new_btn" data-toggle="modal" data-target="#createPostModal"><i class="fas fa-plus mr-1"></i>Create Post</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

    <!-- /Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <section class="dashboard_wrap">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                        <h6 class="m-0">Blog Posts</h6>
                    </div>
                </div>

                @using (Html.BeginForm("Search", "Admin", FormMethod.Post))
                {

                    <!-- <div class="row align-items-end mb-5">
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Search</label>
                                <div class="smalls input-with-icon">
                                    <input type="text" name="SearchField" class="form-control" value="@ViewBag.initialSearchKeyword">
                                    <i class="ti-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="smalls">
                                    <select id="prc" name="Filter" class="form-control">
                                        @*@{
                                            var blogStatusOptions = new List<KeyValuePair<string, string>>() {
                                                new KeyValuePair<string, string>("Online", "true"),
                                    new KeyValuePair<string, string>("Offline", "false"),
                                            };

                                            foreach (var Data in blogStatusOptions)
                                            {
                                                if (ViewBag.selectedBlogPostStatus == Data.Value)
                                                {
                                                    <option value="@Data.Value" selected>@Data.Key</option>
                                                }
                                                else
                                                {
                                                    <option value="@Data.Value">@Data.Key</option>
                                                }
                                            }
                                        }*@
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Rows</label>
                                <div class="smalls">
                                    <select id="prc" name="Filter" class="form-control">
                                        @*@{
                                            var blogRowOptions = new List<KeyValuePair<int, int>>() {
                                    new KeyValuePair<int, int>(10, 10),
                                    new KeyValuePair<int, int>(25, 25),
                                    new KeyValuePair<int, int>(50, 50),
                                    new KeyValuePair<int, int>(100, 100),
                                    new KeyValuePair<int, int>(250, 250),
                                    new KeyValuePair<int, int>(500, 500),
                                    new KeyValuePair<int, int>(1000, 1000),
                                            };

                                            foreach (var Data in blogRowOptions)
                                            {
                                                if (ViewBag.selectedBlogPostLimit == Data.Value)
                                                {
                                                    <option value="@Data.Value" selected>@Data.Key</option>
                                                }
                                                else
                                                {
                                                    <option value="@Data.Value">@Data.Key</option>
                                                }
                                            }
                                        }*@
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                            <div class="form-group">
                                <button type="submit" class="btn text-white full-width theme-bg">Filter</button>
                            </div>
                        </div>
                    </div> -->
                }

                <section class="min">
                    <div class="container">

                        <div class="row justify-content-center">

                            @{
                                if (Model.Posts != null)
                                {
                                    int i = 0;
                                    foreach (var Data in Model.Posts)
                                    {
                                        i++;
                                    }

                                    if (i > 0)
                                    {

                                        int count = 0;
                                        foreach (var Data in Model.Posts)
                                        {
                                            count++;
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                <div class="blg_grid_box">
                                                    <div class="blg_grid_thumb">
                                                        <a href="@Data.Link" target="_blank"><img src="@Data.DisplayImage" class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="blg_grid_caption">
                                                        <div class="blg_tag"><span>@Data.Category</span></div>
                                                        <div class="blg_title"><h4><a href="@Data.Link" target="_blank">@Data.Header</a></h4></div>
                                                        <div class="blg_desc"><p>@Data.Body</p></div>
                                                    </div>
                                                    <div class="crs_grid_foot">
                                                        <div class="crs_flex">
                                                            <div class="crs_fl_first">
                                                                <div class="foot_list_info">
                                                                    <ul>
                                                                        <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">@Data.Source</div></li>
                                                                        <li><div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div><div class="elsio_tx">@Data.Date</div></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
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

                                                    <img src="~/assets/img/NotFound.png" style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                                    <br /><br />
                                                    <h5 style="color:#818181;">
                                                        No post found. Might as well adjust your search for a different result.
                                                    </h5>

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

                                                <img src="~/assets/img/NotFound.png" style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                                <br /><br />
                                                <h5 style="color:#818181;">
                                                    No post found. Might as well adjust your search for a different result.
                                                </h5>

                                            </div>
                                        </div>
                                    </div>
                                }
                            }
                        </div>
                    </div>
                </section>



            </div>
        </div>
    </div>
</div>
