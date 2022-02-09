@extends('web.layouts.master')
@section('title', $page->title)

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
<meta property="og:type" content="website">
<meta property='og:site_name' content="{{ $setting->title }}" />
<meta property='og:title' content="{{ $page->meta_title }} | {{ $page->title }}" />
<meta property='og:description' content="{!! str_limit(strip_tags($page->description), 150, ' ...') !!}" />
<meta property='og:url' content="{{ route('page.single', $page->slug) }}" />
<meta property='og:image' content="{{ asset('uploads/page/'.$page->image_path) }}" />
<meta property='og:focus-keyword' content="{{$header->keywords}}" />
<meta property='og:secondary-keyword' content="{{$header->secondary_keywords}}" />


<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
<meta name="twitter:creator" content="@HiTechParks" />
<meta name="twitter:url" content="{{ route('page.single', $page->slug) }}" />
<meta name="twitter:title" content="{{ $page->title }}" />
<meta name="twitter:description" content="{!! str_limit(strip_tags($page->description), 150, ' ...') !!}" />
<meta name="twitter:image" content="{{ asset('uploads/page/'.$page->image_path) }}" />
@endif
@endsection

@section('content')
<style>
.error{

	color: red!important;
}
</style>
<!-- Breadcroumb Area -->
<div class="breadcroumb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcroumb-title text-center">
					<h1>{{ $page->title }}</h1>
					<h5><a href="{{ route('home') }}">{{ __('navbar.home') }}</a> / {{ $page->title }}</h5>
				</div>
			</div>
		</div>
	</div>
</div>


@if(isset($page))
<!-- Blog Area  -->
<div id="blog-page" class="blog-section section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="single-blog-wrap">
					<div class="text-center">
						<img src="{{ asset('uploads/page/'.$page->image_path) }}" alt="{{ $page->title }}">
					</div>
					<div class="blog-meta">
					</div>
					<h3 class="prem_text">{{ $page->title }}</h3>

					<div class="">{!! $page->description !!}</div>
				</div>
			</div>
		</div>
		@if($page->slug == 'connect-via-zoom')

		<div class="row">
			<div class="col-12">
				<h3 class="prem_text mb-3">To Schedule Your Appointment Via Zoom, Fill Your Details On The Given Form</h3>
				<div id="msg"></div>
			</div>
		</div>
		<form id="addForm">
			<div class="row">
				<div class="col-4">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" name="name" placeholder="Enter Name">
					</div>
				</div>
				<div class="col-4">
					<div class="form-group">
						<label for="name">Phone:</label>
						<input type="number" name="phone_no" placeholder="Enter Phone">
					</div>
				</div>
				<div class="col-4">
					<div class="form-group">
						<label for="name">Email:</label>
						<input type="email" name="email" placeholder="Enter Email">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
				<label for="">Detail:</label>
					<textarea name="description" id="" cols="30" rows="10"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
				<div class="form-group float-left">
				<input type="button" id="btn_save" name="submit" value="Submit" class="btn btn-danger">
			</div>
				</div>
			</div>
		</form>

@endif
	</div>



</div>
@endif

@endsection

@section('page-level-js')
  
@endsection