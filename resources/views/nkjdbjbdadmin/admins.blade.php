@extends('shared.layout')
@section('Title', "Admin - Admins")
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
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item">
                        <a href="{{ route('admin', ['pageLink' => $prevPageLink]) }}">
                            {{ $prevPageName }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $corePageName }}
                    </li> --}}
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                        <h6 class="m-0">Admin Management</h6>
                    </div>
                </div>
                {{-- <form method="post" action="{{ route('searchAdmin') }}"> --}}
                <form method="post" action="">
                    @csrf
                    <div class="row align-items-end mb-5">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Search</label>
                                <div class="smalls input-with-icon">
                                    <input type="text" name="SearchField" class="form-control"
                                        value="">
                                    <i class="ti-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Rows</label>
                                <div class="smalls">
                                    <select id="prc" name="Rows" class="form-control">
                                        @foreach ($adminListLimits as $option)
                                        <option value="">
                                        </option>
                                        {{-- <option value="{{ $option['value'] }}" {{
                                            $option['value']==$selectedAdminListLimit ? 'selected' : '' }}>
                                            {{$option['key'] }}
                                        </option> --}}
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Roll</label>
                                <div class="smalls">
                                    <select id="prc" name="Filter" class="form-control">
                                        @foreach ($adminRolls as $option)
                                        <option value="">
                                        </option>
                                        {{-- <option value="{{ $option['value'] }}" {{ $option['value']==$selectedAdminRoll
                                            ? 'selected' : '' }}>
                                            {{ $option['key'] }}
                                        </option> --}}
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
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                        <div class="table-responsive">
                            @if (!empty($admins))
                            <table class="table dash_list">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Added By</th>
                                        <th scope="col">Roll</th>
                                        <th scope="col">EmpNumber</th>
                                        <th scope="col">Access</th>
                                        @if ($adminRoll === 'root' || $adminRoll === 'master')
                                        <th scope="col">Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <h6>{{ $rootAdminEmail }}</h6>
                                        </td>
                                        <td>
                                            <div class="smalls lg">FoodStuff Store</div>
                                        </td>
                                        <td><span class="smalls lg">Back Office</span></td>
                                        <td><span class="trip text-white theme-bg">Root Admin</span></td>
                                        <td><span class="dhs_tags"> ... </span></td>
                                        <td><span class="dhs_tags">Granted</span></td>
                                        <td></td>
                                    </tr>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach ($admins as $admin)
                                    @php
                                    $count++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $count }}</th>
                                        <td>
                                            <h6>{{ $admin['userEmail'] }}</h6>
                                            <p>Reg Date:<span>{{ $admin['regDate'] }}</span></p>
                                        </td>
                                        <td>
                                            <div class="smalls lg">{{ $admin['username'] }}</div>
                                        </td>
                                        <td>
                                            <div class="smalls">{{ $admin['addedBy'] }}</div>
                                        </td>
                                        <td><span class="smalls">{{ $admin['roll'] }}</span></td>
                                        <td><span class="dhs_tags">{{ $admin['empNumber'] }}</span></td>
                                        <td><span class="dhs_tags">{{ $admin['grantAccess'] }}</span></td>
                                        @if ($adminRoll === 'root' || $adminRoll === 'master')
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-action" href="#" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="drp-select dropdown-menu">
                                                    @if ($adminRoll === 'root')
                                                    {{-- <form method="post" action="{{ route('updateAdminAccess') }}"> --}}
                                                    <form method="post" action="">
                                                        @csrf
                                                        <input type="text" name="IDLabel" value=""
                                                            hidden />
                                                        <button type="submit" class="dropdown-item">Deny Access</button>
                                                    </form>
                                                    @endif
                                                    @if ($adminRoll === 'root' || $adminRoll === 'master')
                                                    {{-- <form method="post" action="{{ route('resetAdminPassword') }}"> --}}
                                                    <form method="post" action="">
                                                        @csrf
                                                        <input type="text" name="IDLabel" value=""
                                                            hidden />
                                                        <button type="submit" class="dropdown-item">Reset
                                                            Password</button>
                                                    </form>
                                                    @endif
                                                    @if ($adminRoll === 'root' || $adminRoll === 'master')
                                                    {{-- <form method="post" action="{{ route('deleteAdmin') }}"> --}}
                                                    <form method="post" action="">
                                                        @csrf
                                                        <input type="text" name="IDLabel" value=""
                                                            hidden />
                                                        <button type="submit" class="dropdown-item">
                                                            DeleteAdmin
                                                        </button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        @endif
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
                                        <th scope="col">Username</th>
                                        <th scope="col">Added By</th>
                                        <th scope="col">Roll</th>
                                        <th scope="col">EmpNumber</th>
                                        <th scope="col">Access</th>
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
                                            No admin found. Might as well adjust your search for a different result.
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