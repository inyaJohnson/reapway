<header >
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">
            <!-- Brand
            <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
              <strong class="blue-text">MDB</strong>
            </a> -->
            <!-- Collapse -->
            <a href="{{route('welcome')}}">
                <img src="{{asset('frontend/img/Reapway Logo one (1).png')}}" class="mr-auto mobile-menu"
                     style="height: 30px;"/>
            </a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <h4 class="hide-on-mobile">{{auth()->user()->name}}</h4>
                        <small class="hide-on-mobile">Good Morning, Wash your Hands</small>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto mobile-menu">
                    <div class="list-group list-group-flush">
                        <a href="{{route('home')}}" class="list-group-item active text-dark waves-effect">
                            <i class="fas fa-chart-pie mr-2"></i>Dashboard
                        </a>
                        @can('client-actions')
                            @include('layouts.dashboard_navigation.user')
                        @endcan
                        @can('admin-actions')
                            @include('layouts.dashboard_navigation.admin')
                        @endcan
                        <a href="{{route('logout')}}" class="list-group-item list-group-item-action waves-effect  my-3"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-3"></i>Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </ul>
                <!-- Right -->
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
            @can('client-actions')
                @include('layouts.dashboard_navigation.user')
            @endcan
            @can('admin-actions')
                @include('layouts.dashboard_navigation.admin')
            @endcan
            <a href="{{route('logout')}}" class="list-group-item list-group-item-action waves-effect  my-3"
               style="color:#fff;"
               onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                <i class="fas fa-sign-out-alt mr-3"></i>Log Out</a>
            <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    <!-- Sidebar -->
</header>
