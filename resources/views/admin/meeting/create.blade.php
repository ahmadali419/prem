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
            <a href="" class="btn btn-info">{{ __('dashboard.btn_back') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-8">    
          <form id="addForm">
       <div class="form-group">
       <label for="">Topic:</label>
          <input type="text" name="topic" placeholder="Enter Topic" class="form-control">
       </div>
       <div class="form-group">
       <label for="">Start Time:</label>
          <input type="datetime" name="start_time" placeholder="Enter Start time" class="form-control">
       </div>
       <div class="form-group">
       <label for="">Agenda:</label>
          <input type="text" name="agenda" placeholder="Enter Agenda" class="form-control">
       </div>
       <input type="button" name="submit" id="btn_save" value="Submit" class="btn btn-info">
         </form>
        
        </div>
    </div>

   
    <!-- end row-->


</div> <!-- container -->
<!-- End Content-->

@endsection

@section('page-level-js')
<script>
$(document).on('click', '#btn_save', function() {
        
        // var validate = $("#addForm").valid();
        // if (validate) {
            var form = $('#addForm')[0];
            var form_data = new FormData(form);
            // console.log(form_data);return;
            $.ajax({
                type: "POST",
                enctype: "multipart/form-data",
                url: "{{route('meeting.add')}}", // your php file name
                data: form_data,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                success: function(data) {
                    if (data.status == 'success') {
                       


                    } else {
                        // Swal.fire("Sorry!", data.message, "error");
                    }
                },
                error: function(errorString) {
                    // Swal.fire("Sorry!", "Something went wrong please contact to admin", "error");
                }
            });
        // }
    });
</script>

@endsection