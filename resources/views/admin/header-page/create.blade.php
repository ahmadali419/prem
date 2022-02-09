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
                    <h4 class="header-title">{{ __('dashboard.add') }} {{ $title }}</h4>
                </div>
                <form class="needs-validation" action="{{ route($route.'.store') }}" novalidate  method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label>Thumbnail:</label>
                            <input type="file" name="slider_image[]" class="form-control" multiple required>
                            <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.thumbnail') }}
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="slider_image">Title:</label>
                            <input type="text" name="page_title" class="form-control" id="title" required>
                            <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.title') }}
                        </div>
                        <div class="form-group">
                            <label for="meta_title-">{{ __('dashboard.meta_title') }}: <span>{{ __('dashboard.meta_title_length') }}</span></label>
                            <textarea class="form-control" name="meta_title" id="meta_title-" rows="1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description-">{{ __('dashboard.meta_description') }}: <span>{{ __('dashboard.meta_desc_length') }}</span></label>
                            <textarea class="form-control" name="meta_description" id="description-" rows="1"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="keywords-">{{ __('dashboard.focus_keywords') }}: <span>{ __('dashboard.secondary_separate') }}</span></label>
                            <textarea class="form-control" name="secondary_keywords" id="secondary_keywords-" rows="1"></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="slider_image">Page Description:</label>
                            <textarea class="form-control textMediaEditor" name="page_description" id="description" rows="8"
                                required></textarea>
                                <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.description') }}
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="Status">Select Status:</label>
                            <select name="page_status" id="" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <hr>
                        <!-- <h3 class="text-dark">Form</h3>
                        
                        <label class="switch">

                            <input type="checkbox" name="page_form" class="form_check">
                            <span class="slider round"></span>
                        </label> -->
                        <h3 class="text-dark">Types/Colors</h3>
                        <div class="form-group">
                            <label for="Title">Title:</label>
                            <input type="text" name="pag_type_title" class="form-control" placeholder="Enter Title">
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="Title">Title:</label>
                            <input type="text" name="pag_cat_title[]" class="form-control" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="slider_image">Page Description:</label>
                            <textarea class="form-control textMediaEditor" name="page_cat_description[]" id="description" rows="8"
                                ></textarea>
                        </div>
                        <div class="form-group">
                        <label>Thumbnail:</label>
                            <input type="file" name="pag_cat_image[0][]" class="form-control" multiple>
                            <!-- <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.thumbnail') }}
                        </div> -->
                        </div>
                        <div class="form-group">
                            <label for="Status">Select Status:</label>
                            <select name="" id="" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="add-type">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" name="Submit" value="Add" class="btn btn-primary">
                                <button type="button" class="btn btn-info text-right" onclick="add_qual()" ><i class="fa fa-plus"></i> Add Type / Color</button>
                            </div>
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