@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            @include('layouts.message')
                            <div id="account">
                                <h3>Create Account</h3>
                                <small>Note all payment will be made from/to this account</small>
                                <form class="settings-form" id="account-form" action="{{route('settings.store-account')}}" method="POST">
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
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light reset">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

