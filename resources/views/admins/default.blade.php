@extends('shared.layout')
@section('Title', "Admin - Default")
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

            @php
                if (!empty($appDefaults)) {
                    $i = 0;
                    foreach ($appDefaults as $data) {
                        $i++;
                    }

                    if ($i > 0) {
            @endphp
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                @foreach ($appDefaults as $data)
                <div class="dashboard_wrap">
                    <h6 class="m-0">{{ $data['fieldName'] }}</h6>
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <form method="post" action="{{ route('updateAppDefault') }}">
                                @csrf
                                <div class="form-group smalls">
                                    {{-- Accordion --}}
                                    <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                        <h6 class="mb-0 accordion_title">
                                            <a href="#" data-toggle="collapse" data-target="#{{ $data['id'] }}" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">
                                                Read Description
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="{{ $data['id'] }}" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                                        <div class="card-body pl-3 pr-3 pt-0">
                                            <p>
                                                <span>{{ $data['description'] }}</span>
                                            </p>
                                        </div>
                                    </div>

                                    @if ($data['htmlInputFieldDataType'] == "boolean")
                                    <select id="prc" name="variableValue" class="form-control">
                                        @foreach ($booleanOptions as $option)
                                            <option value="{{ $option['value'] }}" {{ $data['variableValue'] == $option['value'] ? 'selected' : '' }}>{{ $option['key'] }}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <input type="{{ $data['htmlInputFieldDataType'] }}" name="variableValue" class="form-control" value="{{ $data['variableValue'] }}" />
                                    @endif

                                    <input type="text" name="id" class="form-control" value="{{ $data['id'] }}" hidden />
                                    <input type="text" name="fieldName" class="form-control" value="{{ $data['fieldName'] }}" hidden />
                                </div>
                                <div class="form-group smalls">
                                    <button class="btn theme-bg text-white" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @php
                    }
                }
            @endphp
        </div>
    </div>
    <!-- /Row -->
</div>

@endsection