<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{app()->getLocale()==='ar'?'rtl':'ltr'}}">


<!-- Mirrored from pixelwibes.com/template/my-task/html/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Apr 2023 02:58:10 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Minutto' }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/assets/plugin/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/my-task.style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
      <!-- FAVICON -->
      <link rel="icon" href="{{ asset('img/favicon/favicon-150x150.png') }}" sizes="32x32" />
      <link rel="icon" href="{{ asset('img/favicon/favicon.png') }}" sizes="192x192" />
</head>
<body class="{{ app()->getLocale()==='ar'?'rtl_mode':'' }}">

