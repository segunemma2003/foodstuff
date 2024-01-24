@extends('shared.layout')
@section('Title', "Manage Invoice")
@section('content')
<style>    
    #pay-button {
        cursor: pointer;
        position: relative;
        background-color: #DC002D;
        color: #fff;
        max-width: 30%;
        padding: 10px;
        font-weight: 600;
        font-size: 14px;
        border-radius: 10px;
        border: none;
        transition: all .1s ease-in;
    }
</style>

<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Manage Invioce</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            {{-- <li class="breadcrumb-item">
                                <a asp-area="" asp-controller="Home" asp-action="@ViewBag.prevPageLink">
                                    @ViewBag.prevPageName
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                @ViewBag.corePageName
                            </li> --}}
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<section>
    <div class="container">
        <br />
        @if (session('SuccessMessage'))
        <div class="form-group">
            <div class="alert alert-success">
                ✔ {{ session('SuccessMessage') }}
            </div>
        </div>
        @endif
        @if (session('ErrorMessage'))
        <div class="form-group">
            <div class="alert alert-warning">
                ⚠ {{ session('ErrorMessage') }}
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card style-2">
                    <div class="card-header">
                        <h4 class="mb-0">Manage Invoice</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap">
                                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center theme-bg mb-2">
                                        <div class="position-absolute text-white h5 mb-0"><i class="fas fa-file"></i></div>
                                    </div>
                                    <div class="dashboard_stats_wrap_content">
                                        <h5>₦ 
                                            {{-- {{ $ViewBag['totalUnpaidInvoices'] }} --}}
                                        </h5>
                                        <span>Unpaid Invoices</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap">
                                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-primary mb-2">
                                        <div class="position-absolute text-white h5 mb-0"><i class="fas fa-truck"></i></div>
                                    </div>
                                    <div class="dashboard_stats_wrap_content">
                                        <h5>
                                            {{-- {{ $ViewBag['totalOrders'] }} --}}
                                        </h5>
                                        <span>Total Orders</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap">
                                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-warning mb-2">
                                        <div class="position-absolute text-white h5 mb-0"><i class="fas fa-chart-pie"></i></div>
                                    </div>
                                    <div class="dashboard_stats_wrap_content">
                                        <h5>₦ 
                                            {{-- {{ $ViewBag['totalOrdersIn7Days'] }} --}}
                                        </h5>
                                        <span>Orders in 7 days</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap">
                                    <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-purple mb-2">
                                        <div class="position-absolute text-white h5 mb-0"><i class="fas fa-chart-line"></i></div>
                                    </div>
                                    <div class="dashboard_stats_wrap_content">
                                        <h5>
                                            {{-- {{ $ViewBag['totalExpenseIn7Days'] }} --}}
                                        </h5>
                                        <span>Expense in 7 days</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Row -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="dashboard_wrap">
                                    <div class="row justify-content-between">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            {{-- <form method="post" action="{{ route('home.filterInvoices') }}"> --}}
                                            <form method="post" action="">
                                                @csrf
                                                <div class="row align-items-end mb-5">
                                                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12">
                                                        <div class="form-group">
                                                            <div class="smalls">
                                                                <select id="cates" name="Status" class="form-control">
                                                                    <option value="all">All</option>
                                                                    <option value="approved">Approved</option>
                                                                    <option value="pending">Pending</option>
                                                                    <option value="dispatched">Dispatched</option>
                                                                    <option value="canceled">Canceled</option>
                                                                    <option value="refunded">Refunded</option>
                                                                    <option value="delivered">Delivered</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn text-white full-width theme-bg">Filter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row pt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                                            <div class="table-responsive">
                                                @if (!empty($Model['Invoices']))
                                                <table class="table dash_list">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">Invoice ID</th>
                                                            <th scope="col">My Budget</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($Model['Invoices'] as $Data)
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h6>{{ $Data['Fullname'] }}</h6>
                                                                <p>Date: <span>{{ $Data['ServerDateTime'] }}</span></p>
                                                            </td>
                                                            <td>
                                                                <div class="dhs_tags">{{ $Data['Address'] }}</div>
                                                            </td>
                                                            <td>
                                                                <a href="https://foodstuff.store/apps/invoicepreview?InvoiceID={{ $Data['InvoiceID'] }}" target="_blank">
                                                                    <span class="smalls">{{ $Data['InvoiceID'] }}</span>
                                                                </a>
                                                            </td>
                                                            <td><span class="smalls">₦{{ $Data['Budget'] }}</span></td>
                                                            <td><span class="dhs_tags">{{ $Data['Status'] }}</span></td>
                                                            <td>
                                                                <span class="smalls">₦{{ $Data['Total'] }}</span> &nbsp;
                                                                @if ($Data['Paid'] === "true")
                                                                <span class="trip text-white bg-info">&nbsp;Paid&nbsp;</span>
                                                                @else
                                                                <span class="trip theme-cl theme-bg-light">UnPaid</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="dropdown show">
                                                                    <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-h"></i>
                                                                    </a>
                                                                    <div class="drp-select dropdown-menu">
                                                                        <a href="https://foodstuff.store/Apps/InvoicePreview?InvoiceID={{ $Data['InvoiceID'] }}" target="_blank" class="dropdown-item pl-4"><h6>Preview Invoice</h6></a>
                                                                        @if ($Data['Paid'] === "false")
                                                                        {{-- <a class="dropdown-item pl-4" href="{{ $ViewBag['CompanyWebsite'] }}/Home/Checkout?invcid={{ $Data['InvoiceID'] }}" target="_blank"><h6>Pay</h6></a> --}}
                                                                        <a class="dropdown-item pl-4" href="" target="_blank"><h6>Pay</h6></a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>
                                                @else
                                                <table class="table dash_list">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">Invoice ID</th>
                                                            <th scope="col">My Budget</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6 col-md-10">
                                                        <div class="text-center">
                                                            <img src="../../assets/img/NotFound.png" style="width:50%;" class="img-fluid" alt="" />
                                                            <br /><br />
                                                            <h4>
                                                                Nothing to see here, you have no orders yet.
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
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



@endsection