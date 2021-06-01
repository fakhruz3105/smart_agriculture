<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
        <a class="small_logo" href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/img/mini_logo.png') }}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <h4 class="menu-text"><span>MENU</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li>
            <a href="{{ route('admin.dashboard') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('assets/img/menu-icon/dashboard.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Dashboard</span>
                </div>
            </a>
        </li>
        @if($logged_in_user->hasAllAccess())
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('assets/img/menu-icon/5.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>System  Management </span>
                </div>
            </a>
            <ul>
                <li><a href="#"></a></li>
            </ul>
        </li>
        @endif
    </ul>
</nav>
