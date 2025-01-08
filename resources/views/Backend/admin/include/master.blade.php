<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   @include('Backend.admin.include.style')
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
       @include('Backend.admin.include.header')
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            @include('Backend.admin.include.sidebar')
            @yield('content')
            @include('Backend.admin.include.footer')
            <!-- Footer Area End Here -->
        </div>
    </div>
    <!-- Page Area End Here -->
</div>
<!-- jquery-->
@include('Backend.admin.include.script')
</body>

</html>
