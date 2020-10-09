@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Deposit</h2>
                            <p class="mb-md-0">List of all your Deposits.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Deposit</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        @include('layouts.statistics')
        <div class="row big-screen">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped table-hover investment-history">
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
                                                <a class="btn btn-primary" rel="noreferrer noopener" target="_blank"
                                                   href="/store/{{$deposit->proof_of_payment}}"
                                                >View
                                                    File</a>
                                                @else
                                                No proof yet
                                            @endif
                                        </td>
                                        <td>
                                            @if($deposit->confirmation_status == 1)
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($deposit->confirmation_status == 0)
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('client-actions')
                                                <button class="btn btn-primary upload-payment-btn"
                                                        data-id="{{$deposit->id}}">Upload Proof
                                                </button>
                                            @endcan
                                            @can('admin-actions')
                                                <button class="btn btn-primary confirm-deposit-btn"
                                                        data-id="{{$deposit->id}}">Confirm Payment
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
    </div>
    {{--        SMALL SCREEN --}}
    {{--    <div class="row small-screen">--}}
    {{--        <div class="col-lg-12 grid-margin stretch-card">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-body">--}}
    {{--                    <div>--}}
    {{--                        <div class="history-panel">--}}
    {{--                            <div class="profile-panel-heading card-title">--}}
    {{--                                Deposit History--}}
    {{--                            </div>--}}
    {{--                            <div class="profile-panel-body">--}}
    {{--                                @foreach($deposits as $deposit)--}}
    {{--                                    <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">--}}
    {{--                                        <div class="sale-box-inner">--}}
    {{--                                            <div class="sale-box-head">--}}
    {{--                                                <h4>{{$deposit->package->name}}</h4>--}}
    {{--                                            </div>--}}
    {{--                                            <ul class="sale-box-desc">--}}
    {{--                                                <li>--}}
    {{--                                                    <strong>Recipient - {{$deposit->recipient->name}}</strong>--}}
    {{--                                                </li>--}}
    {{--                                                <li>--}}
    {{--                                                    <strong>Amount--}}
    {{--                                                        - {{number_format($deposit->amount)}}</strong>--}}
    {{--                                                    <span>Matched on - {{\Carbon\Carbon::parse($deposit->created_at)->addHour()->format('M d Y H:i')}}</span>--}}
    {{--                                                </li>--}}
    {{--                                                <li>--}}
    {{--                                                    @if($withdrawal->proof_of_payment !== null)--}}
    {{--                                                        <a class="btn btn-link"--}}
    {{--                                                           href="/rocket_pay/public/store/{{$deposit->proof_of_payment}}"--}}
    {{--                                                           download>Download--}}
    {{--                                                            File</a>--}}
    {{--                                                    @endif--}}
    {{--                                                </li>--}}
    {{--                                            </ul>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                @endforeach--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    @include('deposit.upload_payment_proof')
@endsection

