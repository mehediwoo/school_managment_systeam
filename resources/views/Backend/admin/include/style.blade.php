<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<?php
$title= App\Models\BackendSettings::first();
$icon= App\Models\logoSet::first();
?>

<title>{{ $title->site_title }}</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset($icon->favicon)}}">
<!-- Normalize CSS -->
<link rel="stylesheet" href="{{asset('Backend/css/normalize.css')}}">
  <!-- Select 2 CSS -->
  <link rel="stylesheet" href="{{asset('Backend/css/select2.min.css')}}">
<!-- Main CSS -->
<link rel="stylesheet" href="{{asset('Backend/css/main.css')}}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('Backend/css/bootstrap.min.css')}}">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{asset('Backend/css/all.min.css')}}">
<!-- Flaticon CSS -->
<link rel="stylesheet" href="{{asset('Backend/fonts/flaticon.css')}}">
<!-- Full Calender CSS -->
<link rel="stylesheet" href="{{asset('Backend/css/fullcalendar.min.css')}}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{asset('Backend/css/animate.min.css')}}">
<!-- Data Table CSS -->
{{-- <link rel="stylesheet" href="css/jquery.dataTables.min.css"> --}}
<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('Backend/style.css')}}">
<!-- Date Picker CSS -->
<link rel="stylesheet" href="{{asset('Backend/css/datepicker.min.css')}}">
<!-- Modernize js -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="{{asset('Backend/js/modernizr-3.6.0.min.js')}}"></script>


<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<!-- Include Summernote CSS and JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
