@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('blog');
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

 	
 	<!-- Blog Section -->
 	<div class="blog-area section-padding">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-8">
 					
 					<div class="row">

		 				@foreach($articles as $key => $article)
		 				<div class="col-lg-6 col-md-6 col-12">
		 					<div class="single-blog mb-150 wow fadeInLeft" data-wow-delay=".{{ $key + 3 }}s">
		 						<a href="{{ route('blog.single', $article->slug) }}" class="blog-img"><img src="{{ asset('uploads/article/'.$article->image_path) }}" class="img-fluid" alt="{{ $article->title }}"></a>
		 						<div class="blog-content"> <span><a href="{{ route('blog.category', $article->category->slug) }}">{{ $article->category->title }}</a></span>
		 							<h3><a href="{{ route('blog.single', $article->slug) }}">{!! str_limit(strip_tags($article->title), 60, ' ...') !!}</a></h3>
		 							<div class="blog-date">
		 								<p>{{ date('M d, Y', strtotime($article->created_at)) }}</p>
		 							</div>
		 							<a href="{{ route('blog.single', $article->slug) }}" class="read-more">{{ __('common.read_more') }}</a>
		 						</div>
		 					</div>
		 				</div>
		 				@endforeach

		 			</div>
		 			<div class="row">
		 				<div class="col-lg-12 col-md-12 col-12">
		 					@if(count($articles) == 0)
			                    <h5>{{ __('search.no_result') }}</h5>
			                @endif

			                
			                {{ $articles->appends(Request::only('search'))->links() }}
		 				</div>
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
 						<a class="@if(isset($current_category)) @if($current_category->id == $article_category->id) active @endif @endif" href="{{ route('blog.category', $article_category->slug) }}">{{ $article_category->title }} ({{ $article_category->articles->where('status', 1)->count() }})</a>
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