@extends('shared.layout')
@section('Title', "Admin - User Profile")
@section('content')

<div class="col-lg-9 col-md-9 col-sm-12">
    <br />
    @if(session('SuccessMessage'))
        <div class="form-group">
            <div class="alert alert-success">
                ✔ {{ session('SuccessMessage') }}
            </div>
        </div>
    @endif
    @if(session('ErrorMessage'))
        <div class="form-group">
            <div class="alert alert-warning">
                ⚠ {{ session('ErrorMessage') }}
            </div>
        </div>
    @endif
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item">
                        <a href="{{ route('admin', ['prevPageLink' => 'your-link']) }}">
                            {{ $prevPageName }}
                        </a>
                    </li> --}}
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ session('Username') }} - Affairs
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->
    
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center theme-bg mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-chart-line"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    {{-- <h5>₦ {{ ValueHelper::BalanceFormatter('', $totalUserExpenditure) }}</h5> --}}
                    <span>Total Expenditure</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-primary mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-hourglass"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    {{-- <h5>{{ $totalUserNumberOUnPaidInvoices }}</h5> --}}
                    <span>UnPaid Invoices</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-warning mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-check"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    {{-- <h5>{{ $totalUserNumberOfPaidInvoices }}</h5> --}}
                    <span>Paid Invoices</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-purple mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-box"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    {{-- <h5>{{ $totalUserCompanyOrdersIn7Days }}</h5> --}}
                    <span>Orders in 7days</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center theme-bg mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-chart-line"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    {{-- <h5>₦ {{ ValueHelper::BalanceFormatter('', $totalUserExpenditureIn7days) }}</h5> --}}
                    <span>Expenditure in 7days</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-primary mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-hourglass"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    {{-- <h5>₦ {{ ValueHelper::BalanceFormatter('', $totalUserDebt) }}</h5> --}}
                    <span>Users Owe</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-warning mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-check"></i></div>
                </div>
                <div class = "dashboard_stats_wrap_content">
                    {{-- <h5>₦ {{ ValueHelper::BalanceFormatter('', $totalUserSumOfPaidInvoices) }}</h5> --}}
                    <span>Paid Invoices</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-purple mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-box"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    {{-- <h5>{{ $totalUserOrder }}</h5> --}}
                    <span>Total Orders</span>
                </div>
            </div>
        </div>
    
    </div>

    <div class="row">

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center theme-bg mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-chart-line"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    {{-- <h5>₦ {{ ValueHelper::BalanceFormatter('', $totalUserExpenditureIn7days) }}</h5> --}}
                    <span>Expenditure in 7days</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-primary mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-hourglass"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    {{-- <h5>₦ {{ ValueHelper::BalanceFormatter('', $totalUserDebt) }}</h5> --}}
                    <span>Users Owe</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-warning mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-check"></i></div>
                </div>
                <div class = "dashboard_stats_wrap_content">
                    {{-- <h5>₦ {{ ValueHelper::BalanceFormatter('', $totalUserSumOfPaidInvoices) }}</h5> --}}
                    <span>Paid Invoices</span>
                </div>
            </div>
        </div>
    
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap">
                <div class="rounded-circle p-4 p-sm-4 d-inline-flex align-items-center justify-content-center bg-purple mb-2">
                    <div class="position-absolute text-white h5 mb-0"><i class="fas fa-box"></i></div>
                </div>
                <div class="dashboard_stats_wrap_content">
                    {{-- <h5>{{ $totalUserOrder }}</h5> --}}
                    <span>Total Orders</span>
                </div>
            </div>
        </div>
    
    </div>    

</div>


@endsection