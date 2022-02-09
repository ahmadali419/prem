@extends('web.layouts.master')

@php
@endphp
@if(isset($header))

    @section('title', $service->title)

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
    <meta property='og:site_name' content="{{ $setting->title }}"/>
    <meta property='og:title' content="{{ $service->title }}"/>
    <meta property='og:description' content="{!! str_limit(strip_tags($service->description), 150, ' ...') !!}"/>
    <meta property='og:url' content="{{ route('service.single', $service->slug) }}"/>
    <meta property='og:image' content="{{ asset('uploads/service/'.$service->image_path) }}"/>


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
    <meta name="twitter:creator" content="@HiTechParks" />
    <meta name="twitter:url" content="{{ route('service.single', $service->slug) }}" />
    <meta name="twitter:title" content="{{ $service->title }}" />
    <meta name="twitter:description" content="{!! str_limit(strip_tags($service->description), 150, ' ...') !!}" />
    <meta name="twitter:image" content="{{ asset('uploads/service/'.$service->image_path) }}" />
    @endif
@endsection

@section('content')

 	@if(isset($header))
    <!-- Breadcroumb Area -->
    <div class="breadcroumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcroumb-title text-center">
                        <h1>{{ $header->title }}</h1>
                        <h5><a href="{{ route('home') }}">{{ __('navbar.home') }}</a> / {{ $header->title }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

 	
 	@php
        $section_services = \App\Models\Section::section('services');
    @endphp
    @if(count($services) > 0 && isset($section_services))
 	<!-- Services Area -->
 	<div id="service-3" class="services-area section-padding">
 		<div class="container">
 			<div class="row">
 				<div class="offset-lg-2 col-lg-8 text-center">
 					<div class="section-title">
                        <h6>{{ $section_services->title }}</h6>
 						<h2>{!! $section_services->description !!}</h2>
 					</div>
 				</div>
 			</div>

 			<div class="row justify-content-center">

                @foreach($services as $key => $service)
 				<div class="col-lg-4 col-md-6 col-sm-12">
 					<div class="single-service wow fadeInLeft" data-wow-delay=".{{ $key + 3 }}s">
 						<a href="{{ route('service.single', $service->slug) }}" class="service-bg">
 							<img src="{{ asset('uploads/service/'.$service->image_path) }}" alt="{{ $service->title }}">
 						</a>
 						<div class="service-content">
 							<h3>{{ $service->title }}</h3>
 							<a href="{{ route('service.single', $service->slug) }}" class="read-more">{{ __('common.read_more') }}</a>
 						</div>
 					</div>
 				</div>
                @endforeach

 			</div>
 		</div>
 	</div>
    @endif

 	
 	@php
        $section_process = \App\Models\Section::section('process');
    @endphp
    @if(count($processes) > 0 && isset($section_process))
 	<!--Process Section -->
 	<div class="process-area section-padding">
 		<div class="container">
 			<div class="row">
 				<div class="offset-lg-2 col-lg-8 text-center">
 					<div class="section-title">
 						<h6>{{ $section_process->title }}</h6>
 						<h2>{!! $section_process->description !!}</h2>
 					</div>
 				</div>
 			</div>
 			<div class="row process-item-wrap justify-content-center">

                @foreach($processes as $key => $process)
 				<div class="col-lg-3 col-md-6 col-12">
 					<div class="single-process-item wow fadeInLeft" data-wow-delay=".{{ $key + 3 }}s">
 						<div class="process-num">
 							<p>{{ $key + 1 }}</p>
 						</div>
 						<div class="process-icon">
 							<img src="{{ asset('uploads/process/'.$process->icon) }}" alt="Icon">
 						</div>
 						<div class="process-content">
 							<h5>{{ $process->title }}</h5>
 							<p>{!! $process->description !!}</p>
 						</div>
 					</div>
 				</div>
                @endforeach

 			</div>
 		</div>
 	</div>
    @endif


 	@php
        $section_clients = \App\Models\Section::section('clients');
    @endphp
    @if(count($clients) > 0 && isset($section_clients))
 	<!-- clients Area-->
 	<div class="clients-area gray-bg section-padding">
 		<div class="container">
 			<div class="row">
 				<div id="clients-slider" class="clients-slider owl-carousel">
 					
 					@foreach($clients as $client)
 					<div class="item-clients-img">
                      <a href="{{ $client->link }}" target="_blank">
 						<img src="{{ asset('uploads/client/'.$client->image_path) }}" class="img-fluid" alt="{{ $client->title }}">
                      </a>
 					</div>
 					@endforeach

 				</div>
 			</div>
 		</div>
 	</div>
 	@endif

@endsection