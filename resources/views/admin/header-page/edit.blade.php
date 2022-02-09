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
    @if(!empty($pageCategory->categories))
    <div class="row">
    <div class="col-md-6 float-right mb-3 mt-2">
    <div class="form-group">
    <label for=""><b>Select Color/Type/Fabric</b></label>
    <select name="cat_id" id="cat_id" class="form-control">
      <option value="" selected>Select Color/Type/Fabric
      </option>
      @foreach($pageCategory->categories as $key=> $catObj)                            
      <option value="{{$catObj->id}}">{{$catObj->title}}</option>
      @endforeach

    </select>
    </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-8">
    <div id="msg"></div>
    
    </div>
</div>
    <div class="row">
        <div class="col-12 col-lg-8">
        <div id="msg"></div>
        <div class="show_type"></div>
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
                    <input type="hidden" name="page_id" id="page_id" value="{{$row->id}}">
                        <label for="title">{{ trans_choice('dashboard.module_page', 1) }} {{ __('dashboard.title') }} <span>*</span></label>
                        <input type="text" class="form-control" name="page_title" id="title" value="{{ $row->title }}" required>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.title') }}
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="meta_title-{{$row->id}}">{{ __('dashboard.meta_title') }}: <span>{{ __('dashboard.meta_title_length') }}</span></label>
                            <textarea class="form-control" name="meta_title" id="meta_title-{{$row->id}}" rows="1">{!! $row->meta_title !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description-{{$row->id}}">{{ __('dashboard.meta_description') }}: <span>{{ __('dashboard.meta_desc_length') }}</span></label>
                            <textarea class="form-control" name="meta_description" id="description-{{$row->id}}" rows="1">{!! $row->meta_description !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="keywords-{{$row->id}}">{{ __('dashboard.focus_keywords') }}: <span></span></label>
                            <textarea class="form-control" name="keywords" id="keywords-{{$row->id}}" rows="1">{!! $row->keywords !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords-{{$row->id}}">{{ __('dashboard.secondary_keywords') }}: <span>{{ __('dashboard.secondary_separate') }}</span></label>
                            <textarea class="form-control" name="secondary_keywords" id="secondary_keywords-{{$row->id}}" rows="1">{!! $row->secondary_keywords !!}</textarea>
                        </div>
                    <div class="form-group">
                        <label for="description">{{ __('dashboard.description') }} <span>*</span></label>
                        <textarea class="form-control textMediaEditor" name="page_description" id="description" rows="8" required>{{ $row->description }}</textarea>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.description') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">{{ __('dashboard.thumbnail') }} <span>{{ __('dashboard.image_size', ['height' => 500, 'width' => 800]) }}</span></label>
                        <input type="file" class="form-control" name="slider_image[]" id="image" multiple>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.thumbnail') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">{{ __('dashboard.select_status') }}</label>
                        <select class="wide" name="page_status" id="status" data-plugin="customselect">
                            <option value="1" @if( $row->status == 1 ) selected @endif>{{ __('dashboard.active') }}</option>
                            <option value="0" @if( $row->status == 0 ) selected @endif>{{ __('dashboard.inactive') }}</option>
                        </select>
                    </div>
                   
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