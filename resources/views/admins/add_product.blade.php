@extends('shared.layout')
@section('Title', "Admin - Add Product")
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

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="dashboard_wrap">
                <div class="form_blocs_wrap">
                    <div class="row justify-content-between">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="tab-content" id="v-pills-tabContent">
                                <!-- Basic -->
                                <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                                    {{-- <form action="{{ route('admin.addAProduct') }}" method="post" enctype="multipart/form-data"> --}}
                                    <form action="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group smalls">
                                            <label>Product Name*</label>
                                            <input type="text" required name="Name" value="" class="form-control" placeholder="Enter a name for this product" maxlength="50">
                                        </div>

                                        <div class="form-group smalls">
                                            <label>Description*</label>
                                            <div class="row m-0">
                                                <textarea rows="10" required name="Description" maxlength="1500" class="form-control" placeholder="Words related or similar to this product's name and description">{{ old('Description', session('TempData.Description')) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group smalls">
                                            <label>Weight*</label>
                                            <input type="text" name="Weight" value="" required class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group smalls">
                                            <label>Unit*</label>
                                            <input type="text" name="Unit" value="" required class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group smalls">
                                            <label>Brand Name</label>
                                            <input type="text" name="Brand" value="" class="form-control" placeholder="Enter a name for this product" maxlength="50">
                                        </div>

                                        <div class="form-group smalls">
                                            <label>Category</label>
                                            <div class="simple-input">
                                                <select id="cates" name="Category" class="form-control">
                                                    @php
                                                        $categories = [
                                                            'Vegetable' => 'Vegetable',
                                                            'Proteins' => 'Protein',
                                                            'Seasoning' => 'Seasoning',
                                                            'Fruits' => 'Fruit',
                                                            'Grains' => 'Grains',
                                                            'Nuts' => 'Nuts',
                                                            'Processed Food' => 'Processed',
                                                            'Fluids' => 'Fluids',
                                                            'Live Stock' => 'Live Stock',
                                                            'Seeds' => 'Seeds',
                                                        ];
                                                        $category = old('Category', session('TempData.Category')) ?? '';
                                                    @endphp

                                                    @foreach ($categories as $value => $key)
                                                        <option value="{{ $key }}" {{ $category == $key ? 'selected' : '' }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group smalls">
                                            <label>Tags*</label>
                                            <div class="row m-0">
                                                <textarea name="Tags" required rows="10" maxlength="1500" class="form-control" placeholder="Words related or similar to this product's name and description">{{ old('Tags', session('TempData.Tags')) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group smalls">
                                            <label>Price(₦)</label>
                                            <input type="number" step=".01" name="Price" required value="{{ old('Price', session('TempData.Price')) }}" class="form-control" placeholder="Enter Course Price">
                                        </div>

                                        <div class="form-group smalls">
                                            <label>Status</label>
                                            <select id="cates" name="Status" class="form-control">
                                                <option value="active" selected>Show On Store</option>
                                                <option value="hidden">Hide From Store</option>
                                            </select>
                                        </div>

                                        <div class="form-group smalls">
                                            <label>Product Policy</label>
                                            <div class="row m-0">
                                                <textarea rows="10" maxlength="1500" name="ProductPolicy" class="form-control" placeholder="Words related or similar to this product's name and description">{{ old('ProductPolicy', session('TempData.ProductPolicy')) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group smalls">
                                            <label>Shipping</label>
                                            <div class="row m-0">
                                                <textarea rows="10" maxlength="1500" name="Shipping" class="form-control" placeholder="Words related or similar to this product's name and description">{{ old('Shipping', session('TempData.Shipping')) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group smalls">
                                            <label>Image *</label>
                                            <input type="file" required class="form-control" name="Image" placeholder="Upload one png, jpeg, or jpg file">
                                        </div>

                                        <br />

                                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <button type="submit" class="btn text-white full-width theme-bg">Submit</button>
                                            </div>
                                        </div>

                                        <br />
                                        <br />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>

@endsection