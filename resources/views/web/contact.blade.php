@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('contact');
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

@section('page-level-css')
    <style type="text/css">
        .contact-form {
            margin-top: 0px !important;
        }
    </style>
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
        $section_contact = \App\Models\Section::section('contact');
    @endphp
    @if(isset($setting) && isset($section_contact))
 	<!-- Contact Section -->
 	<div class="contact-section section-padding">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-6 col-md-6 col-12 wow fadeInLeft">
 					<div class="contact-info">
 						<div class="section-title">
 							<h6>{{ $section_contact->title }}</h6>
 							<h2>{!! $section_contact->description !!}</h2>
 						</div>
 						<div class="contact-content">
 							<div class="contact-inner">
 								<i class="las la-map-marker"></i>
 								<h6>{{ __('contact.address') }}</h6>
 								<p>{{ $setting->contact_address }}</p>
 							</div>
 							<!-- <div class="contact-inner">
 								<i class="las la-envelope"></i>
 								<h6>{{ __('contact.email') }}</h6>
 								<p>{{ $setting->email_one }}@if(isset($setting->email_two)), @endif {{ $setting->email_two }}</p>
 							</div> -->
 							<div class="contact-inner">
 								<i class="las la-phone"></i>
 								<h6>{{ __('contact.phone') }}</h6>
 								<p>{{ $setting->phone_one }}@if(isset($setting->phone_two)), @endif {{ $setting->phone_two }}</p>
 							</div>
                            @if(isset($setting->office_hours))
                            <div class="contact-inner">
                                <i class="las la-business-time"></i>
                                <h6>{{ __('contact.office_time') }}</h6>
                                <p>{!! strip_tags($setting->office_hours) !!}</p>
                            </div>
                            @endif
 						</div>
 					</div>
 				</div>
 				<div class="col-lg-6 col-md-6 col-12 wow fadeInRight">

 					<div class="text-center">
                        <!-- Message Display -->
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('success') }}
                        </div>
                        @endif

                        <!-- Message Display -->
                        @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('error') }}
                        </div>
                        @endif

                        <!-- Error Display -->
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div id="custom_error"></div>

                    </div>

 					<div class="contact-form">
 						<form method="post" class="needs-validation" id="contact_us_form" nonvalidate action="{{ route('contact.send') }}" accept-charset="utf-8">
                            @csrf
 							<div class="row">
 								<div class="col-lg-6 col-md-6 col-12">
 									<input type="text" name="name" placeholder="{{ __('contact.your_name') }}" id="name" value="{{ old('name') }}" required>
 								 <div class="invalid-feedback">
                                {{ __('dashboard.please_provide') }} {{ __('dashboard.name') }}
                            </div>
                                 </div>
 								<div class="col-lg-6 col-md-6 col-12">
 									<input type="email" name="email" placeholder="{{ __('contact.email_address') }}" id="email" value="{{ old('email') }}" required>
                                     <div class="invalid-feedback">
                                {{ __('dashboard.please_provide') }} {{ __('dashboard.email') }}
                            </div>
                             	</div>
 								<div class="col-lg-6 col-md-6 col-12">
 									<input type="number" name="phone" id="phone" placeholder="{{ __('contact.phone_no') }}" value="{{ old('phone') }}">
                                     <div class="invalid-feedback">
                                {{ __('dashboard.please_provide') }} {{ __('dashboard.phone') }}
                            </div>
                                 </div>
 								<div class="col-lg-6 col-md-6 col-12">
 									<input type="text" name="subject" placeholder="{{ __('contact.subject') }}" value="{{ old('subject') }}" required>
 								</div>
 								<div class="col-lg-12">
 									<textarea name="message" placeholder="{{ __('contact.your_massage') }}" rows="10" required>{{ old('message') }}</textarea>
 								</div>
                                <div class="col-lg-12">
                                    <div class="g-recaptcha" data-sitekey="6Lesh7QaAAAAACAedG0Ss0C7oUHZz0PJJAQS1eDV" data-callback="validate_captcha"></div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
 									<button class="main-btn main-contact-btn btn_contact_form" type="button" disabled="disabled" onclick="check_captcha_valid()" >{{ __('contact.send') }}</button>
 								</div>
 							</div>
 						</form>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	@endif

@endsection
@section('page-level-js')
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
    <script type="text/javascript">
        function validate_captcha(response) {
            if(response) {
                $('.btn_contact_form').removeAttr('disabled');
            }
        }
        function check_captcha_valid() {
            $('#custom_error').html("");
            var googleCapchaResponse = $('#g-recaptcha-response').val();
            if(googleCapchaResponse != "") {
                $('#contact_us_form').submit();
            } else {
                var errorHtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                errorHtml += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                errorHtml += '<span aria-hidden="true">&times;</span>';
                errorHtml += '</button>';
                errorHtml += 'Please check the reCAPTCHA';
                errorHtml += '</div>';
                $('#custom_error').html(errorHtml);
            }
        }
    </script>
@endsection
