<header>
    <!-- Navbar -->
    <nav class="fixed-top">
        <div class="container-fluid">
            <!-- Collapse -->
            <div class="main-logo">
                <a href="{{route('welcome')}}">
                    <img src="{{asset('frontend/img//Reapway Logo one (1).png')}}"/>
                </a>
            </div>

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
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">
        <a href="{{route('welcome')}}" class="logo-wrapper waves-effect">
            <img src="{{asset('frontend/img/Reapway Logo one (2).png')}}" class="img-fluid" alt="">
        </a>
        <div class="list-group list-group-flush">
            <a href="{{route('home')}}" class="list-group-item list-group-item-action  waves-effect">
                <i class="fas fa-chart-pie mr-2"></i>Dashboard
            </a>
            @include('layouts.dashboard_navigation.sidebar')
            <a href="{{route('logout')}}" class="list-group-item list-group-item-action waves-effect"
               style="color:#fff;"
               onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                <i class="fas fa-sign-out-alt mr-2"></i>Log Out</a>
            <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    <!-- Sidebar -->
</header>
