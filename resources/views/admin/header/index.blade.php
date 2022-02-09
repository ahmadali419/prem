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
                    <h4 class="header-title">{{ __('dashboard.header-'.$row->slug) }} {{ __('dashboard.header') }}</h4>
                </div>
                <div class="card-body">

                    <form class="needs-validation" novalidate action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label for="title-{{ $row->id }}">{{ trans_choice('dashboard.module_page', 1) }} {{ __('dashboard.title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title-{{ $row->id }}" value="{{ $row->title }}" required>

                            <div class="invalid-feedback">
                              {{ __('dashboard.please_provide') }} {{ __('dashboard.title') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_title-{{ $row->id }}">{{ __('dashboard.meta_title') }}: <span>{{ __('dashboard.meta_title_length') }}</span></label>
                            <textarea class="form-control" name="meta_title" id="meta_title-{{ $row->id }}" rows="1">{!! $row->meta_title !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description-{{ $row->id }}">{{ __('dashboard.meta_description') }}: <span>{{ __('dashboard.meta_desc_length') }}</span></label>
                            <textarea class="form-control" name="description" id="description-{{ $row->id }}" rows="1">{!! $row->description !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="keywords-{{ $row->id }}">{{ __('dashboard.focus_keywords') }}: <span></span></label>
                            <textarea class="form-control" name="keywords" id="keywords-{{ $row->id }}" rows="1">{!! $row->keywords !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords-{{ $row->id }}">{{ __('dashboard.secondary_keywords') }}: <span>{{ __('dashboard.secondary_separate') }}</span></label>
                            <textarea class="form-control" name="secondary_keywords" id="secondary_keywords-{{ $row->id }}" rows="1">{!! $row->secondary_keywords !!}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" data-plugin="switchery" data-color="#1bb99a" data-size="small" name="status" id="status-{{ $row->id }}" value="1" @if( $row->status == 1 ) checked @endif>
                            <label for="status-{{ $row->id }}">{{ __('dashboard.display') }}</label>

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