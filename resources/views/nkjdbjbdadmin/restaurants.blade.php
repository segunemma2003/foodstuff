@extends('shared.layout')
@section('Title', "Admin - Restaurants")
@section('content')
<div class="col-lg-9 col-md-9 col-sm-12">
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

    <!-- Row -->
    <div class="row justify-content-between">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
            <div class="dashboard_wrap d-flex align-items-center justify-content-between">
                <div class="arion">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item">
                                <a href="{{ route('admin', ['page' => ViewBag.prevPageLink]) }}">
                                    {{ ViewBag.prevPageName }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ ViewBag.corePageName }}
                            </li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">
                <div class="form_blocs_wrap">
                    <div class="row justify-content-between">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="dashboard_wrap">
                                <div class="row pt-4">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                                        <div class="table-responsive">
                                            @if ($restaurants)
                                                <table class="table dash_list">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Business</th>
                                                            <th scope="col">Store Address</th>
                                                            <th scope="col">Payment Methods</th>
                                                            <th scope="col">Delivery Fee</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $count = 0;
                                                    @endphp
                                                    @foreach ($restaurants as $restaurant)
                                                        @php
                                                            $count++;
                                                        @endphp
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">{{ $count }}</th>
                                                                <td>
                                                                    <h6>{{ $restaurant->BusinessName }}</h6>
                                                                    <p>Owner: <span>{{ $restaurant->FirstName }} {{ $restaurant->LastName }}</span></p>
                                                                    <p>Email: <span>{{ $restaurant->Email }}</span></p>
                                                                    <p>Phone: <span>{{ $restaurant->PhoneNumber }}</span></p>
                                                                    <p>Reg No: <span>{{ $restaurant->RegNumber }}</span></p>
                                                                </td>
                                                                <td>
                                                                    <h6>{{ $restaurant->StoreAddress }}</h6>
                                                                    <p>Floor Suite: <span>{{ $restaurant->FloorSuite }}</span></p>
                                                                    <p>No. Of Locations: <span>{{ $restaurant->NumberOfLocations }}</span></p>
                                                                    <p>Store Hours: <span>{{ $restaurant->StoreHours }}</span></p>
                                                                </td>
                                                                <td><div class="smalls lg">{{ $restaurant->PaymentMethods }}</div></td>
                                                                <td><div class="smalls lg">{{ $restaurant->DeliveryFee }}</div></td>
                                                                <td>
                                                                    @if ($restaurant->Status == 'approved')
                                                                        <span class="trip text-white bg-info" title="Approved">LIVE</span>
                                                                    @else
                                                                        <span class="trip text-white bg-secondary" title="Waiting Admin Approval">PENDING</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown show">
                                                                        <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fas fa-ellipsis-h"></i>
                                                                        </a>
                                                                        <div class="drp-select dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Preview Menu</a>
                                                                            <a class="dropdown-item" href="#">Preview Store Banner</a>                                                                                        
                                                                            <a class="dropdown-item" href="#">Preview Valid Id</a>
                                                                            <a class="dropdown-item" href="#">Preview Utility Bill</a>
                                                                            @if ($restaurant->Status == 'pending')
                                                                                <form method="POST" action="{{ route('approveRestaurant', ['id' => $restaurant->id]) }}">
                                                                                    @csrf
                                                                                    <button class="dropdown-item pl-0 ml-0" type="submit">Approve Restaurant</button>
                                                                                </form>
                                                                            @else
                                                                                <form method="POST" action="{{ route('takeDownRestaurant', ['id' => $restaurant->id]) }}">
                                                                                    @csrf
                                                                                    <button class="dropdown-item" type="submit">Take Down Restaurant</button>
                                                                                </form>
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
                                                            <th scope="col">Business</th>
                                                            <th scope="col">Store Address</th>
                                                            <th scope="col">Payment Methods</th>
                                                            <th scope="col">Delivery Fee</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6 col-md-10">
                                                        <div class="text-center">
                                                            <img src="{{ asset('assets/img/NotFound.png') }}" style="width:50%;" class="img-fluid" alt="" />
                                                            <br /><br />
                                                            <h4>No restaurants were found.</h4>
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

<script>
    function SaveInvoiceItemChnages(buttonId) {
        document.getElementById(buttonId).click();
    }
</script>

@endsection