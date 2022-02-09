@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('portfolio-single');
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
    <meta property='og:site_name' content="{{ $setting->title }}"/>
    <meta property='og:title' content="{{ $portfolio->title }}"/>
    <meta property='og:description' content="{!! str_limit(strip_tags($portfolio->description), 150, ' ...') !!}"/>
    <meta property='og:url' content="{{ route('portfolio.single', $portfolio->slug) }}"/>
    <meta property='og:image' content="{{ asset('uploads/portfolio/'.$portfolio->image_path) }}"/>


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
    <meta name="twitter:creator" content="@HiTechParks" />
    <meta name="twitter:url" content="{{ route('portfolio.single', $portfolio->slug) }}" />
    <meta name="twitter:title" content="{{ $portfolio->title }}" />
    <meta name="twitter:description" content="{!! str_limit(strip_tags($portfolio->description), 150, ' ...') !!}" />
    <meta name="twitter:image" content="{{ asset('uploads/portfolio/'.$portfolio->image_path) }}" />
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
    

    @if(isset($portfolio))
 	<!-- Single Portfolio -->
 	<div class="portfolio-single-section section-padding pad-bot-0">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-12">
 					<h3>{{ $portfolio->title }}</h3>
 					<div class="row">
 						<div class="col-lg-8">
 							<img src="{{ asset('uploads/portfolio/'.$portfolio->image_path) }}" alt="{{ $portfolio->title }}">
 							<div class="project-overview">
                                <h5>{{ __('common.project_overview') }}</h5>
 								{!! $portfolio->description !!}

                                @if(!empty($portfolio->video_id))
                                <br/>
                                <div class="embed-responsive embed-responsive-16by9">
                                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $portfolio->video_id }}?rel=0" allowfullscreen></iframe>
                                </div>
                                <br/>
                                @endif
 							</div>
 						</div>
 						<div class="col-lg-4">
 							<div class="project-info">
 								<h5>{{ __('common.project_info') }}</h5>
 								<p><b>{{ __('common.owner') }}:</b><span>{{ $portfolio->client }}</span></p>
 								<p><b>{{ __('common.category') }}:</b><span>
                                    @foreach($portfolio->categories as $key => $category)
                                        @if($key != 0),@endif {{ $category->title }} 
                                    @endforeach                       
                                </span></p>
 								<p><b>{{ __('common.address') }}:</b><span>{{ $portfolio->address }}</span></p>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
    @endif

@endsection