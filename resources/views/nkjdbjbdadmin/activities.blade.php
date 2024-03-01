@extends('shared.layout')
@section('Title', "Admin - Activities")
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
                        <a href="{{ route('admin', ['prevPageLink' => $prevPageLink]) }}">
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
                        <h6 class="m-0">My Activities</h6>
                    </div>
                </div>

                {{-- <form action="{{ route('admin.search') }}" method="post"> --}}
                <form action="" method="post">
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
                                        @php
                                        $list = [
                                        10 => 10,
                                        25 => 25,
                                        50 => 50,
                                        100 => 100,
                                        250 => 250,
                                        500 => 500,
                                        1000 => 1000,
                                        5000 => 5000,
                                        10000 => 10000,
                                        ];
                                        @endphp

                                        @foreach ($list as $value => $key)
                                            @if ($selectedActivityListLimit == $key)
                                                <option value="{{ $key }}" selected>{{ $value }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Activity</label>
                                <div class="smalls">
                                    <select id="prc" name="Filter" class="form-control">
                                        @php
                                        $list2 = [
                                        'All' => 'all',
                                        'Create Actions' => 'create',
                                        'Update Actions' => 'update',
                                        'Delete Actions' => 'delete',
                                        ];
                                        @endphp

                                        @foreach ($list2 as $key => $value)
                                        @if ($selectedActivityStatus == $value)
                                        <option value="{{ $value }}" selected>{{ $key }}</option>
                                        @else
                                        <option value="{{ $value }}">{{ $key }}</option>
                                        @endif
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

                            @if ($activities)
                            <table class="table dash_list">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Activity</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 0;
                                    @endphp
                                    @foreach ($activities as $data)
                                    @php
                                    $count++;
                                    @endphp

                                    <tr>
                                        <th scope="row">{{ $count }}</th>
                                        <td>
                                            <h6>{{ $data->Message }}</h6>
                                        </td>
                                        <td><span class="dhs_tags">{{ $data->Action }}</span></td>
                                        <td>
                                            <div class="smalls">{{ $data->ServerDateTime }}</div>
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
                                        <th scope="col">Activity</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Date</th>
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
                                            No activity found. Might as well adjust your search for a different result.
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