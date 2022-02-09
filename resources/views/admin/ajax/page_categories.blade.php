<link href="http://localhost/Archi/dashboard/css/summernote-bs4.css" rel="stylesheet" type="text/css" />
<div class="card">
    <div class="card-header">
        <h3 class="text-dark">{{$pageCategory->page_type_title}}</h3>
    </div>
    <input type="hidden" name="page_cat_id" value="{{$pageCategory->id}}">
    <form id="updateForm">
        <div class="card-body">

            <div>
                <img src="{{asset('uploads/header-page/category/'.$pageCategory->imgPath)}}" style="width: 30%" class="mb-3">
            </div>


            <input type="hidden" name="page_cat_id" value="{{$pageCategory->id}}">
            <div class="form-group">
                <label for="Title">Title:</label>
                <input type="text" name="pag_cat_title" class="form-control" placeholder="Enter Title" value="{{ $pageCategory->title}}">
            </div>
            <div class="form-group">
                <label for="description">Page Description:</label>
                <textarea class="form-control textMediaEditor" name="page_cat_description" id="cat_description" rows="8">{{$pageCategory->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Thumbnail:</label>
                <input type="hidden" name="pca_id" value="{{$pageCategory->pca_id}}">
                <input type="file" name="pag_cat_image" class="form-control page_cat_file">
                <!-- <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.thumbnail') }}
                        </div> -->
            </div>
            <input type="hidden" name="old_page_cat_image" value="{{$pageCategory->imgPath}}">
            <div class="form-group">
                <label for="status">Select Status</label>
                <select class="wide form-control" name="cat_status" id="status">
                    <option value="1" {{ ($pageCategory->status == 1 ) ? 'selected' : '' }}>{{ __('dashboard.active') }}
                    </option>
                    <option value="0" {{ ($pageCategory->status == 0 ) ? 'selected'  :''}}>
                        {{ __('dashboard.inactive') }}
                    </option>
                </select>
            </div>
            <hr>
            <button id="update_cat" type="button" class="btn btn-info">Update</button>

        </div>
    </form>
</div>

<script src="http://localhost/Archi/dashboard/js/summernote-bs4.js"></script>
<script src="http://localhost/Archi/dashboard/js/app.js"></script>

<!-- Form End -->