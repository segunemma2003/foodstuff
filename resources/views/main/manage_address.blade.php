@extends('shared.layout')
@section('Title', "Manage Address")
@section('content')

<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Manage Addresses</h1>
                    <nav class="transparent">
                        {{-- <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a asp-area="" asp-controller="Home" asp-action="@ViewBag.prevPageLink">
                                    @ViewBag.prevPageName
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                @ViewBag.corePageName
                            </li>
                        </ol> --}}
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->
<!-- ============================ Address list ================================== -->
<section class="pt-0">
    <div class="container">
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

        <div class="row">
            <div class="col-lg-2 col-md-2">
                <nav class="dashboard-nav mb-10 mb-md-0">
                    <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.manageInvoice') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
                            My Order
                        </a>
                        <a class="list-group-item list-group-item-action dropright-toggle active theme-bg text-white" href="#">
                            Manage Address
                        </a>
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.likes') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
                            Likes
                        </a>
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.editProfile') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
                            Edit Profile
                        </a>
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.changePassword') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
                            Change Password
                        </a>
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.activities') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
                            Activity
                        </a>
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.manageRestaurants') }}"> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" href="">
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
                        <h4 class="mb-0">Manage Address</h4>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            @if (!empty($ViewBag['defaultPickUpAddress']))
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-5">
                                <div class="foot-news-last">
                                    <label>Default Address</label>
                                    <div class="input-group">
                                        <h6>
                                            {{ $ViewBag['defaultPickUpAddress'] }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-5">
                                {{-- <form method="post" action="{{ route('home.addAddress') }}"> --}}
                                <form method="post" action="">
                                    @csrf
                                    <div class="foot-news-last">
                                        <label>New Address</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="Address" style="border: 1px solid #DC002D;" placeholder="House NO, Street, City, State, Country" required>
                                            <div class="input-group-append">
                                                <button type="submit" class="input-group-text theme-bg b-0 text-light">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            @if (!empty($Model['Addresses']))
                            @foreach ($Model['Addresses'] as $Data)
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="cates_crs_wrip">
                                    <div class="crs_trios">
                                        <div class="crs_cate_icon">
                                            <form method="post" action="{{ route('home.deleteAddress') }}">
                                                @csrf
                                                <input type="text" name="ID" value="{{ $Data['ID'] }}" hidden>
                                                <input type="text" name="Address" value="{{ $Data['Address'] }}" hidden>
                                                <button class="remove_cart" type="submit" title="Delete pickup address"><i class="ti-close"></i></button>
                                            </form>
                                        </div>
                                        <div class="crs_cate_link">
                                            <form method="post" action="{{ route('home.changeDefaultPickUpAddress') }}">
                                                @csrf
                                                <input type="text" name="ID" value="{{ $Data['ID'] }}" hidden>
                                                <input type="text" name="Address" value="{{ $Data['Address'] }}" hidden>
                                                <button id="submit_link" type="submit" style="border:none;" title="Set as default pickup address">set as default</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="crs_capt_cat">
                                        <h6>Address</h6>
                                        <p>{{ $Data['Address'] }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-10">
                                    <div class="text-center">
                                        <img src="../../assets/img/NotFound.png" style="width:50%;" class="img-fluid" alt="">
                                        <br /><br />
                                        <h4>
                                            Your are yet to add a pickup address.
                                        </h4>
                                        <br />
                                        <a href="{{ route('home.store') }}" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
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
</section>

<!-- ============================ Address list ================================== -->
@endsection