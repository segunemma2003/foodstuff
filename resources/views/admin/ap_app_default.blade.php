@model dynamic

@{
    ViewData["Title"] = ViewBag.corePageName;
}


<div class="col-lg-9 col-md-9 col-sm-12">

    <br />
    @if (TempData["SuccessMessage"] != null)
    {
        <div class="form-group">
            <div class="alert alert-success">
                ✔ @TempData["SuccessMessage"]
            </div>
        </div>
    }
    @if (TempData["ErrorMessage"] != null)
    {
        <div class="form-group">
            <div class="alert alert-warning">
                ⚠ @TempData["ErrorMessage"]
            </div>
        </div>
    }

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a asp-area="" asp-controller="Admin" asp-action="@ViewBag.prevPageLink">
                            @ViewBag.prevPageName
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @ViewBag.corePageName
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">

            @{
                if (Model.AppDefaults != null)
                {
                    int i = 0;
                    foreach (var Data in Model.AppDefaults)
                    {
                        i++;
                    }

                    if (i > 0)
                    {
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            @{
                                foreach (var Data in Model.AppDefaults)
                                {
                                    <div class="dashboard_wrap">

                                        <h6 class="m-0">@Data.FieldName</h6>

                                        <div class="row justify-content-center">
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                @using (Html.BeginForm("UpdateAppDefault", "Admin", FormMethod.Post))
                                                {
                                                    <form>
                                                        <div class="form-group smalls">
                                                            @*Accordian*@
                                                            <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                                <h6 class="mb-0 accordion_title">
                                                                    <a href="#" data-toggle="collapse" data-target="#@Data.ID" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">
                                                                        Read Description
                                                                    </a>
                                                                </h6>
                                                            </div>
                                                            <div id="@Data.ID" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                                                                <div class="card-body pl-3 pr-3 pt-0">
                                                                    <p>
                                                                        <span> @Data.Description</span>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            @{
                                                                if (Data.HtmlInputFieldDataType == "boolean")
                                                                {
                                                                    <select id="prc" name="VariableValue" class="form-control">
                                                                        @{
                                                                            var list = new List<KeyValuePair<string, string>>() {
                                                                            new KeyValuePair<string, string>("True", "true"),
                                                                            new KeyValuePair<string, string>("False", "false"),
                                                                        };

                                                                            foreach (var BooleanVal in list)
                                                                            {
                                                                                if (Data.VariableValue == BooleanVal.Value)
                                                                                {
                                                                                    <option value="@BooleanVal.Value" selected>@BooleanVal.Key</option>
                                                                                }
                                                                                else
                                                                                {
                                                                                    <option value="@BooleanVal.Value">@BooleanVal.Key</option>
                                                                                }
                                                                            }
                                                                        }
                                                                    </select>
                                                                }
                                                                else
                                                                {
                                                                    <input type="@Data.HtmlInputFieldDataType" name="VariableValue" class="form-control" value="@Data.VariableValue" />
                                                                }
                                                            }
                                                            <input type="text" name="ID" class="form-control" value="@Data.ID" hidden />
                                                            <input type="text" name="FieldName" class="form-control" value="@Data.FieldName" hidden />
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
                                }
                            }
                        </div>
                    }
                }
            }




        </div>



    </div>
    <!-- /Row -->

</div>

