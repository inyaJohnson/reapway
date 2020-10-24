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
                    Home
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link waves-effect" href="{{route('about')}}">
                    About
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link waves-effect"
                   href="{{url('#best-investment-plan')}}">
                    Plans</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link waves-effect" href="{{url('#faq')}}">
                    FAQ</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link waves-effect" href="{{route('login')}}">
                    Log In</a>
            </li>

            <li class="nav-item">
                <a class="nav-link waves-effect bg-white btn reap-color hide-on-mobile"
                   style="color: green;" href="{{route('register')}}">
                    Create A Free Account</a>
            </li>
        </ul>
    </div>
</nav>
