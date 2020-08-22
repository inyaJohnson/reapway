@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Blocked Users,</h2>
                            <p class="mb-md-0">All suspended of RocketPay platform.</p>
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
                                            <small class="mb-1 text-muted">Total Investment</small>
                                            <div
                                                class="btn btn-secondary p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium"
                                                aria-haspopup="true" aria-expanded="false">
                                                <h5 class="mb-0 d-inline-block">#{{$totalInvestment}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Available withdrawals</small>
                                            <h5 class="mr-2 mb-0">#{{$availableWithdrawal}}</h5>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Num. of Users</small>
                                            <h5 class="mr-2 mb-0">{{$numOfUsers}}</h5>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Num. of Active Users</small>
                                            <h5 class="mr-2 mb-0">{{$numOfActiveUsers}}</h5>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                        <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                        <div class="d-flex flex-column justify-content-around">
                                            <small class="mb-1 text-muted">Num. of Blocked</small>
                                            <h5 class="mr-2 mb-0">{{$numOfBlockedUsers}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row big-screen">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{--                        <h4 class="card-title">Investment History</h4>--}}
                        <div class="table-responsive">
                            <table class="table table-striped table-hover investment-history">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    {{--                                    <th>Create At</th>--}}
                                    <th>Referral Code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $users as $user)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        {{--                                        <td>{{$user->created_at->format('M d Y')}}</td>--}}
                                        <td>{{$user->referral_code}}</td>
                                        <td>
                                            <button class="btn btn-primary confirm-unblock"
                                                    data-id="{{$user->id}}">Unblock
                                            </button>
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
                        {{--                        <h4 class="card-title">Investment History</h4>--}}
                        <div class="table-responsive">
                            @foreach( $users as $user)
                                <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                    <div class="sale-box-inner">
                                        <div class="sale-box-head">
                                            <h4>{{$user->name}}</h4>
                                        </div>
                                        <ul class="sale-box-desc">
                                            <li>
                                                <strong>{{$user->email}}</strong>
                                                <span>Referral Code - {{$user->referral_code}}</span>
                                            </li>

                                            <li>
                                                <strong>{{$user->phone}}</strong>
                                                {{--                                                <span>{{$user->created_at->format('M d Y')}}</span>--}}
                                            </li>
                                            <li>
                                                <button class="btn btn-primary confirm-unblock"
                                                        data-id="{{$user->id}}">Unblock
                                                </button>
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
    <!-- content-wrapper ends -->
@endsection
