<!DOCTYPE html>

<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('theme-package/assets/') }}"
  data-template="vertical-menu-template-free"
>

<head>
  
  <meta charset="utf-8" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
/>

<meta name="description" content="" />
<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('theme-package/assets/img/favicon/favicon.ico') }}" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
/>

{{-- <!-- Scripts -->
<script src="{{ asset('resources/js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('resources/css/app.css') }}" rel="stylesheet"> --}}

<!-- Icons. Uncomment required icon fonts -->
<link href="{{ asset('theme-package/assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('theme-package/assets/vendor/fonts/boxicons.css') }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('theme-package/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('theme-package/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('theme-package/assets/css/demo.css') }}" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('theme-package/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

<!-- Page CSS -->
<!-- Page -->
<link rel="stylesheet" href="{{ asset('theme-package/assets/vendor/css/pages/page-auth.css') }}" />
<!-- Helpers -->
<script src="{{ asset('theme-package/assets/vendor/js/helpers.js') }}"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('theme-package/assets/js/config.js') }}"></script>
<script src="{{ asset('theme-package/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('theme-package/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('theme-package/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('theme-package/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('theme-package/assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('theme-package/assets/vendor/js/menu.js') }}"></script>



