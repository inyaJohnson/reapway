@extends('layouts.app')
@section('content')

    <body class="bg-white">
    <!--Main Navigation-->
    <header class="home-header">
        <!-- Navbar -->
    @include('layouts.navigation')
    <!-- Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5  col-lg-5">
                    <h1 class="text-white" data-aos="zoom-in">
                        The Best Way To
                        Invest Securely And
                        Profitably
                    </h1>
                    <p class="mt-4" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                       data-aos-duration="500">
                        We are experts at studying the financial
                        market and placing accurate profit laden
                        trades.
                    </p>

                    <p class="mt-4" data-aos="fade-left"
                       data-aos-anchor="#example-anchor"
                       data-aos-offset="500"
                       data-aos-duration="75000">
                        Earn 15% - 20% returns on investments
                        on Bronze and Silver plans respectively.
                    </p>

                    <p class="mt-4" data-aos="fade-left"
                       data-aos-anchor="#example-anchor"
                       data-aos-offset="500"
                       data-aos-duration="1000">
                        We are experts at studying the financial
                        market and placing accurate profit laden
                        trades.
                    </p>
                    <div class="call-register">
                        <a href="{{route('register')}}">
                            <button
                                    class="btn reap-bg-orange-color text-white font-weight-bold btn-rounded mt-4 waves-effect px-5 mx-auto d-block">
                                Get Started
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!--Main Navigation-->


    <!--Main layout-->
    <main class="">
        <div id="how-it-works" class="">
            <div class="container-fluid">
                <div class="col-md-12">
                    <h4 class="reap-color font-weight-bold text-center mb-4">
                        HOW IT WORKS FOUR EASY WAY TO START
                    </h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <img src="{{asset('frontend/img/portfolio.png')}}" alt="">
                            </div>
                            <p class="text-center font-weight-bold mt-3">Register Account</p>

                        </div>
                        <div class="col-md-3">
                            <div>
                                <img src="{{asset('frontend/img/invest.png')}}" alt="">
                            </div>
                            <p class="text-center font-weight-bold mt-3">Invest</p>

                        </div>
                        <div class="col-md-3">
                            <div>
                                <img src="{{asset('frontend/img/time.png')}}" alt="">
                            </div>
                            <p class="text-center font-weight-bold mt-3">Wait for 25 working days</p>

                        </div>
                        <div class="col-md-3">
                            <div>
                                <img src="{{asset('frontend/img/analytics.png')}}" alt="">
                            </div>
                            <p class="text-center font-weight-bold mt-3">Reap your Investment</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="best-investment-plan">
            <div class="container-fluid">
                <div class="justify-content-md-center mt-5">
                    <div>
                        <h3 class="reap-color font-weight-bold text-center mt-3">Best Investment Plan!
                        </h3>
                        <p class="text-center">Best Investment Plan!
                            ReapWay helps you invest and grow your money with the any
                            suitable investment plan that you choose.
                        </p>
                    </div>
                </div>
                <div class="text-center investment-plan">
                    <div data-aos="fade-up"
                         data-aos-anchor-placement="center-bottom">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title font-weight-bolder mt-4">GOLD</h1>
                                <p class="stroke"></p>
                                <h1 class="card-title font-weight-bolder reap-orange-color">25%</h1>
                                <p class="card-text font-weight-bold">N2,000,000 (2M) <br> - <br>N10,000,000 <br>(10M)</p>
                                <a href="{{route('login')}}" class="btn reap-bg-orange-color text-white">Invest</a>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up"
                         data-aos-anchor-placement="center-bottom">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title font-weight-bolder mt-4">SILVER</h1>
                                <p class="stroke"></p>
                                <h1 class="card-title font-weight-bolder reap-color">25%</h1>
                                <p class="card-text font-weight-bold">N500,000 (500k) <br> - <br>N1,950,000 <br> (1.9M)</p>
                                <a href="{{route('login')}}" class="btn reap-bg-color text-white">Invest</a>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up"
                         data-aos-anchor-placement="center-bottom">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title font-weight-bolder mt-4">BRONZE</h1>
                                <p class="stroke"></p>
                                <h1 class="card-title font-weight-bolder">15%</h1>
                                <p class="card-text font-weight-bold">N20,000 (20k) <br> - <br>N45,000 <br>(45k)</p>
                                <a href="{{route('login')}}" class="btn text-white" style="background-color: #222;">Invest</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="investment">
            <div class="justify-content-md-center mt-5">
                <div>
                    <h3 class="reap-color font-weight-bold text-center">Save smartly & responsibly!

                    </h3>
                    <p class="text-center">Best Investment Plan!
                        ReapWay helps you invest and grow your money with the any
                        suitable investment plan that you choose.
                    </p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-center">
                    <img class="mx-auto mt-5 d-block"
                         src="{{asset('frontend/img/undraw_personal_finance_tqcd.png')}}"
                         alt="investment-ima"/>
                    <h2 class="reap-color font-weight-bold">The smartest investment available
                    </h2>
                    <p>
                        ReapWay Investments helps you reach your Financial Goals within
                        the shortest time possible with the Competitive ROI we offer for
                        everyone of our Products and Services.
                    </p>
                </div>
                <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-center">
                    <img class="mx-auto mt-5 d-block"
                         src="{{asset('frontend/img/undraw_investment_xv9d.png')}}" alt="investment-ima"/>
                    <h2 class="reap-color font-weight-bold">Invest according to your means
                    </h2>
                    <p>
                        At ReapWay Investments, we believe in cutting coats according
                        to the body’s size. This is why we offer Clients-Friendly Investment
                        Plans for even the Minimum Wage Earner!
                    </p>
                </div>
                <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-center">
                    <img class="mx-auto mt-5 d-block"
                         src="{{asset('frontend/img/undraw_Security_on_ff2u.png')}}" alt="investment-ima"/>
                    <h2 class="reap-color font-weight-bold">Invest with assured security
                    </h2>
                    <p>ReapWay Investments promises you an iron-clad assurance on the
                        Security of your Investments. With us, you can invest and sleep soundly
                        knowing your money is safe.
                    </p>
                </div>
            </div>
        </div>
        <div id="investor">
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
        </div>
        <div id="customers">
            <div class="container-fluid">
                <h3 class="reap-color text-center my-3 pt-5" style="font-weight:900">What our customers are saying about
                    ReapWay</h3>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="customer-card" data-aos="fade-up" data-aos-duration="3000">
                            <div class="customer-card-content">
                                <p>
                                    It has been a gradual process. But little steps is the key. In
                                    the aspect of finance, Piggyvest has made that possible. It's a
                                    good feat to attain success in small strives. For me. It's great
                                </p>
                            </div>
                            <div class="customer-card-content">
                                <p class="reap-color"><i>Kafayat Bolanle</i></p>
                                <div class="spacer"></div>
                                <div><img src="{{asset('frontend/img/Mask Group 5.png')}}" class="" alt=""></div>
                            </div>
                        </div>

                        <div class="customer-card" data-aos="fade-up" data-aos-duration="3000">
                            <div class="customer-card-content">
                                <p>
                                    It has been a gradual process. But little steps is the key. In
                                    the aspect of finance, Piggyvest has made that possible. It's a
                                    good feat to attain success in small strives. For me. It's great
                                </p>
                            </div>
                            <div class="customer-card-content">
                                <p class="reap-color"><i>Kafayat Bolanle</i></p>
                                <div class="spacer"></div>
                                <div><img src="{{asset('frontend/img/Mask Group 5.png')}}" class="" alt=""></div>
                            </div>
                        </div>

                        <div class="customer-card" data-aos="fade-up" data-aos-duration="3000">
                            <div class="customer-card-content">
                                <p>
                                    It has been a gradual process. But little steps is the key. In
                                    the aspect of finance, Piggyvest has made that possible. It's a
                                    good feat to attain success in small strives. For me. It's great
                                </p>
                            </div>
                            <div class="customer-card-content">
                                <p class="reap-color"><i>Kafayat Bolanle</i></p>
                                <div class="spacer"></div>
                                <div><img src="{{asset('frontend/img/Mask Group 5.png')}}" class="" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="text-white reap-bg-color rounded d-block mx-auto">Read More</button>
            </div>
        </div>
        <div id="faq">
            <div class="container-fluid">
                <h3 class="reap-color text-center my-5" style="font-weight:900">Frequently Asked Questions (FAQ)</h3>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="font-weight-bold">What is ReapWay all about</span><span
                                            class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it
                                    squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica,
                                    craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                    synth
                                    nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                    <span class="font-weight-bold">How do I start investing with Reapway?</span><span
                                            class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it
                                    squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica,
                                    craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                    synth
                                    nesciunt you probably haven't heard of them accusamus labore sustainable VHS.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    <span class="font-weight-bold"> Who can save?</span><span class="float-right"><i
                                                class="fas fa-sort-down reap-color"></i></span>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it
                                    squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica,
                                    craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                    synth
                                    nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                    <span class="font-weight-bold"> What are the investing plan available?</span><span
                                            class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingfour"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it
                                    squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica,
                                    craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                    synth
                                    nesciunt you probably haven't heard of them accusamus labore sustainable VHS.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                    <span class="font-weight-bold"> How much can I start with?</span><span
                                            class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it
                                    squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica,
                                    craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                    synth
                                    nesciunt you probably haven't heard of them accusamus labore sustainable VHS.

                                </p>
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
