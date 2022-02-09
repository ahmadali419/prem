<!-- Add modal content -->
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="{{route($route.'.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ __('dashboard.add') }} {{ $title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->

                    <div class="form-group">
                        <label for="slot_limit">{{ __('dashboard.slot-limit') }} <span>*</span></label>
                        <input type="number" class="form-control" name="slot_limit" id="slot_limit" value="{{ old('slot_limit') }}" required>

                        <div class="invalid-feedback">
                            {{ __('dashboard.please_provide') }} {{ __('dashboard.slot-limit') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="start_time">{{ __('dashboard.slot-start-time') }} <span>*</span></label>
                        <input type="time" class="form-control" name="start_time" id="start_time" value="{{ old('start_time') }}" required>

                        <div class="invalid-feedback">
                            {{ __('dashboard.please_provide') }} {{ __('dashboard.slot-start-time') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="end_time">{{ __('dashboard.slot-end-time') }} <span>*</span></label>
                        <input type="time" class="form-control" name="end_time" id="end_time" value="{{ old('end_time') }}" required>

                        <div class="invalid-feedback">
                            {{ __('dashboard.please_provide') }} {{ __('dashboard.slot-end-time') }}
                        </div>
                    </div>


                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('dashboard.btn_close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('dashboard.btn_save') }}</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
