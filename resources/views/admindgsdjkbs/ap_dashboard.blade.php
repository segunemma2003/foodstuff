@using foodstuffstore.Functions;
@model dynamic

@{
    ViewData["Title"] = ViewBag.corePageName;
}

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<div class="col-lg-9 col-md-9 col-sm-12">

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


        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <a asp-area="" asp-controller="Admin" asp-action="APActiveUsers">
                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center theme-bg mb-2"><div class="position-absolute text-white h5 mb-0"><i class="fas fa-users"></i></div></div>
                    <div class="dashboard_stats_wrap_content"><h4>@ViewBag.totalNumberOfActiveRegisteredUsers</h4> <span>Active Users</span></div>
                </a>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <a asp-area="" asp-controller="Admin" asp-action="APUnPaidInvoices">
                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-primary mb-2"><div class="position-absolute text-white h5 mb-0"><i class="fas fa-hourglass"></i></div></div>
                    <div class="dashboard_stats_wrap_content"><h4>@ViewBag.totalNumberOfPendingApprovalInvoices</h4> <span>UnPaid Invoices</span></div>
                </a>
            </div>
        </div>



        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <a asp-area="" asp-controller="Admin" asp-action="APPaidInvoices">
                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-warning mb-2"><div class="position-absolute text-white h5 mb-0"><i class="fas fa-check"></i></div></div>
                    <div class="dashboard_stats_wrap_content"><h4>@ViewBag.totalNumberOfDispatchedInvoices</h4> <span>Paid Invoices</span></div>
                </a>
            </div>
        </div>



        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <a asp-area="" asp-controller="Admin" asp-action="APUnreadQueries">
                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-purple mb-2"><div class="position-absolute text-white h5 mb-0"><i class="fas fa-question"></i></div></div>
                    <div class="dashboard_stats_wrap_content"><h4>@ViewBag.unreadSupportQueries</h4> <span>Unread Queries</span></div>
                </a>
            </div>
        </div>


    </div>
    <!-- /Row --><!-- Row -->
    <div class="row">


        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <a asp-area="" asp-controller="Admin" asp-action="APInvoices">
                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center theme-bg mb-2"><div class="position-absolute text-white h5 mb-0"><i class="fas fa-chart-line"></i></div></div>
                    <div class="dashboard_stats_wrap_content"><h5>₦ @ValueHelper.BalanceFormatter("", ViewBag.totalCompanyRevenue.ToString())</h5> <span>Company Revenue</span></div>
                </a>
            </div>
        </div>



        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <a asp-area="" asp-controller="Admin" asp-action="APInvoices">
                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-primary mb-2"><div class="position-absolute text-white h5 mb-0"><i class="fas fa-truck"></i></div></div>
                    <div class="dashboard_stats_wrap_content"><h5>@ViewBag.totalCompanyOrders</h5> <span>Total Company Orders</span></div>
                </a>
            </div>
        </div>



        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <a asp-area="" asp-controller="Admin" asp-action="APInvoices">
                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-warning mb-2"><div class="position-absolute text-white h5 mb-0"><i class="fas fa-chart-pie"></i></div></div>
                    <div class="dashboard_stats_wrap_content"><h5>₦ @ValueHelper.BalanceFormatter("", ViewBag.totalCompanyRevenueIn7days.ToString())</h5> <span>Income in 7days</span></div>
                </a>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <a asp-area="" asp-controller="Admin" asp-action="APInvoices">
                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-purple mb-2">
                        <div class="position-absolute text-white h5 mb-0"><i class="fas fa-box"></i></div>
                    </div>
                    <div class="dashboard_stats_wrap_content"><h5>@ViewBag.totalCompanyOrdersIn7Days</h5> <span>Orders in 7days</span></div>
                </a>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap" style="height:300px;">
                <a href="#">
                    <div class="p-4 p-sm-4 d-inline-flex align-items-center justify-content-center mb-2">
                        <canvas id="myChart0" style="width:100%;max-width:600px"></canvas>
                    </div>
                    <div class="dashboard_stats_wrap_content"> <span>Days customers visited the website the most</span></div>
                </a>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap" style="height:300px;">
                <a href="#">
                    <div class="p-4 p-sm-4 d-inline-flex align-items-center justify-content-center mb-2">
                        <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
                    </div>
                    <div class="dashboard_stats_wrap_content"> <span>Days customers visited the mobile app the most</span></div>
                </a>
            </div>
        </div>
    </div>
    <!-- /Row -->

</div>



<script>
    var xValues = ["Sun", "Mon", "Tues", "Wed", "Thur", "Fri", "Sat"];
    var yValues = [@ViewBag.sunday0, @ViewBag.monday0, @ViewBag.tuesday0, @ViewBag.wednesday0, @ViewBag.thursday0, @ViewBag.friday0, @ViewBag.saturday0];
    var barColors = ["red", "green", "blue", "orange", "brown", "purple", "yellow"];

    new Chart("myChart0", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Since Apr 26th, 2023"
            }
        }
    });
</script>

<script>
    var xValues = ["Sun", "Mon", "Tues", "Wed", "Thur", "Fri", "Sat"];
    var yValues = [@ViewBag.sunday1, @ViewBag.monday1, @ViewBag.tuesday1, @ViewBag.wednesday1, @ViewBag.thursday1, @ViewBag.friday1, @ViewBag.saturday1];
    var barColors = ["red", "green", "blue", "orange", "brown", "purple", "yellow"];

    new Chart("myChart1", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Since Apr 26th, 2023"
            }
        }
    });
</script>