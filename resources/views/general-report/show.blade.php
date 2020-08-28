@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>General Report,</h2>
                            <p class="mb-md-0">All transactions for {{$investment->user->name}} {{$investment->package->name}} Investment.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Admin</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body dashboard-tabs p-0">
                        <ul class="nav nav-tabs px-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview"
                                   role="tab" aria-controls="overview" aria-selected="true">Records Overview</a>
                            </li>
                        </ul>
                        <div class="tab-content py-0 px-0">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                 aria-labelledby="overview-tab">
                                <div class="d-flex flex-wrap justify-content-xl-between">
                                    <div
                                        class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Date of Investment</small>
                                            <div
                                                class="btn btn-secondary p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium"
                                                aria-haspopup="true" aria-expanded="false">
                                                <h5 class="mb-0 d-inline-block">{{$investment->created_at->format('M d Y')}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi mdi-currency-ngn mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Amount</small>
                                            <h5 class="mr-2 mb-0">#{{number_format($investment->package->price)}}</h5>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Profit on Investment</small>
                                            <h5 class="mr-2 mb-0">#{{number_format(($investment->package->price * $investment->package->percentage)/100)}}</h5>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-cash-multiple mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Date of withdrawal</small>
                                            <h5 class="mr-2 mb-0">

                                            </h5>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Num. of Investments</small>
                                            <h5 class="mr-2 mb-0">#</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{--                        <h4 class="card-title">Investment History</h4>--}}
                        <div class="table-responsive">
                            <table class="table table-striped table-hover investment-history">
                                <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Date Matched</th>
                                    <th>Amount</th>
                                    <th>Recipient's Info</th>
                                    <th>Status</th>
                                    <th>Proof of Payment</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($deposits as $deposit)
                                    <tr>
                                        <td>{{$deposit->package->name}}</td>
                                        <td>{{$deposit->created_at->format('M d Y')}}</td>
                                        <td>{{number_format($deposit->amount)}}</td>
                                        <td><a class="btn btn-primary"
                                               href="{{route('general-report.show-recipient', $deposit->recipient_id)}}">View
                                                Recipient</a></td>
                                        <input value="{{$deposit->amount}}" id="amount{{$deposit->id}}"
                                               type="hidden">
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
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    @include('transaction.recipient-info')
@endsection
