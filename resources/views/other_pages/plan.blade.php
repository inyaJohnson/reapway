@extends('layouts.app')
@section('content')

    <body class="bg-white">
    <!--Main Navigation-->

    <div>
        @include('layouts.navigation')
    </div>

    <!--Main layout-->
    <main class="" style="margin-top: 150px;">
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
                                <p class="card-text font-weight-bold">N2,000,000 (2M) <br> - <br>N10,000,000 <br>(10M)
                                </p>
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
                                <p class="card-text font-weight-bold">N500,000 (500k) <br> - <br>N1,950,000 <br> (1.9M)
                                </p>
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
    </main>
    <!--Main layout-->
    @endsection
    @section('footer')
        @include('layouts.footer')
    @endsection

    </body>
