<!DOCTYPE html>
<html lang="zxx">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ env('APP_NAME') }}</title>

    <link rel="icon" href="{{ asset('assets/img/mini_logo.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/themefy_icon/themify-icons.css') }}" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/niceselect/css/nice-select.css') }}" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl_carousel/css/owl.carousel.css') }}" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/gijgo/gijgo.min.css') }}" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/tagsinput/tagsinput.css') }}" />

    <!-- date picker -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datepicker/date-picker.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/vectormap-home/vectormap-2.0.2.css') }}" />

    <!-- scrollabe  -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/scroll/scrollable.css') }}" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/buttons.dataTables.min.css') }}" />
    <!-- text editor css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/text_editor/summernote-bs4.css') }}" />
    <!-- morris css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/morris/morris.css') }}">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/material_icon/material-icons.css') }}" />

    <!-- menu css  -->
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/colors/default.css') }}" id="colorSkinCSS">
</head>
<body class="crm_body_bg">

<section class="">
    <div class="m-5">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                @yield('content')
                <div class="col-xl-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Analytic</h3>
                                </div>
                                <div class="float-lg-right float-none common_tab_btn justify-content-end">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ route('frontend.auth.login') }}">{{ __('Login') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div id="marketchart"></div>
                                </div>
                                <div class="col-md-6">
                                    <div id="chart-currently"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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

<!-- datepicker  -->
<script src="{{ asset('assets/vendors/datepicker/datepicker.js') }}"></script>
<script src="{{ asset('assets/vendors/datepicker/datepicker.en.js') }}"></script>
<script src="{{ asset('assets/vendors/datepicker/datepicker.custom.js') }}"></script>

<script src="{{ asset('assets/js/chart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/chartjs/roundedBar.min.js') }}"></script>

<!-- progressbar js -->
<script src="{{ asset('assets/vendors/progressbar/jquery.barfiller.js') }}"></script>
<!-- tag input -->
<script src="{{ asset('assets/vendors/tagsinput/tagsinput.js') }}"></script>
<!-- text editor js -->
<script src="{{ asset('assets/vendors/text_editor/summernote-bs4.js') }}"></script>
<script src="{{ asset('assets/vendors/am_chart/amcharts.js') }}"></script>

<!-- scrollabe  -->
<script src="{{ asset('assets/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/scroll/scrollable-custom.js') }}"></script>

<!-- vector map  -->
<script src="{{ asset('assets/vendors/vectormap-home/vectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/vendors/vectormap-home/vectormap-world-mill-en.js') }}"></script>

<!-- apex chrat  -->
<script src="{{ asset('assets/vendors/apex_chart/apex-chart2.js') }}"></script>
<script src="{{ asset('assets/vendors/apex_chart/apex_dashboard.js') }}"></script>

<script src="{{ asset('assets/vendors/echart/echarts.min.js') }}"></script>


<script src="{{ asset('assets/vendors/chart_am/core.js') }}"></script>
<script src="{{ asset('assets/vendors/chart_am/charts.js') }}"></script>
<script src="{{ asset('assets/vendors/chart_am/animated.js') }}"></script>
<script src="{{ asset('assets/vendors/chart_am/kelly.js') }}"></script>
<script src="{{ asset('assets/vendors/chart_am/chart-custom.js') }}"></script>
<!-- custom js -->
<script src="{{ asset('assets/js/dashboard_init.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>
