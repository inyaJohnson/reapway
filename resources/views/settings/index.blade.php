@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>My Profile,</h2>
                            <p class="mb-md-0">Your Contact and Payment Account details  .</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a></p>
                            <p class="text-primary mb-0 hover-cursor">Profile</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        @include('layouts.message')
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-panel">
                            <div>
                                <div class="profile-panel-heading card-title" style="color:#ffffff;">Contact
                                    Information
                                </div>
                            </div>
                            <div class="profile-panel-body">
                                <p>Name - {{auth()->user()->name}} </p>
                                <p>Email - {{auth()->user()->email}} </p>
                                <p>Phone - {{auth()->user()->phone}} </p>
                                <a href="{{route('settings.edit', auth()->user()->id)}}">Edit Contact Information</a>
                            </div>

                        </div>
                        <div class="profile-panel">
                            <div class="profile-panel-heading card-title" style="color:#ffffff;">Account Information
                            </div>
                            <div class="profile-panel-body">
                                @if(auth()->user()->account !== null)
                                    <p>Account Name - {{auth()->user()->account->name}} </p>
                                    <p>Account Number - {{auth()->user()->account->number}} </p>
                                    <p>Bank - {{auth()->user()->account->bank}} </p>
                                    <a href="{{route('settings.edit', auth()->user()->id)}}">Edit Account
                                        Information</a>
                                @else
                                    <a href="{{route('settings.account', auth()->user()->id)}}">Click to Add your Payment Account
                                        Information</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Total Investment</p>
                        <h1>#{{$totalInvestment}}</h1>
                        <h4>Gross sales over the years</h4>
                        <p class="text-muted">Today, many people rely on computers to do homework, work, and create or
                            store useful information. Therefore, it is important </p>
                        <div id="total-sales-chart-legend"></div>
                    </div>
                    <canvas id="total-sales-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection
