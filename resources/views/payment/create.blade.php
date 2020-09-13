@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Pay Now</h2>
                            <p class="mb-md-0">Make payment for selected package.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Pay</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        @include('layouts.statistics')
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pay for investment</h4>
                        <div class="row">
                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                @csrf
                                <div class="row" style="margin-bottom:40px;">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div>
                                            Reapway {{$package->name}}, Amount
                                            ₦ {{number_format(substr($amount, 0, -2))}}
                                        </div>
                                        <input type="hidden" name="email" value="info@intoajohnson.com"> {{-- required --}}
{{--                                        <input type="hidden" name="orderID" value="345">--}}
                                        <input type="hidden" name="amount" value="{{$amount}}"> {{-- required in kobo --}}
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="currency" value="NGN">
                                        <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => auth()->user()->id, 'package_id' => $package->id]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                        <p>
                                            <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                                <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection

