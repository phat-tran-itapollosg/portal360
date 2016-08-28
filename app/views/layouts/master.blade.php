<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<html>
    <head>
        <meta charset="utf-8">
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="{{ URL::asset('public/img/favicon_apollo.png') }}">

        <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ URL::asset('public/theme/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/theme/css/bootstrap-reset.css') }}" rel="stylesheet">
        <!--external css-->
        <link href="{{ URL::asset('public/theme/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />

          <!--right slidebar-->
          <link href="{{ URL::asset('public/theme/css/slidebars.css') }}" rel="stylesheet">

        <!-- Custom styles for this template -->

        <link href="{{ URL::asset('public/theme/css/style.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/theme/css/style-responsive.css" rel="stylesheet') }}" />


<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
        <!-- old
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $app_title }} - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
        <link rel="shortcut icon" href="{{ URL::asset('public/img/favicon_apollo.png') }}">
 1e1413e10f011dfebcc6b900cffce8e8da2906d0
        -->
        <!-- Vendor CSS -->
        <!-- old
 [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) |
        <link href="{{ URL::asset('public/vendors/bower_components/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">        
 1e1413e10f011dfebcc6b900cffce8e8da2906d0
        -->
        <!-- CSS -->
        <!-- old
 [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) |
        <link href="{{ URL::asset('public/vendors/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/css/app.min.1.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/css/app.min.2.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/css/styles.css') }}" rel="stylesheet">
 1e1413e10f011dfebcc6b900cffce8e8da2906d0
        -->
        <!-- Page specific styles -->
        

<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
        @yield('styles')
        
        <script type="text/javascript">
            var APP_URL = '{{ URL::to('/') }}';
            var locale = '{{ App::getLocale() }}';
            var Lang = {};  // Js language object
            var cal_date_format = '{{SugarUtil::getDateformat()}}';
            var cal_time_format = '{{SugarUtil::getTimeformat()}}';
        </script>
        
        {{ ViewUtil::renderJsLanguage('app') }}
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
    
    </head>
    <body lang="{{ App::getLocale() }}">
    <section id="container">
        @include('layouts.header')

        @include('layouts.sidebar')

        <section id="main-content">
            <section class="wrapper">
                @yield('content')
            </section>
        </section>
    </section>
            
    
         <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('public/theme/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('public/theme/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ URL::asset('public/theme/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ URL::asset('public/theme/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('public/theme/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('public/theme/js/respond.min.js') }}" ></script>

    <!--right slidebar-->
    <script src="{{ URL::asset('public/theme/js/slidebars.min.js') }}"></script>

    <!--common script for all pages-->
    <script src="{{ URL::asset('public/theme/js/common-scripts.js') }}"></script>

<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
        @yield('scripts')
    </body>
</html>