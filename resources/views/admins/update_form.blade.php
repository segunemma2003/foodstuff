@extends('shared.layout')
@section('Title', "Admin - Update Form")
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
                        <a href="{{ route('admin', ['controller' => 'Admin', 'action' => $prevPageLink]) }}">
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
           
           
            @{
                switch (ViewBag.formName.ToString())
                {
                    case "EditFoodStuffName":
                        <div class="dashboard_wrap">

                            <h6 class="m-0">FieldName</h6>

                            <div class="row justify-content-center">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    @using (Html.BeginForm("EditFoodStuffName", "Admin", FormMethod.Post))
                                    {
                                        <form>
                                            <div class="form-group smalls">
                                                @*Accordian*@
                                                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                    <h6 class="mb-0 accordion_title">
                                                        <a href="#" data-toggle="collapse" data-target="ID" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">
                                                            Read Description
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div id="ID" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body pl-3 pr-3 pt-0">
                                                        <p>
                                                            <span> Description</span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <input type="text" name="VariableValue" class="form-control" value="VariableValue" />
                                                <input type="text" name="ID" class="form-control" value="ID" hidden />
                                                <input type="text" name="FieldName" class="form-control" value="FieldName" hidden />
                                            </div>
                                            <div class="form-group smalls">
                                                <button class="btn theme-bg text-white" type="submit">Save Changes</button>
                                            </div>
                                        </form>
                                        @Html.AntiForgeryToken();
                                    }
                                </div>
                            </div>

                        </div>
                        break;

                    case "EditFoodStuffPrice":
                        <div class="dashboard_wrap">

                            <h6 class="m-0">FieldName</h6>

                            <div class="row justify-content-center">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    @using (Html.BeginForm("EditFoodStuffPrice", "Admin", FormMethod.Post))
                                    {
                                        <form>
                                            <div class="form-group smalls">
                                                @*Accordian*@
                                                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                    <h6 class="mb-0 accordion_title">
                                                        <a href="#" data-toggle="collapse" data-target="ID" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">
                                                            Read Description
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div id="ID" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body pl-3 pr-3 pt-0">
                                                        <p>
                                                            <span> Description</span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <input type="text" name="VariableValue" class="form-control" value="VariableValue" />
                                                <input type="text" name="ID" class="form-control" value="ID" hidden />
                                                <input type="text" name="FieldName" class="form-control" value="FieldName" hidden />
                                            </div>
                                            <div class="form-group smalls">
                                                <button class="btn theme-bg text-white" type="submit">Save Changes</button>
                                            </div>
                                        </form>
                                        @Html.AntiForgeryToken();
                                    }
                                </div>
                            </div>

                        </div>
                        break;

                    case "EditFoodStuffTags":
                        <div class="dashboard_wrap">

                            <h6 class="m-0">FieldName</h6>

                            <div class="row justify-content-center">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    @using (Html.BeginForm("EditFoodStuffTags", "Admin", FormMethod.Post))
                                    {
                                        <form>
                                            <div class="form-group smalls">
                                                @*Accordian*@
                                                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                    <h6 class="mb-0 accordion_title">
                                                        <a href="#" data-toggle="collapse" data-target="ID" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">
                                                            Read Description
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div id="ID" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body pl-3 pr-3 pt-0">
                                                        <p>
                                                            <span> Description</span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <input type="text" name="VariableValue" class="form-control" value="VariableValue" />
                                                <input type="text" name="ID" class="form-control" value="ID" hidden />
                                                <input type="text" name="FieldName" class="form-control" value="FieldName" hidden />
                                            </div>
                                            <div class="form-group smalls">
                                                <button class="btn theme-bg text-white" type="submit">Save Changes</button>
                                            </div>
                                        </form>
                                        @Html.AntiForgeryToken();
                                    }
                                </div>
                            </div>

                        </div>
                        break;

                    case "ChangeFoodStuffCategory":
                        <div class="dashboard_wrap">

                            <h6 class="m-0">FieldName</h6>

                            <div class="row justify-content-center">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    @using (Html.BeginForm("ChangeFoodStuffCategory", "Admin", FormMethod.Post))
                                    {
                                        <form>
                                            <div class="form-group smalls">
                                                @*Accordian*@
                                                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                    <h6 class="mb-0 accordion_title">
                                                        <a href="#" data-toggle="collapse" data-target="ID" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">
                                                            Read Description
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div id="ID" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body pl-3 pr-3 pt-0">
                                                        <p>
                                                            <span> Description</span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <input type="text" name="VariableValue" class="form-control" value="VariableValue" />
                                                <input type="text" name="ID" class="form-control" value="ID" hidden />
                                                <input type="text" name="FieldName" class="form-control" value="FieldName" hidden />
                                            </div>
                                            <div class="form-group smalls">
                                                <button class="btn theme-bg text-white" type="submit">Save Changes</button>
                                            </div>
                                        </form>
                                        @Html.AntiForgeryToken();
                                    }
                                </div>
                            </div>

                        </div>
                        break;

                    case "ChangeFoodStuffImage":
                        <div class="dashboard_wrap">

                            <h6 class="m-0">FieldName</h6>

                            <div class="row justify-content-center">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    @using (Html.BeginForm("ChangeFoodStuffImage", "Admin", FormMethod.Post))
                                    {
                                        <form>
                                            <div class="form-group smalls">
                                                @*Accordian*@
                                                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                    <h6 class="mb-0 accordion_title">
                                                        <a href="#" data-toggle="collapse" data-target="ID" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">
                                                            Read Description
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div id="ID" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body pl-3 pr-3 pt-0">
                                                        <p>
                                                            <span> Description</span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <input type="text" name="VariableValue" class="form-control" value="VariableValue" />
                                                <input type="text" name="ID" class="form-control" value="ID" hidden />
                                                <input type="text" name="FieldName" class="form-control" value="FieldName" hidden />
                                            </div>
                                            <div class="form-group smalls">
                                                <button class="btn theme-bg text-white" type="submit">Save Changes</button>
                                            </div>
                                        </form>
                                        @Html.AntiForgeryToken();
                                    }
                                </div>
                            </div>

                        </div>
                        break;


                    default:
                        <div class="dashboard_wrap">

                            <h6 class="m-0">FieldName</h6>

                            <div class="row justify-content-center">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    @using (Html.BeginForm("ChangeFoodStuffImage", "Admin", FormMethod.Post))
                                    {
                                        <form>
                                            <div class="form-group smalls">
                                                @*Accordian*@
                                                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                    <h6 class="mb-0 accordion_title">
                                                        <a href="#" data-toggle="collapse" data-target="ID" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">
                                                            Read Description
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div id="ID" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body pl-3 pr-3 pt-0">
                                                        <p>
                                                            <span> Description</span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <input type="text" name="VariableValue" class="form-control" value="VariableValue" />
                                                <input type="text" name="ID" class="form-control" value="ID" hidden />
                                                <input type="text" name="FieldName" class="form-control" value="FieldName" hidden />
                                            </div>
                                            <div class="form-group smalls">
                                                <button class="btn theme-bg text-white" type="submit">Save Changes</button>
                                            </div>
                                        </form>
                                        @Html.AntiForgeryToken();
                                    }
                                </div>
                            </div>

                        </div>
                        break;
                }
            }
        




        </div>

    </div>






</div>

@endsection