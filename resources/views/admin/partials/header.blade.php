<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title',env('DEFAULT_TITLE','News Portal Site'))</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/font-awesome.min.css') }}">
<link href="{{ asset('lightbox2-2.11.3 (1)/lightbox2-2.11.3/dist/css/lightbox.css')}}" rel="stylesheet" />


    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote-0.8.18-dist (1)/summernote-bs4.min.css') }}">

    
<link rel="stylesheet" href="{{ asset('backend/assets/css/dataTables.bootstrap4.min.css') }}">

    <!-----External CSS------------->
    @yield('css')
    <!-----External CSS------------->
    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/morris/morris.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    

    <!-- HTML5 shim and Respond.js') }} IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="{{ asset('backend/sets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('backend/sets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
