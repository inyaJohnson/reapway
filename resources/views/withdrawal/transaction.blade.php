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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Withdrawal Request</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover data-table">
                                        <thead>
                                        <tr>
                                            @can('admin-actions')
                                                <th>Name</th>
                                            @endcan
                                            <th>Amount</th>
                                            <th>Request_Date</th>
                                            <th>Payment_Proof</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $withdrawals as $withdrawal)
                                            <tr>
                                                @can('admin-actions')
                                                    <td> {{$withdrawal->user->name}}</td>
                                                @endcan
                                                <td><span>&#8358;</span> {{number_format($withdrawal->amount)}}</td>
                                                <td>{{\Carbon\Carbon::parse($withdrawal->created_at)->addHour()->format('M d Y H:i')}}</td>
                                                <td>
                                                    @if($withdrawal->proof_of_payment !== null)
                                                        <a class="btn btn-primary view-withdrawal"
                                                           rel="noreferrer noopener"
                                                           target="_blank"
                                                           href="/reapway/public/store/{{$withdrawal->proof_of_payment}}"
                                                        >View
                                                            File</a>
                                                    @else
                                                        No proof yet
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($withdrawal->confirmation_status == 1)
                                                        <span class="text-success">Paid</span>
                                                    @elseif($withdrawal->confirmation_status == 0)
                                                        <span class="text-warning">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @can('admin-actions')
                                                        <button class="btn btn-primary upload-withdrawal-payment-btn"
                                                                data-id="{{$withdrawal->id}}">Upload
                                                        </button>
                                                    @endcan
                                                    @can('client-actions')
                                                        <button class="btn btn-primary confirm-withdrawal-btn"
                                                                data-id="{{$withdrawal->id}}">Confirm
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


                {{--                SMALL SCREEN--}}
                <div class="row small-screen">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Withdraw Request</h4>
                                @foreach( $withdrawals as $withdrawal)
                                    <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                        <div class="sale-box-inner">
                                            <div class="sale-box-head">
                                                @can('admin-actions')
                                                    <h4>{{$withdrawal->user->name}}</h4>
                                                @endcan
                                                @can('client-actions')
                                                    <h4>Amount - &#8358; {{$withdrawal->amount}}</h4>
                                                @endcan
                                            </div>
                                            <ul class="sale-box-desc">
                                                <li><strong>Amount - &#8358; {{$withdrawal->amount}}</strong></li>
                                                <li>
                                                    <span>Request Date - {{\Carbon\Carbon::parse($withdrawal->created_at)->addHour()->format('M d Y')}}</span>
                                                    <span>@if($withdrawal->proof_of_payment !== null)
                                                            <a class="btn btn-primary view-withdrawal"
                                                               rel="noreferrer noopener"
                                                               target="_blank"
                                                               href="/reapway/public/store/{{$withdrawal->proof_of_payment}}"
                                                            >View
                                                                File</a>
                                                        @else
                                                            No proof yet
                                                        @endif
                                                    </span>
                                                </li>
                                                <li>
                                                    <strong>
                                                        @can('admin-actions')
                                                            <button class="btn btn-primary upload-withdrawal-payment-btn"
                                                                    data-id="{{$withdrawal->id}}">Upload
                                                        </button>
                                                        @endcan
                                                        @can('client-actions')
                                                            <button class="btn btn-primary confirm-withdrawal-btn"
                                                                    data-id="{{$withdrawal->id}}">Confirm
                                                        </button>
                                                        @endcan
                                                    </strong>
                                                    <span>
                                                        Status -
                                                        @if($withdrawal->confirmation_status == 1)
                                                            <span class="text-success">Paid</span>
                                                        @elseif($withdrawal->confirmation_status == 0)
                                                            <span class="text-warning">Pending</span>
                                                        @endif
                                                    </span>
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
        @include('withdrawal.upload_withdrawal_payment_proof')
    </main>

    @endsection
    <!--Main layout-->
    <!--Footer-->
    @section('footer')
        @include('layouts.footer')
    @endsection
    <!--/.Footer-->

    </body>
