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
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="grey lighten-3 form">
                    <div>
                        <h5 class="text-center font-weight-bold">Make new deposit for investments</h5>
                        <hr/>
                    </div>
                    @include('layouts.message')
                    <!-- Default input name -->
                    <form method="POST" action="{{route('investment.store')}}">
                        @csrf
                        <input type="number" id="defaultFormCardNameEx" placeholder="Enter amount here" name="amount" required
                               value="{{old('amount')}}"
                               class="form-control">
                        <div class="py-4 mt-3">
                            <button class=" px-5 rounded invest_submit" type="button">Continue</button>
                        </div>
                    </form>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Packages</h4>
                            <div class="row">
                                @foreach($packages as $package)
                                    <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                        <div class="sale-box-inner">
                                            <div class="sale-box-head">
                                                <h4>{{$package->name}}</h4>
                                            </div>
                                            <ul class="sale-box-desc">
                                                <li>
                                                    <strong>Price Range </strong>
                                                    <span>#{{number_format($package->mini_price)}} - #{{number_format($package->max_price)}}</span>
                                                </li>
                                                <li>
                                                    <strong>Up to {{$package->percentage}}% ROI</strong>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
{{--                    <div class="grey lighten-3">--}}
{{--                        <h6 class="font-weight-bold my-4 p-4">Total to pay <span class="float-right">#250,000.00</span>--}}
{{--                        </h6>--}}
{{--                    </div>--}}
{{--                    <p class="text-black-50 ml-4">PAYMENT METHOD</p>--}}
{{--                    <div class="grey lighten-3 p-4">--}}
{{--                        <div class="custom-control custom-radio custom-control-inline ">--}}
{{--                            <input type="radio" class="custom-control-input" id="bank" name="bank">--}}
{{--                            <label class="custom-control-label" for="bank">Bank Transfer</label>--}}
{{--                        </div>--}}

{{--                        <div class="custom-control custom-radio custom-control-inline ">--}}
{{--                            <input type="radio" class="custom-control-input" id="others" name="others">--}}
{{--                            <label class="custom-control-label" for="others">Other transfer methods</label>--}}
{{--                        </div>--}}

{{--                    </div>--}}


{{--                    <div class="grey lighten-3 p-4 my-4 ">--}}
{{--                        <p class="text-center font-weight-bold">You are to make payment 0f #250,000.00 based on your--}}
{{--                            prefered mode of payment </p>--}}
{{--                        <hr/>--}}
{{--                        <div>--}}
{{--                            <p class="font-weight-bold">Account Number: 0909098887</p>--}}
{{--                            <p class="font-weight-bold">Account Name: Inya Johnson</p>--}}
{{--                            <p class="font-weight-bold">Bank: Gaurantee Trust Bank</p>--}}
{{--                            <p class="small">PS: Don't use "Investment", "Forex" or the likes as reference or--}}
{{--                                description. Thanks!</p>--}}
{{--                        </div>--}}
{{--                        <div class="upload mt-5">--}}
{{--                            <form>--}}
{{--                                <!-- <div class="form-group"> -->--}}
{{--                                <label for="exampleFormControlFile1">Upload Payment proof after payment.--}}
{{--                                </label>--}}
{{--                                <input type="file" class="form-control-file" id="exampleFormControlFile1">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="progress my-3">--}}
{{--                                            <div class="progress-bar" role="progressbar" style="width: 25%"--}}
{{--                                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <!-- </div> -->--}}
{{--                            </form>--}}
{{--                            <div>--}}
{{--                                <button class="px-5 rounded" type="submit">Submit</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
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

    </body>
