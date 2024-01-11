@extends('shared.layout')
@section('Title', "Admin - Blogger")
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
    <div class="row justify-content-between">
        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
            <div class="dashboard_wrap d-flex align-items-center justify-content-between">
                <div class="arion">
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
                <div class="elkios">
                    <a href="#" class="add_new_btn" data-toggle="modal" data-target="#createPostModal">
                        <i class="fas fa-plus mr-1"></i>
                        Create Post
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
    <!-- /Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <section class="dashboard_wrap">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                        <h6 class="m-0">Blog Posts</h6>
                    </div>
                </div>

                <section class="min">
                    <div class="container">
                        <div class="row justify-content-center">
                            @if($posts != null)
                                @foreach($posts as $post)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="blg_grid_box">
                                            <div class="blg_grid_thumb">
                                                {{-- <a href="{{ $post['Link'] }}" target="_blank">
                                                    <img src="{{ $post['DisplayImage'] }}" class="img-fluid" alt="">
                                                </a> --}}
                                                <a href="" target="_blank">
                                                    <img src="" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                            <div class="blg_grid_caption">
                                                <div class="blg_tag">
                                                    <span>
                                                        {{-- {{ $post['Category'] }} --}}
                                                    </span>
                                                </div>
                                                <div class="blg_title">
                                                    <h4>
                                                        {{-- <a href="{{ $post['Link'] }}" target="_blank">
                                                            {{ $post['Header'] }}
                                                        </a> --}}
                                                        <a href="" target="_blank">
                                                           
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="blg_desc">
                                                    <p>
                                                        {{-- {{ $post['Body'] }} --}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="crs_grid_foot">
                                                <div class="crs_flex">
                                                    <div class="crs_fl_first">
                                                        <div class="foot_list_info">
                                                            <ul>
                                                                <li>
                                                                    <div class="elsio_ic">
                                                                        <i class="fa fa-eye text-success"></i>
                                                                    </div>
                                                                    <div class="elsio_tx">
                                                                        {{-- {{ $post['Source'] }} --}}
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="elsio_ic">
                                                                        <i class="fa fa-clock text-warning"></i>
                                                                    </div>
                                                                    <div class="elsio_tx">
                                                                        {{-- {{ $post['Date'] }} --}}
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-10">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/img/NotFound.png') }}" style="width:50%; opacity:0.5;" class="img-fluid" alt="" />
                                            <br /><br />
                                            <h5 style="color:#818181;">
                                                No post found. Might as well adjust your search for a different result.
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>

            </section>
        </div>
    </div>


</div>

@endsection