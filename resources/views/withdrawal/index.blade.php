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
                        <h5 class="text-center font-weight-bold">Make new withdrawal request</h5>
                        <hr/>
                    </div>
                @include('layouts.message')
                <!-- Default input name -->
                    <div>
                        <h6 class="font-weight-bold">Current Balance is:
                            ₦ {{number_format(auth()->user()->actual_balance, 2)}}</h6>
                        <p class="font-weight-bold"> Use the form below to withdraw from your ReapWay account
                            instantly.</p>
                    </div>
                    <div>
                        <form method="POST" action="{{route('withdrawal.request')}}">
                            @csrf
                            <input type="number" id="amount" name="amount" placeholder="Enter amount here"
                                   value="{{old('amount')}}" class="form-control">
                            <div class="py-4 mt-3">
                                <button class="px-5 actual-withdrawal-btn" type="button">Withdraw Now</button>
                            </div>
                        </form>
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

    </body>
