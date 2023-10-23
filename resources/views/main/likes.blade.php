@extends('shared.layout')
@section('Title', "Likes")
@section('content')
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Likes</h1>
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
<!-- ============================ Likes Starts ================================== -->
<section class="pt-0">
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
            <div class="col-lg-2 col-md-2">
                <nav class="dashboard-nav mb-10 mb-md-0">
                    <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                        {{-- <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.manageInvoice') }}">My Order</a>
                        <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.manageAddresses') }}">Manage Address</a>
                        <a class="list-group-item list-group-item-action dropright-toggle active theme-bg text-white" href="#">Likes</a>
                        <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.editProfile') }}">Edit Profile</a>
                        <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.changePassword') }}">Change Password</a>
                        <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.activities') }}">Activity</a>
                        <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('home.manageRestaurants') }}">My Restaurants</a> --}}
                        <a class="list-group-item list-group-item-action dropright-toggle" data-toggle="modal" title="Sign Out" data-target="#logout" href="#">Sign Out</a>
                    </div>
                </nav>
            </div>

            <div class="col-lg-10 col-md-10">
                <!-- Likes Items -->
                <div class="card style-2">
                    <div class="card-header">
                        <h4 class="mb-0">Likes</h4>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    {{-- @if ($model['Likes'] !== null) --}}
                                    @if ($model !== null)
                                    @php $count = 0 @endphp

                                    {{-- @foreach ($model['Likes'] as $data) --}}
                                    @foreach ($model as $data)
                                    @php $count++ @endphp

                                    <table class="table table-striped wishlist">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{-- <form action="{{ route('home.unlikeFoodItem') }}" method="post"> --}}
                                                    <form action="" method="post">
                                                        @csrf
                                                        <input type="hidden" name="IDLabel" value="" />
                                                        <button class="remove_cart" type="submit" title="Unlike Item"><i class="ti-heart-broken"></i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    {{-- {{ $count }} --}}
                                                    .</td>
                                                <td>
                                                    <div class="tb_course_thumb">
                                                        {{-- <img src="{{ $data['Image'] }}" class="img-fluid" alt="" /> --}}
                                                        <img src="" class="img-fluid" alt="" />
                                                    </div>
                                                </td>
                                                <th>
                                                    {{-- {{ $data['Name'] }} --}}
                                                </th>
                                                <td><span class="wish_price theme-cl">₦
                                                    {{-- {{ $data['Price'] }} --}}
                                                </span></td>
                                                <td>
                                                    {{-- <form action="{{ route('home.addToCart') }}" method="post"> --}}
                                                    <form action="" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ProductID" value="" />
                                                        <button type="submit" class="btn btn-md full-width theme-bg text-white">Add To Cart</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endforeach

                                    @else
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-10">
                                            <div class="text-center">
                                                <img src="{{ asset('assets/img/NotFound.png') }}" style="width:50%;" class="img-fluid" alt="" />
                                                <br /><br />
                                                <h4>Your haven't liked any food product yet.</h4>
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
        </div>
    </div>
</section>

<!-- ============================ Likes Ends ================================== -->
@endsection