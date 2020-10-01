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
                @include('layouts.message')
                <div class="row big-screen">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Deposit Transactions</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover data-table">
                                        <thead>
                                        <tr>
                                            @can('admin-actions')
                                                <th>Depositor's Name</th>
                                            @endcan
                                            <th>Package</th>
                                            <th>Created at</th>
                                            <th>Amount</th>
                                            <th>Proof of Payment</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($deposits as $deposit)
                                            <tr>
                                                @can('admin-actions')
                                                    <td>{{$deposit->user->name}}</td>
                                                @endcan
                                                <td>{{$deposit->package->name}}</td>
                                                <td>{{\Carbon\Carbon::parse($deposit->created_at)->addHour()->format('M d Y H:i')}}</td>
                                                <td>{{number_format($deposit->amount)}}</td>
                                                <td>
                                                    @if($deposit->proof_of_payment !== null)
                                                        <a class="btn btn-primary" rel="noreferrer noopener"
                                                           target="_blank"
                                                           href="/reapway/public/store/{{$deposit->proof_of_payment}}"
                                                        >View
                                                            File</a>
                                                    @else
                                                        No proof yet
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($deposit->confirmation_status == 1)
                                                        <span class="text-success">Approved</span>
                                                    @elseif($deposit->confirmation_status == 0)
                                                        <span class="text-warning">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @can('client-actions')
                                                        <button class="btn btn-primary upload-payment-btn"
                                                                data-id="{{$deposit->id}}">Upload
                                                        </button>
                                                    @endcan
                                                    @can('admin-actions')
                                                        <button class="btn btn-primary confirm-deposit-btn"
                                                                data-id="{{$deposit->id}}">Confirm
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
                                <h4 class="card-title">Deposit Transactions</h4>
                                @foreach( $deposits as $deposit)
                                    <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                        <div class="sale-box-inner">
                                            <div class="sale-box-head">
                                                @can('admin-actions')
                                                    <h4>{{$deposit->user->name}}</h4>
                                                @endcan
                                                @can('client-actions')
                                                    <h4>{{$deposit->package->name}}</h4>
                                                @endcan
                                            </div>
                                            <ul class="sale-box-desc">
                                                @can('admin-actions')
                                                    <li><strong>Package - {{$deposit->package->name}}</strong></li>
                                                @endcan
                                                <li>
                                                    <strong>Amount - &#8358; {{number_format($deposit->amount)}}</strong>
                                                    <span>Created on - {{\Carbon\Carbon::parse($deposit->created_at)->addHour()->format('M d Y')}}</span>
                                                </li>
                                                <li>
                                                    <strong>
                                                        @if($deposit->proof_of_payment !== null)
                                                            <a class="btn btn-primary" rel="noreferrer noopener"
                                                               target="_blank"
                                                               href="/reapway/public/store/{{$deposit->proof_of_payment}}"
                                                            >View
                                                                File</a>
                                                        @else
                                                            No proof yet
                                                        @endif
                                                    </strong>
                                                    <span>Status -
                                                        @if($deposit->confirmation_status == 1)
                                                            <span class="text-success">Approved</span>
                                                        @elseif($deposit->confirmation_status == 0)
                                                            <span class="text-warning">Pending</span>
                                                        @endif
                                                    </span>
                                                </li>
                                                <li>
                                                    <strong>
                                                        @can('client-actions')
                                                            <button class="btn btn-primary upload-payment-btn"
                                                                    data-id="{{$deposit->id}}">Upload
                                                            </button>
                                                        @endcan
                                                        @can('admin-actions')
                                                            <button class="btn btn-primary confirm-deposit-btn"
                                                                    data-id="{{$deposit->id}}">Confirm
                                                            </button>
                                                        @endcan
                                                    </strong>
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
        @include('deposit.upload_payment_proof')
    </main>

    @endsection
    <!--Main layout-->
    <!--Footer-->
    @section('footer')
        @include('layouts.footer')
    @endsection
    <!--/.Footer-->

    </body>

