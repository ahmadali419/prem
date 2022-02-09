@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('faqs');
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
        $section_faqs = \App\Models\Section::section('faqs');
    @endphp
    @if(isset($section_faqs))
 	<!-- Frequently Asked Question -->
 	<div class="faq-section section-padding">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-8">
 					<div class="section-title">
 						<h6>{{ $section_faqs->title }}</h6>
 						<h2>{!! $section_faqs->description !!}</h2>
 					</div>

 					<div class="styled-faq">
                        <h6 class="cate_title">{{ $current_category->title }}</h6>
 						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

 							@foreach($faqs as $key => $faq)
 							<div class="panel panel-default">
 								<div class="panel-heading @if($key== 0) active @endif" role="tab" id="heading-{{ $key }}">
 									<h6 class="panel-title">
 										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $key }}" aria-expanded="false" aria-controls="collapse-{{ $key }}">
 											{{ $faq->title }}
 											<i class="angle-up"><span class="fa fa-angle-up"></span></i>
 											<i class="angle-down"><span class="fa fa-angle-down"></span></i>
 										</a>
 									</h6>
 								</div>
 								<div id="collapse-{{ $key }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-{{ $key }}">
 									<div class="panel-body">
 										{!! $faq->description !!}
 									</div>
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
@endsection