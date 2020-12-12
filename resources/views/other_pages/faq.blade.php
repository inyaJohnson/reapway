@extends('layouts.app')
@section('content')

    <body class="bg-white">
    <!--Main Navigation-->

    <div>
        @include('layouts.navigation')

    </div>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- <img src="..." class="d-block w-100" alt="..."> -->

                <header class=" home-header home-header1">
                    <!-- Navbar -->
                    <!-- Navbar -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8  col-lg-8 mx-auto d-block">
                                <h1 class="text-white text-center" data-aos="zoom-in">
                                    INVEST SMARTLY;<br> PROFIT GENEROUSLY
                                </h1>
                                <p class="mt-4 text-center" data-aos="fade-left" data-aos-anchor="#example-anchor"
                                   data-aos-offset="500"
                                   data-aos-duration="500">
                                    ReapWay offers you the easiest and most prudent ways to invest your capital and to
                                    get it back with ample returns.

                                </p>

                            {{--<p class="mt-4 text-center" data-aos="fade-left"--}}
                            {{--data-aos-anchor="#example-anchor"--}}
                            {{--data-aos-offset="500"--}}
                            {{--data-aos-duration="75000">--}}
                            {{--get it back with ample returns.--}}
                            {{--</p>--}}

                            <!-- <p class="mt-4" data-aos="fade-left"
                                   data-aos-anchor="#example-anchor"
                                   data-aos-offset="500"
                                   data-aos-duration="1000">
                                    We are experts at studying the financial
                                    market and placing accurate profit laden
                                    trades.
                                </p> -->
                                <div class="call-register text-center">
                                    <a href="{{route('register')}}">
                                        <button
                                                class="btn font-weight-bold btn-rounded mt-4 waves-effect px-5">
                                            Invest Now
                                        </button>
                                    </a>
                                </div>

                            </div>


                        </div>
                    </div>
                </header>
            </div>
            <div class="carousel-item">
                <!-- <img src="..." class="d-block w-100" alt="..."> -->
                <header class=" home-header home-header2">
                    <!-- Navbar -->
                    <!-- Navbar -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8  col-lg-8 mx-auto d-block">
                                <h1 class="text-white text-center" data-aos="zoom-in">
                                    LIVE FREE OF FINANCIAL WORRIES
                                </h1>
                                <p class="mt-4 text-center" data-aos="fade-left" data-aos-anchor="#example-anchor"
                                   data-aos-offset="500"
                                   data-aos-duration="500">
                                    Achieve lasting financial security by exploring the
                                </p>

                                <p class="mt-4 text-center" data-aos="fade-left"
                                   data-aos-anchor="#example-anchor"
                                   data-aos-offset="500"
                                   data-aos-duration="75000">
                                    optimum financial growth opportunities that we offer.
                                </p>

                                <!-- <p class="mt-4" data-aos="fade-left"
                                   data-aos-anchor="#example-anchor"
                                   data-aos-offset="500"
                                   data-aos-duration="1000">
                                    We are experts at studying the financial
                                    market and placing accurate profit laden
                                    trades.
                                </p> -->
                                <div class="text-center call-register">
                                    <a href="{{route('register')}}">
                                        <button
                                                class="btn font-weight-bold mt-4 waves-effect px-5">
                                            Get Started
                                        </button>
                                    </a>
                                </div>

                            </div>


                        </div>
                    </div>
                </header>
            </div>
            <div class="carousel-item">
                <!-- <img src="..." class="d-block w-100" alt="..."> -->
                <header class=" home-header home-header3">
                    <!-- Navbar -->
                    <!-- Navbar -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 mx-auto d-block">
                                <h1 class="text-white text-center" data-aos="zoom-in">
                                    LIVE IN THE PEAK AND EARN WITHOUT STRESS
                                </h1>
                                <p class="mt-4 text-center" data-aos="fade-left" data-aos-anchor="#example-anchor"
                                   data-aos-offset="500"
                                   data-aos-duration="500">
                                    With ReapWay, you can afford to have an optimal lifestyle
                                </p>

                                <p class="mt-4 text-center" data-aos="fade-left"
                                   data-aos-anchor="#example-anchor"
                                   data-aos-offset="500"
                                   data-aos-duration="75000">
                                    while your money goes to work for you.
                                </p>

                                <!-- <p class="mt-4" data-aos="fade-left"
                                   data-aos-anchor="#example-anchor"
                                   data-aos-offset="500"
                                   data-aos-duration="1000">
                                    We are experts at studying the financial
                                    market and placing accurate profit laden
                                    trades.
                                </p> -->
                                <div class="call-register">
                                    <a href="{{route('register')}}">
                                        <button
                                                class="btn font-weight-bold  mt-4 waves-effect px-5 mx-auto d-block">
                                            Begin Today
                                        </button>
                                    </a>
                                </div>

                            </div>


                        </div>
                    </div>
                </header>
            </div>
        </div>

        <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a> -->
    </div>
    <!--Main Navigation-->


    <!--Main layout-->
    <main class="">
        {{--<div id="how-it-works" class="">--}}
        {{--<div class="container-fluid">--}}
        {{--<div class="col-md-12">--}}
        {{--<h4 class="reap-color font-weight-bold text-center mb-4">--}}
        {{--HOW IT WORKS FOUR EASY WAY TO START--}}
        {{--</h4>--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-3">--}}
        {{--<div>--}}
        {{--<img src="{{asset('frontend/img/portfolio.png')}}" alt="">--}}
        {{--</div>--}}
        {{--<p class="text-center font-weight-bold mt-3">Register Account</p>--}}

        {{--</div>--}}
        {{--<div class="col-md-3">--}}
        {{--<div>--}}
        {{--<img src="{{asset('frontend/img/invest.png')}}" alt="">--}}
        {{--</div>--}}
        {{--<p class="text-center font-weight-bold mt-3">Invest</p>--}}

        {{--</div>--}}
        {{--<div class="col-md-3">--}}
        {{--<div>--}}
        {{--<img src="{{asset('frontend/img/time.png')}}" alt="">--}}
        {{--</div>--}}
        {{--<p class="text-center font-weight-bold mt-3">Wait for 25 working days</p>--}}

        {{--</div>--}}
        {{--<div class="col-md-3">--}}
        {{--<div>--}}
        {{--<img src="{{asset('frontend/img/analytics.png')}}" alt="">--}}
        {{--</div>--}}
        {{--<p class="text-center font-weight-bold mt-3">Reap your Investment</p>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div id="best-investment-plan">--}}
        {{--<div class="container-fluid">--}}
        {{--<div class="justify-content-md-center mt-5">--}}
        {{--<div>--}}
        {{--<h3 class="reap-color font-weight-bold text-center mt-3">Best Investment Plan!--}}
        {{--</h3>--}}
        {{--<p class="text-center">Best Investment Plan!--}}
        {{--ReapWay helps you invest and grow your money with the any--}}
        {{--suitable investment plan that you choose.--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="text-center investment-plan">--}}
        {{--<div data-aos="fade-up"--}}
        {{--data-aos-anchor-placement="center-bottom">--}}
        {{--<div class="card">--}}
        {{--<div class="card-body">--}}
        {{--<h1 class="card-title font-weight-bolder mt-4">GOLD</h1>--}}
        {{--<p class="stroke"></p>--}}
        {{--<h1 class="card-title font-weight-bolder reap-orange-color">25%</h1>--}}
        {{--<p class="card-text font-weight-bold">N2,000,000 (2M) <br> - <br>N10,000,000 <br>(10M)</p>--}}
        {{--<a href="{{route('login')}}" class="btn reap-bg-orange-color text-white">Invest</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div data-aos="fade-up"--}}
        {{--data-aos-anchor-placement="center-bottom">--}}
        {{--<div class="card">--}}
        {{--<div class="card-body">--}}
        {{--<h1 class="card-title font-weight-bolder mt-4">SILVER</h1>--}}
        {{--<p class="stroke"></p>--}}
        {{--<h1 class="card-title font-weight-bolder reap-color">25%</h1>--}}
        {{--<p class="card-text font-weight-bold">N500,000 (500k) <br> - <br>N1,950,000 <br> (1.9M)</p>--}}
        {{--<a href="{{route('login')}}" class="btn reap-bg-color text-white">Invest</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div data-aos="fade-up"--}}
        {{--data-aos-anchor-placement="center-bottom">--}}
        {{--<div class="card">--}}
        {{--<div class="card-body">--}}
        {{--<h1 class="card-title font-weight-bolder mt-4">BRONZE</h1>--}}
        {{--<p class="stroke"></p>--}}
        {{--<h1 class="card-title font-weight-bolder">15%</h1>--}}
        {{--<p class="card-text font-weight-bold">N20,000 (20k) <br> - <br>N45,000 <br>(45k)</p>--}}
        {{--<a href="{{route('login')}}" class="btn text-white" style="background-color: #222;">Invest</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="investment">
            <div class="justify-content-md-center mt-5 head-section">
                <div>
                    <h3 class="font-weight-bold text-center">Be Part Of Our Growing Community
                    </h3>
                    <p class="text-center">
                        Join the expanding generation of financially independent people that we are gradually raising to
                        take over Africa’s economic atmosphere.
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <img class="mx-auto my-5 d-block img-fluid"
                                 src="{{asset('frontend/img/Enjoy Unique Investment Cycles.jpg')}}"
                                 alt="investment-ima"/>
                            <h4 class="text-center font-weight-bold mt-5">Enjoy Unique Investment Cycles
                            </h4>
                            <p class="text-center">
                                Grow your wealth within the shortest time possible with our solid investment plans and
                                competitive returns on investments.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <img class="mx-auto my-5 d-block img-fluid"
                                 src="{{asset('frontend/img/Build According To Your Means.png')}}"
                                 alt="investment-ima"/>
                            <h4 class="text-center font-weight-bold mt-5">Build According To Your Means
                            </h4>
                            <p class="text-center">
                                Develop your finances from scratch with our client-friendly and affordable investment
                                plans for
                                everyone from all levels.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <img class="mx-auto my-5 d-block img-fluid"
                                 src="{{asset('frontend/img/Invest With The Assurance Of Security.png')}}"
                                 alt="investment-ima"/>
                            <h4 class="text-center mt-5 font-weight-bold">Invest With The Assured Security
                            </h4>
                            <p class="text-center">
                                Enjoy iron-clad guarantee on the safety of your investments and relax, knowing we have
                                your
                                back.
                            </p>
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <div class="investment">
            <div class="justify-content-md-center mt-5 head-section">
                <div>
                    <h3 class="font-weight-bold text-center">Start A Plan From Wherever You Are!
                    </h3>
                    <p class="text-center">With ReapWay, you can invest and earn from the comfort of your location. Our
                        investment process is tailored to match your convenience.
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <img class="mx-auto my-5 d-block img-fluid"
                                 src="{{asset('frontend/img/save1.jpeg')}}"
                                 alt="investment-ima"/>
                            <h4 class="text-center font-weight-bold my-5">Choose Where You Invest
                            </h4>
                            <p class="text-center">
                                You get to choose which of the available investment plans suits your desires and your
                                financial
                                growth goals.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <img class="mx-auto my-5 d-block img-fluid"
                                 src="{{asset('frontend/img/save3.jpeg')}}" alt="investment-ima"/>
                            <h4 class="text-center font-weight-bold my-5">Keep Track Of Your Investments
                            </h4>
                            <p class="text-center">
                                Effortlessly keep an eye on the growth of your investments from the ease of your unique
                                dashboard.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <img class="mx-auto my-5 d-block img-fluid"
                                 src="{{asset('frontend/img/save2.jpeg')}}" alt="investment-ima"/>
                            <h4 class="text-center font-weight-bold my-5">Decide How You Profit
                            </h4>
                            <p class="text-center">With our distinct withdrawal options, you can decide how you want to
                                process your returns on
                                investments.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-us-home">
            <div class="justify-content-md-center mt-5 head-section">
                <div>
                    <h5 class="text-center">About Us</h5>
                    <h1 class="font-weight-bold text-center">Company news
                    </h1>
                </div>
            </div>
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <h4 class="">Choose Where You Invest
                            </h4>
                            <h5 class="my-5">Feb 5,2020</h5>
                            <p class="">
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Suspendisse varius enim
                                in eros elementum tristique. Duis cursus,
                                mi quis viverra ornare, eros dolor
                                interdum nulla, ut commodo diam libero
                                vitae erat. Aenean faucibus nibh et justo
                                cursus id rutrum lorem imperdiet. Nunc
                                ut sem vitae risus tristique posuere.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="" data-aos="fade-up" data-aos-anchor-placement="top-center">

                            <h4 class="">Keep Track Of Your Investments
                            </h4>
                            <h5 class="my-5">Feb 5,2020</h5>

                            <p class="">
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Suspendisse varius enim
                                in eros elementum tristique. Duis cursus,
                                mi quis viverra ornare, eros dolor
                                interdum nulla, ut commodo diam libero
                                vitae erat. Aenean faucibus nibh et justo
                                cursus id rutrum lorem imperdiet. Nunc
                                ut sem vitae risus tristique posuere.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="" data-aos="fade-up" data-aos-anchor-placement="top-center">

                            <h4 class="">Decide How You Profit
                            </h4>
                            <h5 class="my-5">Feb 5,2020</h5>

                            <p class="">
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Suspendisse varius enim
                                in eros elementum tristique. Duis cursus,
                                mi quis viverra ornare, eros dolor
                                interdum nulla, ut commodo diam libero
                                vitae erat. Aenean faucibus nibh et justo
                                cursus id rutrum lorem imperdiet. Nunc
                                ut sem vitae risus tristique posuere.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- <div id="investor">
            <div class="container-fluid">
                <h3 class="title reap-color">Investors of the month</h3>
                <div class="investor">
                    <div class="investor-img">
                        <img src="{{asset('frontend/img/Mask Group 7.png')}}" alt=""/>
                    </div>
                    <div class="investor-story">
                        <p>
                            It has been an amazing journey investing
                            with ReapWay I must say. Once upon a time,
                            all I knew was to save in banks, got a lot of
                            unreasonable deductions. ReapWay got me
                            super enlightened, It curbed wasteful
                            spending
                        </p>
                        <h2 class="reap-color font-weight-bold">Damola</h2>
                        <h5 class="reap-color font-weight-bold">Artist</h5>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="about-us-home1">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 mx-auto d-block pt-5">
                                    <h1 class="text-center pt-5">Grow your business. </h1>
                                    <p class="text-center">
                                        Today is the day to build the business of your dreams. Share your mission
                                        with the world — and blow your customers away.
                                    </p>
                                    <button class="btn bg-dark text-white " style="height: 60px;">
                                        START NOW
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </main>
    <!--Main layout-->
    @endsection
    @section('footer')
        @include('layouts.footer')
    @endsection

    </body>
