<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <script src="{{asset('Frontend')}}/js/jquery-3.3.1.min.js"></script>    
    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('Frontend')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Frontend')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Frontend')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Frontend')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Frontend')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Frontend')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Frontend')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Frontend')}}/css/style.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Frontend')}}/css/toastr.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    @include('components.Frontend.humberger_section')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('components.Frontend.header_section')
    <!-- Header Section End -->

        {{-- Main Contant Start --}}
            @yield('content')
        {{-- Main Contant End --}}

    <!-- Footer Section Begin -->
    @include('components.Frontend.footer_section')
    <!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{asset('Frontend')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('Frontend')}}/js/bootstrap.min.js"></script>
<script src="{{asset('Frontend')}}/js/jquery.nice-select.min.js"></script>
<script src="{{asset('Frontend')}}/js/jquery-ui.min.js"></script>
<script src="{{asset('Frontend')}}/js/jquery.slicknav.js"></script>
<script src="{{asset('Frontend')}}/js/mixitup.min.js"></script>
<script src="{{asset('Frontend')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('Frontend')}}/js/main.js"></script>




</body>

</html>