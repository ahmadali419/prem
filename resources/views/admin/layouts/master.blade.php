<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.common.header_script')

    <!-- Bootstrap CSS CDN -->


    <!-- Font Awesome JS -->
    <!-- <script src="https://kit.fontawesome.com/d55982fc0b.js" crossorigin="anonymous"></script> -->
<style>


.dashboard_logo {
    margin-top: 25px;
    max-width: 209px;
    max-height: 71%;
    height: 37px;
}


a, a:hover, a:focus {
    color: #9097a7;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}


/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    background: #F0F0F0;
    display: flex;
    width: 100%;
    align-items: stretch;
    /*perspective: 1500px;*/
}


#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: white;
    color: #fff;
    transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
    transform-origin: bottom left;
}

#sidebar.active {
    margin-left: -250px;
    transform: rotateY(100deg);
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #9097a7;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #c8cddc;
    background: #fff;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #9097a7;
    background: #F0F0F0;
}


a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    color: #9097a7;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}



a.article, a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}



/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */
#content {
    width: 100%;
    min-height: 100vh;
    transition: all 0.3s;
}

#sidebarCollapse {
    width: 40px;
    height: 40px;
    background: #f5f5f5;
    cursor: pointer;
}

#sidebarCollapse span {
    width: 80%;
    height: 2px;
    margin: 0 auto;
    display: block;
    background: #555;
    transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
    transition-delay: 0.2s;
}

#sidebarCollapse span:first-of-type {
    transform: rotate(45deg) translate(2px, 2px);
}
#sidebarCollapse span:nth-of-type(2) {
    opacity: 0;
}
#sidebarCollapse span:last-of-type {
    transform: rotate(-45deg) translate(1px, -1px);
}


#sidebarCollapse.active span {
    transform: none;
    opacity: 1;
    margin: 5px auto;
}


/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */
@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
        transform: rotateY(90deg);
    }
    #sidebar.active {
        margin-left: 0;
        transform: none;
    }
    #sidebarCollapse span:first-of-type,
    #sidebarCollapse span:nth-of-type(2),
    #sidebarCollapse span:last-of-type {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }
    #sidebarCollapse.active span {
        margin: 0 auto;
    }
    #sidebarCollapse.active span:first-of-type {
        transform: rotate(45deg) translate(2px, 2px);
    }
    #sidebarCollapse.active span:nth-of-type(2) {
        opacity: 0;
    }
    #sidebarCollapse.active span:last-of-type {
        transform: rotate(-45deg) translate(1px, -1px);
    }

}

</style>


</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="slimscroll-menu">
                @if(isset($setting))
                <!-- LOGO -->
                <a href="{{ route('admin.dashboard.index') }}" class="logo text-center mb-4">
                    <span class="logo-lg">
                        <img src="{{ asset('/uploads/setting/Footer-logo-black.png') }}" alt="logo" class="dashboard_logo">
                    </span>
                </a>
                @endif
                @if(Request::is('admin*'))
                <!--- Sidemenu -->
                @include('admin.inc.sidebar')
                <!-- End Sidebar -->
                @endif
            </div>
        </nav>
        <!-- Page Content Holder -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- Topbar Start -->
                    <div class="">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('auth.register') }}</a>
                            </li>
                            @endif
                            @else

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ asset('/dashboard/images/users/user.png') }}" alt="user-image" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">{{ __('dashboard.welcome') }}
                                            <small class="pro-user-name ml-1">
                                                {{ Auth::user()->name }}
                                            </small>
                                        </h6>
                                    </div>

                                    <!-- item-->
                                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="fe-user"></i>
                                            <span>My Account</span>
                                        </a> -->

                                    <!-- item-->
                                    <a href="{{ route('admin.setting.index') }}" class="dropdown-item notify-item">
                                        <i class="fe-settings"></i>
                                        <span>{{ trans_choice('dashboard.module_setting', 2) }}</span>
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">

                                        <i class="fe-log-out"></i>
                                        <span>{{ __('dashboard.logout') }}</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>

                                </div>
                            </li>

                            @endguest

                        </ul>
                        <!--  <button class="button-menu-mobile open-left disable-btn">
                            <i class="fe-menu"></i>
                        </button> -->
                        <div class="app-search">
                        </div>
                    </div>
                <!-- end Topbar <--></-->
                </div>
            </nav>
            @yield('content')
        </div>




</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                @if(isset($setting))
                {{ __('dashboard.admin') }} &copy; - {!! strip_tags($setting->footer_text, '<p>
                    <a><b><i><u><strong>') !!}
                                        @endif
            </div>
            <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="{{ route('home') }}">{{ __('dashboard.home') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>

    @include('admin.layouts.common.footer_script')
    @yield('page-level-js')
    <script>
        var i = 0;

        function add_qual() {
            i++;
            $(".add-type").append(`
        <div class="type-row">
        <hr>
        <div class="row">
   <div class="col-lg-12 text-right">
      <span><i class="fa fa-times-circle text-danger remove_type"></i></span>
   </div>
</div>

      <div class="add-type-inner">
      <div class="form-group">
                            <label for="Title">Title:</label>
                            <input type="text" name="pag_cat_title[${i}]" class="form-control" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                        <label>Thumbnail:</label>
                            <input type="file" name="pag_cat_image[${i}][]" class="form-control" multiple>
                        </div>
                        <div class="form-group">
                            <label for="slider_image">Page Description:</label>
                            <textarea class="form-control textMediaEditor" name="page_cat_description[]" id="description" rows="8"
                                ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Status">Select Status:</label>
                            <select name="cat_status[]" id="" class="form-control">
                                <option value="">Active</option>
                                <option value="">Inactive</option>
                            </select>
                        </div>
      </div>
      </div>
`);

        }
        $(document).on('click', '.remove_type', function() {
            $(this).closest('div.type-row').remove();
            // i--;
        });
        $(".form_check").is(':checked') ? 1 : 0;
        $(document).on('change','#cat_id',function(){
              var page_id = $('#page_id').val();
               $.ajax({
            type: "POST",
            url: "{{route('admin.page-categories')}}", // your php file name
            data: {
                'catId':  $(this).val(),
                'page_id':page_id
            },
            dataType: "html",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            success: function(data) {
                if (data != '') {
                   $('.show_type').html('');
                   $('.show_type').html(data);

                }
            },
            error: function(errorString) {

            }
        });
        });

         $(document).on('click','#update_cat',function()
        {
        //   var file = $('#page_cat_file').val();
            var form = $('#updateForm')[0];
           var form_data = new FormData(form);
           var files = $('.page_cat_file')[0].files[0];
        //   console.log(files);return;
        //    console.log(files);return;
        form_data.append('page_cat_file', files);
           $.ajax({
            type: "POST",
            url:"{{route('admin.update-categories')}}",
             // your php file name
            data: form_data,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            success: function(data) {
                if (data.status= 'success') {
                    document.body.scrollTop = 0;
                        var msg = "";
                        msg += '<div class="col-md-12"><div class="alert alert-success">' + data.message +
                            '</div></div>';
                        $('#msg').html(msg);
                        document.documentElement.scrollTop = 0;
                        setTimeout(function() {
                            $('#msg').html('');
                        }, 5000);
                        location.reload();
                }
            },
            error: function(errorString) {

            }
        });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
        function  getPrint(id)
        {
            printElement(document.getElementById("printThis_"+id));
        }
        function printElement(elem) {
            var domClone = elem.cloneNode(true);

            var $printSection = document.getElementById("printSection");

            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }

            $printSection.innerHTML = "";
            $printSection.appendChild(domClone);
            window.print();
        }
    </script>
</body>

</html>
