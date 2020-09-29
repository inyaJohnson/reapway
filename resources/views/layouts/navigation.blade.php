<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar fixed-top">
    <div class="container-fluid">

        <!-- Brand
        <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
          <strong class="blue-text">MDB</strong>
        </a> -->

        <!-- Collapse -->
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <a href="{{route('welcome')}}">
                <img src="{{asset('frontend/img//Reapway Logo one (1).png')}}" height="40px"/>
            </a>
        </button>


        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto hide-on-mobile">
                <li class="nav-item active ">
                    <!-- <h4 class="font-weight-bold text-black-50">Sunday</h4> -->
                    <a href="{{route('welcome')}}">
                        <img src="{{asset('frontend/img/Reapway Logo one (1).png')}}" height="60px"/>
                    </a>
                </li>

            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item mt-2">
                    <a class="nav-link waves-effect" style="color: green;" href="{{route('welcome')}}">
                        Home
                    </a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link waves-effect" style="color: green;" href="{{route('about')}}">
                        About
                    </a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link waves-effect" style="color: green;"
                       href="index.html#best-investment-plan">
                        Plans</a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link waves-effect" style="color: green;" href="index.html#investor"
                    >Testimonies</a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link waves-effect" style="color: green;" href="index.html#faq">
                        FAQ</a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link waves-effect" style="color: green;" href="{{route('login')}}">
                        Log in</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link waves-effect bg-white btn reap-color hide-on-mobile"
                       style="color: green;" href="{{route('register')}}">
                        Create A Free Account</a>
                </li>
            </ul>

        </div>

    </div>
</nav>
