@extends("layouts.dashboard")
@section("main")
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="grey lighten-3 form">
                    <div>
                        <h5 class="text-center font-weight-bold">Make a reinvestment</h5>
                        <hr/>
                    </div>
                @include('layouts.message')
                <!-- Default input name -->
                    <div>
                        <h6 class="font-weight-bold">Current Balance is:
                            ₦ {{number_format(auth()->user()->actual_balance, 2)}}</h6>
                        <p class="font-weight-bold"> Use the form below to reinvest from your ReapWay account
                            instantly.</p>
                    </div>
                    <form method="POST" action="{{route('investment.store-reinvestment')}}">
                        @csrf
                        <input type="number" id="defaultFormCardNameEx" placeholder="Enter amount here" name="amount"
                               required
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
                                @if($packages->isEmpty())
                                    <div>Your balance can not afford any of the available packages</div>
                                @endif

                                @foreach($packages as $package)
                                    <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                        <div class="sale-box-inner">
                                            <div class="sale-box-head">
                                                <h4>{{$package->name}}</h4>
                                            </div>
                                            <ul class="sale-box-desc">
                                                <li>
                                                    <strong>Price Range </strong>
                                                    <span>#{{number_format($package->mini_price)}}
                                                        - #{{number_format($package->max_price)}}</span>
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
                </div>
            </div>
        </div>
    </main>
@endsection
<!--Main layout-->
