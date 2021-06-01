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
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/scroll/scrollable.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/colors/default.css') }}" id="colorSkinCSS">

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
            @include('includes.partials.announcements')
            @include('includes.partials.messages')
            @section('content')
            @endsection
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
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu.js') }}"></script>
<script src="{{ asset('assets/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/scroll/scrollable-custom.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

{{--<script src="{{ mix('js/manifest.js') }}"></script>--}}
{{--<script src="{{ mix('js/vendor.js') }}"></script>--}}
{{--<script src="{{ mix('js/backend.js') }}"></script>--}}
{{--<livewire:scripts />--}}
@stack('after-scripts')

</body>
</html>

