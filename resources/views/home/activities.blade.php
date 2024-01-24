@model dynamic

@{
    ViewData["Title"] = ViewBag.corePageName;
}

<br />
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Activity</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a asp-area="" asp-controller="Home" asp-action="@ViewBag.prevPageLink">
                                    @ViewBag.prevPageName
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                @ViewBag.corePageName
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">

        <div class="row">
            <div class="col-lg-2 col-md-2">
                <nav class="dashboard-nav mb-10 mb-md-0">
                    <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                        <a class="list-group-item list-group-item-action dropright-toggle" asp-area="" asp-controller="Home" asp-action="ManageInvoice">
                            My Order
                        </a>
                        <a class="list-group-item list-group-item-action dropright-toggle" asp-area="" asp-controller="Home" asp-action="ManageAddresses">
                            Manage Address
                        </a>
                        <a class="list-group-item list-group-item-action dropright-toggle" asp-area="" asp-controller="Home" asp-action="Likes">
                            Likes
                        </a>
                        <a class="list-group-item list-group-item-action dropright-toggle" asp-area="" asp-controller="Home" asp-action="EditProfile">
                            Edit Profile
                        </a>
                        <a class="list-group-item list-group-item-action dropright-toggle" asp-area="" asp-controller="Home" asp-action="ChangePassword">
                            Change Password
                        </a>
                        <a class="list-group-item list-group-item-action dropright-toggle active theme-bg text-white" href="#">
                            Activity
                        </a>
                        <a class="list-group-item list-group-item-action dropright-toggle" asp-area="" asp-controller="Home" asp-action="ManageRestaurants">
                            My Restaurants
                        </a>
                        <a class="list-group-item list-group-item-action dropright-toggle" data-toggle="modal" title="Sign Out" data-target="#logout" href="#">
                            Sign Out
                        </a>
                    </div>
                </nav>
            </div>

			<div class="col-lg-10 col-md-10">
				<!-- Total Items -->
				<div class="card style-2">
					<div class="card-header">
						<h4 class="mb-0">Recent Activities</h4>
					</div>
					<div class="card-body">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="short_wraping">
                                    <div class="row m-0 align-items-center justify-content-between">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
                                            @using (Html.BeginForm("RefreshActivityType", "Home", FormMethod.Post))
                                            {
                                                <div class="input-group">
                                                    <select id="cates" name="Type" class="form-control">
                                                        <option value="all">All</option>
                                                        <option value="regular">Notifications</option>
                                                        <option value="transaction">Transactions</option>
                                                        <option value="security">Security Alerts</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button type="submit" class="input-group-text theme-bg b-0 text-light" style="border: none; width:54px; height:54px;">
                                                            <span class="ti-reload"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            }
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="dashboard_wrap">

                                    <div class="row pt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                                            <div class="table-responsive">
                                                @{
                                                    if (Model.Activities != null)
                                                    {
                                                        int i = 0;
                                                        foreach (var Data in Model.Activities)
                                                        {
                                                            i++;
                                                        }

                                                        if (i > 0)
                                                        {

                                                            <table class="table dash_list">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="50px" scope="col">#</th>
                                                                        <th scope="col">Activity</th>
                                                                        <th scope="col">Date</th>
                                                                    </tr>
                                                                </thead>

                                                                @{
                                                                    foreach (var Data in Model.Activities)
                                                                    {
                                                                        <tbody>
                                                                            <tr>
                                                                                <th width="50px" scope="row">
                                                                                    @{
                                                                                        if (Data.Type == "transaction")
                                                                                        {
                                                                                            <i style="color:orange" class="fas fa-credit-card"></i>
                                                                                        }
                                                                                        else if (Data.Type == "security")
                                                                                        {
                                                                                            <i style="color:green" class="fas fa-lock success"></i>
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            <i style="color: #DC002D" class="fas fa-bell"></i>
                                                                                        }
                                                                                    }
                                                                                </th>
                                                                                <td><div class="smalls lg">@Data.Message</div></td>
                                                                                <td><div class="dhs_tags">@Data.ServerDateTime</div></td>
                                                                            </tr>
                                                                        </tbody>

                                                                    }
                                                                }
                                                            </table>
                                                        }

                                                        else
                                                        {
                                                            <div class="row justify-content-center">

                                                                <div class="col-lg-6 col-md-10">
                                                                    <div class="text-center">

                                                                        <img src="../../assets/img/NotFound.png" style="width:50%;" class="img-fluid" alt="" />
                                                                        <br /><br />
                                                                        <h4>
                                                                            Nothing to see here, return to store.
                                                                        </h4>
                                                                        <br />
                                                                        <a asp-area="" asp-controller="Home" asp-action="Store" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        }
                                                    }
                                                    else
                                                    {
                                                        <div class="row justify-content-center">
                                                            <div></div>
                                                            <div class="col-lg-6 col-md-10">
                                                                <div class="text-center">

                                                                    <img src="../../assets/img/NotFound.png" style="width:50%;" class="img-fluid" alt="" />
                                                                    <br /><br />
                                                                    <h4>
                                                                        Nothing to see here, return to store.
                                                                    </h4>
                                                                    <br />
                                                                    <a asp-area="" asp-controller="Home" asp-action="Store" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
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
    </div>
</section>
