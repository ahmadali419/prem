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
        <div class="col-12 col-lg-8">
            <a href="{{ route($route.'.index') }}" class="btn btn-info">{{ __('dashboard.btn_refresh') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
              <form action="">
                  <div class="form-group">
                      <label for="slider_image">Slider Image:</label>
                      <input type="file" name="slider_image" class="form-control" multiple>
                  </div>
                  <div class="form-group">
                      <label for="slider_image">Title:</label>
                      <input type="text" name="page_title" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="slider_image">Page Description:</label>
                      <textarea class="form-control textMediaEditor" name="description" id="description" rows="8" required></textarea>
                  </div>

                  <h3 class="text-dark">Type:</h3>
                  <div class="form-group">
                      <label for="Title">Title:</label>
                      <input type="text" name="pag_cat_title" class="form-control" placeholder="Enter Title">
                  </div>
                  <div class="form-group">
                      <input type="file" name="pag_cat_image" multiple>
                  </div>
                 <div class="form-group">
                     <label for="Status">Select Status:</label>
                     <select name="" id="" class="form-control">
                         <option value="">Active</option>
                         <option value="">Inactive</option>
                     </select>
                 </div>
                  <div class="row">
                      <div class="col-md-12">
                      <input type="submit" name="Submit" value="Update" class="btn btn-primary text-right">
                      </div>
                  </div>
              </form>

            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection