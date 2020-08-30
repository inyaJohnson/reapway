@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Activation,</h2>
                            <p class="mb-md-0">Follow the instruction to activate your account.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Activation</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        @include('layouts.message')
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="deny-access">
                        <div><span>Notice!!!</span></div>
                        <h4>Activation Procedure</h4>
                        <p style="padding: 10px 30px;">
                            You will be required to pay a one time Activation fee of ₦1,000.00 to another User on the
                            system. (The system will assign you to a user).
                            Make payment of the exact amount to the User account details.
                            After confirmation, Your account will be activated and you can start your investment immediately.
                        </p>
                        <p style="padding: 10px 30px;">
                            Why pay for activation?
                            This is a measure put in place to ensure only serious individuals participate in RocketPay
                            Investment.
                        </p>
                        <div class="invest_btn text-center">
                            <button class="view-activator" data-id="{{$activatorId}}" type="button">Activate Now</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    @include('activation.activator-info')
@endsection
