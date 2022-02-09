<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.layouts.common.header_script')
    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            
            <!-- Start Content-->
            @yield('content')
            <!-- End Content-->

        </div>
        <!-- END wrapper -->


        @include('admin.layouts.common.footer_script')
    </body>
</html>