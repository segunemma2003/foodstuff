@extends('shared.layout')
@section('Title', "Admin - Users")
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
                <div class="elkios">
                    <a href="#" class="add_new_btn" data-toggle="modal" data-target="#bulkMailModal"><i class="fas fa-envelope mr-1"></i>Send Bulk Mail</a>
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
                        <h6 class="m-0">Users</h6>
                    </div>
                </div>
    
                {{-- <form method="post" action="{{ route('admin.search') }}"> --}}
                <form method="post" action="">
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
                                        @php
                                        $list = [
                                            ['value' => 10, 'text' => 10],
                                            ['value' => 25, 'text' => 25],
                                            ['value' => 50, 'text' => 50],
                                            ['value' => 100, 'text' => 100],
                                            ['value' => 250, 'text' => 250],
                                            ['value' => 500, 'text' => 500],
                                            ['value' => 1000, 'text' => 1000],
                                            ['value' => 5000, 'text' => 5000],
                                            ['value' => 10000, 'text' => 10000]
                                        ];
    
                                        @endphp
                                        @foreach ($list as $data)
                                            {{-- @if ($selectedUserListLimit == $data['value']) --}}
                                                <option value="" selected>
                                                    {{-- {{ $data['text'] }} --}}
                                                </option>
                                            {{-- @else --}}
                                                <option value="">
                                                    {{-- {{ $data['text'] }} --}}
                                                </option>
                                            {{-- @endif --}}
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
                                        @php
                                        $list2 = [
                                            ['value' => 'all', 'text' => 'All'],
                                            ['value' => 'active', 'text' => 'Active'],
                                            ['value' => 'suspended', 'text' => 'Blocked']
                                        ];
                                        @endphp
                                        @foreach ($list2 as $data)
                                            {{-- @if ($selectedUserStatus == $data['value']) --}}
                                                <option value="" selected>
                                                    {{-- {{ $data['text'] }} --}}
                                                </option>
                                            {{-- @else --}}
                                                <option value="">
                                                    {{-- {{ $data['text'] }} --}}
                                                </option>
                                            {{-- @endif --}}
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
                            {{-- @php
                                $userList = $Model->Users;
                                $userCount = count($userList);
                            @endphp
                
                            @if ($userCount > 0) --}}
                                <table class="table dash_list">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Fullname</th>
                                            <th scope="col">Credit</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">
                                                {{-- <a class="btn btn-action" href="{{ route('admin.APAddUser') }}" target="_blank" title="Add User / Business"> --}}
                                                <a class="btn btn-action" href="" target="_blank" title="Add User / Business">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($userList as $user)
                                            @php
                                                $count++;
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $count }}</th>
                                                <td>
                                                    <h6>
                                                        {{-- {{ $user->UserEmail }} --}}
                                                    </h6>
                                                    <p>Registration: 
                                                        <span>
                                                            {{-- {{ $user->AccountType }} Account - {{ $user->RegDateTime }} --}}
                                                        </span>
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="dhs_tags">
                                                        {{-- {{ $user->Phone }} --}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="smalls">
                                                        {{-- {{ $user->Username }} --}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="dhs_tags">
                                                        {{-- {{ $user->Credit }} --}}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="dhs_tags">
                                                        {{-- {{ $user->Status }} --}}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-h"></i>
                                                        </a>
                                                        <div class="drp-select dropdown-menu">
                                                            {{-- <form method="post" action="{{ route('admin.VisitUserProfile') }}"> --}}
                                                            <form method="post" action="">
                                                                @csrf
                                                                <input type="text" name="UUID" value="" hidden />
                                                                <input type="text" name="Username" value="" hidden />
                                                                <button type="submit" class="dropdown-item">Customer Affairs</button>
                                                            </form>
                                                            {{-- @if (in_array($AdminRoll, ['root', 'master'])) --}}
                                                            {{-- <form method="post" action="{{ route('admin.BlockUser') }}">     --}}
                                                                <form method="post" action="">
                                                                    @csrf
                                                                    {{-- @if ($user->Status != 'blocked') --}}
                                                                        <input type="text" name="IDLabel" value="" hidden />
                                                                        <input type="text" name="Signature" value="" hidden />
                                                                        <button type="submit" class="dropdown-item">Block User</button>
                                                                    {{-- @else --}}
                                                                        <input type="text" name="IDLabel" value="" hidden />
                                                                        <button type="submit" class="dropdown-item">Unblock User</button>
                                                                    {{-- @endif --}}
                                                                </form>
                                                            {{-- @endif --}}
                                                            {{-- @if (in_array($AdminRoll, ['root', 'master'])) --}}
                                                                {{-- <form method="post" action="{{ route('admin.ResetUsersPassword') }}"> --}}
                                                                <form method="post" action="">
                                                                    @csrf
                                                                    <input type="text" name="IDLabel" value="" hidden />
                                                                    <button type="submit" class="dropdown-item">Reset Password</button>
                                                                </form>
                                                            {{-- @endif --}}
                                                            {{-- <a href="mailto:{{ $user->UserEmail }}" type="text/plain" class="dropdown-item pl-4"><h6>Mail User</h6></a> --}}
                                                            <a href="mailto:test@test.com" type="text/plain" class="dropdown-item pl-4"><h6>Mail User</h6></a>
                                                            {{-- <a href="tel:{{ $user->Phone }}" type="text/plain" class="dropdown-item pl-4"><h6>Call User</h6></a> --}}
                                                            <a href="tel:0980897860" type="text/plain" class="dropdown-item pl-4"><h6>Call User</h6></a>
                                                            <a href="#" type="text/plain" class="dropdown-item pl-4"><h6>Generate Invoice</h6></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            {{-- @else --}}
                                <table class="table dash_list">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Fullname</th>
                                            <th scope="col">Credit</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-10">
                                        <div class="text-center">
                                            <img src="{{ asset('img/NotFound.png') }}" style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                            <br /><br />
                                            <h5 style="color:#818181;">
                                                No user found. Might as well adjust your search for a different result.
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>                
                
            </div>
        </div>
    </div>
    


</div>


@endsection