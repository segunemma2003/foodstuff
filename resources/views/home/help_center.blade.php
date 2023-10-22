@{
    ViewData["Title"] = ViewBag.corePageName;
}

<br />
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Help Center?</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a asp-area="" asp-controller="Home" asp-action="@ViewBag.prevPageLink">
                                    @ViewBag.prevPageName
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                @ViewBag.corePageName
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Product Description ================================== -->
<section class="pt-0">
    <div class="container">
        <br/>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h2>Frequently Ask <span class="theme-cl">Questions</span></h2>
                    <p>
                        Feel free to browse through our help topics. If the following topics below aren't helpful, Contact
                        our <a asp-area="" asp-controller="Home" asp-action="Contact" style="color:#E10C2C;">Technical Department</a> for guidiance.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-10 col-md-12 col-sm-12">

                <div class="property_block_wrap_header">
                    <ul class="nav nav-tabs customize-tab tabs_creative" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Billing</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="upgrade-tab" data-toggle="tab" href="#upgrade" role="tab" aria-controls="upgrade" aria-selected="false">Technical</a>
                        </li>

                    </ul>
                </div>

                <div class="tab-content tabs_content_creative" id="myTabContent">

                    <!-- general Query -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <br />
                            <div id="accordionExample" class="accordion">
                                @{
                                    if (Model != null)
                                    {
                                        foreach (var Data in Model)
                                        {
                                            if (Data.Category == "General")
                                            {
                                                <!-- Part 1 -->
                                                <div class="card">
                                                    <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                        <h6 class="mb-0 accordion_title">
                                                            <a href="#" data-toggle="collapse" data-target="#@Data.ID" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">
                                                                @Data.Question
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="@Data.ID" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                                                        <div class="card-body pl-3 pr-3 pt-0">
                                                            <p>
                                                                @Data.Answer
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            }
                                        }
                                    }
                                }
                            </div>
                        </div>
                    </div>

                    <!-- general Query -->
                    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <br/>
                            <div id="accordionExample" class="accordion">
                                @{
                                    if (Model != null)
                                    {
                                        foreach (var Data in Model)
                                        {
                                            if (Data.Category == "Billing")
                                            {
                                                <!-- Part 1 -->
                                                <div class="card">
                                                    <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                        <h6 class="mb-0 accordion_title">
                                                            <a href="#" data-toggle="collapse" data-target="#@Data.ID" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">
                                                                @Data.Question
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="@Data.ID" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                                                        <div class="card-body pl-3 pr-3 pt-0">
                                                            <p>
                                                                @Data.Answer
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            }
                                        }
                                    }
                                }
                            </div>
                        </div>
                    </div>

                    <!-- general Query -->
                    <div class="tab-pane fade" id="upgrade" role="tabpanel" aria-labelledby="upgrade-tab">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <br/>
                            <div id="accordionExample" class="accordion">
                                @{
                                    if (Model != null)
                                    {
                                        foreach (var Data in Model)
                                        {
                                            if (Data.Category == "Technical")
                                            {
                                                <!-- Part 1 -->
                                                <div class="card">
                                                    <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                        <h6 class="mb-0 accordion_title">
                                                            <a href="#" data-toggle="collapse" data-target="#@Data.ID" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">
                                                                @Data.Question
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="@Data.ID" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                                                        <div class="card-body pl-3 pr-3 pt-0">
                                                            <p>
                                                                @Data.Answer
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            }
                                        }
                                    }
                                }
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
<!-- ============================ Product Description End ================================== -->
