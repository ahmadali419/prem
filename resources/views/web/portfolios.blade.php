@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('portfolios');
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
        $section_portfolio = \App\Models\Section::section('portfolio');
    @endphp
    @if(count($portfolios) > 0 && isset($section_portfolio))
 	<!-- Portfolio Area-->
 	<div id="portf-2" class="portfolio-area section-padding pad-bot-50">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-12 text-center">
 					<div class="section-title">
 						<h6>{{ $section_portfolio->title }}</h6>
 						<h2>{!! $section_portfolio->description !!}</h2>
 					</div>
 					<ul class="port-menu recent">
 						<li data-filter="*" class="active">{{ __('common.all') }}</li>
 						@foreach($portfolio_categories as $portfolio_category)
 						<li data-filter=".{{ $portfolio_category->slug }}">{{ $portfolio_category->title }}</li>
 						@endforeach
 					</ul>
 				</div>
 			</div>
 		</div>

 		<div class="container-fluid">
 			<div class="row">
 				<div class="col-lg-12">
 					<div class="portfolio-list recent">

 						@foreach($portfolios as $portfolio)
 						<a href="{{ route('portfolio.single', $portfolio->slug) }}" class="single-portfolio-item mt-30 
 							@foreach($portfolio->categories as $category)
	                            {{ $category->slug }} 
	                        @endforeach
 						" style="background-image: url({{ asset('uploads/portfolio/'.$portfolio->image_path) }});">
 							<div class="portfolio-content">
 								<h4 class="portfolio-title">{{ $portfolio->title }}</h4>
 								<div class="portfolio-category">
 									@foreach($portfolio->categories as $key => $category)
 										@if($key != 0),@endif {{ $category->title }} 
                                    @endforeach
 								</div>
 							</div>
 						</a>
 						@endforeach

 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	@endif


    @php
        $section_whyus = \App\Models\Section::section('why-us');
    @endphp
    @if(count($chooses) > 0 && isset($section_whyus))
    <!-- Choose Area -->
    <div class="choose-us-area section-padding">
        <div class="container">
            <div class="row">
                <div class="offset-lg-2 col-lg-8 text-center">
                    <div class="section-title">
                        <h6>{{ $section_whyus->title }}</h6>
                        <h2>{!! $section_whyus->description !!}</h2>
                    </div>
                </div>
            </div>
            <div class="choose-us-wrapper wow fadeInUp" data-wow-delay=".3s">
                <div class="row no-gutters justify-content-center">

                    @foreach($chooses as $choose)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="choose-us-inner">
                            <div class="choose-us-icon">
                                <img src="{{ asset('uploads/choose/'.$choose->icon) }}" alt="Icon">
                            </div>
                            <h5>{{ $choose->title }}</h5>
                            <p>{!! strip_tags($choose->description) !!}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
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