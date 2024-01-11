@extends('shared.layout')
@section('Title', "Admin - Notifications")
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
                        <a href="{{ route('admin', ['page' => $prevPageLink]) }}">
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
                        <h6 class="m-0">App Notifications</h6>
                    </div>
                </div>

                {{-- @if (isset($initialSearchKeyword) && isset($selectedNotificationListLimit) && isset($selectedNotificationType)) --}}
                {{-- <form action="{{ route('admin.search') }}" method="POST">     --}}
                <form action="" method="POST">
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
                                        @foreach([10, 25, 50, 100, 250, 500, 1000, 5000, 10000] as $value)
                                            {{-- <option value="{{ $value }}" @if($selectedNotificationListLimit == $value) selected @endif>{{ $value }}</option> --}}
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Done</label>
                                <div class="smalls">
                                    <select id="prc" name="Filter" class="form-control">
                                        {{-- @foreach(['all', 'false', 'true'] as $value)
                                            <option value="{{ $value }}" @if($selectedNotificationType == $value) selected @endif>
                                                @if ($value == 'all')
                                                    All
                                                @elseif ($value == 'false')
                                                    Pending Action
                                                @elseif ($value == 'true')
                                                    Done With
                                                @endif
                                            </option>
                                        @endforeach --}}
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
                {{-- @endif --}}
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                        <div class="table-responsive">
                            @if(isset($notifications))
                                @if(count($notifications) > 0)
                                    <table class="table dash_list">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Done</th>
                                                <th scope="col">Redirect Link</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach($notifications as $key => $notification)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td><h6>{{ $notification['Message'] }}</h6><p>Date: <span>{{ $notification['ServerDateTime'] }}</span></p></td>
                                                    <td><div class="dhs_tags">{{ $notification['Done'] }}</div></td>
                                                    <td><div class="smalls">{{ $notification['Redirect'] }}</div></td>
                                                    <td><span class="smalls">{{ $notification['Type'] }}</span></td>
                                                    <td>
                                                        <div class="dropdown show">
                                                            <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-h"></i>
                                                            </a>
                                                            <div class="drp-select dropdown-menu">
                                                                <form method="POST" action="{{ route('admin.signNotifications') }}">
                                                                    @csrf
                                                                    <input type="text" name="IDLabel" value="{{ $notification['ID'] }}" hidden />
                                                                    <input type="text" name="Signature" value="{{ $notification['Done'] }}" hidden />
                                                                    <button type="submit" class="dropdown-item">Done</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                @else
                                    <table class="table dash_list">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Done</th>
                                                <th scope="col">Redirect Link</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-10">
                                            <div class="text-center">
                                                <img src="{{ asset('assets/img/NotFound.png') }}" style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                                <br /><br />
                                                <h5 style="color:#818181;">
                                                    No notification found. Might as well adjust your search for a different result.
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif



                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>



@endsection