@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('pricing');
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
        $section_pricing = \App\Models\Section::section('pricing');
    @endphp
    @if(count($pricings) > 0 && isset($section_pricing))
 	<!--Pricing Section -->
 	<div class="pricing-section section-padding">
 		<div class="container">
 			<div class="row justify-content-center">
 				<div class="col-lg-12">
 					<div class="section-title text-center">
                        <h6>{{ $section_pricing->title }}</h6>
 						<h2>{!! $section_pricing->description !!}</h2>
 					</div>
 				</div>
 			</div>
 			<div class="row justify-content-center">

                @foreach($pricings as $key => $pricing) 
 				<div class="col-lg-4 col-md-6">
 					<div class="single-price-item wow fadeInLeft" data-wow-delay=".{{ $key + 3 }}s">
 						<h5>{{ $pricing->title }}</h5>
 						<div class="price-box">
 							<p><b>{{ $pricing->quantity }}</p>
 						</div>
 						<div class="price-list">
 							<ul>
 								@php
                                    $features = json_decode($pricing->description, true);
                                @endphp

                                @if(isset($features))
                                @foreach($features as $key => $feature)
                                <li>{{ $feature }}</li>
                                @endforeach
                                @endif
 							</ul>
 						</div>

                        @php
                            $section_contact = \App\Models\Section::section('contact');
                        @endphp
                        @if(isset($section_contact))
 						<a href="{{ route('contact') }}" class="main-btn small-btn">{{ __('common.get_start') }}</a>
                        @endif
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