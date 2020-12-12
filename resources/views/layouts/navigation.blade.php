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
                <a class="nav-link waves-effect" href="{{route('welcome')}}">
                    HOME
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link waves-effect" href="{{route('about')}}">
                    ABOUT
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link waves-effect"
                   href="{{route('plans')}}">
                    PLAN</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link waves-effect" href="{{route('login')}}">
                    LOGIN</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link waves-effect" href="{{route('faq')}}">
                    FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect btn btn-dark  hide-on-mobile"
                   style="color: white !important;" href="{{url('#contact')}}">
                    CONTACT US</a>
            </li>
        </ul>
    </div>
</nav>
