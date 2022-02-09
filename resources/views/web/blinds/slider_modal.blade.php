<!-- <div id="carouselExampleControl" class="carousel slide" data-ride="carousel"> -->
    <!-- <div class="carousel-inner"> -->
    <div class="row mb-5">
        <div class="col-md-6 text-center">
            <div class="description-modal mr-3 ml-4 mt-2">
            <img class="d-block w-100" src="{{asset('uploads/header-page/category/'.$pageCategoryAttachment->image_path)}}"
                alt="First slide">
                <span class="text-center mt-3">{{$pageCategoryAttachment->title}}</span>
            </div>
        </div>
        <div class="col-md-6">
        @if(!empty($pageCategoryAttachment->description))
        <h4 class="prem_text">Description</h3>
        <div>{!!$pageCategoryAttachment->description!!}</div>
        </div>
        @endif
        
    </div>
       
    </div>
    <!-- <a class="carousel-control-prev" href="#carouselExampleControl" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControl" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> -->