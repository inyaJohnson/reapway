<!-- Navbar -->
<nav class="">
    <div class="container-fluid">
        <!-- Collapse -->
        <div class="main-logo">
            <a href="{{route('welcome')}}">
                <img src="{{asset('frontend/img//Reapway Logo one (1).png')}}"/>
            </a>
        </div>
        <ul class="navbar-nav mr-auto" style="margin-left: 130px;">
            <li class="nav-item active">
                <h4 class="hide-on-mobile">{{auth()->user()->name}}</h4>
                <small class="hide-on-mobile">Good Morning, Wash your Hands</small>
            </li>
        </ul>

        <div class="spacer"></div>

        <div class="custom-menu-btn">
            <div class="collapse-icon collapse-1"></div>
            <div class="collapse-icon collapse-2"></div>
            <div class="collapse-icon collapse-3"></div>
        </div>
        <!-- Links -->

        <ul class="nav-menu">
            <li class="nav-item mt-2">
                <a href="{{route('home')}}" class="nav-link waves-effect">
                    <i class="fas fa-chart-pie mr-2"></i>Dashboard
                </a>
            </li>
            @include('layouts.dashboard_navigation.nav')
            <li>
                <a href="{{route('logout')}}" class="nav-link waves-effect"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-3"></i>Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>

        <ul class="navbar-nav nav-flex-icons hide-on-mobile">

            <li class="nav-item">
                <a href="{{route('welcome')}}" class="nav-link border border-light rounded waves-effect"
                   target="_blank">
                    <img src="{{asset('frontend/img/Mask Group 6.png')}}" style="height:60px; width: 60px; object-fit: content;
                " class="img-fluid rounded-circle" alt="">
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- Navbar -->
