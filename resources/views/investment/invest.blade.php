@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Investment Packages</h2>
                            <p class="mb-md-0">List of available investment packages.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a></p>
                            <p class="text-primary mb-0 hover-cursor">Invest</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        @include('layouts.message')
        <div class="row">
            @foreach($availablePackages as $package)
                <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
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
                        <form method="POST" action="{{route('investment.store')}}">
                            @csrf
                            <input type="hidden" name="package_id" value={{$package->id}} />
                            <input type="hidden" name="package_price" value={{$package->price}} class="package_price" />
                            <div class="invest_btn text-center">
                                <button class="invest_submit" type="button">Invest Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection

