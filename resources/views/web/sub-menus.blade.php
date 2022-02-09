<!-- Blog Area  -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <span><a href="" class="p-3"><i class="fa fa-arrow-left  header-arrow mr-2"></i><span
                                class="prem_text">{{strtoUpper($title)}}</span></a></span>

                    <span class="float-right">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input type="text" class="form-control search-input" placeholder="Search..">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </span>

                </div>
            </div>
            <div class="breadcroumb-title text-center">

                <!-- <h3 class="prem_text">{{strtoUpper($title)}}</h3> -->
                <h5><a href=""></a></h5>
                <div class="breadcroumb-title text-center">

                    <div class="row">
                        @foreach ($header as $obj)
                        <div class="col-lg-3 col-md-4 col-sm-6 main_div">
                            <a type="button" onclick="getSubmenu('{{$obj->slug_c_title}}')">
                                <div class="card mb-1">
                                    <div class="card-body">
                                        <span>
                                            <img src="{{asset('uploads/icons/'.$obj->c_image)}}"
                                                alt="submenu-img">
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <p><a type="button" onclick="getSubmenu('{{$obj->slug_c_title}}')">{{$obj->sub_c_title}}</a>
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
let searchInput = document.querySelector('.search-input');
searchInput.addEventListener('keyup', search);
// get all title
let titles = document.querySelectorAll('.main_div');
console.log(titles);
let searchTerm = '';
let tit = '';

function search(e) {
    // console.log(e);return;
    // get input fieled value and change it to lower case
    searchTerm = e.target.value.toLowerCase();
    titles.forEach((title) => {
        // console.log(title);return;
        // navigate to p in the title, get its value and change it to lower case
        tit = title.textContent.toLowerCase();
        // it search term not in the title's title hide the title. otherwise, show it.
        tit.includes(searchTerm) ? title.style.display = 'block' : title.style.display = 'none';
    });
}
</script>
</script>