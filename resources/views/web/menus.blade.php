@extends('web.layouts.master')
@section('title', 'Menus')

@section('top_meta_tags')
@if(isset($page->description))
<meta name="description" content="{!! str_limit(strip_tags($page->description), 150, ' ...') !!}">
@else
<meta name="description" content="{!! str_limit(strip_tags($setting->description), 150, ' ...') !!}">
@endif

<meta name="keywords" content="{!! strip_tags($setting->keywords) !!}">
@endsection

@section('social_meta_tags')
@if(isset($setting))
<!--  -->
@endif
@endsection

@section('content')

<!-- Breadcroumb Area -->
<div class="breadcroumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="breadcroumb-title text-center" id="header_menu">
                    <h1 class="text-white mt-3">{{ucfirst($title)}}</h1>
                    <h5 class="mt-5"><a href="{{ route('home') }}">{{ __('navbar.home') }}</a> / {{ ucfirst($title) }}
                    </h5>
                    <h5><a href="{{ route('home') }}"></h5>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Blog Area  -->
<div class="page_menu">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <span><a href="" style="display: none;"><i class="fa fa-arrow-left  header-arrow mr-2"></i><span
                                    class="prem_text">{{strtoUpper($title)}}</span></a></span>

                        <span class="float-right">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control search-input" placeholder="Search..">
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>

                    </div>
                </div>
                <div class="breadcroumb-title text-center">
                    <!-- <h3 class="prem_text">{{strtoUpper($title)}}</h3> -->
                    <h5><a></a></h5>
                    <div class="breadcroumb-title text-center">
                        <div class="row">
                            @foreach ($header as $obj)
                            <div class="col-lg-3 col-md-4 col-sm-6 main_div">
                                <a type="button" onclick="getSubmenu('{{$obj->slug_title}}')">
                                    <div class="card mb-1">
                                        <div class="card-body">
                                            <span><img src="{{asset('uploads/icons/'.$obj->b_image)}}" alt=""></span>
                                        </div>
                                    </div>
                                </a>
                                <p><a type="button" class="mt-3" onclick="getSubmenu('{{$obj->slug_title}}')"
                                        class="menu_title">{{$obj->sub_title}}</a>
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection