@extends('shared.layout')
@section('Title', "Admin - Mailing List")
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
                                <a href="{{ route('admin.' . $prevPageLink) }}">
                                    {{ $prevPageName }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $corePageName }}
                            </li> --}}
                        </ol>
                    </nav>
                </div>
                <div class="elkios">
                    <a href="#" class="add_new_btn" data-toggle="modal" data-target="#bulkMailModal"><i
                            class="fas fa-envelope mr-1"></i>Send Bulk Mail</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

    <!-- /Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                        <h6 class="m-0">Mailing List Subscription</h6>
                    </div>
                </div>

                {{-- <form action="{{ route('admin.Search') }}" method="post"> --}}
                <form action="" method="post">
                    @csrf
                    <div class="row align-items-end mb-5">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Search</label>
                                <div class="smalls input-with-icon">
                                    <input type="text" name="SearchField" class="form-control" value="">
                                    <i class="ti-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Rows</label>
                                <div class="smalls">
                                    <select id="prc" name="Rows" class="form-control">
                                        @foreach($list as $Data)
                                        {{-- <option value="{{ $Data[1] }}" {{ $selectedMailingListLimit==$Data[1]
                                            ? 'selected' : '' }}>{{ $Data[0] }}</option> --}}
                                        <option value="">

                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="smalls">
                                    <select id="prc" name="Filter" class="form-control">
                                        @foreach($list2 as $Data)
                                        {{-- <option value="{{ $Data[1] }}" {{ $selectedSubcriptionStatus==$Data[1]
                                            ? 'selected' : '' }}>{{ $Data[0] }}</option> --}}
                                        <option value="">

                                        </option>
                                        @endforeach
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
                </form>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="table-responsive">

                            @if (!empty($mailingList))
                            @php
                            $i = 0;
                            @endphp
                            @foreach ($mailingList as $data)
                            @php
                            $i++;
                            @endphp
                            @endforeach

                            @if ($i > 0)
                            <table class="table dash_list">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Is Subscribed</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 0;
                                    @endphp
                                    @foreach ($mailingList as $data)
                                    @php
                                    $count++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $count }}</th>
                                        <td>
                                            {{-- <h6>{{ $data->UserEmail }}</h6> --}}
                                            <p>Reg Date: 
                                                <span>
                                                    {{-- {{ $data->ServerDateTime }} --}}
                                                </span>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="dhs_tags">
                                                {{-- {{ $data->Active }} --}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-action" href="#" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="drp-select dropdown-menu">
                                                    {{-- <a href="mailto:{{ $data->UserEmail }}" type="text/plain" class="dropdown-item pl-4"> --}}
                                                    <a href="mailto:test@test.com" type="text/plain" class="dropdown-item pl-4">
                                                        <h6>Mail User</h6>
                                                    </a>
                                                    {{-- <form action="{{ route('admin.DeleteEmailFromMailingList') }}" method="post"> --}}
                                                    <form action="" method="post">
                                                        @csrf
                                                        <input type="text" name="IDLabel" value="" hidden />
                                                        <input type="text" name="UserEmail" value="" hidden />
                                                        <button type="submit" class="dropdown-item">Delete</button>
                                                    </form>
                                                    {{-- <form action="{{ route('admin.SignMailingListSubscription') }}" method="post"> --}}
                                                    <form action="" method="post">
                                                        @csrf
                                                        {{-- @if ($data->Active == "true") --}}
                                                        <input type="text" name="IDLabel" value="" hidden />
                                                        <input type="text" name="Signature" value="" hidden />
                                                        <button type="submit" class="dropdown-item">
                                                            Unsubscribe Customer
                                                        </button>
                                                        {{-- @else --}}
                                                        <input type="text" name="IDLabel" value="" hidden />
                                                        <input type="text" name="Signature" value="" hidden />
                                                        <button type="submit" class="dropdown-item">
                                                            Subscribe Customer
                                                        </button>
                                                        {{-- @endif --}}
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <table class="table dash_list">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Is Subscribed</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-10">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/img/NotFound.png') }}"
                                            style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                        <br /><br />
                                        <h5 style="color:#818181;">
                                            No user found. Might as well adjust your search for a different result.
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @else
                            <table class="table dash_list">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Is Subscribed</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="row justify-content-center">
                                <div></div>
                                <div class="col-lg-6 col-md-10">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/img/NotFound.png') }}"
                                            style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                        <br /><br />
                                        <h5 style="color:#818181;">
                                            No user found. Might as well adjust your search for a different result.
                                        </h5>
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

@endsection