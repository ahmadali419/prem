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
                @foreach( $rows as $key => $row )
                <div class="card-header">
                    <h4 class="header-title">{{ __('dashboard.template-'.$row->slug) }} {{ __('dashboard.template') }}</h4>
                </div>
                <div class="card-body">

                    <form class="needs-validation" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label for="title-{{ $row->id }}">{{ __('dashboard.subject') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title-{{ $row->id }}" value="{{ $row->title }}" required>

                            <div class="invalid-feedback">
                              {{ __('dashboard.please_provide') }} {{ __('dashboard.subject') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description-{{ $row->id }}">{{ __('dashboard.message') }} <span>*</span></label>
                            <textarea class="form-control summernote" name="description" id="description-{{ $row->id }}" rows="8">{!! $row->description !!}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" data-plugin="switchery" data-color="#1bb99a" data-size="small" name="status" id="status-{{ $row->id }}" value="1" @if( $row->status == 1 ) checked @endif>
                            <label for="status-{{ $row->id }}">{{ __('dashboard.action') }}</label>

                            @if( $row->status == 1 )
                            <span class="badge badge-success badge-pill">{{ __('dashboard.active') }}</span>
                            @else
                            <span class="badge badge-danger badge-pill">{{ __('dashboard.inactive') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('dashboard.btn_update') }}</button>
                        </div>
                    </form>

                </div> <!-- end card body-->
                @endforeach

            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection