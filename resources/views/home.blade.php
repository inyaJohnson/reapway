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
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body dashboard-tabs p-0">
                        <ul class="nav nav-tabs px-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview"
                                   role="tab" aria-controls="overview" aria-selected="true">Overview</a>
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
                                            <small class="mb-1 text-muted">Start date</small>
                                            <div
                                                class="btn btn-secondary p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium"
                                                aria-haspopup="true" aria-expanded="false">
                                                <h5 class="mb-0 d-inline-block">{{auth()->user()->created_at->format('d M Y')}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Total Profit</small>
                                            <h5 class="mr-2 mb-0">
                                                #{{number_format(auth()->user()->investment->pluck('profit')->sum())}}</h5>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Total Investment</small>
                                            <h5 class="mr-2 mb-0">{{$totalNumberInvestment}}</h5>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Total Withdrawn</small>
                                            <h5 class="mr-2 mb-0">{{$totalWithdrawn}}</h5>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Pending Withdrawals</small>
                                            <h5 class="mr-2 mb-0">{{$pendingWithdrawal}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.message')
        <div class="row big-screen">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Latest Investment</p>
                        <div class=" sale-box wow fadeInUp" data-wow-iteration="1">
                            <div class="sale-box-inner">
                                <div class="sale-box-head">
                                    <h4>{{$latestInvestment->package->name}}</h4>
                                </div>
                                <ul class="sale-box-desc">
                                    <li>
                                        <strong>Amount - {{number_format($latestInvestment->package->price)}}</strong>
                                        <span>ROI - #{{number_format((($latestInvestment->package->price * $latestInvestment->percentage)/100) + $latestInvestment->package->price) }}</span>
                                    </li>
                                    <li>
                                        <strong>{{$latestInvestment->percentage}}% Recommitment</strong>
                                        <span>{{$latestInvestment->created_at->format('M d Y H:i')}}</span>
                                    </li>
                                    <li>@if($latestInvestment->maturity == 1)
                                            <label class="badge badge-success">Matured</label>
                                        @else
                                            <label class="badge badge-danger">Not Due</label>
                                        @endif
                                    </li>
                                    <li>@if($latestInvestment->withdrawn == 1)
                                            <span style="color:black;">Withdrawn</span>
                                        @else
                                            <span style="color:black;">Not Withdrawn</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Total Investment</p>
                        <h1># {{$totalInvestment}}</h1>
                        <h4>Welcome to RocketPay</h4>
                        <p class="text-muted">Years back, many people rely on banks to keep their money, but in recent
                            times they are faced with the problem of low returns.
                            Welcome to RocketPay your best Investment solution.</p>
                        <div id="total-sales-chart-legend"></div>
                    </div>
                    <img src="{{asset('assets/images/banner-2.jpg')}}" alt="banner" height="200px"/>
                </div>
            </div>
        </div>
        <div class="row small-screen">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="sale-box wow fadeInUp" data-wow-iteration="1">
                            <div class="sale-box-inner">
                                <div class="sale-box-head">
                                    <h4>{{$latestInvestment->package->name}}</h4>
                                </div>
                                <ul class="sale-box-desc">
                                    <li>
                                        <strong>Amount - {{number_format($latestInvestment->package->price)}}</strong>
                                        <span>ROI - #{{number_format((($latestInvestment->package->price * $latestInvestment->percentage)/100) + $latestInvestment->package->price) }}</span>
                                    </li>
                                    <li>
                                        <strong>{{$latestInvestment->percentage}}% Recommitment</strong>
                                        <span>Created Date - {{$latestInvestment->created_at->format('M d Y H:i')}}</span>
                                    </li>
                                    <li><strong>@if($latestInvestment->maturity == 1)
                                                <label class="badge badge-success">Matured</label>
                                            @else
                                                <label class="badge badge-danger">Not Due</label>
                                            @endif
                                        </strong>
                                        <span>Withdrawal Date- {{\Carbon\Carbon::parse($latestInvestment->created_at)->addDay($latestInvestment->package->duration)->format('M d Y H:i')}}</span>
                                    </li>
                                    <li>@if($latestInvestment->withdrawn == 1)
                                            <span style="color:black;">Withdrawn</span>
                                        @else
                                            <span style="color:black;">Not Withdrawn</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection
