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
                    <h4 class="header-title">{{ __('dashboard.view') }} {{ $title }}</h4>
                </div>
                <div class="card-body">

                    <!-- Details View Start -->
                    <h4><span class="text-highlight">{{ __('dashboard.title') }}:</span> {{ $headerPage->title }}</h4>
                    <hr />
                    <p><span class="text-highlight">{{ __('dashboard.thumbnail') }}:</span></p>
                    @if(!empty($sliderImages))
                    @foreach($sliderImages as $imgObj)
                    @if(is_file('uploads/'.$path.'/'.$imgObj->image_path))
                    <div class="mb-2">
                        <img src="{{ asset('uploads/'.$path.'/'.$imgObj->image_path) }}" class="img-fluid"
                            style="width: 50%;" alt="Blog">
                    </div>
                    @endif
                    @endforeach
                    @endif


                    <hr />
                    <p><span class="text-highlight">{{ __('dashboard.description') }}:</span> {!!
                        $headerPage->description !!}</p>

                    <hr />
                    <p><span class="text-highlight">{{ __('dashboard.status') }}:</span>
                        @if( $headerPage->status == 1 )
                        <span class="badge badge-success badge-pill">{{ __('dashboard.active') }}</span>
                        @else
                        <span class="badge badge-danger badge-pill">{{ __('dashboard.inactive') }}</span>
                        @endif
                    </p>
                    @if(!empty($pageCategory))
                    <h3><span class="text-highlight">{{!empty($row->page_type_title) ? $row->page_type_title : ''}} </h3>
                    <hr>

                    @foreach ($pageCategory->categories as $pageObj)
                    <h4><span class="text-highlight">{{ __('dashboard.title') }}:</span> {{ $pageObj->title }}</h4>
                    @if(!empty($pageObj->description))
                    <h4><span class="text-highlight">{{ __('dashboard.description') }}:</span> {{ $pageObj->description }}</h4>
                    @endif
                    <p><span class="text-highlight">{{ __('dashboard.thumbnail') }}:</span></p>
                    @if(!empty($pageObj->pageCategoryAttachments))
                    @foreach ($pageObj->pageCategoryAttachments as $attachmentObj)
                    <div class="mb-2">
                        <img src="{{ asset('uploads/header-page/category/'.$attachmentObj->image_path) }}"
                            class="img-fluid" style="width: 50%;" alt="Blog">
                    </div>
                    @endforeach
                    @endif
                    <p><span class="text-highlight">{{ __('dashboard.status') }}:</span>
                        @if( $pageObj->status == 1 )
                        <span class="badge badge-success badge-pill">{{ __('dashboard.active') }}</span>
                        @else
                        <span class="badge badge-danger badge-pill">{{ __('dashboard.inactive') }}</span>
                        @endif
                    </p>
                    @endforeach
                    @endif
                    <!-- Details View End -->
                </div>
            </div>
        </div><!-- end col-->
    </div>
    <!-- end row-->


</div> <!-- container -->
<!-- End Content-->

@endsection