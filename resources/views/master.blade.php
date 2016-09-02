<!DOCTYPE html>
<html lang="es">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <meta name="description" content="blank page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('/assets/img/favicon.png') }}" type="image/x-icon">

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/font-awesome/4.6.3/css/font-awesome.min.css') }}" />

    <!-- page specific plugin styles -->
    @yield('styles')
    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('/assets/css/fonts.googleapis.com.css') }}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('/assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
        <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('/assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/ace-rtl.min.css') }}" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="{{ asset('/assets/css/ace-ie.min.css') }}" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ asset('/assets/js/ace-extra.min.js') }}"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ asset('/assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('/assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<!-- /Head -->
<!-- Body -->
<body class="no-skin">
    @yield('page')
    
    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="{{ URL::asset('/assets/js/jquery-2.1.4.min.js') }}"></script>

    <!-- <![endif]-->

    <!--[if IE]>
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="{{ URL::asset('/assets/js/bootstrap.min.js') }}"></script>

    <!-- page specific plugin scripts -->
    <!-- other -->
    @yield('scripts')
    
    <script>   
        jQuery(document).ready(function($) {
            $( ".message-tooltip" ).tooltip({
                show: {
                    effect: "slideDown",
                    delay: 250
                }
            });
        });
    </script>
    <!-- ace scripts -->
    <script src="{{ URL::asset('/assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/ace.min.js') }}"></script>

    <!-- inline scripts related to this page -->
</body>
<!--  /Body -->
</html>