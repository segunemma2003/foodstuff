@extends('shared.layout')
@section('Title', "Last Purchase")
@section('content')
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Last Purchase</h1>
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
<!-- ============================ Page Title End ================================================ -->

<!-- ============================ Last Purchase Starts ================================== -->
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
            <div class="col-lg-12 col-md-12">
                <!-- Total Items -->
                <div class="card style-2">
                    <div class="card-header">
                        <h4 class="mb-0">Last Purchase</h4>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    {{-- @if ($model['LastPurchase'] !== null) --}}
                                    @if ($model !== null)
                                    @php $count = 0 @endphp

                                    {{-- @foreach ($model['LastPurchase'] as $data) --}}
                                    @foreach ($model as $data)
                                    @php $count++ @endphp
                                    <table class="table table-striped wishlist">
                                        <tbody>
                                            <tr>
                                                <td>{{ $count }}.</td>
                                                <td>
                                                    <div class="tb_course_thumb">
                                                        {{-- <img src="{{ $data['Image'] }}" class="img-fluid" alt="" /> --}}
                                                        <img src="{{ $data }}" class="img-fluid" alt="" />
                                                    </div>
                                                </td>
                                                <th>
                                                    {{-- {{ $data['Name'] }} --}}
                                                </th>
                                                <td><span class="wish_price theme-cl">
                                                    ₦
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
                                                <h4>Your have no shopping saga with us, return to the store now.</h4>
                                                <br />
                                                {{-- <a href="{{ route('home.store') }}" class="btn btn-md full-width theme-bg text-white">Return To Store</a> --}}
                                                <a href="" class="btn btn-md full-width theme-bg text-white">Return To Store</a>
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
<!-- ============================ Last Purchase Ends ================================== -->

@endsection