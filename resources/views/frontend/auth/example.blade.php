<!DOCTYPE html>
<html lang="zxx">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ env('APP_NAME') }}</title>

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


<!-- sidebar  -->
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index.html"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
        <a class="small_logo" href="index.html"><img src="{{ asset('assets/img/mini_logo.png') }}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li>
            <a href="index.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('assets/img/menu-icon/dashboard.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Analytic</span>
                </div>
            </a>
        </li>
        <li>
            <a href="index_2.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('assets/img/menu-icon/2.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Default </span>
                </div>
            </a>
        </li>
        <li>
            <a href="index_3.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('assets/img/menu-icon/3.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Dark </span>
                </div>
            </a>
        </li>
        <h4 class="menu-text"><span>CUSTOM</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('assets/img/menu-icon/5.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Application </span>
                </div>
            </a>
            <ul>
                <li><a href="editor.html">editor</a></li>
                <li><a href="mail_box.html">Mail Box</a></li>
                <li><a href="chat.html">Chat</a></li>
                <li><a href="faq.html">FAQ</a></li>
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('assets/img/menu-icon/16.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Pages</span>
                </div>
            </a>
            <ul>
                <li><a href="login.html">Login</a></li>
                <li><a href="resister.html">Register</a></li>
                <li><a href="error_400.html">Error 404</a></li>
                <li><a href="error_500.html">Error 500</a></li>
                <li><a href="forgot_pass.html">Forgot Password</a></li>
                <li><a href="gallery.html">Gallery</a></li>
            </ul>
        </li>

        <h4 class="menu-text"><span>LAYOUT</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a  class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('assets/img/menu-icon/4.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Themes</span>
                </div>
            </a>
            <ul>
                <li><a href="dark_sidebar.html">Dark Sidebar</a></li>
                <li><a href="light_sidebar.html">light Sidebar</a></li>
            </ul>
        </li>
        <li class="">
            <a  class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/16.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>General</span>
                </div>
            </a>
            <ul>
                <li><a href="Minimized_Aside.html">Minimized Aside</a></li>
                <li><a href="empty_page.html">Empty page</a></li>
                <li><a href="fixed_footer.html">Fixed Footer</a></li>
            </ul>
        </li>
        <li>
            <a href="Builder.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/2.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Builder </span>
                </div>
            </a>
        </li>

        <h4 class="menu-text"><span>Elements</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a  href="invoice.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/6.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Invoice</span>
                </div>
            </a>
        </li>
        <li class="">
            <a  class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/4.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>forms</span>
                </div>
            </a>
            <ul>
                <li><a href="Basic_Elements.html">Basic Elements</a></li>
                <li><a href="Groups.html">Groups</a></li>
                <li><a href="Max_Length.html">Max Length</a></li>
                <li><a href="Layouts.html">Layouts</a></li>
            </ul>
        </li>
        <li class="">
            <a href="Board.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/5.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Board</span>
                </div>
            </a>
        </li>
        <li class="">
            <a  href="calender.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/7.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Calander</span>
                </div>
            </a>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/8.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Products</span>
                </div>
            </a>
            <ul>
                <li><a href="Products.html">Products</a></li>
                <li><a href="Product_Details.html">Product Details</a></li>
                <li><a href="Cart.html">Cart</a></li>
                <li><a href="Checkout.html">Checkout</a></li>
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/9.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Icons</span>
                </div>
            </a>
            <ul>
                <li><a href="Fontawesome_Icon.html">Fontawesome Icon</a></li>
                <li><a href="themefy_icon.html">themefy icon</a></li>
            </ul>
        </li>
        <h4 class="menu-text"><span>Features</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/8.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Animations</span>
                </div>
            </a>
            <ul>
                <li><a href="wow_animation.html">Animate</a></li>
                <li><a href="Scroll_Reveal.html">Scroll Reveal</a></li>
                <li><a href="tilt.html">Tilt Animation</a></li>

            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/9.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Components</span>
                </div>
            </a>
            <ul>
                <li><a href="accordion.html">Accordions</a></li>
                <li><a href="Scrollable.html">Scrollable</a></li>
                <li><a href="notification.html">Notifications</a></li>
                <li><a href="carousel.html">Carousel</a></li>
                <li><a href="Pagination.html">Pagination</a></li>
            </ul>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/11.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Table</span>
                </div>
            </a>
            <ul>
                <li><a href="data_table.html">Data Tables</a></li>
                <li><a href="bootstrap_table.html">Bootstrap</a></li>
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/12.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Cards</span>
                </div>
            </a>
            <ul>
                <li><a href="basic_card.html">Basic Card</a></li>
                <li><a href="theme_card.html">Theme Card</a></li>
                <li><a href="dargable_card.html">Draggable Card</a></li>
            </ul>
        </li>


        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/12.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Charts</span>
                </div>
            </a>
            <ul>
                <li><a href="chartjs.html">ChartJS</a></li>
                <li><a href="apex_chart.html">Apex Charts</a></li>
                <li><a href="chart_sparkline.html">Chart sparkline</a></li>
                <li><a href="am_chart.html">am-charts</a></li>
                <li><a href="nvd3_charts.html">nvd3 charts.</a></li>
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/3.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>UI Kits </span>
                </div>
            </a>
            <ul>
                <li><a href="colors.html">colors</a></li>
                <li><a href="Alerts.html">Alerts</a></li>
                <li><a href="buttons.html">Buttons</a></li>
                <li><a href="modal.html">modal</a></li>
                <li><a href="dropdown.html">Droopdowns</a></li>
                <li><a href="Badges.html">Badges</a></li>
                <li><a href="Loading_Indicators.html">Loading Indicators</a></li>
                <li><a href="State_color.html">State color</a></li>
                <li><a href="typography.html">Typography</a></li>
                <li><a href="datepicker.html">Date Picker</a></li>
            </ul>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/14.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Widgets</span>
                </div>
            </a>
            <ul>
                <li><a href="chart_box_1.html">Chart Boxes 1</a></li>
                <li><a href="profilebox.html">Profile Box</a></li>
            </ul>
        </li>


        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="img/menu-icon/15.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Maps</span>
                </div>
            </a>
            <ul>
                <li><a href="mapjs.html">Maps JS</a></li>
                <li><a href="vector_map.html">Vector Maps</a></li>
            </ul>
        </li>


    </ul>
</nav>
<!--/ sidebar  -->


<section class="main_content dashboard_part large_header_bg">
    <!-- menu  -->
    <div class="container-fluid no-gutters">
        <div class="row">
            <div class="col-lg-12 p-0 ">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <label class="switch_toggle d-none d-lg-block" for="checkbox">
                        <input type="checkbox" id="checkbox">
                        <div class="slider round open_miniSide"></div>
                    </label>

                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">
                            <li>
                                <div class="serach_button">
                                    <i class="ti-search"></i>
                                    <div class="serach_field-area d-flex align-items-center">
                                        <div class="search_inner">
                                            <form action="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Search here..." >
                                                </div>
                                                <button class="close_search"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                        <span class="f_s_14 f_w_400 ml_25 white_text text_white" >Apps</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="bell_notification_clicker" href="#"> <img src="img/icon/bell.svg" alt="">
                                    <span>2</span>
                                </a>
                                <!-- Menu_NOtification_Wrap  -->
                                <div class="Menu_NOtification_Wrap">
                                    <div class="notification_Header">
                                        <h4>Notifications</h4>
                                    </div>
                                    <div class="Notification_body">
                                        <!-- single_notify  -->
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_thumb">
                                                <a href="#"><img src="img/staf/2.png" alt=""></a>
                                            </div>
                                            <div class="notify_content">
                                                <a href="#"><h5>Cool Marketing </h5></a>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                        <!-- single_notify  -->
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_thumb">
                                                <a href="#"><img src="img/staf/4.png" alt=""></a>
                                            </div>
                                            <div class="notify_content">
                                                <a href="#"><h5>Awesome packages</h5></a>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                        <!-- single_notify  -->
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_thumb">
                                                <a href="#"><img src="img/staf/3.png" alt=""></a>
                                            </div>
                                            <div class="notify_content">
                                                <a href="#"><h5>what a packages</h5></a>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                        <!-- single_notify  -->
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_thumb">
                                                <a href="#"><img src="img/staf/2.png" alt=""></a>
                                            </div>
                                            <div class="notify_content">
                                                <a href="#"><h5>Cool Marketing </h5></a>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                        <!-- single_notify  -->
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_thumb">
                                                <a href="#"><img src="img/staf/4.png" alt=""></a>
                                            </div>
                                            <div class="notify_content">
                                                <a href="#"><h5>Awesome packages</h5></a>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                        <!-- single_notify  -->
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_thumb">
                                                <a href="#"><img src="img/staf/3.png" alt=""></a>
                                            </div>
                                            <div class="notify_content">
                                                <a href="#"><h5>what a packages</h5></a>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nofity_footer">
                                        <div class="submit_button text-center pt_20">
                                            <a href="#" class="btn_1">See More</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Menu_NOtification_Wrap  -->
                            </li>
                            <li>
                                <a class="CHATBOX_open" href="#"> <img src="img/icon/msg.svg" alt=""> <span>2</span>  </a>
                            </li>
                        </div>
                        <div class="profile_info">
                            <img src="img/client_img.png" alt="#">
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <p>Neurologist </p>
                                    <h5>Dr. Robar Smith</h5>
                                </div>
                                <div class="profile_info_details">
                                    <a href="#">My Profile </a>
                                    <a href="#">Settings</a>
                                    <a href="#">Log Out </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ menu  -->
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="dashboard_header mb_50">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dashboard_header_title">
                                    <h3> Default Dashboard</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dashboard_breadcam text-right">
                                    <p><a href="index.html">Dashboard</a> <i class="fas fa-caret-right"></i> login</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row justify-content-center">

                            <div class="col-lg-6">
                                <!-- sign_in  -->
                                <div class="modal-content cs_modal">
                                    <div class="modal-header justify-content-center theme_bg_1">
                                        <h5 class="modal-title text_white">Log in</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter your email">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password">
                                            </div>
                                            <a href="#" class="btn_1 full_width text-center">Log in</a>
                                            <p>Need an account? <a data-toggle="modal" data-target="#sing_up" data-dismiss="modal"  href="#"> Sign Up</a></p>
                                            <div class="text-center">
                                                <a href="#" data-toggle="modal" data-target="#forgot_password" data-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer part -->
    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> DashboardPack</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu.js') }}"></script>
<script src="{{ asset('assets/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/scroll/scrollable-custom.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
