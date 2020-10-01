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
                                           role="tab" aria-controls="withdrawal-history"
                                           aria-selected="true">Withdrawal</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="deposit-history" role="tabpanel"
                                         aria-labelledby="deposit-history-tab">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover data-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Package</th>
                                                        <th>Date Matched</th>
                                                        <th>Amount</th>
                                                        <th>Recipient</th>
                                                        {{--                                                <th>Action</th>--}}
                                                        <th>Proof of Payment</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($deposits as $deposit)
                                                        <tr>
                                                            <td>{{$deposit->package->name}}</td>
                                                            <td>{{\Carbon\Carbon::parse($deposit->created_at)->addHour()->format('M d Y H:i')}}</td>
                                                            <td>{{number_format($deposit->amount)}}</td>
                                                            <td>{{$deposit->recipient->name}}</td>
                                                            {{--                                                    <td><a class="btn btn-primary view-recipient"--}}
                                                            {{--                                                           href={!! '/report/create/'.$hashIds->encode($deposit->recipient_id).'/'.$deposit->id !!}>Report</a>--}}
                                                            {{--                                                    </td>--}}
                                                            <td>
                                                                @if($withdrawal->proof_of_payment !== null)
                                                                    <a class="btn btn-primary"
                                                                       href="/reapway/public/store/{{$deposit->proof_of_payment}}"
                                                                       download>Download
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


                                    {{--                            Recipeint--}}
                                    <div class="tab-pane fade show" id="withdrawal-history" role="tabpanel"
                                         aria-labelledby="withdrawal-history-tab">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover data-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Package</th>
                                                        <th>Date Matched</th>
                                                        <th>Amount</th>
                                                        <th>Depositor</th>
                                                        {{--                                                <th>Action</th>--}}
                                                        <th>Proof of Payment</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($withdrawals as $withdrawal)
                                                        <tr>
                                                            <td>{{$withdrawal->package->name}}</td>
                                                            <td>{{\Carbon\Carbon::parse($withdrawal->created_at)->addHour()->format('M d Y H:i')}}</td>
                                                            <td>{{number_format($withdrawal->amount)}}</td>
                                                            <td>{{$withdrawal->depositor->name}}</td>
                                                            {{--                                                    <td><a class="btn btn-primary view-recipient"--}}
                                                            {{--                                                           href={!! '/report/create/'.$hashIds->encode($withdrawal->depositor_id).'/'.$withdrawal->id !!}>Report</a>--}}
                                                            {{--                                                    </td>--}}
                                                            <td>
                                                                @if($withdrawal->proof_of_payment !== null)
                                                                    <a class='btn btn-link'
                                                                       href='/reapway/public/store/{{$withdrawal->proof_of_payment}}'
                                                                       download>Download File</a>
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
                        </div>
                    </div>
                </div>
                {{--        SMALL SCREEN --}}
                <div class="row small-screen">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="history-panel">
                                        <div class="profile-panel-heading card-title">
                                            Deposit History
                                        </div>
                                        <div class="profile-panel-body">
                                            @foreach($deposits as $deposit)
                                                <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                                    <div class="sale-box-inner">
                                                        <div class="sale-box-head">
                                                            <h4>{{$deposit->package->name}}</h4>
                                                        </div>
                                                        <ul class="sale-box-desc">
                                                            <li>
                                                                <strong>Recipient
                                                                    - {{$deposit->recipient->name}}</strong>
                                                            </li>
                                                            <li>
                                                                <strong>Amount
                                                                    - {{number_format($deposit->amount)}}</strong>
                                                                <span>Matched on - {{\Carbon\Carbon::parse($deposit->created_at)->addHour()->format('M d Y H:i')}}</span>
                                                            </li>
                                                            <li>
                                                                {{--                                                        <strong>--}}
                                                                {{--                                                            <a class="btn btn-primary view-recipient"--}}
                                                                {{--                                                               href={!! '/report/create/'.$hashIds->encode($deposit->recipient_id).'/'.$deposit->id !!}>Report</a>--}}
                                                                {{--                                                        </strong>--}}
                                                                @if($withdrawal->proof_of_payment !== null)
                                                                    <a class="btn btn-link"
                                                                       href="/reapway/public/store/{{$deposit->proof_of_payment}}"
                                                                       download>Download
                                                                        File</a>
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{--                            Recipeint--}}
                                <div>
                                    <div class="history-panel">
                                        <div class="profile-panel-heading card-title">Withdrawal History
                                        </div>
                                        <div class="profile-panel-body">
                                            @foreach($withdrawals as $withdrawal)
                                                <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                                    <div class="sale-box-inner">
                                                        <div class="sale-box-head">
                                                            <h4>{{$withdrawal->package->name}}</h4>
                                                        </div>
                                                        <ul class="sale-box-desc">
                                                            <li>
                                                                <strong>Depositor
                                                                    - {{$withdrawal->depositor->name}}</strong>
                                                            </li>
                                                            <li>
                                                                <strong>Amount -
                                                                    #{{number_format($withdrawal->amount)}}</strong>
                                                                <span>{{\Carbon\Carbon::parse($withdrawal->created_at)->addHour()->format('M d Y H:i')}}</span>
                                                            </li>
                                                            <li>
                                                                {{--                                                        <strong>--}}
                                                                {{--                                                            <a class="btn btn-primary view-recipient"--}}
                                                                {{--                                                               href={!! '/report/create/'.$hashIds->encode($withdrawal->depositor_id).'/'.$withdrawal->id !!}>Report</a>--}}
                                                                {{--                                                        </strong>--}}
                                                                @if($withdrawal->proof_of_payment !== null)
                                                                    <a class='btn btn-link'
                                                                       href='/reapway/public/store/{{$withdrawal->proof_of_payment}}'
                                                                       download>Download File</a>
                                                                @endif
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
                </div>
            </div>
        </div>
    </main>
@endsection
