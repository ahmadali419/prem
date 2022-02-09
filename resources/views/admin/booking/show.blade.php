<!-- Show modal content -->
<div id="showModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ __('dashboard.view') }} {{ $title }}</h4>

                <button type="button" class="btn btn-success ml-3" onclick="getPrint('{{ $row->id }}')">Print</button>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div id="printThis_{{$row->id}}">
                <div class="modal-body" style=="">
                    <span class="main_title mb-3 text-center" style="font-weight:bold;display:none;">Booking Detail</span>
                    <!-- Details View Start -->
                    <p class="main_border"><span id="title" class="text-highlight">{{ __('Date') }}:</span> <span class="booking_title">{!! $row->date !!}</span></p>
                    <hr/>
                    <p class="main_border"><span class="text-highlight">{{ __('TIme Slot') }}:</span> <span class="booking_title">{!! \Carbon\Carbon::create($row->booking_from_time)->format('H:ia') !!} {!! \Carbon\Carbon::create($row->booking_to_time)->format('H:ia') !!}</span></p>
                    <hr/>
                    <p class="main_border"> <span class="text-highlight">{{ __('Category') }}:</span> <span class="booking_title">{!! $row->category_name !!} </span></p>
                    <hr/>
                    <p class="main_border"><span class="text-highlight">{{ __('Name') }}:</span> <span class="booking_title">{!! $row->first_name !!} {!! $row->last_name !!}</span></p>
                    <hr/>
                    <p class="main_border"><span class="text-highlight">{{ __('Phone Number') }}:</span><span class="booking_title">{!! $row->phone_number !!}</span></p>
                    <hr/>
                    <p class="main_border"><span class="text-highlight">{{ __('Email') }}:</span> <span class="booking_title">{!! $row->email !!}</span></p>
                    <hr/>
                    <p class="main_border"><span class="text-highlight">{{ __('Address') }}:</span> <span class="booking_title">{!! $row->address !!}</span></p>
                    <hr/>
                    <p class="main_border"><span class="text-highlight">{{ __('Message') }}:</span> <span class="booking_title">{!! $row->message !!}</span></p>
                    <hr/>
                {{--                <p><span class="text-highlight">{{ __('dashboard.status') }}:</span>--}}
                {{--                    @if( $row->status != 'pending' )--}}
                {{--                        <span class="badge badge-success badge-pill">{{ __('dashboard.active') }}</span>--}}
                {{--                    @else--}}
                {{--                        <span class="badge badge-danger badge-pill">{!! $row->status !!}</span>--}}
                {{--                    @endif--}}
                {{--                </p>--}}
                <!-- Details View End -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('dashboard.btn_close') }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
