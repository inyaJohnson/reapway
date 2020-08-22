@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>People to Receive Referral Bonus</h2>
                            <p class="mb-md-0">List of payable referrers</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Referrers</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        @include('layouts.message')
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Referrer To be Paid</h4>
                        <div>
                            @foreach($referrerToPay as $referrer)
                                <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                    <div class="sale-box-inner">
                                        <div class="sale-box-head">
                                            <h4>{{$referrer->user->name}}</h4>
                                        </div>
                                        <ul class="sale-box-desc">
                                            <li>
                                                <strong>{{$referrer->referred->name}}</strong>
                                                <span>{{$referrer->created_at->format('M d Y H:i')}}</span>
                                            </li>
                                            <li>
                                                <strong id="amount{{$referrer->id}}">{{number_format($referrer->amount)}}</strong>
{{--                                                <span>{{$investment->created_at}}</span>--}}
                                            </li>
                                            <li><a class="btn btn-primary view-referrer" href="javascript:void(0)"
                                                   data-id={{$referrer->user->id}}>View
                                                    Referrer</a>
                                            </li>
                                            <li>@if($referrer->withdrawn == 0)
                                                    <button class="btn btn-primary confirm-referral-withrawal"
                                                            href="javascript:void(0)"
                                                            data-id={{$referrer->id}}>Confirm Payment
                                                    </button>
                                                @else
                                                    <span class="text-success">Paid</span>
                                                @endif
                                            </li>
                                            <input type="hidden" id="referral_id" value="{{$referrer->id}}">
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
    @include('transaction.depositor-info')
@endsection
