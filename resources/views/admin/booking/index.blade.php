@extends('admin.layouts.master')
@section('title', $title)

@section('page_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        @media screen {
            #printSection {
                display: none;
            }
        }

        @media print {
            body * {
                visibility:hidden;
            }
            #printSection, #printSection * {
                visibility:visible;
            }
            #printSection {
                position:absolute;
                left: 160px;
                /*left:0;*/
                top:0;
                bottom: 0;
            }
            #printSection span {
                color: grey;
                /*border: 1px solid black;*/
                font-weight: bold;
                font-size: 60px;
            }
            #printSection span.booking_title {
                color: grey;
                margin: 10px;
                /*font-weight: bold;*/
                font-size: 60px;
                float: right!important;
            }
            #printSection p.main_border {
                border: 1px solid black;
                padding: 10px;
            }
            .main_title{
                display: block!important;
                border: 1px solid black;
                padding: 30px;
            }
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

    </style>
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')
    <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <!-- Add modal button -->
{{--                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">{{ __('dashboard.btn_add_new') }}</button>--}}
                <!-- Include Add modal -->
                @include($view.'.create')

                <a href="{{ route($route.'.index') }}" class="btn btn-info">{{ __('dashboard.btn_refresh') }}</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">{{ $title }} {{ __('dashboard.list') }}</h4>
                    </div>
                    <div class="card-body">

                        <!-- Data Table Start -->
                        <div class="table-responsive">
                            <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap full-width">
                                <thead>
                                <tr>
                                    <th>{{ __('dashboard.no') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Time Slot') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Phone Number') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('dashboard.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{!! $row->date !!}</td>
                                        <td>{!! \Carbon\Carbon::create($row->booking_from_time)->format('H:ia') !!} {!! \Carbon\Carbon::create($row->booking_to_time)->format('H:ia') !!}</td>
                                        <td>{!! $row->category_name !!}</td>
                                        <td>{!! $row->first_name !!} {!! $row->last_name !!}</td>
                                        <td>{!! $row->phone_number !!}</td>
                                        <td>{!! $row->email !!}</td>
{{--                                        <td>--}}
{{--                                            @if( $row->status == 1 )--}}
{{--                                                <span class="badge badge-success badge-pill">{{ __('dashboard.active') }}</span>--}}
{{--                                            @else--}}
{{--                                                <span class="badge badge-danger badge-pill">{{ __('dashboard.inactive') }}</span>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" onclick="re_schedule_booking({{ $row->date }}, {{ $row->id }})" >
                                                <i class="fas fa-upload"></i>
                                            </button>
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal-{{ $row->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <!-- Include Show modal -->
                                            @include($view.'.show')

{{--                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-{{ $row->id }}">--}}
{{--                                                <i class="far fa-edit"></i>--}}
{{--                                            </button>--}}
                                            <!-- Include Edit modal -->
                                            @include($view.'.edit')

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <!-- Include Delete modal -->
                                            @include('admin.inc.delete')
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Data Table End -->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->


    </div> <!-- container -->
    <!-- End Content-->
    <!-- Show modal content -->
    <div id="re_schedule_booking_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Schedule Date</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style=="">
                    <form method="post" id="booking_update_form">
                        <input type="hidden" name="booking_id" id="booking_id" />
                        <div class="form-card">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="fs-title">Date & time</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="date_slot" class="form-label">Select Date Slot</label>
                                    <input type="text" class="form-control flat_datepicker" id="date_slot" name="date_slot" >
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="date_slot" class="form-label">Select Slot</label>
                                    <div class="row" id="date-time-slots"></div>
                                </div>
                                <div class="col-md-12 mt-3 text-right">
                                    <button type="button" class="btn btn-success" onclick="update_booking()">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
{{--                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('dashboard.btn_close') }}</button>--}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@section('page-level-js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript">
        $(document).ready(function(){

        });
        function re_schedule_booking(date, id) {
            $('#re_schedule_booking_modal').modal('show');
            $('#booking_id').val(id);
            var booking_date = Date.parse(date);
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var year = d.getFullYear();
            var todayDate = year + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;
            var todayParse = Date.parse(d);
            flatpickr(".flat_datepicker", {
                inline: true,
                minDate: "today",
                dateFormat: "Y-m-d",
                defaultDate: new Date(),
                onChange: function(selectedDates, dateStr, instance) {
                    get_slot(dateStr);
                },
            });
            if(todayParse < booking_date) {
                get_slot(date);
            }
        }

        function get_slot(dateStr) {
            $.ajax({
                type: "POST",
                url: "{{route('date.time-slot')}}", // your php file name
                data: {
                    'date': dateStr
                },
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('#date-time-slots').html('');
                        $('#date-time-slots').html(data.timeSlotHtml);
                    }
                    else{
                        $('#date-time-slots').html('');
                        $('#date-time-slots').html(data.message);
                    }
                },
                error: function(errorString) {

                }
            });
        }

        function update_booking() {
            var form = $('#booking_update_form')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            var validate = true;
            if(!$("input:radio[name='time_slot']").is(":checked")) {
                alert("please select slot");
                validate = false;
            }
            if(validate) {
                $.ajax({
                    type: "POST",
                    url: "{{route('update_booking')}}", // your php file name
                    data: formData,
                    dataType: "json",
                    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                    processData: false, // NEEDED, DON'T OMIT THIS
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        $('#re_schedule_booking_modal').modal('hide');
                        $('#date-time-slots').html('');
                        toastr.success(data.message);
                        location.reload();
                    },
                    error: function(errorString) {

                    }
                });
            }
        }
    </script>
@endsection

