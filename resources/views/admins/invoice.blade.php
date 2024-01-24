@extends('shared.layout')
@section('Title', "Admin - Invoice")
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
                        <a href="{{ route('admin', ['prevPageLink' => '']) }}">
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
                        <h6 class="m-0">Manage Invoice</h6>
                    </div>
                </div>

                {{-- <form method="POST" action="{{ route('admin.searchInvoice') }}"> --}}
                    <form method="POST" action="">
                        @csrf
                        <div class="row align-items-end mb-5">
                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Search</label>
                                    <div class="smalls input-with-icon">
                                        <input type="text" name="SearchField" class="form-control" value="">
                                        <input type="text" name="CorePageLink" value="" hidden>
                                        <i class="ti-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Year</label>
                                    <div class="smalls">
                                        <select id="prc" name="Year" class="form-control">
                                            @foreach ($yearList as $year)
                                            {{-- <option value="{{ $year['value'] }}" {{
                                                $selectedInvoiceYear==$year['value'] ? 'selected' : '' }}>
                                                {{ $year['key'] }}
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
                                    <label>Bill</label>
                                    <div class="smalls">
                                        <select id="prc" name="Paid" class="form-control">
                                            @foreach ($billList as $bill)
                                            {{-- <option value="{{ $bill['value'] }}" {{
                                                $selectedInvoiceBill==$bill['value'] ? 'selected' : '' }}>
                                                {{ $bill['key'] }}
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
                                    <label>Rows</label>
                                    <div class="smalls">
                                        <select id="prc" name="Rows" class="form-control">
                                            @foreach ($list as $item)
                                            {{-- <option value="{{ $item['value'] }}" {{
                                                $selectedInvoiceListLimit==$item['value'] ? 'selected' : '' }}>
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
                                    <label>Status</label>
                                    <div class="smalls">
                                        <select id="prc" name="Status" class="form-control">
                                            @foreach ($list2 as $status)
                                            {{-- <option value="{{ $status['value'] }}" {{
                                                $selectedInvoiceStatus==$status['value'] ? 'selected' : '' }}>
                                                {{ $status['key'] }}
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

                                @if (!empty($invoices))
                                @php
                                $i = 0;
                                @endphp

                                @foreach ($invoices as $invoice)
                                @php
                                $i++;
                                @endphp
                                @endforeach

                                @if ($i > 0)
                                <table class="table dash_list">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Invoice ID</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Total (Without Tax)</th>
                                            <th scope="col">
                                                {{-- <a class="btn btn-action"
                                                    href="{{ route('admin.APManageInvoice') }}" target="_blank"
                                                    title="Create Invoice"> --}}
                                                    <a class="btn btn-action" href="" target="_blank"
                                                        title="Create Invoice">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $count = 0;
                                        @endphp

                                        @foreach ($invoices as $data)
                                        @php
                                        $count++;
                                        @endphp

                                        <tr>
                                            <th scope="row">{{ $count }}</th>
                                            <td>
                                                <h6>
                                                    {{-- {{ $data->Fullname }} --}}
                                                </h6>
                                                <p>Date:
                                                    <span>
                                                        {{-- {{ $data->ServerDateTime }} --}}
                                                    </span>
                                                </p>
                                            </td>
                                            <td>
                                                <div class="dhs_tags">
                                                    {{-- {{ $data->Address }} --}}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="smalls">
                                                    {{-- {{ $data->InvoiceID }} --}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="smalls">₦
                                                    {{-- {{ $data->Budget }} --}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="dhs_tags">
                                                    {{-- {{ $data->Status }} --}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="smalls">₦
                                                    {{-- {{ $data->Total }} --}}
                                                </span>
                                                {{-- @if ($data->Paid == "true") --}}
                                                <span class="trip text-white bg-info">&nbsp;Paid&nbsp;</span>
                                                {{-- @else --}}
                                                <span class="trip theme-cl theme-bg-light">UnPaid</span>
                                                {{-- @endif --}}
                                            </td>
                                            {{-- @if ($data->Status != "delivered" && $data->Status != "refunded" &&
                                            $data->Status != "canceled") --}}
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-action" href="#" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </a>
                                                    <div class="drp-select dropdown-menu">
                                                        {{-- @if ($data->Status == "pending") --}}
                                                        {{-- <form method="POST"
                                                            action="{{ route('admin.SignInvoice') }}"> --}}
                                                            <form method="POST" action="">
                                                                @csrf
                                                                <input type="text" name="IDLabel" value="" hidden />
                                                                <input type="text" name="Signature" value="approved"
                                                                    hidden />
                                                                <button type="submit" class="dropdown-item">Approve
                                                                    Invoice</button>
                                                            </form>
                                                            {{-- <form method="POST"
                                                                action="{{ route('admin.SignInvoice') }}"> --}}
                                                                <form method="POST" action="">
                                                                    @csrf
                                                                    <input type="text" name="IDLabel" value="" hidden />
                                                                    <input type="text" name="Signature"
                                                                        value="dispatched" hidden />
                                                                    <button type="submit" class="dropdown-item">
                                                                        Dispatch Package
                                                                    </button>
                                                                </form>
                                                                {{-- <form method="POST"
                                                                    action="{{ route('admin.SignInvoice') }}"> --}}
                                                                    <form method="POST" action="">
                                                                        @csrf
                                                                        <input type="text" name="IDLabel" value=""
                                                                            hidden />
                                                                        <input type="text" name="Signature"
                                                                            value="delivered" hidden />
                                                                        <button type="submit" class="dropdown-item">
                                                                            Sign As Delivered
                                                                        </button>
                                                                    </form>
                                                                    {{-- <form method="POST"
                                                                        action="{{ route('admin.SignInvoice') }}"> --}}
                                                                        <form method="POST" action="">
                                                                            @csrf
                                                                            <input type="text" name="IDLabel" value=""
                                                                                hidden />
                                                                            <input type="text" name="Signature"
                                                                                value="canceled" hidden />
                                                                            <button type="submit" class="dropdown-item">
                                                                                Cancel
                                                                            </button>
                                                                        </form>
                                                                        {{-- @elseif ($data->Status == "dispatched")
                                                                        --}}
                                                                        {{-- <form method="POST"
                                                                            action="{{ route('admin.SignInvoice') }}">
                                                                            --}}
                                                                            <form method="POST" action="">
                                                                                @csrf
                                                                                <input type="text" name="IDLabel" value="" hidden />
                                                                                <input type="text" name="Signature" value="delivered" hidden />
                                                                                <button type="submit" class="dropdown-item">
                                                                                    Sign As Delivered
                                                                                </button>
                                                                            </form>
                                                                            {{-- <form method="POST"
                                                                                action="{{ route('admin.SignInvoice') }}">
                                                                                --}}
                                                                                <form method="POST" action="">
                                                                                    @csrf
                                                                                    <input type="text" name="IDLabel" value="" hidden />
                                                                                    <input type="text" name="Signature" value="refunded" hidden />
                                                                                    <button type="submit" class="dropdown-item">Refund</button>
                                                                                </form>
                                                                                {{-- <form method="POST"
                                                                                    action="{{ route('admin.ReIssueInvoice') }}">
                                                                                    --}}
                                                                                    <form method="POST" action="">
                                                                                        @csrf
                                                                                        <input type="text" name="IDLabel" value="" hidden />
                                                                                        <input type="text" name="InvoiceID" value="" hidden />
                                                                                        <button type="submit" class="dropdown-item">
                                                                                            Reissue Invoice
                                                                                        </button>
                                                                                    </form>
                                                                                    {{-- @elseif ($data->Status ==
                                                                                    "approved") --}}
                                                                                    {{-- <form method="POST"
                                                                                        action="{{ route('admin.SignInvoice') }}">
                                                                                        --}}
                                                                                        <form method="POST" action="">
                                                                                            @csrf
                                                                                            <input type="text"  name="IDLabel" value="" hidden />
                                                                                            <input type="text" name="Signature" value="dispatched" hidden />
                                                                                            <button type="submit" class="dropdown-item">
                                                                                                Dispatch Package
                                                                                            </button>
                                                                                        </form>
                                                                                        {{-- <form method="POST"
                                                                                            action="{{ route('admin.SignInvoice') }}">
                                                                                            --}}
                                                                                            <form method="POST" action="">
                                                                                                @csrf
                                                                                                <input type="text" name="IDLabel" value="" hidden />
                                                                                                <input type="text" name="Signature" value="delivered" hidden />
                                                                                                <button type="submit" class="dropdown-item">Sign
                                                                                                    As Delivered
                                                                                                </button>
                                                                                            </form>
                                                                                            {{-- <form method="POST"
                                                                                                action="{{ route('admin.SignInvoice') }}">
                                                                                                --}}
                                                                                                <form method="POST"
                                                                                                    action="">
                                                                                                    @csrf
                                                                                                    <input type="text" name="IDLabel" value="" hidden />
                                                                                                    <input type="text" name="Signature" value="refunded" hidden />
                                                                                                    <button type="submit" class="dropdown-item">Refund</button>
                                                                                                </form>
                                                                                                {{-- @endif --}}

                                                                                                {{-- <form method="POST"
                                                                                                    action="{{ route('admin.ManageInvoice') }}">
                                                                                                    --}}
                                                                                                    <form method="POST"
                                                                                                        action="">
                                                                                                        @csrf
                                                                                                        <input type="text" name="uuid" value="" hidden />
                                                                                                        <input type="text" name="InvoiceID" value="" hidden />
                                                                                                        <button
                                                                                                            type="submit"
                                                                                                            class="dropdown-item">Manage
                                                                                                            Invoice</button>
                                                                                                    </form>
                                                                                                    {{-- <a href="https://foodstuff.store/Apps/InvoicePreview?InvoiceID={{ $data->InvoiceID }}" target="_blank" class="dropdown-item pl-4"> --}}
                                                                                                    <a href="https://foodstuff.store/Apps/InvoicePreview?InvoiceID" target="_blank" class="dropdown-item pl-4">
                                                                                                        <h6>
                                                                                                            Preview Invoice
                                                                                                        </h6>
                                                                                                    </a>
                                                                                                    {{-- <a href="mailto:{{ $data->UserEmail }}" type="text/plain" class="dropdown-item pl-4"> --}}
                                                                                                    <a href="mailto:test@test.com" type="text/plain" class="dropdown-item pl-4">
                                                                                                        <h6>
                                                                                                            Mail User
                                                                                                        </h6>
                                                                                                    </a>
                                                                                                    {{-- <a href="tel:{{ $data->Phone }}" type="text/plain" class="dropdown-item pl-4"> --}}
                                                                                                    <a href="tel:008528999" type="text/plain" class="dropdown-item pl-4">
                                                                                                        <h6>
                                                                                                            Call User
                                                                                                        </h6>
                                                                                                    </a>
                                                                                                    <a href="#"type="text/plain" class="dropdown-item pl-4" data-toggle="modal" data-target="#deleteinvoice">
                                                                                                        <h6>
                                                                                                            Delete Invoice
                                                                                                        </h6>
                                                                                                    </a>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- @else --}}
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-action" href="#" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </a>
                                                    <div class="drp-select dropdown-menu">
                                                        {{-- <form method="POST"
                                                            action="{{ route('admin.ReIssueInvoice') }}"> --}}
                                                            <form method="POST" action="">
                                                                @csrf
                                                                <input type="text" name="uuid" value="" hidden />
                                                                <input type="text" name="InvoiceID" value="" hidden />
                                                                <input type="text" name="Fullname" value="" hidden />
                                                                <input type="text" name="Address" value="" hidden />
                                                                <input type="text" name="Budget" value="" hidden />
                                                                <input type="text" name="Status" value="" hidden />
                                                                <input type="text" name="Total" value="" hidden />
                                                                <input type="text" name="IsCartOrder" value="" hidden />
                                                                <input type="text" name="PaymentMethod" value="" hidden />
                                                                <button type="submit" class="dropdown-item">
                                                                    Reissue Invoice
                                                                </button>
                                                            </form>
                                                            {{-- <form method="POST"
                                                                action="{{ route('admin.SetInvoicePaidStatus') }}"> --}}
                                                                <form method="POST" action="">
                                                                    @csrf
                                                                    <input type="text" name="IDLabel" value="" hidden />
                                                                    <input type="text" name="Paid" value="" hidden />
                                                                    <input type="text" name="InvoiceID" value="" hidden />
                                                                    {{-- @if ($data->Paid != "true") --}}
                                                                    <button type="submit" class="dropdown-item">
                                                                        Set As Paid
                                                                    </button>
                                                                    {{-- @else --}}
                                                                    <button type="submit" class="dropdown-item">
                                                                        Undo Payment
                                                                    </button>
                                                                    {{-- @endif --}}
                                                                </form>
                                                                {{-- <form method="POST"
                                                                    action="{{ route('admin.ManageInvoice') }}"> --}}
                                                                    <form method="POST" action="">
                                                                        @csrf
                                                                        <input type="text" name="uuid" value="" hidden />
                                                                        <input type="text" name="InvoiceID" value="" hidden />
                                                                        <button type="submit" class="dropdown-item">
                                                                            Manage Invoice
                                                                        </button>
                                                                    </form>
                                                                    {{-- <a href="https://foodstuff.store/Apps/InvoicePreview?InvoiceID={{ $data->InvoiceID }}" target="_blank" class="dropdown-item pl-4"> --}}
                                                                    <a href="https://foodstuff.store/Apps/InvoicePreview?InvoiceID=" target="_blank" class="dropdown-item pl-4">
                                                                        <h6>Preview Invoice</h6>
                                                                    </a>
                                                                    {{-- <a href="mailto:{{ $data->UserEmail }}"> --}}
                                                                    <a href="mailto:test@test.com"
                                                                        type="text/plain" class="dropdown-item pl-4">
                                                                        <h6>Mail User</h6>
                                                                    </a>
                                                                    {{-- <a href="tel:{{ $data->Phone }}" type="text/plain" class a="dropdown-item pl-4"> --}}
                                                                    <a href="tel:23987000278" type="text/plain" class a="dropdown-item pl-4">
                                                                        <h6>Call User</h6>
                                                                    </a>
                                                                    <a href="#" type="text/plain" class="dropdown-item pl-4" data-toggle="modal" data-target="#deleteinvoice">
                                                                        <h6>Delete Invoice</h6>
                                                                    </a>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- @endif --}}
                                        </tr>
                                        @endforeach

                                        <!-- Confirm Sign Out Modal -->
                                        <div class="modal fade" id="deleteinvoice" tabindex="-1" role="dialog"
                                            aria-labelledby="loginoutmodal" aria-hidden="true">
                                            <div class="modal-dialog modal-xl login-pop-form" role="document">
                                                <div class="modal-content overli" id="loginmodal">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirm</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true"><i
                                                                    class="fas fa-times-circle"></i></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="login-form">
                                                            {{-- <form method="POST"
                                                                action="{{ route('admin.DeleteInvoice') }}"> --}}
                                                                <form method="POST" action="">
                                                                    @csrf
                                                                    <input type="text" name="ID" value="" hidden />
                                                                    <input type="text" name="uuid" value="" hidden />
                                                                    <input type="text" name="InvoiceId" value="" hidden />
                                                                    <input type="text" name="IsCartOrder" value="" hidden />
                                                                    <div class="rcs_log_125 pt-2 pb-3">
                                                                        <span>Are you sure you want to delete invoice #
                                                                            {{-- {{ $data->InvoiceID }} --}}
                                                                        ?</span>
                                                                    </div>
                                                                    <div class="rcs_log_126 full">
                                                                        <ul class="social_log_45 row">
                                                                            <li
                                                                                class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                                <button type="button"
                                                                                    class="close sl_btn"
                                                                                    data-dismiss="modal">Cancel</button>
                                                                            </li>
                                                                            <li
                                                                                class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                                <button type="submit"
                                                                                    class="btn btn-md full-width theme-bg text-white">Yes</button>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </form>
                                                        </div>
                                                    </div>

                                                    <div class="crs_log__footer d-flex justify-content-between mt-0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Confirm Sign Out Modal -->

                                    </tbody>
                                </table>
                                @else
                                <table class="table dash_list">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Fullname</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Invoice ID</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Total (Without Tax)</th>
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
                                                No invoice found. Might as well adjust your search for a different
                                                result.
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
                                            <th scope="col">Fullname</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Invoice ID</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Total (Without Tax)</th>
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
                                                No invoice found. Might as well adjust your search for a different
                                                result.
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