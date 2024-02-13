@extends('shared.layout')
@section('Title', "Admin - Restaurant Dish")
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
                    @if (session('InvoiceID'))
                    <a href="https://foodstuff.store/Apps/InvoicePreview?InvoiceID={{ session('InvoiceID') }}" class="add_new_btn" target="_blank">
                        <i class="fas fa-eye mr-1"></i>
                        Preview Invoice
                    </a>
                    @endif
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
    
                        @if (empty(session('InvoiceID')))
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    
                            <div class="tab-content" id="v-pills-tabContent">
                                <!-- Basic -->
                                <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                                    @if (empty(session('InvoiceID')))
                                    {{-- <form method="POST" action="{{ route('admin.CreateEmptyInvoice') }}"> --}}
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="form-group smalls">
                                            <label>Customer / Business</label>
                                            <select id="cates" name="customer" class="form-control" style="width: 100%">
                                                {{-- @foreach ($model['Users'] as $data)
                                                    <option value="{{ MailerHelper::IsValidEmail($data['UserEmail']) ? $data['UserEmail'] : $data['Phone'] }}">
                                                        {{ $data['Username'] }} ({{ MailerHelper::IsValidEmail($data['UserEmail']) ? $data['UserEmail'] : $data['Phone'] }})
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
    
                                        <div class="form-group smalls">
                                            <label>Invoice Status</label>
                                            <select id="cates" name="Status" class="form-control" style="width: 100%">
                                                <option value="delivered" selected>Delivered</option>
                                                <option value="dispatched">Dispatched</option>
                                                <option value="approved">Approved</option>
                                                <option value="refunded">Refunded</option>
                                            </select>
                                        </div>
    
                                        <br />
    
                                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <button type="submit" class="btn text-white full-width theme-bg">Create Invoice</button>
                                            </div>
                                        </div>
    
                                        <br />
                                        <br />
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif

                        @if (session('InvoiceID'))
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="dashboard_wrap">
                                    <div class="row justify-content-between">
                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                            <div class="form-group smalls row align-items-center">
                                                <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                                    <h6 class="m-0"><b>Invoice ID:</b><br /> {{ session('InvoiceID') }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-8">
                                            {{-- Your content here --}}
                                            @if (session('InvoiceID'))
                                            {!! Form::open(['url' => 'Admin/AddToInvoice', 'method' => 'post']) !!}
                                            <div class="row align-items-end mb-5">
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                    <input type="hidden" name="InvoiceId" value="{{ session('InvoiceID') }}" required>
                                                    <input type="hidden" name="uuid" value="{{ session('UUID') }}" required>
                                                    <div class="form-group">
                                                        <div class="smalls">
                                                            <select id="cates" name="FoodItem" class="form-control">
                                                                {{-- @foreach ($foodStuffs as $data)
                                                                    @if (isset($selectedRIProduct) && $selectedRIProduct == $data->Name)
                                                                        <option value="{{ $data->Name }} ({{ $data->Weight }})₦{{ $data->Price }}#{{ $data->ProductID }}" selected>
                                                                            {{ $data->Name }} ({{ $data->Weight }})- ₦{{ $data->Price }}
                                                                        </option>
                                                                    @else
                                                                        <option value="{{ $data->Name }} ({{ $data->Weight }})₦{{ $data->Price }}#{{ $data->ProductID }}">
                                                                            {{ $data->Name }} ({{ $data->Weight }})- ₦{{ $data->Price }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="smalls">
                                                            <input type="number" class="form-control" name="Quantity" value="{{ session('Quantity') }}" maxlength="11" placeholder="Quantity" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" title="Add Item" class="btn text-white full-width theme-bg">Add Item</button>
                                                    </div>
                                                </div>
                                            </div>
                                            {{ Form::token() }}
                                            {!! Form::close() !!}
                                             @endif

                                        </div>
                                    </div>
                                    {{-- Row pt-4  --}}
                                    <div class="row pt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                                            <div class="table-responsive">
                                                @if ($restaurantDishes)
                                                    @php $i = 0; @endphp
                                                    @foreach ($restaurantDishes as $data)
                                                        @php $i++; @endphp
                                                    @endforeach
                                    
                                                    @if ($i > 0)
                                                        <table class="table dash_list">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Food Item/Weight</th>
                                                                    <th scope="col">Unit</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">Quantity</th>
                                                                    <th scope="col">
                                                                        <a class="btn btn-action" href="#" target="_blank" title="Preview Invoice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fas fa-eye"></i>
                                                                        </a>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            @php $count = 0; @endphp
                                                            @foreach ($restaurantDishes as $data)
                                                                @php $count++; @endphp
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">{{ $count }}</th>
                                                                        {!! Form::open(['url' => 'Admin/SaveChangesToInvoiceItem', 'method' => 'post']) !!}
                                                                        <input type="hidden" name="ID" value="{{ $data->ID }}" required>
                                                                        <input type="hidden" name="InvoiceId" value="{{ session('InvoiceID') }}" required>
                                                                        <input type="hidden" name="uuid" value="{{ session('UUID') }}" required>
                                                                        <td><div class="smalls lg"><input value="{{ $data->Name }}" name="Name" type="text" style="border:none;" /></div></td>
                                                                        <td><div class="smalls lg"><input value="{{ $data->Unit }}" name="Unit" type="text" style="border:none;" /></div></td>
                                                                        <td><div class="trip theme-cl theme-bg-light">₦<input value="{{ $data->Price }}" type="text" name="Price" style="border:none; width:75px; background-color:transparent;" /></div></td>
                                                                        <td><div class="trip theme-cl theme-bg-light"><input value="{{ $data->Quantity }}" type="number" name="Quantity" style="border:none; width:75px; background-color:transparent;" /></div></td>
                                                                        <button id="btn_{{ $data->ID }}" type="submit" hidden></button>
                                                                        {!! Form::close() !!}
                                                                        <td>
                                                                            <div class="dropdown show">
                                                                                <a class="btn btn-action" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fas fa-ellipsis-h"></i>
                                                                                </a>
                                                                                <div class="drp-select dropdown-menu">
                                                                                    <button class="dropdown-item" type="submit" onclick="SaveInvoiceItemChnages('btn_{{ $data->ID }}')">Save Changes</button>
                                                                                    {!! Form::open(['url' => 'Admin/RemoveInvoiceItem', 'method' => 'post']) !!}
                                                                                    <input type="hidden" name="ID" value="{{ $data->ID }}" required>
                                                                                    <input type="hidden" name="InvoiceId" value="{{ session('InvoiceID') }}" required>
                                                                                    <input type="hidden" name="uuid" value="{{ session('UUID') }}" required>
                                                                                    <button class="dropdown-item" type="submit">Delete Food Item</button>
                                                                                    {!! Form::close() !!}
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
                                                                    <th scope="col">Food Item</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">Quantity</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-6 col-md-10">
                                                                <div class="text-center">
                                                                    <img src="{{ asset('assets/img/EmptyActivity.png') }}" style="width:50%;" class="img-fluid" alt="" />
                                                                    <br /><br />
                                                                    <h4>
                                                                        This invoice is empty, add some food items.
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @else
                                                    <table class="table dash_list">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Food Item</th>
                                                                <th scope="col">Price</th>
                                                                <th scope="col">Quantity</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <div class="row justify_content-center">
                                                        <div class="col-lg-6 col-md-10">
                                                            <div class="text-center">
                                                                <img src="{{ asset('assets/img/EmptyActivity.png') }}" style="width:50%;" class="img-fluid" alt="" />
                                                                <br /><br />
                                                                <h4>
                                                                    This invoice is empty, add some food items.
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <hr style="border-top:2px dashed #bbb;" />
                                    <br />

                                    <div class="row pt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                            <h6 class="m-0">Update Customer Contact Information</h6>
                                        </div>
                                    </div>

                                    {{-- <form method="POST" action="{{ route('Admin.UpdateInvoiceContactInfo') }}" enctype="multipart/form-data"> --}}
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row align-items-end mb-5">
                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Contact Name</label>
                                                    <div class="smalls">
                                                        <input type="text" class="form-control" name="FullName" value="{{ session('FullName') }}" maxlength="50" placeholder="Your full name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <div class="smalls">
                                                        <input type="email" class="form-control" disabled value="{{ session('Email') }}" maxlength="50" placeholder="Your email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <div class="smalls">
                                                        <input type="number" class="form-control" disabled value="{{ session('Phone') }}" maxlength="14" placeholder="Your budget?" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-8 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Pick-Up Address</label>
                                                    <div class="smalls">
                                                        {{-- @if ($addresses)
                                                            @php $i = 0; @endphp
                                                            @foreach ($addresses as $data)
                                                                @php $i++; @endphp
                                                            @endforeach
                                    
                                                            @if ($i < 3)
                                                                <input type="text" class="form-control" name="Address" value="{{ session('Address') }}" maxlength="500" placeholder="House NO., Street, City, State, Country" required />
                                                            @else
                                                                <select id="cates" name="Address" class="form-control">
                                                                    @foreach ($addresses as $data)
                                                                        <option value="{{ $data->Address }}">
                                                                            {{ $data->Address }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                        @endif --}}
                                                        <input name="InvoiceId" value="{{ session('InvoiceID') }}" required hidden>
                                                        <input name="uuid" value="{{ session('UUID') }}" required hidden>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn text-white full-width theme-bg">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <br />
                                    <hr style="border-top:2px dashed #bbb;" />
                                    <br />

                                    <div class="row pt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                            <h6 class="m-0">Back-Date Invoice</h6>
                                        </div>
                                    </div>
                                    {{-- <form method="POST" action="{{ route('Admin.BackDateInvoice') }}" enctype="multipart/form-data"> --}}
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row align-items-end mb-5">
                                            <div class="col-xl-10 col-lg-10 col-md-8 col-sm-8">
                                                <div class="form-group">
                                                    <label>Order Date</label>
                                                    <div class="smalls">
                                                        <input type="text" class="form-control" name="Date" value="{{ session('Date') }}" maxlength="50" placeholder="yyyy-mm-dd" required>
                                                        <input name="InvoiceID" value="{{ session('InvoiceID') }}" required hidden>
                                                        <input name="uuid" value="{{ session('UUID') }}" required hidden>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <button type="submit" class="btn text-white full-width theme-bg">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <br />
                                    <hr style="border-top:2px dashed #bbb;" />
                                    <br />

                                    <div class="row pt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                            <h6 class="m-0">Payment Information</h6>
                                        </div>
                                    </div>

                                    {{-- <form method="POST" action="{{ route('Admin.EditInvoicePaymentMethod') }}" enctype="multipart/form-data"> --}}
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row align-items-end mb-5">
                                            <div class="col-xl-4 col-lg-8 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Payment Status</label>
                                                    <div class="smalls">
                                                        <select id="cates" name="Paid" class="form-control">
                                                            {{-- @php
                                                                $list1 = [
                                                                    ["Paid", "true"],
                                                                    ["UnPaid", "false"]
                                                                ];
                                    
                                                                $paymentStatus = session('PaymentStatus');
                                    
                                                                foreach ($list1 as $data) {
                                                                    $selected = $paymentStatus == $data[1] ? 'selected' : '';
                                                                    echo "<option value='$data[1]' $selected>$data[0]</option>";
                                                                }
                                                            @endphp --}}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-8 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Payment Method</label>
                                                    <div class="smalls">
                                                        <select id="cates" name="PaymentMethod" class="form-control">
                                                            @php
                                                                $list2 = [
                                                                    ["Bank Transfer", "Bank Transfer"],
                                                                    ["Cash", "Cash"],
                                                                    ["Paystack", "Paystack Gateway"],
                                                                    ["Flutterwave", "Flutterwave Gateway"],
                                                                    ["Spectra(Buy Now, Pay Later)", "Specta"],
                                                                    ["Swipe(Buy Now, Pay Later)", "Swipe"],
                                                                    ["Other", "n/a"]
                                                                ];
                                    
                                                                $paymentMethod = session('PaymentMethod');
                                    
                                                                foreach ($list2 as $data) {
                                                                    $selected = $paymentMethod == $data[1] ? 'selected' : '';
                                                                    echo "<option value='$data[1]' $selected>$data[0]</option>";
                                                                }
                                                            @endphp
                                                        </select>
                                                        <input name="InvoiceID" value="{{ session('InvoiceID') }}" required hidden>
                                                        <input name="uuid" value="{{ session('UUID') }}" required hidden>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <button type="submit" class="btn text-white full-width theme-bg">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    @if(session('InvoiceStatus'))
                                        <br>
                                        <hr style="border-top:2px dashed #bbb;">
                                        <br>

                                        <div class="row pt-4">
                                            <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                                <h6 class="m-0">Invoice Status</h6>
                                            </div>
                                        </div>

                                        <div class="elkios">
                                            @php
                                            $invoiceStatus = session('InvoiceStatus');
                                            @endphp

                                            @if ($invoiceStatus == "PENDING")
                                                <span class="trip text-white bg-primary">&nbsp;{{ $invoiceStatus }}&nbsp;</span>
                                            @elseif ($invoiceStatus == "APPROVED")
                                                <span class="trip text-white bg-warning">&nbsp;{{ $invoiceStatus }}&nbsp;</span>
                                            @elseif ($invoiceStatus == "DISPATCHED")
                                                <span class="trip text-white bg-purple">&nbsp;{{ $invoiceStatus }}&nbsp;</span>
                                            @elseif ($invoiceStatus == "DELIVERED")
                                                <span class="trip text-white bg-success">&nbsp;{{ $invoiceStatus }}&nbsp;</span>
                                            @elseif ($invoiceStatus == "REFUNDED")
                                                <span class="trip text-white bg-secondary">&nbsp;{{ $invoiceStatus }}&nbsp;</span>
                                            @else
                                                <span class="dhs_tags">&nbsp;{{ $invoiceStatus }}&nbsp;</span>
                                            @endif
                                        </div>
                                    @endif

                                </div>
                            </div>
                        @endif

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