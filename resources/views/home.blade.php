@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Welcome back,</h2>
                            <p class="mb-md-0">Your user dashboard and statistics.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Dashboard</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        @include('layouts.statistics')
        <div class="row ">
            <div class="col-md-6 grid-margin stretch-card" id="deposit-section">
                <div class="card">
                    <div class="card-body">
                        <div class="history-panel">
                            <div class="profile-panel-heading card-title">
                                Deposit Match
                            </div>
                            <div class="profile-panel-body">
                                @if(!$deposits->isEmpty())
                                    @foreach($deposits as $deposit)
                                        <div class="sale-box wow fadeInUp" data-wow-iteration="1">
                                            <div class="sale-box-inner">
                                                <div class="sale-box-head">
                                                    <h4>{{$deposit->package->name}}</h4>
                                                </div>
                                                <ul class="sale-box-desc">
                                                    <li>
                                                        <strong>Amount - {{number_format($deposit->amount)}}</strong>
                                                        <span>Matched on {{\Carbon\Carbon::parse($deposit->created_at)->addHour()->format('M d Y H:i')}}</span>
                                                    </li>
                                                    <li>
                                                        <strong><a class="btn btn-primary view-recipient"
                                                                   href="javascript:void(0)"
                                                                   data-id={{$deposit->recipient_id}} data='{{$deposit->id}}'>View
                                                                Recipient</a></strong>
                                                    </li>
                                                    <li>
                                                        <button class="btn btn-primary upload-payment-btn"
                                                                data-id="{{$deposit->id}}">Upload Proof
                                                        </button>
                                                    </li>
                                                    <li>
                                                        @if($deposit->proof_of_payment !== null)
                                                            <a class="btn btn-link"
                                                               href="/rocket_pay/public/store/{{$deposit->proof_of_payment}}"
                                                               download>Download
                                                                File</a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if($deposit->depositor_status == 1 && $deposit->recipicent_status == 0  )
                                                            <span class="text-danger">Awaiting Confirmation</span>
                                                        @elseif($deposit->depositor_status == 0)
                                                            <span class="text-waring">New</span>
                                                        @endif
                                                    </li>
                                                    <input value="{{$deposit->amount}}" id="amount{{$deposit->id}}"
                                                           type="hidden">
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="latest-investment">
                                        <div class="text-muted">Invest in any of our packages and start earning today...</div>
                                        <div>
                                            <a type="button" class="btn btn-primary"
                                               href="{{route('investment.invest')}}">Invest
                                                Now</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card" id="withrawal-section">
                <div class="card">
                    <div class="card-body">
                        <div class="history-panel">
                            <div class="profile-panel-heading card-title">Withdrawal Match
                            </div>
                            <div class="profile-panel-body">
                                @if(!$withdrawals->isEmpty())
                                    @foreach($withdrawals as $withdrawal)
                                        <div class="sale-box wow fadeInUp" data-wow-iteration="1">
                                            <div class="sale-box-inner">
                                                <div class="sale-box-head">
                                                    <h4>{{$withdrawal->package->name}}</h4>
                                                </div>
                                                <ul class="sale-box-desc">
                                                    <li>
                                                        <strong>Amount - {{number_format($withdrawal->amount)}}</strong>
                                                        <span>Matched on - {{\Carbon\Carbon::parse($withdrawal->created_at)->addHour()->format('M d Y  H:i')}}</span>
                                                    </li>
                                                    <li>
                                                        <strong><a class="btn btn-primary view-depositor" href="#"
                                                                   data-id={{$withdrawal->depositor_id}} data='{{$withdrawal->id}}'>View
                                                                Depositor</a></strong>

                                                    </li>
                                                    <li>
                                                        <button class="btn btn-primary confirm-withrawal"
                                                                data-id="{{$withdrawal->id}}">Confirm Payment
                                                        </button>
                                                    </li>
                                                    <li>
                                                        @if($withdrawal->proof_of_payment !== null)
                                                            <a class='btn btn-link'
                                                               href='/rocket_pay/public/store/{{$withdrawal->proof_of_payment}}'
                                                               download>Download File</a>
                                                        @endif
                                                    </li>
                                                    <input value="{{$withdrawal->amount}}"
                                                           id="amount{{$withdrawal->id}}"
                                                           type="hidden">
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="latest-investment">
                                        <div class="text-muted">Invest in any of our packages and start earning today...
                                            You are expected to recommit 100% your investment before profit withdrawal
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{--                <img src="{{asset('assets/images/banner-2.jpg')}}" alt="banner" height="200px"/>--}}
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->

    @include('home.recipient-info')
    @include('home.depositor-info')
@endsection
