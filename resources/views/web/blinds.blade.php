@extends('web.layouts.master')

@php

@endphp
@if(isset($header))

@section('title', $header->title)

@section('top_meta_tags')
@if(isset($header->description))
<meta name="description" content="{!! str_limit(strip_tags($header->description), 150, ' ...') !!}">
@else
<meta name="description" content="{!! str_limit(strip_tags($setting->description), 150, ' ...') !!}">
@endif

@if(isset($header->keywords))
<meta name="keywords" content="{!! strip_tags($header->keywords) !!}">
@else
<meta name="keywords" content="{!! strip_tags($setting->keywords) !!}">
@endif
@endsection

@endif

@section('social_meta_tags')
@if(isset($setting))
<meta property="og:type" content="website">
<meta property='og:site_name' content="{{ $setting->title }}" />
<meta property='og:title' content="{{$header->meta_title}} | {{ $setting->title }}" />
<meta property='og:description' content="{!! str_limit(strip_tags($header->meta_description), 150, ' ...') !!}" />
<meta property='og:url' content="{{ route('home') }}" />
<meta property='og:image' content="{{ asset('/uploads/setting/'.$setting->logo_path) }}" />
<meta property='og:focus-keyword' content="{{$header->keywords}}" />
<meta property='og:secondary-keyword' content="{{$header->secondary_keywords}}" />


<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
<meta name="twitter:creator" content="@HiTechParks" />
<meta name="twitter:url" content="{{ route('service.single', $header->slug) }}" />
<meta name="twitter:title" content="{{ $setting->title }}" />
<meta name="twitter:description" content="{!! str_limit(strip_tags($setting->description), 150, ' ...') !!}" />
<meta name="twitter:image" content="{{ asset('/uploads/setting/'.$setting->logo_path) }}" />
@endif
@endsection


@section('page-level-css')
<style>
    .img {
        width: 100%;
    }

    .sec-three {
        border: 1px solid;
        padding: 20px;
        border-color: #BADBE8;
        background-color: #BADBE8;
    }

    .label-text {
        font-size: 25px;
    }

    .checkbox {
        margin-top: 12px;
    }
</style>
@endsection
@section('content')


<!-- Breadcroumb Area -->
<div class="breadcroumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcroumb-title text-center">
                    <h1>{{ ucfirst($title) }}</h1>
                    <h5><a href="{{ route('home') }}">{{ __('navbar.home') }}</a> / {{ ucfirst($title) }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="jumbotron mb-0">
    <div class="container-fluid" style="padding: 10px 45px;!important">
        <div class="col-lg-12">
            <span><a type="button" href="{{route('header-submenus.all',$headers[0]->title)}}"><i class="fa fa-arrow-left  header-arrow mr-2"></i><span
                                    class="prem_text">{{strtoUpper($headers[0]->title)}}</span></a></span>
                                    {{-- @php echo "<pre>"; print_r($service);exit; @endphp --}}
            <div class="bg">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @if(!empty($service->sliders))
                        @foreach ($service->sliders as $key =>$sliderObj)
                        <div class="carousel-item <?php if ($key == 1) { ?>active<?php } ?>">
                            <img class="d-block w-100" src="{{asset('uploads/header-page/'.$sliderObj->image_path)}}" alt="First slide">
                        </div>
                        @endforeach
                        @endif
                        <!-- <div class="carousel-item active">
					      <img class="d-block w-100" src="{{asset('uploads/service/pic1.jpg')}}" alt="First slide">
					    </div>
					    <div class="carousel-item">
					      <img class="d-block w-100" src="{{asset('uploads/service/pic1.jpg')}}" alt="Second slide">
					    </div>
					    <div class="carousel-item">
					      <img class="d-block w-100" src="{{asset('uploads/service/pic1.jpg')}}" alt="Third slide">
					    </div> -->
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <h2 class="prem_text text-center mt-5 mb-3"><strong>{{ $service->title }}</strong></h2>

        <div class="page-text">{!! $service->description !!}</div>
        @if($category_list->Categories->isNotEmpty())
        <div class="sec-two">
            <div class="sec-two-heading">
                <h2 class="mt-4 text-center mb-3 prem_text">{{$service->title}} Types</h2>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        @foreach($category_list->Categories as $catObj)
                        <div class="col-lg-2 col-md-2 col-sm-12 mb-2">
                            @foreach ($catObj->pageCategoryAttachments as $key => $attachObj)

                            <a class="example-image-link" data-lightbox="example-1" type="button" onclick="getSliderImages('{{$catObj->id}}')">
                                @if($key < 1) <img src="{{asset('uploads/header-page/category/'.$attachObj->image_path)}}" style="width: 100%">
                                    @endif
                            </a>
                            @endforeach
                            <h5 class="text-center mt-2 prem_text mt-2 mb-3">{{$catObj->title}}</h5>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

</div>
<div class="modal fade " id="sliderModal" tabindex="-1" role="dialog" aria-labelledby="sliderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal_close">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="slider_modal">

            </div>
        </div>

    </div>
</div>
@endsection
