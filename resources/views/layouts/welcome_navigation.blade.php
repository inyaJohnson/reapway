<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar fixed-top">
    <!-- Brand
    <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
      <strong class="blue-text">MDB</strong>
    </a> -->

    <!-- Collapse -->
    <div class="navbar-toggler custom-toggler">
        <a href="{{route('welcome')}}">
            <img src="{{asset('frontend/img//Reapway Logo one (1).png')}}" height="40px"/>
        </a>
    </div>

    <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto hide-on-mobile mt-2 desktop-img">
            <li class="nav-item active ">
                <!-- <h4 class="font-weight-bold text-black-50">Sunday</h4> -->
                <a href="{{route('welcome')}}">
                    <img src="{{asset('frontend/img/Reapway Logo one (1).png')}}" height="60px"/>

                </a>
            </li>

        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons ">
            <li class="nav-item mt-2">
                <a class="nav-link waves-effect " href="{{route('welcome')}}">
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
                <a class="nav-link waves-effect" href="{{url('#investor')}}"
                >Testimonies</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link waves-effect" href="{{url('#faq')}}">
                    FAQ</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link waves-effect" href="{{route('login')}}">
                    Log in</a>
            </li>

            <li class="nav-item">
                <a class="nav-link waves-effect bg-white btn reap-color hide-on-mobile"
                   style="color: green;" href="{{route('register')}}">
                    Create A Free Account</a>
            </li>
        </ul>

    </div>
</nav>
