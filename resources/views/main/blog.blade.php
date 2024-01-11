@extends('shared.layout')
@section('Title', "Blog")
@section('content')

<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Latest News & Articles</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                {{-- <a href="{{ route('home', ['prevPageLink' => $prevPageLink]) }}"> --}}
                                <a href="">

                                    {{-- {{ $prevPageName }} --}}
                                </a>
                            </li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">
                                {{-- {{ $corePageName }} --}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Section -->
<section class="min">
    <div class="container">
        <div class="row justify-content-center">
            @if ($blogPosts != null)
                @foreach ($blogPosts as $data)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="blg_grid_box">
                            <div class="blg_grid_thumb">
                                <a href="{{ $data->Link }}" target="_blank"><img src="{{ $data->DisplayImage }}" class="img-fluid" alt="" /></a>
                            </div>
                            <div class="blg_grid_caption">
                                <div class="blg_tag"><span>{{ $data->Category }}</span></div>
                                <div class="blg_title"><h4><a href="{{ $data->Link }}" target="_blank">{{ $data->Header }}</a></h4></div>
                                <div class="blg_desc"><p>{{ $data->Body }}</p></div>
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
                                                    <div class="elsio_tx">{{ $data->Source }}</div>
                                                </li>
                                                <li>
                                                    <div class="elsio_ic">
                                                        <i class="fa fa-clock text-warning"></i>
                                                    </div>
                                                    <div class="elsio_tx">{{ $data->Date }}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<div class="clearfix"></div>


<!-- ============================ article End ================================== -->


@endsection