@extends('web.layouts.master')

@php
    $header = \App\Models\Header::header('booking');
@endphp
@if(isset($header))
    @section('title', $header->title)

@section('page-level-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ asset('assets/css/bootstrap-image-checkbox.css') }}" rel="stylesheet" >
    <style type="text/css">
        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #msform .action-button {
            width: 100px;
            background: #FF3414;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #FF3414;
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #category:before {
            font-family: FontAwesome;
            content: "\f023"
        }

        #progressbar #date_and_time:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #client_detail:before {
            font-family: FontAwesome;
            content: "\f09d"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #FF3414;
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 20;
            height: 30;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

        fieldset {
            padding: 0px 30px;
        }

        .form-control:focus {
            border-color: #FF3414;
            box-shadow: 0 0 0 0.2rem rgb(255 52 20 / 25%);
        }


        /* check the balance */
        .slot_radio input.radio:empty {
            display: none;
        }

        .slot_radio input.radio:empty ~ label {
            position: relative;
            float: left;
            line-height: 2.5em;
            text-indent: 3.25em;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            width: 100%;
            border: 1px solid #4DCB6D;
            background-color: #4DCB6D;
            color: #fff;
        }

        .slot_radio input.radio:empty ~ label:before {
            position: absolute;
            display: block;
            top: 0;
            bottom: 0;
            left: 0;
            content: '';
            width: 2.5em;
            background: #4DCB6D;
            border-radius: 3px 0 0 3px;
        }

        .slot_radio input.radio:hover:not(:checked) ~ label:before {
            content:'\2714';
            text-indent: .9em;
            color: #C2C2C2;
        }

        .slot_radio input.radio:hover:not(:checked) ~ label {
            color: #888;
        }

        .slot_radio input.radio:checked ~ label:before {
            content:'\2714';
            text-indent: .9em;
            color: #9CE2AE;
            background-color: #4DCB6D;
        }

        .slot_radio input.radio:checked ~ label {
            color: #fff;
            background-color: #4DCB6D;
        }

        .slot_radio input.radio:focus ~ label:before {
            box-shadow: 0 0 0 3px #999;
        }

        .disabled input.radio:empty ~ label, .disabled input.radio:empty ~ label:before {
            background-color: lightgray !important;
        }

        .disabled input.radio:hover:not(:checked) ~ label:before {
            content:'';
            text-indent: .9em;
            color: #fff !important;
        }

        .cat_box {
            box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);
            text-align: center;
            padding-top: 15px;
        }

        .cat_box label {
            display: block;
        }

        h6 {
            font-size: 1rem;
            font-weight: 700;
            font-family: 'Roboto', sans-serif;
            text-transform: capitalize;
            color: #333;
            letter-spacing: 0px;
        }

        .confirmation_table td, .confirmation_table th, .confirmation_table, th, tr, td{
            border: none;
        }

        .confirmation_table:first-child tr th {
            padding-bottom: 0px;
        }

        .confirmation_table {
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
            border-style: hidden;
            box-shadow: 0 0 0 1px #ddd;
        }
        @media only screen
        and (device-width : 375px){

            .flatpickr-calendar {
                width: 307.875px;
                margin-left: -34px;
                margin-bottom: 20px;
            }

        }

    </style>
@endsection

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
        <meta property='og:title' content="{{($header->meta_title)}} | {{ $setting->title }}" />
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

    <!-- About Section-->
    <div id="booking-3" class="booking-area">
        <div class="container">
            <div class="row">
                <div class="card m-3">
                    <p class="alert alert-success" id="booking_message" style="display:none;"></p>
                    <div class="row">
                        <div class="col-12 mx-0">
                            <form action="javascript:;" id="msform" >
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="category"><strong>Select Category</strong></li>
                                    <li id="date_and_time"><strong>Date & Time</strong></li>
                                    <li id="client_detail"><strong>Client Details</strong></li>
                                    <li id="confirm"><strong>Confirm Booking Details</strong></li>
                                </ul> <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <h2 class="fs-title">Select Category</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @if(!empty($categories))
                                                @foreach($categories as $catObj)
                                                    <div class="col-lg-3 col-md-4 col-6 mb-3 cat_box">
                                                        <div class="custom-control custom-radio image-checkbox">
                                                            <input type="radio" class="custom-control-input" id="category_id_{{$catObj->id}}" name="category_id" value="{{$catObj->id}}" data-name="{{ $catObj->name }}" >
                                                            <label class="custom-control-label" for="category_id_{{$catObj->id}}">
                                                                <img src="{{$url.''.'/category' . '/' . $catObj->image}}" alt="#" class="img-fluid">
                                                                <p>{{ $catObj->name}}</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next Step" data-validate="category" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select class="js-example-basic-single" id="zip_code" name="zip_code">
                                                    <option value="">Select Zip Code</option>
                                                    @foreach($allZipInfo as $zipInfo)
                                                    <option value="{{$zipInfo->id}}">{{ucfirst($zipInfo->name)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="text-danger zip_code_error"></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="fs-title">Date & time</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="date_slot" class="form-label">Select Date Slot</label>
                                                <input type="text" class="form-control flat_datepicker" id="date_slot" name="date" >
                                                <span class="text-danger date_slot_error"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="date_slot" class="form-label">Select Date Slot</label>
                                                <div class="row" id="date-time-slots">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous sec_step" value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next Step" data-validate="date_time" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6" >
                                                <h2 class="fs-title">Client Information</h2>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Customer  Name</label>
                                                <input type="text" class="form-control" name="customer_name" id="first_name" >
                                            </div>
                                            <div class="col-md-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="customer_email" id="email" >
                                            </div>
                                            <div class="col-md-6">
                                                <label>Phone Number</label>
                                                <input type="number" class="form-control" name="customer_no" id="phone_number" >
                                            </div>
                                            <div class="col-md-6">
                                                <label>Postal Code</label>
                                                <input type="text" class="form-control" name="customer_post_code" id="message" >
                                            </div>
                                            <div class="col-md-6">
                                                <label>Country</label>
                                                <input type="text" class="form-control" name="country" id="country" >
                                            </div>
                                            <div class="col-md-6">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city" id="city" >
                                            </div>
                                            <div class="col-md-6">
                                                <label>State</label>
                                                <input type="text" class="form-control" name="state" id="state" >
                                            </div>
                                            <div class="col-md-6">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="customer_address" id="address" >
                                            </div>

                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next Step" data-validate="client" onclick="show_form_view()" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6">
                                                <h2 class="fs-title">Confirm Booking Details</h2>
                                            </div>
                                            <div class="col-md-12">
                                                <h6>Booking Info</h6>
                                            </div>
                                            <div class="col-md-12">
                                                <table class="table confirmation_table">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time Slot</th>
                                                        <th>Category</th>
                                                    </tr>
                                                    <tr>
                                                        <td id="date_show">2011-11-12</td>
                                                        <td id="time_show">2:36 pm - 5:38 am</td>
                                                        <td id="category_show">Blackout Blinds</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-12 ">
                                                <h6>Client Info</h6>
                                            </div>
                                            <div class="col-md-12 col-sm-6">
                                                <table class="table confirmation_table" style="text-align: left;">
                                                    <tr>
                                                        <th>Customer Name</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Country</th>
                                                        <th>City</th>
                                                    </tr>
                                                    <tr>
                                                        <td id="first_name_show"></td>
                                                        <td id="email_show"></td>
                                                        <td id="phone_number_show"></td>
                                                        <td id="country_show"></td>
                                                        <td id="city_show"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>State</th>
                                                        <th colspan="">Address</th>
                                                        <th colspan="1" >Postal Code</th>

                                                    </tr>
                                                    <tr>
                                                        <td id="state_show"></td>
                                                        <td colspan="" id="address_show"></td>
                                                        <td colspan="1" id="message_show"></td>
                                                    </tr>
                                                   
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    <input type="button" class="action-button" value="Confirm" onclick="save_booking()" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-level-js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var validate;

            $(".next").click(function(){
                validate = true;
                $('#first_name').css({'border-color': '#ced4da'});
                $('#email').css({'border-color': '#ced4da'});
                $('#phone_number').css({'border-color': '#ced4da'});
                $('#address').css({'border-color': '#ced4da'});
                $('#message').css({'border-color': '#ced4da'});
                $('#first_name').css({'border-color': '#ced4da'});
                var check_validation = $(this).data('validate');
                if(check_validation == 'category') {
                    if(!$("input:radio[name='category_id']").is(":checked")) {
                        validate = false;
                        alert("Please select category");
                    }
                }
                if(check_validation == 'date_time') {
                    var date = $('#date_slot').val();
                    if(date == "") {
                        validate = false;
                    }
                    if(!$("input:radio[name='time_slot']").is(":checked")) {
                        validate = false;
                    }
                    if(!validate) {
                        alert("Please select date and slot");
                    }
                }
                if(check_validation == 'client') {
                    var firstName = $('#first_name').val();
                    if(firstName == "") {
                        $('#first_name').css({'border-color': '#e91e63'});
                        validate = false;
                    }
                    var email = $('#email').val();
                    if(email == "") {
                        $('#email').css({'border-color': '#e91e63'});
                        validate = false;
                    }
                    var phone_number = $('#phone_number').val();
                    if(phone_number == "") {
                        $('#phone_number').css({'border-color': '#e91e63'});
                        validate = false;
                    }
                    var address = $('#address').val();
                    if(address == "") {
                        $('#address').css({'border-color': '#e91e63'});
                        validate = false;
                    }
                    var message = $('#message').val();
                    if(message == "") {
                        $('#message').css({'border-color': '#e91e63'});
                        validate = false;
                    }
                    var message = $('#country').val();
                    if(message == "") {
                        $('#country').css({'border-color': '#e91e63'});
                        validate = false;
                    }
                    var message = $('#state').val();
                    if(message == "") {
                        $('#state').css({'border-color': '#e91e63'});
                        validate = false;
                    }
                    var message = $('#city').val();
                    if(message == "") {
                        $('#city').css({'border-color': '#e91e63'});
                        validate = false;
                    }
                }
                if(validate) {
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();

                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                        },
                        duration: 600
                    });
                }
            });

            $(".previous").click(function(){

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function(){
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function(){
                return false;
            });

            flatpickr(".flat_datepicker", {
                inline: true,
                minDate: "today",
                dateFormat: "Y-m-d",
               // defaultDate: new Date(),

            });
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var year = d.getFullYear();
            var todayDate = year + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;
           // get_slot(todayDate);

            $("#first_name").on("keyup", function(){
                var valid = /^[a-z ,.'-]+$/i.test(this.value),
                    val = this.value;

                if(!valid){
                    this.value = val.substring(0, val.length - 1);
                }
            });

            $("#last_name").on("keyup", function(){
                var valid = /^[a-z ,.'-]+$/i.test(this.value),
                    val = this.value;

                if(!valid){
                    this.value = val.substring(0, val.length - 1);
                }
            });

            $("#email").on("keyup", function(){
                const reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var valid = reg.test(this.value),
                    val = this.value;

                if(!valid){
                    $(this).css({'border-color': '#e91e63'});
                    // this.value = val.substring(0, val.length - 1);
                } else {
                    $(this).css({'border-color': '#ced4da'});
                }
            });

        });



        function show_form_view() {
            var categoryName = $("input[name='category_id']:checked").data('name');
            var date = $("#date_slot").val();
            var timeSlot = $("input[name='time_slot']:checked").data('time');
            var firstName = $("input[name='customer_name']").val();
            var email = $("input[name='customer_email']").val();
            var phoneNumber = $("input[name='customer_no']").val();
            var address = $("input[name='customer_address']").val();
            var message = $("input[name='customer_post_code']").val();
            var city = $("input[name='city']").val();
            var state = $("input[name='state']").val();
            var country = $("input[name='country']").val();

            $("#date_show").html(date);
            $("#time_show").html(timeSlot);
            $("#category_show").html(categoryName);
            $("#first_name_show").html(firstName);
            $("#phone_number_show").html(phoneNumber);
            $("#email_show").html(email);

            $("#address_show").html(address);
            $("#city_show").html(city);
            $("#state_show").html(state);
            $("#country_show").html(country);
            $("#message_show").html('');
            $("#message_show").html(message);
        }

        function save_booking() {
            var token = '23423423';
            var form = $('#msform')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            $.ajax({
                type: "POST",
                url: "{{url('https://dev.orderfulfillment.premiumblindsuk.com/public/api/create-booking')}}", // your php file name
                data: formData,
                dataType: "json",
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                headers: {
                    'Authorization': 'Bearer ' + token,
                },
                success: function(data) {
                    $('#progressbar li').removeClass("active");
                    $('#msform fieldset').css({'display': 'none', 'opacity': 0});
                    $('#progressbar li:first-child').addClass("active");
                    $('#msform fieldset:first').css({'display': 'block', 'opacity': 1});
                    $('#booking_message').html(data.message);
                    $('#booking_message').show();
                    $("#msform")[0].reset();
                    document.getElementById("msform").reset();
                    $('html, body').animate({
                        scrollTop: $('#booking-3').offset().top - 80 //#DIV_ID is an example. Use the id of your destination on the page
                    }, 'slow');
                },
                error: function(errorString) {

                }
            });
        }
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        // function getTimeSlot()
        // {
        //
        //
        //
        // }

 $(document).on('change','#date_slot',function () {
     var token = '23423423';
     var zip_code=$('#zip_code').val();
     var date_slot=$('#date_slot').val();
     if(zip_code==''){
         $('.zip_code_error').html('please choose zip code');
         return false;
     }
     if(date_slot==''){
         $('.date_slot_error').html('please choose date slot');
         return false;
     }


     var form_data = new FormData();
     form_data.append('zip_code_id', zip_code);
     form_data.append('date', date_slot);
     $.ajax({
         type: "POST",
         url: "{{url('https://dev.orderfulfillment.premiumblindsuk.com/public/api/zip-code/time-slots')}}", // your php file name
         data: {
             "_token": "{{ csrf_token() }}",
             "zip_code_id": zip_code,
             "date_slot": date_slot,

         },
         headers: {
             'Authorization': 'Bearer ' + token,
         },
         dataType: "json",

       // cache:false,
        // processData:false,
        // contentType:false,

         success: function(data) {
             var html='';
             $.each( data.timeSlotDetail, function( index, output ){
                 //console.log(output.booking_from_time);
                 var disabled;
                 if(output.booked!='')
                 { disabled='disabled';}else{disabled='';}

                  html+=`<div class="col-md-6">
                        <div class="slot_radio ${disabled}">
                            <input type="radio" name="time_slot" id="time_slot_${output.slot_id}" class="radio" value="${output.slot_id}" data-time="${output.booking_from_time + output.booking_to_time}" ${disabled}/>
                            <label for="time_slot_${output.slot_id}">${output.booking_from_time + output.booking_to_time}</label>
                        </div>
                    </div>`;

             });
             $('#date-time-slots').empty();
             $('#date-time-slots').append(html);


         },
         error: function(errorString) {

         }
     });

 });

    </script>
@endsection
