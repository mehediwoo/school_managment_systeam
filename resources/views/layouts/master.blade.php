@php
    $logo = App\Models\logoSet::first();
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<!-- META DATA -->
        <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{ $seo->meta_description }}">
        <meta name="keywords" content="{{ $seo->meta_keywords }}">
        <meta name="author" content="BTSSD">
        <meta name="robots" content="index, follow">

        <!-- Open Graph -->
        <meta property="og:title" content="{{ $setting->site_title }}">
        <meta property="og:description" content="{{ $seo->meta_description }}">
        <meta property="og:image" content="{{ asset($setting->logo) }}">
        <meta property="og:url" content="{{ $current_url }}">
        <meta property="og:type" content="soft.btssd.org">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="{{ $setting->site_title }}">
        <meta name="twitter:title" content="{{ $setting->site_title }}">
        <meta name="twitter:description" content="{{ $seo->meta_description }}">
        <meta name="twitter:image" content="{{ $setting->logo }}">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset( $setting->favicon) }}" type="image/x-icon">


		<!-- TITLE -->
		<title>@yield('title')</title>

		<!-- Favicon -->
		<link rel="icon" href="{{ asset($logo->favicon) }}" type="image/x-icon">

        <!-- BOOTSTRAP CSS -->
	    <link id="style" href="{{asset('build/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >

        <!-- APP CSS & APP SCSS -->
        @vite(['resources/css/app.css' , 'resources/sass/app.scss'])

        @yield('styles')
	</head>

	<body class="app ltr sidebar-mini light-mode">

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{asset('build/assets/images/svgs/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- GLOBAL-LOADER -->

		<!-- PAGE -->
		<div class="page-main">



            <!-- App-Header -->
            @include('layouts.components.app-header')
            <!-- End App-Header -->

                <!--App-Sidebar-->
            @include('layouts.components.app-sidebar')
            <!-- End App-Sidebar-->

                <!--app-content open-->
			<div class="app-content main-content">
				<div class="side-app">
					<div class="main-container">

                        @yield('content')

                    </div>
                </div>
                <!-- Container closed -->
            </div>
            <!-- main-content closed -->



            <!-- Sidebar-right -->
            @include('layouts.components.sidebar-right')
            <!-- End Sidebar-right -->

            <!-- Country-selector modal -->
            @include('layouts.components.modal')
            <!-- End Country-selector modal -->

            <!-- Footer opened -->
			@include('layouts.components.footer')
            <!-- End Footer -->

            @yield('modals')

		</div>
        <!-- END PAGE-->

        <!-- SCRIPTS -->
        @include('layouts.components.scripts')

        <!-- APP JS-->
		@vite('resources/js/app.js')
        <!-- END SCRIPTS -->
        @yield('script')

	</body>
</html>
