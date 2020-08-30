@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Deposit To Make</h2>
                            <p class="mb-md-0">List of people to pay to.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Deposit To</p>
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
                        <h4 class="card-title">Deposits </h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover investment-history">
                                <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Date Matched</th>
                                    <th>Amount</th>
                                    <th>Recipient's Info</th>
                                    <th>Action</th>
                                    <th>Proof of Payment</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->package->name}}</td>
                                        <td>{{$transaction->created_at}}</td>
                                        <td>{{number_format($transaction->amount)}}</td>
                                        <td><a class="btn btn-primary view-recipient" href="javascript:void(0)"
                                               data-id={{$transaction->recipient_id}} data='{{$transaction->id}}'>View
                                                Recipient</a></td>
                                        <input value="{{$transaction->amount}}" id="amount{{$transaction->id}}"
                                               type="hidden">
                                        <td>
                                            <button class="btn btn-primary confirm-deposit-btn"
                                                    data-id="{{$transaction->id}}">Upload Proof
                                            </button>
                                        </td>
                                        <td>
                                            @if($transaction->proof_of_payment == null)
                                                No Proof Yet
                                            @else
                                                <a class="btn btn-primary"
                                                   href="/rocket_pay/public/store/{{$transaction->proof_of_payment}}" download>Download
                                                    File</a>
                                            @endif
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
                        <h4 class="card-title">Deposits </h4>
                        <div>
                            @foreach( $transactions as $transaction)
                                <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                    <div class="sale-box-inner">
                                        <div class="sale-box-head">
                                            <h4>{{$transaction->package->name}}</h4>
                                        </div>
                                        <ul class="sale-box-desc">
                                            <li>
                                                <strong>Amount - {{number_format($transaction->amount)}}</strong>
                                                <span>Matched on {{$transaction->created_at->format('M d Y H:i')}}</span>
                                            </li>
                                            <li>
                                                <strong><a class="btn btn-primary view-recipient"
                                                           href="javascript:void(0)"
                                                           data-id={{$transaction->recipient_id}} data='{{$transaction->id}}'>View
                                                        Recipient</a></strong>
                                                {{--                                                    <span>{{$investment->created_at}}</span>--}}
                                            </li>
                                            <li>
                                                <button class="btn btn-primary confirm-deposit-btn"
                                                        data-id="{{$transaction->id}}">Upload Proof
                                                </button>
                                            </li>
                                            <li> @if($transaction->proof_of_payment == null)
                                                    No Proof Yet
                                                @else
                                                    <a class="btn btn-primary"
                                                       href="/rocket_pay/public/store/{{$transaction->proof_of_payment}}" download>Download
                                                        File</a>
                                                @endif
                                            </li>
                                            <input value="{{$transaction->amount}}" id="amount{{$transaction->id}}"
                                                   type="hidden">
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
    @if($depositDeadline !== null)
        <input type="hidden" id="deposit-deadline" value="{{\Carbon\Carbon::parse($depositDeadline->deadline)}}">
    @else
        <input type="hidden" id="deposit-deadline" value="{{\Carbon\Carbon::parse(0)}}">
    @endif
    <div class="defaultCountdown"></div>
    @include('transaction.recipient-info')
    @include('transaction.confirm-depositor')
@endsection

