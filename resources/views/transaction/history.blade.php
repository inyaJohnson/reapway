@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Transaction History</h2>
                            <p class="mb-md-0">List of all your transactions (Payment and Withdrawals).</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Transactions</p>
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
                        <ul class="nav nav-tabs px-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="deposit-history-tab" data-toggle="tab"
                                   href="#deposit-history"
                                   role="tab" aria-controls="deposit-history" aria-selected="true">Deposits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="withdrawal-history-tab" data-toggle="tab"
                                   href="#withdrawal-history"
                                   role="tab" aria-controls="withdrawal-history" aria-selected="true">Withdrawal</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="deposit-history" role="tabpanel"
                                 aria-labelledby="deposit-history-tab">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover investment-history">
                                            <thead>
                                            <tr>
                                                <th>Package</th>
                                                <th>Date Matched</th>
                                                <th>Amount</th>
                                                <th>Recipient's Info</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Proof of Payment</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($deposits as $deposit)
                                                <tr>
                                                    <td>{{$deposit->package->name}}</td>
                                                    <td>{{$deposit->created_at}}</td>
                                                    <td>{{number_format($deposit->amount)}}</td>
                                                    <td><a class="btn btn-primary view-recipient"
                                                           href="javascript:void(0)"
                                                           data-id={{$deposit->recipient_id}} data='{{$deposit->id}}'>View
                                                            Recipient</a></td>
                                                    <input value="{{$deposit->amount}}" id="amount{{$deposit->id}}"
                                                           type="hidden">
                                                    <td>
                                                        <button class="btn btn-primary confirm-deposit-btn"
                                                                data-id="{{$deposit->id}}">Confirm Payment
                                                        </button>
                                                    </td>
                                                    <td>
                                                        @if($deposit->recipient_status == 0)
                                                            <span class="text-danger">Pending</span>
                                                        @else
                                                            <span class="text-success">Completed</span>
                                                        @endif
                                                    </td>
                                                    <td><a class="btn btn-primary"
                                                           href="/rocket_pay/public/store/{{$deposit->proof_of_payment}}" download>Download
                                                            File</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            {{--                            Recipeint--}}
                            <div class="tab-pane fade show" id="withdrawal-history" role="tabpanel"
                                 aria-labelledby="withdrawal-history-tab">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover investment-history">
                                            <thead>
                                            <tr>
                                                <th>Package</th>
                                                <th>Date Matched</th>
                                                <th>Amount</th>
                                                <th>Depositor's Info</th>
                                                <th>Action</th>
                                                <th>Proof of Payment</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($withdrawals as $withdrawal)
                                                <tr>
                                                    <td>{{$withdrawal->package->name}}</td>
                                                    <td>{{$withdrawal->created_at}}</td>
                                                    <td>{{number_format($withdrawal->amount)}}</td>
                                                    <td><a class="btn btn-primary view-depositor" href="#"
                                                           data-id={{$withdrawal->depositor_id}} data='{{$withdrawal->id}}'>View
                                                            Depositor</a></td>
                                                    <input value="{{$withdrawal->amount}}"
                                                           id="amount{{$withdrawal->id}}" type="hidden">
                                                    <td>
                                                        <button class="btn btn-primary confirm-withrawal"
                                                                data-id="{{$withdrawal->id}}">Confirm Payment
                                                        </button>
                                                    </td>
                                                    <td><a class="btn btn-primary"
                                                           href="/rocket_pay/public/store/{{$withdrawal->proof_of_payment}}" download>Download
                                                            File</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>


        {{--        SMALL SCREEN --}}

        <div class="row small-screen">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 style="margin-bottom: 30px;">Deposit History</h4>
                            @foreach($deposits as $deposit)
                                <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                    <div class="sale-box-inner">
                                        <div class="sale-box-head">
                                            <h4>{{$deposit->package->name}}</h4>
                                        </div>
                                        <ul class="sale-box-desc">
                                            <li>
                                                <strong>Amount
                                                    - {{number_format($deposit->amount)}}</strong>
                                                <span>Matched on - {{$deposit->created_at->format('M d Y H:i')}}</span>
                                            </li>
                                            <li>
                                                <strong><a class="btn btn-primary view-recipient"
                                                           href="javascript:void(0)"
                                                           data-id={{$deposit->recipient_id}} data='{{$deposit->id}}'>View
                                                        Recipient</a></strong>
                                            </li>
                                            <li>
                                                <button class="btn btn-primary confirm-deposit-btn"
                                                        data-id="{{$deposit->id}}">Confirm Payment
                                                </button>
                                            </li>
                                            <li><a class="btn btn-link"
                                                   href="/rocket_pay/public/store/{{$deposit->proof_of_payment}}" download>Download
                                                    File</a>
                                            </li>
                                            <li>
                                                            <span> @if($deposit->recipient_status == 0)
                                                                    <span class="text-danger">Pending</span>
                                                                @else
                                                                    <span class="text-success">Completed</span>
                                                                @endif</span>
                                            </li>
                                            <input value="{{$deposit->amount}}" id="amount{{$deposit->id}}"
                                                   type="hidden">
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        {{--                            Recipeint--}}

                        <div>
                            <h4 style="margin-bottom: 30px;">Withdrawal History</h4>
                            @foreach($withdrawals as $withdrawal)
                                <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                    <div class="sale-box-inner">
                                        <div class="sale-box-head">
                                            <h4>{{$withdrawal->package->name}}</h4>
                                        </div>
                                        <ul class="sale-box-desc">
                                            <li>
                                                <strong>Amount -
                                                    #{{number_format($withdrawal->amount)}}</strong>
                                                <span>{{$withdrawal->created_at->format('M d Y H:i')}}</span>
                                            </li>
                                            <li>
                                                <strong><a class="btn btn-primary view-depositor" href="#"
                                                           data-id={{$withdrawal->depositor_id}} data='{{$withdrawal->id}}'>View
                                                        Depositor</a></strong>
                                                {{--                                                            <span>{{$investment->created_at}}</span>--}}
                                            </li>
                                            <li>
                                                <button class="btn btn-primary confirm-withrawal"
                                                        data-id="{{$withdrawal->id}}">Confirm Payment
                                                </button>
                                            </li>
                                            <li><a class="btn btn-link"
                                                   href="/rocket_pay/public/store/{{$withdrawal->proof_of_payment}}" download>Download
                                                    File</a>
                                            </li>
                                            <input value="{{$withdrawal->amount}}"
                                                   id="amount{{$withdrawal->id}}" type="hidden">
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
    @include('transaction.depositor-info')
    @include('transaction.recipient-info')
    @include('transaction.confirm-depositor')
@endsection
