@extends('web.layouts.master')

@php
$header = \App\Models\Header::header('home');
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
@if(!empty($header))
<meta property="og:type" content="website">
<meta property='og:site_name' content="{{ $setting->title }}" />
<meta property='og:title' content="{{!empty($header->meta_title)}}" />
<meta property='og:description' content="{!! str_limit(strip_tags(!empty($header->description)), 150, ' ...') !!}" />
<meta property='og:url' content="{{ route('home') }}" />
<meta property='og:image' content="{{ asset('/uploads/setting/'.$setting->logo_path) }}" />
<meta property='og:focus-keyword' content="{{!empty($header->keywords)}}" />
<meta property='og:secondary-keyword' content="{{$header->secondary_keywords}}" />


<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="{!! '@'.str_replace(' ', '', $setting->title) !!}" />
<meta name="twitter:creator" content="@HiTechParks" />
<meta name="twitter:url" content="{{ route('home') }}" />
<meta name="twitter:title" content="{{ $setting->title }}" />
<meta name="twitter:description" content="{!! str_limit(strip_tags($setting->description), 150, ' ...') !!}" />
<meta name="twitter:image" content="{{ asset('/uploads/setting/'.$setting->logo_path) }}" />
@endif
@endif
@endsection

@section('content')

@if(count($sliders) > 0)
<!-- Hero Area -->
<div id="home-2" class="homepage-slides owl-carousel">

    @foreach($sliders as $slider)
    <div class="single-slide-item" style="background-image: url({{ asset('uploads/slider/'.$slider->image_path) }});">
        <div class="overlay"></div>
        <div class="hero-area-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 wow fadeInUp animated" data-wow-delay=".2s">
                        <div class="section-title">
                            <h1>{{ $slider->title }}</h1>
                            <h6>{!! strip_tags($slider->description, '<br>') !!}</h6>
                        </div>

                        @if(isset($slider->link))
                        <a target="_blank" href="http://web.whatsapp.com/send?phone={{$setting->phone_one}}&text=" class="main-btn">Book a free No Obligation Appointment</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endif

<section class="about-section">
@if(isset($about))
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="about-img text-center">
                    <img src="{{ asset('uploads/about/').'/'.$about->image_path }}" style="height: 357px;width: 71%;" alt="About" class="img-responsive img-thumbnail">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="about ml-4">
                    <h3 class="prem_text  mb-2">{{ $about->title }}</h3>
                    <p class="text-dark text-justify">{!! $about->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>




@php
$section_services = \App\Models\Section::section('services');
@endphp
<div id="service-3" class="services-area section-padding pt-0">
@if(count($services) > 0 && isset($section_services))
<!-- Services Area -->
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 text-center">
                <div class="section-title">
                    <h3 class="prem_text">{{ $section_services->title }}</h3>
                    <p  class="service-color mt-2"><b>{!! $section_services->description !!}</b></p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach($services as $key => $service)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="single-service wow fadeInLeft" data-wow-delay=".{{ $key + 3 }}s">
                    <a href="{{ route('header-submenu.single', $service->slug) }}" class="service-bg">
                        <img src="{{ asset('uploads/service/'.$service->image_path) }}" alt="{{ $service->title }}">
                    <div class="service-content">
                        <h3>{{ $service->title }}</h3>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>




@php
$section_portfolio = \App\Models\Section::section('portfolio');
@endphp
<div class="project-area section-padding pad-bot-0">
@if(count($portfolios) > 0 && isset($section_portfolio))
<!-- Portfolio Section -->
    <div class="container-fluid">
        <div class="offset-lg-2 col-lg-8 text-center">
            <div class="section-title">
                <h6>{{ $section_portfolio->title }}</h6>
                <h2>{!! $section_portfolio->description !!}</h2>
            </div>
        </div>
    </div>
    <div class="project-slider owl-carousel">

        @foreach($portfolios as $portfolio)
        <div>
            <div class="single-project-item bg-cover"
                style="background-image: url({{ asset('uploads/portfolio/'.$portfolio->image_path) }});">
                <div class="project-inner">
                    <a href="{{ route('portfolio.single', $portfolio->slug) }}" class="project-icon">
                        <i class="las la-plus"></i>
                    </a>
                    <a href="{{ route('portfolio.single', $portfolio->slug) }}" class="hover-info">
                        <h4>{{ $portfolio->title }}
                            <span>
                                @foreach($portfolio->categories as $key => $category)
                                @if($key != 0),@endif {{ $category->title }}
                                @endforeach
                            </span>
                        </h4>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    @endif
</div>


@if(count($counters) > 0)
<!-- Achievement Section -->
<div id="style-2" class="achievement-area section-padding">
    <div class="container">
        <div class="row justify-content-center">

            @foreach($counters as $counter)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counter-box">
                    <p class="counter-number"><span>{{ $counter->value }}</span></p>
                    <h6>{{ $counter->title }}</h6>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endif


@php
$section_pricing = \App\Models\Section::section('pricing');
@endphp
@if(count($pricings) > 0 && isset($section_pricing))
<!--Pricing Section -->
<div class="pricing-section gray-bg section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h3 class="prem_text">{{ $section_pricing->title }}</h3>
                    <!-- <h2>{!! $section_pricing->description !!}</h2> -->
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            @foreach($pricings as $key => $pricing)
            <div class="col-lg-4 col-md-6">
                <div class="single-price-item wow fadeInLeft" data-wow-delay=".{{ $key + 3 }}s">
                    <h5>{{ $pricing->title }}</h5>
                    <div class="price-box">
                        <p>{{ $pricing->quantity }}</p>
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
                    <!-- <a href="{{ route('contact') }}" class="main-btn small-btn">{{ __('common.get_start') }}</a> -->
                    @endif
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endif


<section class="testimonial-section">
    <div class="container">
        <div class="row testimonial_wraper">
            <div class="col-lg-6 col-sm-12 col-md-6">
                <div class="testmonials_left">
                    <h3 class="prem_text">We design thoughtful, livable spaces</h3>
                    <p><span class="s">Attention to Detail </span> <br>Our experts care about your requirements and
                        consult with you to come to the best decision for your room.</p>
                    <p><span class="testimonial-text">Latest Styles and Trends</span><br>We always have the latest
                        designs to pick from. Our experts can help you find the right style and at the right price.</p>
                    <p><span class="testimonial-text">Made to Measure Blinds </span><br>We make your dream house a
                        reality by offering a wide collection of blinds whilst providing a fast, bespoke, premium
                        service.</p>
                    <a href="http://web.whatsapp.com/send?phone={{$setting->phone_one}}&text=" target="_blank" data-wpel-link="external"
                        rel="nofollow external noopener noreferrer" >BOOK YOUR APPOINTMENT </a>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6">
                <div class="testmonials_right">
                    <div class="flexslider">
                        <ul class="bxslider1">
                            <li>
                                <div class="test_content">
                                    <div class="star">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="date">
                                    </div>
                                    <h3></h3>
                                    <a href="https://uk.trustpilot.com/review/premiumblindsuk.com" target="_blank"
                                        data-wpel-link="external" rel="nofollow external noopener noreferrer">
                                        <p>I had my new vertical blinds fitted today. I have to say I was very
                                            impressed. Very quick, efficient service from quotation to fitting. They
                                            look lovely and very competitively priced. The fitter observed all
                                            guidelines and we felt very safe. We will definitely be back. Thank you <img
                                                draggable="false" role="img" class="emoji" alt="👍"
                                                src="https://s.w.org/images/core/emoji/13.0.1/svg/1f44d.svg"></p>
                                    </a>
                                    <span class="testname">Nicky</span>

                                </div>
                                <p class="botomtest_content">Rated <strong>4.5</strong>/5 based on <strong>173
                                        reviews</strong>, showing our favourite reviews.</p>
                                <h4 class="botomtest_heading"><i class="fa fa-star"></i><a
                                        href="https://uk.trustpilot.com/review/premiumblindsuk.com" target="_blank"
                                        data-wpel-link="external"
                                        rel="nofollow external noopener noreferrer">Trustpilot</a></h4>
                            </li>
                            <li>
                                <div class="test_content">
                                    <div class="star">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="date">
                                    </div>
                                    <h3></h3>
                                    <a href="https://uk.trustpilot.com/review/premiumblindsuk.com" target="_blank"
                                        data-wpel-link="external" rel="nofollow external noopener noreferrer">
                                        <p>Fabulous Blinds at an affordable price ♡<br>
                                            The customer service was great and my blinds fitter was very pleasant.<br>
                                            Would 100% recommend.</p>
                                    </a>
                                    <span class="testname">Ezra</span>

                                </div>
                                <p class="botomtest_content">Rated <strong>4.5</strong>/5 based on <strong>173
                                        reviews</strong>, showing our favourite reviews.</p>
                                <h4 class="botomtest_heading"><i class="fa fa-star"></i><a
                                        href="https://uk.trustpilot.com/review/premiumblindsuk.com" target="_blank"
                                        data-wpel-link="external"
                                        rel="nofollow external noopener noreferrer">Trustpilot</a></h4>
                            </li>
                            <li>
                                <div class="test_content">
                                    <div class="star">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="date">
                                    </div>
                                    <h3></h3>
                                    <a href="https://uk.trustpilot.com/review/premiumblindsuk.com" target="_blank"
                                        data-wpel-link="external" rel="nofollow external noopener noreferrer">
                                        <p>Love my new blinds friendly polite efficient staff i will definitely be
                                            buying more for upstairs after Christmas. Love it love it love it highly
                                            recommend.</p>
                                    </a>
                                    <span class="testname">Lisa </span>

                                </div>
                                <p class="botomtest_content">Rated <strong>4.5</strong>/5 based on <strong>173
                                        reviews</strong>, showing our favourite reviews.</p>
                                <h4 class="botomtest_heading"><i class="fa fa-star"></i><a
                                        href="https://uk.trustpilot.com/review/premiumblindsuk.com" target="_blank"
                                        data-wpel-link="external"
                                        rel="nofollow external noopener noreferrer">Trustpilot</a></h4>
                            </li>
                            <li>
                                <div class="test_content">
                                    <div class="star">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="date">
                                    </div>
                                    <h3></h3>
                                    <a href="https://uk.trustpilot.com/review/premiumblindsuk.com" target="_blank"
                                        data-wpel-link="external" rel="nofollow external noopener noreferrer">
                                        <p>Excellent service . I was kept informed all the way through . Staff very
                                            friendly , professional and observing COVID Guidelines. Fast and efficient
                                            service .. good product , great price . I would highly recommend.</p>
                                    </a>
                                    <span class="testname">Julie</span>

                                </div>
                                <p class="botomtest_content">Rated <strong>4.5</strong>/5 based on <strong>173
                                        reviews</strong>, showing our favourite reviews.</p>
                                <h4 class="botomtest_heading"><i class="fa fa-star"></i><a
                                        href="https://uk.trustpilot.com/review/premiumblindsuk.com" target="_blank"
                                        data-wpel-link="external"
                                        rel="nofollow external noopener noreferrer">Trustpilot</a></h4>
                            </li>
                            <li>
                                <div class="test_content">
                                    <div class="star">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="date">
                                    </div>
                                    <h3></h3>
                                    <a href="https://uk.trustpilot.com/review/premiumblindsuk.com" target="_blank"
                                        data-wpel-link="external" rel="nofollow external noopener noreferrer">
                                        <p>Excellent service from measuring to fitting 7 days. I recommend this company
                                            as fitter was in and out in 15 minutes let me know when they were on way
                                            constantly kept me informed on everything. Thankyou for my blinds in my
                                            newproperty</p>
                                    </a>
                                    <span class="testname">Kelly</span>

                                </div>
                                <p class="botomtest_content">Rated <strong>4.5</strong>/5 based on <strong>173
                                        reviews</strong>, showing our favourite reviews.</p>
                                <h4 class="botomtest_heading"><i class="fa fa-star"></i><a
                                        href="https://uk.trustpilot.com/review/premiumblindsuk.com" target="_blank"
                                        data-wpel-link="external"
                                        rel="nofollow external noopener noreferrer">Trustpilot</a></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@php
$section_testimonials = \App\Models\Section::section('testimonials');
@endphp
<div class="testimonial-area section-padding">
@if(count($testimonials) > 0 && isset($section_testimonials))
<!-- Testimonial Area -->
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
                            <img src="{{ asset('uploads/testimonial/'.$testimonial->image_path) }}"
                                alt="{{ $testimonial->title }}">
                            <div class="author-desc">
                                <h5>{{ $testimonial->title }}</h5>
                                <span>{{ $testimonial->designation }}@if(isset($testimonial->organization)),
                                    {{ $testimonial->organization }}@endif</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>


{{-- @php
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
                        <img src="{{ asset('uploads/client/'.$client->image_path) }}" class="img-fluid"
                            alt="{{ $client->title }}">
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endif --}}

@endsection
@section('page_level_js_plugin')
<script defer='defer'
    src='https://premiumblindsuk.com/wp-content/plugins/kk-star-ratings/public/js/kk-star-ratings.js?ver=4.2.0'
    id='kk-star-ratings-js'></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
@endsection
@section('page-leve-js')
<script>
jQuery(function(e) {
    jQuery('.bxslider1').bxSlider({
        auto: true,
    });
});
</script>
@endsection
