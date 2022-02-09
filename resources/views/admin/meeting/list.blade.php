@extends('admin.layouts.master')
@section('title', )
@section('content')

<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <a href="{{route('meeting.create')}}" class="btn btn-primary">{{ __('dashboard.btn_add_new') }}</a>

            <a href="" class="btn btn-info">{{ __('dashboard.btn_refresh') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

          
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection