@extends('shared.layout')
@section('Title', "Contact")
@section('content')

<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Get In Touch</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            {{-- <li class="breadcrumb-item">
                                <a asp-area="" asp-controller="Home" asp-action="@ViewBag.prevPageLink">
                                    @ViewBag.prevPageName
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                @ViewBag.corePageName
                            </li> --}}
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->
<!-- ============================ Contact Detail ================================== -->
<section>
    <div class="container">
        <div class="row align-items-start">
            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <h4>We'd love to hear from you</h4>
                    <span>Send a message and we'll respond as soon as possible</span>
                </div>
                @if (session('successMessage'))
                <div class="form-group">
                    <div class="alert alert-success">
                        ✔ {{ session('successMessage') }}
                    </div>
                </div>
                @endif
                @if (session('errorMessage'))
                <div class="form-group">
                    <div class="alert alert-warning">
                        ⚠ {{ session('errorMessage') }}
                    </div>
                </div>
                @endif
                {{-- <form method="post" action="{{ route('contact.foodstuff.store') }}"> --}}
                <form method="post" action="">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" placeholder="Your full name" name="Name" value="{{ session('Name') }}" required />
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Your email address" name="Email" value="{{ session('Email') }}" required />
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Company (Optional)</label>
                                <input type="text" class="form-control" placeholder="Your company name (optional)" value="{{ session('Company') }}" name="Company" />
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Phone (Optional)</label>
                                <input type="number" class="form-control" placeholder="Your phone number (optional)" value="{{ session('PhoneNumber') }}" name="PhoneNumber" />
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control" name="Department">
                                    @php
                                        $departments = [
                                            'Service Inquiry' => 'Service Inquiry',
                                            'Request Invoice' => 'Request Invoice',
                                            'Review | Suggestions' => 'Review | Suggestions',
                                            'Technical Support' => 'Technical Support',
                                            'Billing Department' => 'Billing Department',
                                            'Career/ Supplier  Enroll' => 'Career/ Supplier  Enroll',
                                            'Report Fraud' => 'Report Fraud',
                                            'Suggest A Product' => 'Suggest A Product',
                                        ];
                                    @endphp
                                    @foreach ($departments as $value => $label)
                                    @if (session('Department') == $value)
                                    <option value="{{ $value }}" selected>{{ $label }}</option>
                                    @else
                                    <option value="{{ $value }}">{{ $label }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control" placeholder="What are we talking about?" value="{{ session('subject') }}" name="Subject" required />
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" placeholder="Your Message" name="Message" required rows="4">{{ session('Message') }}</textarea>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <button class="btn theme-bg text-white btn-md" type="submit">Send Message</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                <div class="lmp_caption pl-lg-5">
                    <ol class="list-unstyled p-0">
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
                                <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-home"></i></div>
                            </div>
                            <div class="ml-3 ml-md-4">
                                <h4>Reach Us</h4>
                                {{-- {{ $companyAddress }} --}}
                            </div>
                        </li>
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
                                <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-at"></i></div>
                            </div>
                            <div class="ml-3 ml-md-4">
                                <h4>Drop A Mail</h4>
                                {{-- {{ $CompanyMails }} --}}
                            </div>
                        </li>
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
                                <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-phone-alt"></i></div>
                            </div>
                            <div class="ml-3 ml-md-4">
                                <h4>Make a Call</h4>
                                {{-- {{ $supportPhoneNumbers }} --}}
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Contact Detail ================================== -->
<!-- ============================ map Start ================================== -->
{{-- <section class="p-0">
    @Html.Raw(ViewBag.companyLocationOnMap)
</section> --}}
<div class="clearfix"></div>
<!-- ============================ map End ================================== -->

@endsection