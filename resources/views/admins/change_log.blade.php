@extends('shared.layout')
@section('Title', "Admin - Change Log")
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
                        <h6 class="m-0">Change Log</h6>
                        <p class="dhs_tags" style="text-align:left; padding:10px; margin:10px;">
                            ⓘ Live mode features have been tested and have passed the testing phase. Live mode functionalities are working and are available to all users, including admin and customers.
                        </p>
                        <p class="dhs_tags" style="text-align:left; padding:10px; margin:10px;">
                            ⓘ Beta mode feature may be available or under-going the testing phase. In the short term, if a beta mode feature is useful and effective, it will be upgraded to Live mode; else, it'll be discontinued.
                        </p>
                        <p class="dhs_tags" style="text-align:left; padding:10px; margin:10px;">
                            ⓘ Obsolete mode features or functionalities are out of date, discontinued, and are no longer in use.
                        </p>
                        <p class="dhs_tags" style="text-align:left; padding:10px; margin:10px;">
                            ⓘ Feature names are unique. They may appear more than once on different dates, versions, and application modes.
                        </p>
                    </div>
                </div>
    
                {{-- <form action="{{ route('searchChangeLog') }}" method="POST"> --}}
                <form action="" method="POST">
                    @csrf
                    <div class="row align-items-end mb-5">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Search</label>
                                <div class="smalls input-with-icon">
                                    <input type="text" name="SearchField" class="form-control" value="">
                                    <input type="hidden" name="CorePageLink" value="">
                                    <i class="ti-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Mode</label>
                                <div class="smalls">
                                    <select id="prc" name="Mode" class="form-control">
                                        @foreach($modeList as $mode)
                                            {{-- <option value="{{ $mode['value'] }}" {{ $selectedMode === $mode['value'] ? 'selected' : '' }}>
                                                {{ $mode['key'] }}
                                            </option> --}}
                                            <option value="" >

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Rows</label>
                                <div class="smalls">
                                    <select id="prc" name="Rows" class="form-control">
                                        @foreach($list as $item)
                                            {{-- <option value="{{ $item['value'] }}" {{ $selectedChangeLogRow === $item['value'] ? 'selected' : '' }}>
                                                {{ $item['key'] }}
                                            </option> --}}
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
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                        <div class="table-responsive">
                            @if($changeLog)
                                <table class="table dash_list">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Feature</th>
                                            <th scope="col">About</th>
                                            <th scope="col">Mode</th>
                                            <th scope="col">Current Version</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($changeLog as $log)
                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>
                                                    <h6>
                                                        {{-- {{ $log->LogName }} --}}
                                                    </h6>
                                                    <p>Last Updated: 
                                                        <span>
                                                            {{-- {{ $log->LastEditedDate }} --}}
                                                        </span>
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="dhs_tags" style="text-align:left;">
                                                        {{-- {{ $log->AboutLog }} --}}
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- @if($log->Mode === 'live') --}}
                                                        <span class="trip text-white bg-info">LIVE</span>
                                                    {{-- @elseif($log->Mode === 'beta') --}}
                                                        <span class="trip text-white bg-secondary">BETA</span>
                                                    {{-- @else --}}
                                                        <span class="trip theme-cl theme-bg-light">OBSOLETE</span>
                                                    {{-- @endif --}}
                                                </td>
                                                <td>
                                                    <span class="smalls">
                                                        {{-- {{ $log->Version }} --}}
                                                    </span>
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
                                            <th scope="col">Feature</th>
                                            <th scope="col">About</th>
                                            <th scope="col">Last Edited</th>
                                            <th scope="col">Mode</th>
                                            <th scope="col">Current Version</th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-10">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/img/NotFound.png') }}" style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                            <br /><br />
                                            <h5 style="color:#818181;">No log found. Might as well adjust your search for a different result.</h5>
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