<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.common.header_script')
    <style>

.dashboard_logo{
    margin-top: 25px;
    max-width: 209px;
    max-height: 71%;
    height: 37px;
}
</style>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu left-side-menu-dark">

            <div class="slimscroll-menu">

                @if(isset($setting))
                <!-- LOGO -->
                <a href="{{ route('admin.dashboard.index') }}" class="logo text-center mb-4">
                    <span class="logo-lg">
                        <img src="{{ asset('/uploads/setting/Footer-logo-black.png') }}" alt="logo" class="dashboard_logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('/uploads/setting/Footer-logo-black.png') }}" alt="logo" height="24">
                    </span>
                </a>
                @endif

                @if(Request::is('admin*'))
                <!--- Sidemenu -->
                @include('admin.inc.sidebar')
                <!-- End Sidebar -->
                @endif

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Topbar Start -->
                <div class="navbar-custom">
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
                    <button class="button-menu-mobile open-left disable-btn">
                        <i class="fe-menu"></i>
                    </button>
                    <div class="app-search">
                    </div>
                </div>
                <!-- end Topbar -->


                <!-- Start Content-->
                @yield('content')
                <!-- End Content-->



            </div> <!-- content -->

            <!-- Footer Start -->
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
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


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





</body>

</html>
