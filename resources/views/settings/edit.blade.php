@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Edit Profile,</h2>
                            <p class="mb-md-0">Update Contact and Account details.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a></p>
                            <p class="text-primary mb-0 hover-cursor">Profile Update</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs px-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact"
                                   role="tab" aria-controls="contact" aria-selected="true">Contact Information</a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab"--}}
{{--                                   aria-controls="account" aria-selected="false">Account Information</a>--}}
{{--                            </li>--}}
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="contact" role="tabpanel"
                                 aria-labelledby="contact-tab">
                                <form action="{{route('settings.update-contact-info')}}" method="POST"
                                      class="settings-form" id="contact-form">
                                    @csrf
                                    {{--                                    <h4 class="card-title">Contact Information</h4>--}}
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" required
                                               value="{{$user->name}}" placeholder="Name">
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="email">Email address</label>--}}
{{--                                        <input type="email" class="form-control" name="email" required--}}
{{--                                               value="{{$user->email}}" placeholder="Email">--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" required
                                               value="{{$user->phone}}" placeholder="Phone Number">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light reset">Cancel</button>
                                </form>
                            </div>

{{--                            <div class="tab-pane fade show" id="account" role="tabpanel"--}}
{{--                                 aria-labelledby="account-tab">--}}
{{--                                @if(auth()->user()->account !== null)--}}
{{--                                    <form action="{{route('settings.update-account-info')}}" method="POST"--}}
{{--                                          class="settings-form" id="account-form">--}}
{{--                                        @csrf--}}
{{--                                        --}}{{--                                    <h4 class="card-title">Account Information</h4>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="name">Account Name</label>--}}
{{--                                            <input type="text" class="form-control" name="name" required--}}
{{--                                                   value="{{$user->account->name}}" placeholder="Account Name">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="number">Account Number</label>--}}
{{--                                            <input type="text" class="form-control" name="number" required--}}
{{--                                                   value="{{$user->account->number}}" placeholder="Account Number">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="bank">Bank Name</label>--}}
{{--                                            <input type="text" class="form-control" name="bank" required--}}
{{--                                                   value="{{$user->account->bank}}" placeholder="Bank Name">--}}
{{--                                        </div>--}}
{{--                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>--}}
{{--                                        <button class="btn btn-light reset">Cancel</button>--}}
{{--                                    </form>--}}
{{--                                @else--}}
{{--                                    <a href="{{route('settings.account', auth()->user()->id)}}">Click to Add your--}}
{{--                                        Payment Account--}}
{{--                                        Information</a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

