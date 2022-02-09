<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">



    <!--     @php echo $setting->title @endphp -->

    @if (isset($setting))
        <!-- App Title -->
        <title>@yield('title') | {{ $setting->title }}</title>

        <!-- App favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/uploads/setting/' . $setting->favicon_path) }}"
            type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('/uploads/setting/' . $setting->favicon_path) }}" type="image/x-icon">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.css" integrity="sha512-rV4fiystTwIvs71MLqeLbKbzosmgDS7VU5Xqk1IwFitAM+Aa9x/8Xil4CW+9DjOvVle2iqg4Ncagsbgu2MWxKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        <link rel="preload" href="{{ asset('web/js/bxslider.css') }}" as="style" onload="this.rel='stylesheet'">
        <noscript>
            <link rel="stylesheet" href="{{ asset('web/js/bxslider.css') }}">
        </noscript>

        {{-- <link rel="stylesheet" href="{{asset('web/js/bxslider.css')}}"> --}}
        @yield('top_meta_tags')
    @endif


    @if (empty($setting))
        <!-- App Title -->
        <title>@yield('title')</title>
    @endif


    <!-- Social Meta Tags -->
    <link rel="canonical" href="{{ route('home') }}">

    @yield('social_meta_tags')


    <!-- Stylesheets -->
    <!-- Bootstrap CSS -->
    {{-- <link href="{{ asset('web/css/bootstrap.min.css') }}" rel="stylesheet" async > --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> --}}
    <link rel="preload" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" as="style"
        onload="this.rel='stylesheet'"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <noscript>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </noscript>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <!-- Font Awesome CSS-->
    {{-- <link href="{{ asset('web/css/all.min.css') }}" rel="stylesheet" async > --}}
    <!-- Line Awesome CSS -->


    {{-- <link href="{{ asset('web/css/line-awesome.min.css') }}" rel="stylesheet" async > --}}
    <!-- Animate CSS-->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" as="style"
        onload="this.rel='stylesheet'"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"><noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
            integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
    </noscript>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <link href="{{ asset('web/css/animate.css') }}" rel="stylesheet" async > --}}
    <!-- Bar Filler CSS -->
    <link rel="preload" href="{{ asset('web/css/barfiller.css') }}" as="style" onload="this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('web/css/barfiller.css') }}">
    </noscript>
    {{-- <link href="{{ asset('web/css/barfiller.css') }}" rel="stylesheet" async > --}}
    <!-- Magnific Popup Video -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"
        integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="{{ asset('web/css/magnific-popup.css') }}" rel="stylesheet" async > --}}
    <!-- Flaticon CSS -->
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="{{ asset('web/css/owl.carousel.min.css') }}" rel="stylesheet" async > --}}
    <!-- Floating Wpp CSS -->
    <!-- Style CSS -->
    <link rel="preload" href="{{ asset('web/css/style.css') }}" as="style" onload="this.rel='stylesheet'"><noscript>
        <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    </noscript>
    <link rel="preload" href="{{ asset('web/css/responsive.css') }}" as="style" onload="this.rel='stylesheet'"><noscript>
        <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}">
    </noscript>
    {{-- <link href="{{ asset('web/css/style.css') }}" rel="stylesheet" defer > --}}
    <!-- Responsive CSS -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('web/js/jquery-1.12.4.min.js') }}" ></script> --}}

    <!-- jquery -->

    @yield('page-level-css')
    <!-- Custom Style -->
    @if (isset($setting->custom_css))
        <style type="text/css">
            {
                 ! ! strip_tags($setting->custom_css) ! !
            }

            iframe {
                right: 3px;
            }

        </style>
    @endif
</head>

<body>
   <!--  <h1>tet</h1> -->

    <!-- Pre-Loader -->
    <div id="loader">
        <div class="loading">
            <div></div>
        </div>
    </div>

    <!-- Header Area -->

    <div id="style-2" class="header-area absolute-header">
        <div class="sticky-area">
            <div class="navigation">
                <div class="auto-container">
                    <div class="row">
                        <div class="col-lg-4">
                            @if (isset($setting))
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img
                                            src="{{ asset('/uploads/setting/' . $setting->logo_path) }}"
                                            alt="Logo"></a>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-8">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                        <span class="navbar-toggler-icon"></span>
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse justify-content-center"
                                        id="navbarSupportedContent">
                                        <ul class="navbar-nav m-auto dropdowns navbar-top-color">
                                            @php
                                                $header_home = \App\Models\Header::header('home');
                                            @endphp
                                            @if (isset($header_home))
                                                <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}">
                                                    <a class="nav-link navs"
                                                        href="{{ route('home') }}">{{ $header_home->title }}</a>
                                                </li>
                                            @endif
                                            @php
                                                $header_blinds = \App\Models\Header::header('blinds');
                                            @endphp
                                            @if (isset($header_blinds))
                                                <li
                                                    class="nav-item  {{ Request::is('menus/blinds*') ? 'active' : '' }}">
                                                    <a class="nav-link navs"
                                                        href="{{ route('header-submenu.single', 'blinds') }}">{{ $header_blinds->title }}</a>
                                                    <!-- <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Blinds Range</a></li>
                                                            <li><a class="dropdown-item" href="#">Room</a></li> -->
                                                    <!-- <li class="dropdown-submenu position-relative"> <a class="dropdown-toggle dropdown-item" data-toggle="dropdown" href="#">Dropdown <i class="icofont-long-arrow-right float-right mt-1"></i></a>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                                    <li class="dropdown-submenu position-relative"> <a class="dropdown-toggle dropdown-item" href="#" data-toggle="dropdown">Dropdown </a>
                                                                    </li>
                                                                </ul>
                                                            </li> -->
                                                    <!-- </ul> -->
                                                </li>
                                            @endif

                                            @php
                                                $header_services = \App\Models\Header::header('conservatory-blinds');
                                            @endphp
                                            @if (isset($header_services))
                                                <li
                                                    class="nav-item  {{ Request::is('menus/conservatory-blinds*') ? 'active' : '' }}">
                                                    <a class="nav-link"
                                                        href="{{ route('header-submenu.single', 'conservatory-blinds') }}">{{ $header_services->title }}</a>
                                                </li>
                                                <!-- <li class="nav-item {{ Request::is('service*') ? 'active' : '' }} dropdown">
                                                <a class="nav-link dropbtn"
                                                    href="{{ route('services') }}">{{ $header_services->title }}</a>

                                                <div class="dropdown-content">
                                                    <a class="link">Wooden Blinds</a>
                                                    <a class="link">Venetian Blinds</a>
                                                    <a class="link">Perfect Fit Blinds</a>
                                                    <a class="link">Roof Blinds</a>
                                                </div>
                                            </li> -->
                                            @endif
                                            @php
                                                $header_about = \App\Models\Header::header('about');
                                            @endphp
                                            <!-- @if (isset($header_about)) -->
                                            <li class="nav-item {{ Request::is('about*') ? 'active' : '' }}">
                                                <a class="nav-link"
                                                    href="{{ route('about') }}">{{ $header_about->title }}</a>

                                            </li>

                                            <!-- @endif -->
                                            @php
                                                $header_pricing = \App\Models\Header::header('pricing');
                                            @endphp
                                            @if (isset($header_pricing))
                                                <li class="nav-item {{ Request::is('pricing*') ? 'active' : '' }}">
                                                    <a class="nav-link"
                                                        href="{{ route('about') }}">{{ $header_pricing->title }}</a>
                                                </li>
                                            @endif

                                            @php
                                                $header_blog = \App\Models\Header::header('blog');
                                            @endphp
                                            @if (isset($header_blog))
                                                <li class="nav-item {{ Request::is('blog*') ? 'active' : '' }}">
                                                    <a class="nav-link"
                                                        href="{{ route('blogs') }}">{{ $header_blog->title }}</a>
                                                </li>
                                            @endif

                                            @php
                                                $header_booking = \App\Models\Header::header('booking');
                                            @endphp
                                            @if (isset($header_booking))
                                                <li class="nav-item {{ Request::is('booking*') ? 'active' : '' }}">
                                                    <a class="nav-link"
                                                        href="{{ route('booking') }}">{{ $header_booking->title }}</a>
                                                </li>
                                            @endif


                                        </ul>

                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Content Start -->
    @yield('content')
    <!-- Content End -->


    <!-- Footer Area -->

    <footer class="footer-area">
        <div class="container">
            <div class="footer-up">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        @if (isset($setting))
                            <div class="logo1">
                                <a href="{{ route('home') }}"><img
                                        src="{{ asset('/uploads/setting/' . $setting->logo_path) }}" alt="Logo"></a>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <ul class="social-icons float-right mr-3">
                            <li style="display: inline-block; margin-left: 20px;"><a href="#." class="icon"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li style="display: inline-block; margin-left: 20px;"><a href="#." class="icon"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li style="display: inline-block; margin-left: 20px;"><a href="#." class="icon"><i
                                        class="fab fa-youtube"></i></a></li>
                            <li style="display: inline-block; margin-left: 20px;"><a href="#." class="icon"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li style="display: inline-block; margin-left: 20px;"><a href="#." class="icon"><i
                                        class="fas fa-video"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 com-sm-12">
                        <h6 class="prem_text">Explore Us</h6>

                        <div class="row">
                            <div class="col-lg-12">
                                <ul>
                                    @php
                                        $header_faqs = \App\Models\Header::header('faqs');
                                    @endphp
                                    @if (isset($header_faqs))
                                        <li class="nav-item {{ Request::is('faqs*') ? 'active' : '' }}">
                                            <a class="nav-link"
                                                href="{{ route('faqs') }}">{{ $header_faqs->title }}</a>
                                        </li>
                                    @endif

                                    @php
                                        $header_contact = \App\Models\Header::header('contact');
                                    @endphp
                                    @if (isset($header_contact))
                                        <li class="nav-item {{ Request::path() == 'contact' ? 'active' : '' }}">
                                            <a class="nav-link"
                                                href="{{ route('contact') }}">{{ $header_contact->title }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    @if (count($pages) > 0)
                        <div class="col-lg-3 col-md-6 com-sm-12">
                            <h6 class="prem_text">{{ __('common.footer_links') }}</h6>

                            <div class="row">
                                <div class="col-lg-12">
                                    <ul>
                                        <li>
                                            @foreach ($pages as $key => $page)
                                                @if ($key < 2) <a
                                                        href="{{ route('header-page.single', $page->slug) }}">
                                                        {{ $page->title }}</a>
                                                @endif
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($setting))
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h6 class="prem_text">{{ __('common.our_contacts') }}</h6>
                            <div class="contact-info">
                                @if (isset($setting->office_hours))
                                    <p><i class="las la-clock"></i> {!! strip_tags($setting->office_hours) !!}</p>
                                @endif
                                @if (isset($setting->contact_address))
                                    <p><i class="las la-map-marker"></i> {{ $setting->contact_address }}</p>
                                @endif
                                @if (isset($setting->phone_one))
                                    <p><i class="las la-phone"></i> {{ $setting->phone_one }}@if (isset($setting->phone_two)),
                                        @endif {{ $setting->phone_two }}</p>
                                @endif
                                <!-- @if (isset($setting->email_one))
 <p><i class="las la-envelope"></i> {{ $setting->email_one }}@if (isset($setting->email_two)), @endif {{ $setting->email_two }}</p>
                            @endif -->
                            </div>
                        </div>
                    @endif

                    {{-- <div class="col-lg-3 col-md-6">
                        <div class="subscribe-form">
                            <h6 class="prem_text">{{ __('common.subscribe_us') }}</h6>
                            <form method="post" action="{{ route('subscribe') }}">
                                @csrf
                                <input type="email" name="email" class="subscribe_text" value=""
                                    placeholder="{{ __('contact.email_address') }}" onfocus="this.placeholder=''" required>
                                <button type="submit" class="main-btn ">{{ __('common.subscribe') }}</button>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </footer>

    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                @if (isset($setting))
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p class="copyright-line">&copy; {!! strip_tags(
    $setting->footer_text,
    '
                    <p><a><b><i><u><strong>',
) !!}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Scroll Top Area -->
    <a href="#top" class="go-top"><i class="las la-angle-up"></i></a>
    <!-- <div class="fb-customerchat">
        <a href="https://www.facebook.com">
            <img src="{{ asset('uploads/messenger/Facebook.png') }}" class="img-fluid">
        </a>
    </div> -->

    <div id="WAButton" style="bottom: 100px!important;right: 24px!important;z-index: 1000000;!important"></div>
    <link rel="preload" href="{{ asset('web/css/barfiller.css') }}" as="style" onload="this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('web/css/barfiller.css') }}">
    </noscript>

    <script src="{{ asset('web/js/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <!-- Font Awesome JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"
        integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('web/js/all.min.js') }}"></script> --}}
    <!-- Wow JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('web/js/wow.min.js') }}"></script>
    <!-- Way Points JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/3.0.0/jquery.waypoints.min.js"
        integrity="sha512-f/gxy4xAjuGEIf/ujexcNI906CTS+kfw40QCyG/rEMKELvCIFaTOY+dfdn7M/eNsiMreG3SStjgFr9q8Me9Baw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('web/js/jquery.waypoints.min.js') }}"></script> --}}
    <!-- Counter Up JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"
        integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('web/js/jquery.counterup.min.js') }}"></script> --}}
    <!-- Owl Carousel JS -->
    <!-- Progress Bar JS -->
    <script src="{{ asset('web/js/jquery.barfiller.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script> --}}
    <!-- Isotope JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
        integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('web/js/isotope-3.0.6-min.js') }}"></script> --}}
    <!-- Magnific Popup JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
        integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('web/js/magnific-popup.min.js') }}"></script> --}}
    <!-- Sticky JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-js/1.3.0/sticky.min.js" integrity="sha512-3z3zGiu0PabNyuTAAfznBJFpOg4owG9oQQasE5BwiiH5BBwrAjbfgIe0RCdtHJ0BQV1YF2Shgokbz2NziLnkuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="{{ asset('web/js/jquery.sticky.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.js"
        integrity="sha512-p+GPBTyASypE++3Y4cKuBpCA8coQBL6xEDG01kmv4pPkgjKFaJlRglGpCM2OsuI14s4oE7LInjcL5eAUVZmKAQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="{{ asset('web/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>
    <!--Floating WhatsApp css-->
    <link rel="stylesheet"
        href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
    <!--Floating WhatsApp javascript-->
    <script type="text/javascript"
        src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js">
    </script>
    @yield('page-level-js')
    @if ($livechat->whatsapp_status == 1)
        <!--Div where the WhatsApp will be rendered-->
        <div id="whatspp_live mb-3"></div>
        <script>
            $(function() {
                $('#WAButton').floatingWhatsApp({
                    phone: '{{ $setting->phone_one }}', //WhatsApp Business phone number International format-
                    //Get it with Toky at https://toky.co/en/features/whatsapp.
                    headerTitle: 'Chat with us on WhatsApp!', //Popup Title
                    popupMessage: 'Hello, how can we help you?', //Popup Message
                    showPopup: true, //Enables popup display
                    buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" />', //Button Image
                    //headerColor: 'crimson', //Custom header color
                    //backgroundColor: 'crimson', //Custom background button color
                    position: "right"
                });
            });
        </script>


    @endif


    @if ($livechat->facebook_status == 1)
        <!-- Load Facebook SDK for JavaScript -->
        <!-- Messenger Chat plugin Code -->

        <div id="fb-root" class="ml-2" style="bottom: 94px!important;"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml: true,
                    version: 'v9.0'
                });
            };
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                // js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
        <!-- Your Chat Plugin code -->
        {{-- <div class="fb-customerchat" attribution="setup_tool" page_id="{{ $setting->facebook_id }}">
        </div>
        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "106000985079545");
            chatbox.setAttribute("attribution", "biz_inbox");

            window.fbAsyncInit = function() {
                FB.init({
                    xfbml: true,
                    version: 'v11.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script> --}}



        <!-- Your Chat Plugin code -->
        <div class="fb-customerchat" attribution=setup_tool page_id="{{ $livechat->facebook_id }}"
            theme_color="{{ $livechat->facebook_color }}"
            logged_in_greeting="{{ $livechat->facebook_greeting_in }}"
            logged_out_greeting="{{ $livechat->facebook_greeting_out }}">
        </div>
    @endif
    <script>
        jQuery(function(e) {
            jQuery('.bxslider1').bxSlider({
                auto: true,
            });
        });

        $(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) {
                    // alert('yes');
                    $('.logo img').attr('src', "{{ asset('uploads/setting/Footer-logo-black.png') }}");
                }
                if ($(this).scrollTop() < 50) {
                    $('.logo img').attr('src',
                        "{{ asset('uploads/setting/Footer-logo-white_1622014354_1633004808.webp') }}");
                }
            })
        });

        function getSubmenu(slug) {
            var url = "{{ route('header-submenus.single', '') }}" + "/" + slug;
            $.ajax({
                type: "POST",
                url: url, // your php file name
                data: {
                    'slug': slug
                },
                dataType: "html",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                success: function(data) {
                    if (data == '0') {
                        var redirectUrl = "{{ route('header-page.single', '') }}" + "/" + slug;
                        window.location = redirectUrl;
                    } else if (data != '') {
                        $(".page_menu").animate();
                        $('.page_menu').html('');
                        $('.page_menu').html(data);
                    }


                },
                error: function(errorString) {

                }
            });
        }

        function getMenu() {
            var form = $('#menuSearchForm')[0];
            var form_data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "{{ route('get-menu.single') }}", // your php file name
                data: form_data,
                dataType: "html",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                success: function(data) {
                    if (data != '') {
                        $(".page_menu").animate();
                        $('.page_menu').html('');
                        $('.page_menu').html(data);
                    }
                },
                error: function(errorString) {

                }
            });

        }
        // get input field and add 'keyup' event listener
        let searchInput = document.querySelector('.search-input');
        searchInput.addEventListener('keyup', search);
        // get all title
        let titles = document.querySelectorAll('.main_div');
        console.log(titles);
        let searchTerm = '';
        let tit = '';

        function search(e) {
            // console.log(e);return;
            // get input fieled value and change it to lower case
            searchTerm = e.target.value.toLowerCase();
            titles.forEach((title) => {
                // console.log(title);return;
                // navigate to p in the title, get its value and change it to lower case
                tit = title.textContent.toLowerCase();
                // it search term not in the title's title hide the title. otherwise, show it.
                tit.includes(searchTerm) ? title.style.display = 'block' : title.style.display = 'none';
            });
        }

        function getSliderImages(catId) {
            $.ajax({
                type: "POST",
                url: "{{ route('page.slider') }}", // your php file name
                data: {
                    'catId': catId
                },
                dataType: "html",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                success: function(data) {
                    if (data != '') {
                        $('#slider_modal').html('');
                        $('#slider_modal').html(data);
                        $('#sliderModal').modal('show');
                    }
                },
                error: function(errorString) {

                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {


            var validator = $("#addForm").validate({

                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    phone_no: {
                        required: true
                    },

                    description: {
                        required: true
                    },


                }
            });

        });

        $(document).on('click', '#btn_save', function() {

            var validate = $("#addForm").valid();
            if (validate) {
                var form = $('#addForm')[0];
                var form_data = new FormData(form);
                // console.log(form_data);return;
                $.ajax({
                    type: "POST",
                    enctype: "multipart/form-data",
                    url: "{{ route('meeting.add') }}", // your php file name
                    data: form_data,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.status == 'success') {

                            $('#msg').html('');
                            $('#msg').html(data.message);

                        } else {
                            // Swal.fire("Sorry!", data.message, "error");
                        }
                    },
                    error: function(errorString) {
                        // Swal.fire("Sorry!", "Something went wrong please contact to admin", "error");
                    }
                });
            }
        });
    </script>
</body>

</html>
