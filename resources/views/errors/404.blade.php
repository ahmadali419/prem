@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('error');
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

@section('content')

    <!-- Breadcroumb Area -->
    <div class="breadcroumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcroumb-title text-center">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Error Section-->     
    <section class="error-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <div class="section-title">
                            <h6>{{ __('common.error_title') }}</h6>
                            <h2>{{ __('common.error_desc') }}</h2>
                            
                            <a href="{{ route('home') }}" class="main-btn">{{ __('common.go_home') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Error Section-->

@endsection