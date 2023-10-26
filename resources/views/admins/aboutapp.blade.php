@extends('shared.layout')
@section('Title', "Admin - About App")
@section('content')
<div class="col-lg-9 col-md-9 col-sm-12">
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item">
                        <a asp-area="" asp-controller="Admin" asp-action="@ViewBag.prevPageLink">
                            @ViewBag.prevPageName
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @ViewBag.corePageName
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
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10 col-md-12">
                        <div class="abt_apps">
                            <ul>
                                <li>
                                    <div class="abt_left">Application Version</div>
                                    <div class="abt_right">
                                        <span>
                                            {{-- {{ $appVersion }} --}}
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="abt_left">Last Update</div>
                                    <div class="abt_right">
                                        <span>
                                            {{-- {{ $lastAppUpdate }} --}}
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="abt_left">Change Log (last 10 updates)</div>
                                    <div class="abt_right">
                                        <span>
                                            <a href="#" data-toggle="modal" data-target="#changeLogModal"
                                                class="text-danger">View</a>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="abt_left">Curl Enable</div>
                                    <div class="abt_right"><span
                                            class="elso bg-light-success text-success">Enable</span></div>
                                </li>
                                <li>
                                    <div class="abt_left">FrameWork</div>
                                    <div class="abt_right"><span>.NET MVC Core 5.0</span></div>
                                </li>
                                <li>
                                    <div class="abt_left">C#</div>
                                    <div class="abt_right"><span class="elso bg-light-success text-success">True</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="abt_left">Javascript</div>
                                    <div class="abt_right"><span class="elso bg-light-success text-success">True</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="abt_left">Database</div>
                                    <div class="abt_right"><span>My SQL</span></div>
                                </li>
                                <li>
                                    <div class="abt_left">PHP Version</div>
                                    <div class="abt_right"><span>7.4.27</span></div>
                                </li>
                                <li>
                                    <div class="abt_left">Developer</div>
                                    <div class="abt_right"><span>Jedi Labs</span></div>
                                </li>
                                <li>
                                    <div class="abt_left">Developer Contact</div>
                                    <div class="abt_right"><span><a href="mailto:mailus.jedilabs@gmail.com"
                                                class="text-danger">Click To Mail</a></span></div>
                                </li>
                                <li>
                                    <div class="abt_left">Support Service</div>
                                    <div class="abt_right"><span
                                            class="elso bg-light-success text-success">Active</span></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
    <!-- Change Log Modal -->
<div class="modal" id="changeLogModal" tabindex="-1" role="dialog" aria-labelledby="couponModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Latest Updates</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="dashboard_wrap">
                            <div class="row justify-content-center">
                                <div class="abt_apps">
                                    <ul>
                                        @php
                                            $count = 0;
                                        @endphp

                                        @foreach ($modelChangeLog as $data)
                                            @php
                                                $count++;
                                            @endphp
                                            <li>
                                                <div class="abt_left">
                                                    <h5>
                                                        {{-- {{ $count }}. {{ $data['logName'] }} --}}
                                                        <br />
                                                    </h5>⇒ 
                                                    {{-- {{ $data['aboutLog'] }}  --}}
                                                    <br />⇒ 
                                                    {{-- {{ $data['lastEditedDate'] }} --}}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Change Log Modal Ends -->
    @endsection