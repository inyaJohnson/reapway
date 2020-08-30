@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Referrer record,</h2>
                            <p class="mb-md-0">Refer and earn 5% on investment.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Referral Link -> {{'https://rocketpay.cc/referral/registration/'.$hashIds->encode(auth()->user()->id)}}</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        @include('layouts.message')
        <div class="row ">
            <div class="col-md-8 grid-margin stretch-card big-screen">
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
                                    <th>withdrawn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($referrals as $referred)
                                    <tr>
                                        <td>{{$referred->referred->name}}</td>
                                        <td>{{$referred->created_at->format('M d Y')}}</td>
                                        <td>{{number_format($referred->amount)}}</td>
                                        <td>{!! ($referred->withdrawn == 1)?"<span class='text-success'>Yes</span>" : "<span class='text-danger'>No</span>"!!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 grid-margin stretch-card small-screen">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Referred List</p>
                        <div>
                            @foreach($referrals as $referred)
                                <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                    <div class="sale-box-inner">
                                        <div class="sale-box-head">
                                            <h4>{{$referred->referred->name}}</h4>
                                        </div>
                                        <ul class="sale-box-desc">
                                            <li>
                                                <strong>Amount - #{{number_format($referred->amount)}}</strong>
                                                <span>Created on {{$referred->created_at->format('M d Y H:i')}}</span>
                                            </li>
                                            <li>
                                                Withdrawn - {!! ($referred->withdrawn == 1)?"<span class='text-success'>Yes</span>" : "<span class='text-danger'>No</span>"!!}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Total Referral Bonus</p>
                        <h1># {{number_format($referrals->where('withdrawn', 0)->pluck('amount')->sum())}}</h1>
                        <p class="text-muted">Earn more today at RocketPay by Referring Investors.
                            5% of the startup Investment of the referred investor will be assigned to you upon
                            application for withdrawal</p>
                        @foreach($availablePackages as $package)
                            <div class="sale-box wow fadeInUp" data-wow-iteration="1">
                                <div class="sale-box-inner">
                                    <div class="sale-box-head">
                                        <h4>{{$package->name}}</h4>
                                    </div>
                                    <ul class="sale-box-desc">
                                        <li>
                                            <strong>#{{number_format($package->price)}}</strong>
                                            <span>up to {{$package->percentage}}% ROI - #{{number_format((($package->price*$package->percentage)/100) + $package->price)}}</span>
                                        </li>
                                        <li>
                                            <strong>100% Recommitment</strong>
                                            <span>(You get 5% referral bonus)</span>
                                        </li>
                                    </ul>
                                    <form method="POST" action="{{route('referral.investment-store')}}">
                                        @csrf
                                        <input type="hidden" name="package_id" value={{$package->id}} />
                                        <input type="hidden" name="package_price"
                                               value={{$package->price}} class="package_price"/>
                                        <div class="invest_btn text-center">
                                            <button class="invest_submit" type="button">Reinvest Your Bonus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <img src="{{asset('assets/images/banner-2.jpg')}}" alt="banner" height="200px"/>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
{{--    @include('referral.add-referral')--}}
@endsection
