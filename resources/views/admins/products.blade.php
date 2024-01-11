@extends('shared.layout')
@section('Title', "Admin - Products")
@section('content')

<div class="col-lg-9 col-md-9 col-sm-12">
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
    <!-- Row -->

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item">
                        <a href="{{ route('admin', ['action' => $ViewBag['prevPageLink']]) }}">
                            {{ $ViewBag['prevPageName'] }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $ViewBag['corePageName'] }}
                    </li> --}}
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                        <h6 class="m-0">Manage Food Stock</h6>
                    </div>
                </div>

                {{-- <form action="{{ route('admin.search') }}" method="post"> --}}
                <form action="" method="post">
                    @csrf
                    <div class="row align-items-end mb-5">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="SearchField">Search</label>
                                <div class="smalls input-with-icon">
                                    <input type="text" name="SearchField" class="form-control" value="">
                                    <i class="ti-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="Rows">Rows</label>
                                <div class="smalls">
                                    <select id="prc" name="Rows" class="form-control">
                                        {{-- @foreach($list as $data)
                                            <option value="{{ $data[1] }}" @if($ViewBag['selectedProductListLimit'] == $data[1]) selected @endif>{{ $data[0] }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="Filter">Category</label>
                                <div class="smalls">
                                    <select id="prc" name="Filter" class="form-control">
                                        {{-- @foreach($list2 as $data)
                                            <option value="{{ $data[1] }}" @if($ViewBag['selectedProductCategory'] == $data[1]) selected @endif>{{ $data[0] }}</option>
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
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                        <div class="table-responsive">

                            @if (!empty($Model['FoodStuffs']))
                                @php
                                    $count = 0;
                                @endphp
                                <table class="table dash_list">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col" style="width:300px;">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Unit/Weight</th>
                                            <th scope="col">Tags</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">
                                                <a class="btn btn-action" href="{{ route('admin.APAddProduct') }}" target="_blank" title="Add Product">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Model['FoodStuffs'] as $Data)
                                            @php
                                                $count++;
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $count }}</th>
                                                <td><img src="{{ $Data['Image'] }}" class="img-fluid" width="50" alt="" /></td>
                                                <td>
                                                    <div class="row" style="width:300px;">
                                                        {{-- <form action="{{ route('admin.EditFoodStuff') }}" method="post"> --}}
                                                        <form action="" method="post">
                                                            @csrf
                                                            <input value="" name="Name" type="text" required style="border:none;" />
                                                            <p>Details:<span>{{ $Data['ProductID'] }} - {{ substr($Data['AddDate'], 0, 10) }}</span></p>
                                                            <div class="dhs_tags">
                                                                Orders: {{ $Data['Orders'] }} Sold in last 30 days
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>
                                                    <div class="trip theme-cl theme-bg-light">₦
                                                        {{-- <form action="{{ route('admin.EditFoodStuff') }}" method="post"> --}}
                                                        <form action="" method="post">
                                                            @csrf
                                                            <input value="" type="number" name="Price" required style="border:none; width:50px; background-color:transparent;" />
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="trip theme-cl theme-bg-light">
                                                            Unit: 
                                                            {{-- <form action="{{ route('admin.EditFoodStuff') }}" method="post"> --}}
                                                            <form action="" method="post">
                                                                @csrf
                                                                <input value="" type="text" name="Unit" required style="border:none; width:50px; background-color:transparent;" />
                                                            </form>
                                                        </div>
                                                        <div class="trip theme-cl theme-bg-light">
                                                            Weight: 
                                                            {{-- <form action="{{ route('admin.EditFoodStuff') }}" method="post"> --}}
                                                            <form action="" method="post">
                                                                @csrf
                                                                <input value="" type="text" name="Weight" required style="border:none; width:50px; background-color:transparent;" />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="smalls">
                                                        {{-- <form action="{{ route('admin.EditFoodStuff') }}" method="post"> --}}
                                                        <form action="" method="post">
                                                            @csrf
                                                            <input value="" type="text" required name="Tags" style="border:none;" />
                                                        </form>
                                                    </span>
                                                </td>
                                                <td>
                                                    <select id="prc" name="Category" class="form-control" style="width:150px;">
                                                        {{-- @foreach ($list3 as $Item)
                                                            <option value="{{ $Item[1] }}" @if ($Item[1] == $Data['Category']) selected @endif>{{ $Item[0] }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="prc" name="Status" class="form-control" style="width:100px;">
                                                        {{-- @foreach ($list4 as $Item)
                                                            <option value="{{ $Item[1] }}" @if ($Item[1] == $Data['Status']) selected @endif>{{ $Item[0] }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-h"></i>
                                                        </a>
                                                        <div class="drp-select dropdown-menu">
                                                            {{-- <form action="{{ route('admin.EditFoodStuff') }}" method="post"> --}}
                                                            <form action="" method="post">
                                                                @csrf
                                                                <input type="text" name="IDLabel" value="" hidden />
                                                                <input type="text" name="ProductID" value="" hidden />
                                                                <button type="submit" class="dropdown-item">Save Changes</button>
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
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Unit/Weight</th>
                                            <th scope="col">Tags</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="row justify-content-center">
                                    <div></div>
                                    <div class="col-lg-6 col-md-10">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/img/NotFound.png') }}" style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                            <br /><br />
                                            <h5 style="color:#818181;">
                                                No product found. Might as well adjust your search for a different result.
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