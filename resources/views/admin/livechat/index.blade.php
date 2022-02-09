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
            <a href="{{ route($route.'.index') }}" class="btn btn-info">{{ __('dashboard.btn_refresh') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">{{ $title }} {{ __('dashboard.setup') }}</h4>
                    <span>{{ __('dashboard.livechat_info') }}</span>
                </div>
                <div class="card-body">

                  <!-- Form Start -->
                  <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">

                    <div class="row">

                      <div class="col-md-6">
                        <h4>{{ __('dashboard.whatsapp_live_chat') }}</h4>
                        <hr/>
                        <div class="form-group">
                          <label for="whatsapp_no">{{ __('dashboard.whatsapp') }} <span>({{ __('dashboard.inc_country_code') }})</span></label>
                          <input type="text" class="form-control" name="whatsapp_no" id="whatsapp_no" value="{{ isset($row->whatsapp_no)?$row->whatsapp_no:'' }}">

                          <div class="invalid-feedback">
                            {{ __('dashboard.please_provide') }} {{ __('dashboard.whatsapp') }}
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="whatsapp_title">{{ __('dashboard.whatsapp_header_title') }}</label>
                          <input type="text" class="form-control" name="whatsapp_title" id="whatsapp_title" value="{{ isset($row->whatsapp_title)?$row->whatsapp_title:'' }}">

                          <div class="invalid-feedback">
                            {{ __('dashboard.please_provide') }} {{ __('dashboard.whatsapp_header_title') }}
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="whatsapp_greeting">{{ __('dashboard.whatsapp_greeting_message') }}</label>
                          <input type="text" class="form-control" name="whatsapp_greeting" id="whatsapp_greeting" value="{{ isset($row->whatsapp_greeting)?$row->whatsapp_greeting:'' }}">

                          <div class="invalid-feedback">
                            {{ __('dashboard.please_provide') }} {{ __('dashboard.whatsapp_greeting_message') }}
                          </div>
                        </div>

                        <div class="form-group">
                          <input type="checkbox" data-plugin="switchery" data-color="#1bb99a" data-size="small" name="whatsapp_status" id="whatsapp_status" value="1" @if( $row->whatsapp_status == 1 ) checked @endif>
                          <label for="whatsapp_status">{{ __('dashboard.display') }}</label>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <h4>{{ __('dashboard.messenger_live_chat') }}</h4>
                        <hr/>
                        <div class="form-group">
                          <label for="facebook_id">{{ __('dashboard.facebook_page_id') }}</span></label>
                          <input type="text" class="form-control" name="facebook_id" id="facebook_id" value="{{ isset($row->facebook_id)?$row->facebook_id:'' }}">

                          <div class="invalid-feedback">
                            {{ __('dashboard.please_provide') }} {{ __('dashboard.facebook_page_id') }}
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="facebook_greeting_in">{{ __('dashboard.facebook_login_greeting') }}</label>
                          <input type="text" class="form-control" name="facebook_greeting_in" id="facebook_greeting_in" value="{{ isset($row->facebook_greeting_in)?$row->facebook_greeting_in:'' }}">

                          <div class="invalid-feedback">
                            {{ __('dashboard.please_provide') }} {{ __('dashboard.facebook_login_greeting') }}
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="facebook_greeting_out">{{ __('dashboard.facebook_logout_greeting') }}</label>
                          <input type="text" class="form-control" name="facebook_greeting_out" id="facebook_greeting_out" value="{{ isset($row->facebook_greeting_out)?$row->facebook_greeting_out:'' }}">

                          <div class="invalid-feedback">
                            {{ __('dashboard.please_provide') }} {{ __('dashboard.facebook_logout_greeting') }}
                          </div>
                        </div>

                        <div class="form-group">
                          <input type="checkbox" data-plugin="switchery" data-color="#1bb99a" data-size="small" name="facebook_status" id="facebook_status" value="1" @if( $row->facebook_status == 1 ) checked @endif>
                          <label for="facebook_status">{{ __('dashboard.display') }}</label>
                        </div>
                      </div>

                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('dashboard.btn_update') }}</button>
                    </div>

                  </form>
                  <!-- Form End -->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection