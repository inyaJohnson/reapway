@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Referrer record,</h2>
                            <p class="mb-md-0">Refer and earn 10% on investment.</p>
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
        @include('layouts.message')
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Referred List</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover investment-history">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($referrals as $referred)
                                    <tr>
                                        <td>{{$referred->user->name}}</td>
                                        <td>{{$referred->created_at->format('M d Y')}}</td>
                                        <td>{{number_format($referred->amount)}}</td>
                                        <td>@if($referred->apply_for_withdrawal == 0)
                                                <a href="{{route('referral.withdraw', $referred->id)}}"
                                                   class="btn btn-primary">Withdraw</a>
                                            @elseif($referred->apply_for_withdrawal == 1)
                                                <span class="text-warning">Processing</span>
                                            @endif
                                            {!! ($referred->withrawn == 1)? "<span class='text-success'>Withdrawn</span>": '' !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Total Referral Bonus</p>
                        <h1># {{number_format($referrals->pluck('amount')->sum())}}</h1>
                        {{--                        <h4>Gross sales over the years</h4>--}}
                        <p class="text-muted">Earn more today at RocketPay by Referring Investors.
                            10% of the startup Investment of the referred investor will be assigned to you upon
                            application for withdrawal</p>
                        {{--                        <div>Total number of referred Investors is {{$referrals->count()}}</div>--}}
                    </div>
                    <canvas id="total-sales-chart" style="border: thin red solid;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    @include('referral.add-referral')
@endsection
