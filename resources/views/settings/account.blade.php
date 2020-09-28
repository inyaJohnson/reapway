@extends('layouts.app')
@section('css')
    <link href="{{asset('frontend/css/dashboard.css')}}" rel="stylesheet">
@endsection
@section('content')
    <body class="bg-white">

    <!--Main Navigation-->
    @include('layouts.dashboard_navigation.layout')
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5" id="withdraw">
        <div class="container-fluid">
            <div class="col-md-12">
                @include('layouts.message')
                <div id="account">
                    <h3>Create Account</h3>
                    <small>Note all payment will be made from/to this account</small>
                    <form class="settings-form" id="account-form" action="{{route('settings.store-account')}}"
                          method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Account Name</label>
                            <input type="text" class="form-control" name="name" required value="{{old('name')}}"
                                   placeholder="Account Name">
                        </div>
                        <div class="form-group">
                            <label for="number">Account Number</label>
                            <input type="text" class="form-control" name="number" required value="{{old('number')}}"
                                   placeholder="Account Number">
                        </div>
                        <div class="form-group">
                            <label for="bank">Bank Name</label>
                            <input type="text" class="form-control" name="bank" required value="{{old('bank')}}"
                                   placeholder="Bank Name">
                        </div>
                        <div class="float-right mr-3">
                        <button type="submit"
                                class="btn btn-primary mr-2" {{(auth()->user()->account !== null)?'disabled':''}}>Submit
                        </button>
                        <button class="btn btn-light reset">Cancel</button>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

