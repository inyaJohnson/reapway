@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Withdrawal</h2>
                            <p class="mb-md-0">Reinvest your previous capital to withdraw your profit.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Withdraw</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        @include('layouts.message')
        <div class="row big-screen">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Withdrawal Request</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover investment-history">
                                <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Price</th>
                                    <th>Percentage</th>
                                    <th>ROI</th>
                                    <th>Profit</th>
                                    <th>Maturity Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $investments as $investment)
                                    <tr>
                                        <td>{{$investment->package->name}}</td>
                                        <td>{{number_format($investment->package->price)}}</td>
                                        <td>{{$investment->percentage}}</td>
                                        <td>{{number_format((($investment->package->price * $investment->percentage)/100) + $investment->package->price) }}</td>
                                        <td>{{number_format($investment->profit)}}</td>
                                        <td>{{\Carbon\Carbon::parse($investment->updated_at)->addHour()->addDay($investment->package->duration)->format('M d Y H:i')}}</td>
                                        <td>
                                            @switch($investment)
                                                @case($investment->maturity == 1 && $investment->reinvest_btn == 0)
                                                <a href="{{route('investment.reinvest', $investment->id)}}"
                                                   class="btn btn-danger reinvest"
                                                   style="padding: 10px; font-size: 1em; border-radius: 5px; border:none; margin-top: 10px;">Reinvest
                                                </a>
                                                @break
                                                @case($investment->maturity == 1 && $investment->reinvest_btn == 1 && $investment->reinvest_commit_btn == 0)
                                                Awaiting confirmation of reinvestment
                                                @break
                                                @case($investment->maturity == 1 && $investment->reinvest_commit_btn ==1 && $investment->withdraw_btn == 0)
                                                <a href="{{route('investment.withdraw', $investment->id )}}"
                                                   class="btn btn-warning withdraw"
                                                   style="padding: 10px; font-size: 1em; border-radius: 5px; border:none; margin-top: 10px;">Withdraw
                                                </a>
                                                @break
                                                @case($investment->maturity == 1 && $investment->withdraw_btn == 1)
                                                Completed
                                                @break
                                                @default Not Matured for withdrawal
                                            @endswitch
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--        SMALL SCREEN--}}

        <div class="row small-screen">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Withdrawal Request</h4>
                        @foreach( $investments as $investment)
                            <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                <div class="sale-box-inner">
                                    <div class="sale-box-head">
                                        <h4>{{$investment->package->name}}</h4>
                                    </div>
                                    <ul class="sale-box-desc">
                                        <li>
                                            <strong>Amount - {{number_format($investment->package->price)}}</strong>
                                            <span>ROI - #{{number_format((($investment->package->price * $investment->percentage)/100) + $investment->package->price) }}@ {{$investment->percentage}}% Profit</span>
                                        </li>
                                        <li>
                                            <strong>100% Recommitment</strong>
                                            <span>Profit #{{number_format($investment->profit)}}</span>
                                        </li>
                                        <li>
                                            @switch($investment)
                                                @case($investment->maturity == 1 && $investment->reinvest_btn == 0)
                                                <a href="{{route('investment.reinvest', $investment->id)}}"
                                                   class="btn btn-danger reinvest"
                                                   style="padding: 10px; font-size: 1em; border-radius: 5px; border:none; margin-top: 10px;">Reinvest
                                                </a>
                                                @break
                                                @case($investment->maturity == 1 && $investment->reinvest_btn == 1 && $investment->reinvest_commit_btn == 0)
                                                Awaiting confirmation of reinvestment
                                                @break
                                                @case($investment->maturity == 1 && $investment->reinvest_commit_btn ==1 && $investment->withdraw_btn == 0)
                                                <a href="{{route('investment.withdraw', $investment->id )}}"
                                                   class="btn btn-warning withdraw"
                                                   style="padding: 10px; font-size: 1em; border-radius: 5px; border:none; margin-top: 10px;">Withdraw
                                                </a>
                                                @break
                                                @case($investment->maturity == 1 && $investment->withdraw_btn == 1)
                                                Completed
                                                @break
                                                @default Not Matured for withdrawal
                                            @endswitch
                                        </li>
                                        <li>
                                            <span>Maturity Date - {{\Carbon\Carbon::parse($investment->updated_at)->addHour()->addDay($investment->package->duration)->format('M d Y H:i')}}</span>
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
@endsection
