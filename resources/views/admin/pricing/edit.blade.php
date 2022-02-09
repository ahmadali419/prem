@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <a href="{{ route($route.'.index') }}" class="btn btn-info">{{ __('dashboard.btn_back') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">{{ __('dashboard.edit') }} {{ $title }}</h4>
                </div>
                <form class="needs-validation" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="title">{{ __('dashboard.title') }} <span>*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" required>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.title') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">{{ __('dashboard.price') }} <span>*</span></label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ $row->price }}" required>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.price') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quantity">{{ __('dashboard.quantity') }} <span>*</span></label>
                        <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $row->quantity }}" required>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.quantity') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="feature">{{ __('dashboard.feature_name') }} <span>*</span></label>
                    </div>
                    @php
                        $features = json_decode($row->description, true);
                    @endphp

                    @if(isset($features))
                    @foreach($features as $key => $feature)
                    <div class="form-group row" id="inputFormField">
                        <div class="col-8"><input type="text" class="form-control" name="features[]" value="{{ $feature }}" placeholder="{{ __('dashboard.feature_name') }}" required></div>
                        <div class="col-4"><button id="removeField" type="button" class="btn btn-danger">{{ __('dashboard.btn_remove') }}</button></div>
                    </div>
                    @endforeach
                    @endif

                    <div id="newField"></div>
                    <div class="form-group">
                        <button id="addField" type="button" class="btn btn-info">{{ __('dashboard.add_feature') }}</button>
                    </div>

                    <div class="form-group">
                        <label for="status">{{ __('dashboard.select_status') }}</label>
                        <select class="wide" name="status" id="status" data-plugin="customselect">
                            <option value="1" @if( $row->status == 1 ) selected @endif>{{ __('dashboard.active') }}</option>
                            <option value="0" @if( $row->status == 0 ) selected @endif>{{ __('dashboard.inactive') }}</option>
                        </select>
                    </div>
                    <!-- Form End -->
                    
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('dashboard.btn_update') }}</button>
                    </div>
                </div>
                </form>
            </div>
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection

@section('page_js')
<script type="text/javascript">
(function ($) {
    "use strict";
    // add Field
    $(document).on('click', '#addField', function () {
        var html = '';
        html += '<div class="form-group row" id="inputFormField">';
        html += '<div class="col-8"><input type="text" class="form-control" name="features[]" placeholder="{{ __('dashboard.feature_name') }}" required></div>';
        html += '<div class="col-4"><button id="removeField" type="button" class="btn btn-danger">{{ __('dashboard.btn_remove') }}</button></div>';
        html += '</div>';

        $('#newField').append(html);
    });

    // remove Field
    $(document).on('click', '#removeField', function () {
        $(this).closest('#inputFormField').remove();
    });
}(jQuery));
</script>
@endsection