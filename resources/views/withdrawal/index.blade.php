@extends('layouts.app')
@section('css')
    <link href="{{asset('frontend/css/dashboard.css')}}" rel="stylesheet">
@endsection
@section('content')
    <body class="bg-white">

    <!--Main Navigation-->
    @include('layouts.dashboard_navigation.layout')
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5" id="withdraw">
        <div class="container-fluid">
            @can('admin-actions')
                @include('layouts.statistics')
            @endcan
            <div class="section-table mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h6 class="font-weight-bold">Current Balance is:
                                ₦ {{number_format(auth()->user()->actual_balance, 2)}}</h6>
                            <p class="font-weight-bold"> Use the form below to withdraw from your ReapWay account
                                instantly.</p>
                        </div>
                        <div>
                            <form class="">
                                <div class="form-group grey lighten-3">
                                    <input type="text" id="amount" placeholder="Enter mount here" class="form-control">

                                </div>
                            </form>
                        </div>

                        <div class="card-green">
                            <div class="row">
                                <div class="col-md-9">
                                    <h6 class="font-weight-bold">Confirm if you want your money to be sent to this
                                        Account</h6>
                                    <p class="font-weight-bold text-white font-weight-light">Gtbank * Okanlawon Sunday * 0223547059</p>
                                </div>

                                <div class="col-md-3">
                                    <button class="btn btn-light">Confirm</button>
                                </div>
                            </div>

                        </div>

                        <div>
                            <form class="">
                                <div class="form-group grey lighten-3 py-3">

                                    <input type="text" id="amount" placeholder="Enter Amount here" class="form-control">
                                </div>

                                <div class="form-group grey lighten-3">
                                    <input type="text" id="bank" placeholder="Select bank" class="form-control">
                                </div>

                                <div class="form-group grey lighten-3">
                                    <input type="text" id="amount" placeholder="Enter Account Number"
                                           class="form-control">
                                </div>

                                <div class="form-group   grey lighten-3">
                                    <div class="form-group-wrapper">
                                        <i class="fas fa-eye input-prefix"></i>
                                        <input type="text" id="amount" placeholder="Enter Password"
                                               class="form-control">
                                    </div>

                                </div>

                                <div>
                                    <button class="px-5" type="submit">WITHDRAW NOW</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>

    @endsection
    <!--Main layout-->
    <!--Footer-->
    @section('footer')
        @include('layouts.footer')
    @endsection
    <!--/.Footer-->

    </body>
