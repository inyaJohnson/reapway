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
                            <table class="table table-striped table-hover withdrawal-history">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Requested on</th>
                                    <th>Proof of Payment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $withdrawals as $withdrawal)
                                    <tr>
                                        <td>{{$withdrawal->user->name}}</td>
                                        <td>{{$withdrawal->amount}}</td>
                                        <td>{{\Carbon\Carbon::parse($withdrawal->created_at)->addHour()->format('M d Y H:i')}}</td>
                                        <td>{{number_format($withdrawal->amount)}}</td>
                                        <td>
                                            @if($withdrawal->proof_of_payment !== null)
                                                <a class="btn btn-primary" rel="noreferrer noopener" target="_blank"
                                                   href="/store/{{$withdrawal->proof_of_payment}}"
                                                >View
                                                    File</a>
                                            @else
                                                No proof yet
                                            @endif
                                        </td>
                                        <td>
                                            @if($withdrawal->confirmation_status == 1)
                                                <span class="badge badge-success">Paid</span>
                                            @elseif($withdrawal->confirmation_status == 0)
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('admin-actions')
                                                <button class="btn btn-primary upload-withdrawal-payment-btn"
                                                        data-id="{{$withdrawal->id}}">Upload Proof
                                                </button>
                                            @endcan
                                            @can('client-actions')
                                                <button class="btn btn-primary confirm-withdrawal-btn"
                                                        data-id="{{$withdrawal->id}}">Confirm Payment
                                                </button>
                                            @endcan
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

        {{--        <div class="row small-screen">--}}
        {{--            <div class="col-lg-12 grid-margin stretch-card">--}}
        {{--                <div class="card">--}}
        {{--                    <div class="card-body">--}}
        {{--                        <h4 class="card-title">Withdrawal Request</h4>--}}
        {{--                        @foreach( $withdrawals as $withdrawal)--}}
        {{--                            <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">--}}
        {{--                                <div class="sale-box-inner">--}}
        {{--                                    <div class="sale-box-head">--}}
        {{--                                        <h4>{{$withdrawal->package->name}}</h4>--}}
        {{--                                    </div>--}}
        {{--                                    <ul class="sale-box-desc">--}}
        {{--                                        <li>--}}
        {{--                                            <strong>Amount - {{number_format($withdrawal->capital)}}</strong>--}}
        {{--                                            <span>ROI - #{{number_format((($withdrawal->capital * $withdrawal->package->percentage)/100) + $withdrawal->capital) }}@ {{$withdrawal->package->percentage}}% Profit</span>--}}
        {{--                                        </li>--}}
        {{--                                        <li>--}}
        {{--                                            <span>Profit #{{number_format(($withdrawal->capital * $withdrawal->package->percentage)/100)}}</span>--}}
        {{--                                        </li>--}}
        {{--                                        <li>--}}
        {{--                                            @switch($withdrawal)--}}
        {{--                                                @case($withdrawal->maturity == 1 && $withdrawal->withdrawn == 1)--}}
        {{--                                                <span class="badge badge-success"> Completed</span>--}}
        {{--                                                @break--}}
        {{--                                                @case($withdrawal->maturity == 1 && $withdrawal->withdrawn == 0)--}}
        {{--                                                <a href="{{route('withdrawal.withdraw', $withdrawal->id )}}"--}}
        {{--                                                   class="btn btn-warning withdraw"--}}
        {{--                                                   style="padding: 10px; font-size: 1em; border-radius: 5px; border:none; margin-top: 10px;">Withdraw--}}
        {{--                                                </a>--}}
        {{--                                                @break--}}
        {{--                                                @default <span class="badge badge-warning">In progress</span>--}}
        {{--                                            @endswitch--}}
        {{--                                        </li>--}}
        {{--                                        <li>--}}
        {{--                                            <span>Maturity Date - {{\Carbon\Carbon::parse($withdrawal->updated_at)->addHour()->addDay($withdrawal->package->duration)->format('M d Y H:i')}}</span>--}}
        {{--                                        </li>--}}
        {{--                                    </ul>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        @endforeach--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
    @include('withdrawal.upload_withdrawal_payment_proof')
@endsection
