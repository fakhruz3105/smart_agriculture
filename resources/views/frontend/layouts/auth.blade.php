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
    <link rel="stylesheet" href="{{ asset('assets/vendors/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/scroll/scrollable.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/colors/default.css') }}" id="colorSkinCSS">
</head>
<body class="crm_body_bg">

<section class="">
    <div class="m-lg-5">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>

{{--    @include('backend.includes.footer')--}}
</section>

<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/scroll/scrollable-custom.js') }}"></script>
</body>
</html>
