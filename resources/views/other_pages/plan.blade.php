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
                <div class="investment-plan-wrapper">
                <h2 class="text-white text-center mb-5 mt-3">STANDARD INVESTMENT PLANS</h2>

                <div class="text-center investment-plan">
                    <div data-aos="fade-up"
                         data-aos-anchor-placement="center-bottom"
                         class="mb-3">
                        <div class="card">
                        <h3 class="lite card-title font-weight-bolder">LITE PLAN</h3>
                            <div class="card-body">
                                <h3 class=" card-title text-white font-weight-bolder ">20% ROI</h3>
                                <p class="stroke"></p>

                                <p class="card-text">Min Capital <span class="font-weight-bolder text-white ">50K</span>
                                </p>
                                <p class="card-text">Max Capital <span class="font-weight-bolder text-white">10M</span>
                                </p>
                                <p class="stroke"></p>
                                <p>Duration <br> <span class="text-white">2Months</span></p>
                                <!-- <a href="{{route('login')}}" class="btn reap-bg-orange-color text-white">Invest</a> -->
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up"
                         data-aos-anchor-placement="center-bottom"
                         class="mb-3">

                        <div class="card">
                        <h3 class=" classic font-weight-bolder" >CLASSIC PLAN</h3>

                        <div class="card-body">
                                <h3 class=" card-title font-weight-bolder text-white">30% ROI</h3>
                                <p class="stroke"></p>

                                <p class="card-text">Min Capital <span class="font-weight-bolder text-white">100K</span>
                                </p>
                                <p class="card-text">Max Capital <span class="font-weight-bolder text-white">10M</span>
                                </p>
                                <p class="stroke"></p>
                                <p>Duration <br> <span class="text-white">6 Weeks</span></p>
                                <!-- <a href="{{route('login')}}" class="btn reap-bg-orange-color text-white">Invest</a> -->
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up"
                         data-aos-anchor-placement="center-bottom" class="mb-3">
                        <div class="card">
                        <h3 class="premium card-title font-weight-bolder">PREMIUM PLAN</h3>
                        <div class="card-body">
                                <h3 class=" card-title font-weight-bolder text-white">40% ROI</h3>
                                <p class="stroke"></p>

                                <p class="card-text">Min Capital <span class="font-weight-bolder text-white">100K</span>
                                </p>
                                <p class="card-text">Max Capital <span class="font-weight-bolder text-white">10M</span>
                                </p>
                                <p class="stroke"></p>
                                <p>Duration <br> <span class="text-white">2 Months</span></p>
                                <!-- <a href="{{route('login')}}" class="btn reap-bg-orange-color text-white">Invest</a> -->
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up"
                         data-aos-anchor-placement="center-bottom" class="mb-3">
                        <div class="card">
                        <h3 class="elite card-title font-weight-bolder">ELITE PLAN</h3>
                        <div class="card-body">
                                <h3 class=" card-title font-weight-bolder text-white">100% ROI</h3>
                                <p class="stroke"></p>

                                <p class="card-text">Min Capital <span class="font-weight-bolder text-white">200K</span>
                                </p>
                                <p class="card-text">Max Capital <span class="font-weight-bolder text-white">20M</span>
                                </p>
                                <p class="stroke"></p>
                                <p>Duration <br> <span class="text-white">4 Months</span></p>
                                <!-- <a href="{{route('login')}}" class="btn reap-bg-orange-color text-white">Invest</a> -->
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
