<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>

</head>

</html>


<!DOCTYPE html>
<html lang="zxx">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    @yield('meta')

    @stack('before-styles')


    <link rel="icon" href="{{ asset('assets/img/mini_logo.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/gijgo/gijgo.min.css') }}" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font_awesome/css/all.min.css') }}" />

    <!-- morris css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/morris/morris.css') }}">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/material_icon/material-icons.css') }}" />

    <!-- menu css  -->
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

{{--    <link href="{{ mix('css/backend.css') }}" rel="stylesheet">--}}
{{--    <livewire:styles />--}}
    @stack('after-styles')
</head>
<body class="crm_body_bg">
@include('backend.includes.sidebar')
<section class="main_content dashboard_part large_header_bg">
    @include('backend.includes.header')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
{{--            @include('includes.partials.announcements')--}}
            @include('includes.partials.messages')
            @yield('content')
        </div>
    </div>
    @include('backend.includes.footer')
</section>


<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

@stack('before-scripts')
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<!-- popper js -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<!-- bootstarp js -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- sidebar menu  -->
<script src="{{ asset('assets/js/metisMenu.js') }}"></script>
<!-- waypoints js -->
<script src="{{ asset('assets/vendors/count_up/jquery.waypoints.min.js') }}"></script>
<!-- waypoints js -->
<script src="{{ asset('assets/vendors/chartlist/Chart.min.js') }}"></script>
<!-- counterup js -->
<script src="{{ asset('assets/vendors/count_up/jquery.counterup.min.js') }}"></script>

<!-- nice select -->
<script src="{{ asset('assets/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>
<!-- owl carousel -->
<script src="{{ asset('assets/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>

<!-- responsive table -->
<script src="{{ asset('assets/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatable/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/vendors/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatable/js/buttons.print.min.js') }}"></script>

<script src="{{ asset('assets/js/chart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/chartjs/roundedBar.min.js') }}"></script>

<script src="{{ asset('assets/vendors/am_chart/amcharts.js') }}"></script>

<script src="{{ asset('assets/vendors/apex_chart/apex-chart2.js') }}"></script>
<script src="{{ asset('assets/vendors/echart/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendors/chart_am/core.js') }}"></script>
<script src="{{ asset('assets/vendors/chart_am/charts.js') }}"></script>
<script src="{{ asset('assets/vendors/chart_am/animated.js') }}"></script>
<script src="{{ asset('assets/vendors/chart_am/kelly.js') }}"></script>
<script src="{{ asset('assets/vendors/chart_am/chart-custom.js') }}"></script>
<!-- custom js -->
<script src="{{ asset('assets/js/dashboard_init.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

{{--<script src="{{ mix('js/manifest.js') }}"></script>--}}
{{--<script src="{{ mix('js/vendor.js') }}"></script>--}}
{{--<script src="{{ mix('js/backend.js') }}"></script>--}}
{{--<livewire:scripts />--}}
@stack('after-scripts')

</body>
</html>

