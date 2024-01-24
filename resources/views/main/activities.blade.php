@extends('shared.layout')
@section('Title', "activities")
<br />

<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Activity</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a asp-area="" asp-controller="Home" asp-action="@ViewBag.prevPageLink">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                Activities
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>

@section('content')

@endsection
