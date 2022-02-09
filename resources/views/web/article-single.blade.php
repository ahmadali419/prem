@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('blog-single');
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
    <meta property='og:title' content="{{ $article->title }}"/>
    <meta property='og:description' content="{!! str_limit(strip_tags($article->description), 150, ' ...') !!}"/>
    <meta property='og:url' content="{{ route('blog.single', $article->slug) }}"/>
    <meta property='og:image' content="{{ asset('uploads/article/'.$article->image_path) }}"/>


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
    <meta name="twitter:creator" content="@HiTechParks" />
    <meta name="twitter:url" content="{{ route('blog.single', $article->slug) }}" />
    <meta name="twitter:title" content="{{ $article->title }}" />
    <meta name="twitter:description" content="{!! str_limit(strip_tags($article->description), 150, ' ...') !!}" />
    <meta name="twitter:image" content="{{ asset('uploads/article/'.$article->image_path) }}" />
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


 	<!-- Blog Area  -->
 	<div id="blog-page" class="blog-section section-padding">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-8">
 					<div class="single-blog-wrap">
 						<img src="{{ asset('uploads/article/'.$article->image_path) }}" alt="{{ $article->title }}">
 						<div class="blog-meta">
 							<span><i class="las la-calendar"></i>{{ date('d M, Y', strtotime($article->created_at)) }}</span>
 						</div>
 						<h3>{{ $article->title }}</h3>

                        <div>{!! $article->description !!}</div>
 					</div>
 				</div>

 				<div class="col-lg-4">
 					<div class="blog-search">
 						<form method="get" action="{{ route('blog.search') }}">
 							<input type="search" name="search" placeholder="{{ __('search.search_field') }}" value="@if(isset($search)){{ $search }}@endif" required>
 							<button type="submit"><i class="las la-search"></i></button>
 						</form>
 					</div>

                    @if(count($article_categories) > 0)
 					<div class="blog-category">
 						<h5>{{ __('common.categories') }}</h5>

                        @foreach($article_categories as $article_category)
 						<a class="@if($article->category->id == $article_category->id) active @endif" href="{{ route('blog.category', $article_category->slug) }}">{{ $article_category->title }} ({{ $article_category->articles->where('status', 1)->count() }})</a>
 						@endforeach
 					</div>
                    @endif

                    @if(count($recents) > 0)
 					<div class="recent-post">
 						<h5>{{ __('common.recent_posts') }}</h5>

                        @foreach($recents as $key => $recent)
                        <a href="{{ route('blog.single', $recent->slug) }}">
 						<img src="{{ asset('uploads/article/'.$recent->image_path) }}" alt="{{ $recent->title }}">
 						<div class="single-recent-post">
 							<h6>{!! str_limit(strip_tags($recent->title), 50, ' ...') !!}</h6>
 							<p class="blog-date"><i class="las la-calendar"></i>{{ date('M d, Y', strtotime($recent->created_at)) }}</p>
 						</div>
                        </a>
                        @endforeach
 					</div>
                    @endif

 				</div>
 			</div>
 		</div>
 	</div>

@endsection