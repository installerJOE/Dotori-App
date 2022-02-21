<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        
        .translated-ltr{margin-top:-40px;}
        .translated-ltr{margin-top:-40px;}
        .goog-te-banner-frame {display: none;margin-top:-20px;}

        .goog-logo-link {
        display:none !important;
        } 

        .goog-te-combo{
            margin-left: 12px !important;
        }

        .goog-te-gadget{
        color: transparent !important;
        }
    </style>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!------------------------------------------------------------------------------------------------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!------------------------------------------------------------------------------------------------------>
    <script src="https://kit.fontawesome.com/22b786e40e.js" crossorigin="anonymous"></script>
    <!------------------------------------------------------------------------------------------------------>


    <!-- Latest compiled and minified CSS for bootstrap 5 -->
    <!------------------------------------------------------------------------------------------------------>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <!------------------------------------------------------------------------------------------------------>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <!------------------------------------------------------------------------------------------------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <!------------------------------------------------------------------------------------------------------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!------------------------------------------------------------------------------------------------------>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <!------------------------------------------------------------------------------------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!------------------------------------------------------------------------------------------------------>

    <link href="{{asset('/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" media="screen and (min-width:1024px)">
    <link href="{{asset('/css/responsive.css')}}" rel="stylesheet" type="text/css" media="screen and (max-width:1023px)">
    <link href="{{asset('/css/reset.css')}}" rel="stylesheet">
	<script src="{{URL::asset('/js/jquery-3.2.1.min.js')}}"></script>

    @yield('meta-content')
</head>
<body>
    <div>
        @yield('content')
    </div>
</body>
</html>
