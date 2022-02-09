@extends('web.layouts.master')

@php
$header = \App\Models\Header::header('about');
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
<meta property='og:description' content="{!! str_limit(strip_tags($header->description), 150, ' ...') !!}" />
<meta property='og:url' content="{{ route('home') }}" />
<meta property='og:image' content="{{ asset('/uploads/setting/'.$setting->logo_path) }}" />


<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
<meta name="twitter:creator" content="@HiTechParks" />
<meta name="twitter:url" content="{{ route('home') }}" />
<meta name="twitter:title" content="{{ $setting->title }}" />
<meta name="twitter:description" content="{!! str_limit(strip_tags($setting->description), 150, ' ...') !!}" />
<meta name="twitter:image" content="{{ asset('/uploads/setting/'.$setting->logo_path) }}" />
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


@if(isset($about))
<!-- About Section-->
<div id="about-3" class="about-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay=".4s">
                <div class="info-content-area">
                    <div class="section-title">
                        <h2 class="prem_text">{{ $about->title }}</h2>
                    </div>
                    <div>{!! $about->description !!}</div>
                    <br />

                    @if(isset($about->mission_title))
                    <div class="section-title">
                        <h6 class="prem_text">{{ $about->mission_title }}</h6>
                        <div>{!! $about->mission_desc !!}</div>
                    </div>
                    @endif
                    <br />
                    @if(isset($about->vision_title))
                    <div class="section-title">
                        <h6 class="prem_text">{{ $about->vision_title }}</h6>
                        <div>{!! $about->vision_desc !!}</div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 wow fadeInLeft" data-wow-delay=".3s">
                <div class="about-bg">
                    <img src="{{ asset('uploads/about/'.$about->image_path) }}" class="about-img" alt="About">
                </div>
            </div>
        </div>
    </div>
</div>
@endif





@php
$section_team = \App\Models\Section::section('team');
@endphp
@if(count($members) > 0 && isset($section_team))
<!-- Team Area-->
<!-- <div class="team-area section-padding pad-top-50">
 		<div class="container">
 			<div class="row justify-content-center">
 				<div class="col-lg-12 ">
 					<div class="section-title text-center">
 						<h6>{{ $section_team->title }}</h6>
 						<h2>{!! $section_team->description !!}</h2>
 					</div>
 				</div>
 			</div>
 			<div class="row justify-content-center">

 				@foreach($members as $member)
 				<div class="col-lg-3 col-md-6 col-sm-6 col-12">
 					<div class="single-team-member">
 						<div class="team-member-bg" style="background-image: url({{ asset('uploads/member/'.$member->image_path) }});">
 							<div class="team-content">
 								<div class="team-title">
 									<a href="#">{{ $member->title }}</a>
 								</div>
 								<div class="team-subtitle">
 									<p>{{ $member->designation->title }}@if(isset($member->designation->department)), {{ $member->designation->department }}@endif</p>
                                    
                                    @if(isset($member->email))
                                    <span><i class="far fa-envelope"></i> {{ $member->email }}</span>
                                    @endif
                                    @if(isset($member->phone))
                                    <span><i class="fas fa-phone-volume"></i> {{ $member->phone }}</span>
                                    @endif
 								</div>
 							</div>
 							<div class="team-social">
 								<ul>
 									@if(isset($member->facebook))
	                                <li><a href="{{ $member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
	                                @endif
	                                @if(isset($member->twitter))
	                                <li><a href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
	                                @endif
	                                @if(isset($member->instagram))
	                                <li><a href="{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
	                                @endif
	                                @if(isset($member->linkedin))
	                                <li><a href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
	                                @endif
                                    @if(isset($member->pinterest))
                                    <li><a href="{{ $member->pinterest }}" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                                    @endif
 								</ul>
 							</div>
 						</div>

 					</div>
 				</div>
 				@endforeach

 			</div>
 		</div>
 	</div> -->
@endif


@php
$section_testimonials = \App\Models\Section::section('testimonials');
@endphp
@if(count($testimonials) > 0 && isset($section_testimonials))
<!-- Testimonial Area -->
<div class="testimonial-area section-padding">
    <div class="capricorn-testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center ">
                    <div class="section-title">
                        <h6>{{ $section_testimonials->title }}</h6>
                        <h2>{!! $section_testimonials->description !!}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="team-carousel owl-carousel">

                        @foreach($testimonials as $testimonial)
                        <div class="single-team-item">
                            <div class="testimonial-icon"><i class="las la-quote-left"></i></div>
                            <p>{!! $testimonial->description !!}</p>
                            <img src="{{ asset('uploads/testimonial/'.$testimonial->image_path) }}" alt="{{ $testimonial->title }}">
                            <div class="author-desc">
                                <h5>{{ $testimonial->title }}</h5>
                                <span>{{ $testimonial->designation }}@if(isset($testimonial->organization)), {{ $testimonial->organization }}@endif</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
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
<div class="clients-area section-padding">
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