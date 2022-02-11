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
    <style>
        .alert-boxes{
            padding:0px 20px;
            padding-top: 1.4em;
        }
    </style>
</head>
<body>
    <div>
        <div id="wrap"><!--wrap-->
            @include('includes.sidebar')
            <div class="section_right"><!--section_right-->
                <div class="alert-boxes">
                    @include('includes.messages')
                </div>
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        function copyToClipBoard(){
            /* Get the text field */ 
            var copyText = document.getElementById("linkBar").innerHTML;

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText);

            /* Alert the copied text */
            alert("Your link has been copied to clipboard.");
        }                            
    </script>
    
</body>
</html>
