@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs px-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="bio-tab" data-toggle="tab" href="#bio"
                                   role="tab" aria-controls="bio" aria-selected="true">Bio Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab"
                                   aria-controls="account" aria-selected="false">Account Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab"
                                   aria-controls="password" aria-selected="false">Change Password</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="bio" role="tabpanel"
                                 aria-labelledby="bio-tab">
                                <form class="settings-form" id="bio-form">
{{--                                    <h4 class="card-title">Contact Information</h4>--}}
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" name="email"
                                               placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone"
                                               placeholder="Phone">
                                    </div>
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label>File upload</label>--}}
                                    {{--                                        <input type="file" name="img[]" class="file-upload-default">--}}
                                    {{--                                        <div class="input-group col-xs-12">--}}
                                    {{--                                            <input type="text" class="form-control file-upload-info" disabled--}}
                                    {{--                                                   placeholder="Upload Image">--}}
                                    {{--                                            <span class="input-group-append">--}}
                                    {{--                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>--}}
                                    {{--                        </span>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light reset">Cancel</button>
                                </form>
                            </div>

                            <div class="tab-pane fade show" id="account" role="tabpanel"
                                 aria-labelledby="account-tab">
                                <form class="settings-form" id="account-form">
{{--                                    <h4 class="card-title">Account Information</h4>--}}
                                    <div class="form-group">
                                        <label for="name">Account Name</label>
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Account Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="number">Account Number</label>
                                        <input type="text" class="form-control" name="number"
                                               placeholder="Account Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="bank">Bank Name</label>
                                        <input type="text" class="form-control" name="bank"
                                               placeholder="Bank Name">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light reset">Cancel</button>
                                </form>
                            </div>

                            <div class="tab-pane fade show" id="password" role="tabpanel"
                                 aria-labelledby="password-tab">
                                <form class="settings-form" id="password-form">
{{--                                    <h4 class="card-title">Change Password</h4>--}}
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Enter Strong Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                               name="password_confirmation"
                                               placeholder="Enter Same Password">
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
@section('script')
    <script>
        $(document).ready(function () {
            $('#password-form').validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 5
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    }
                },
                messages: {
                    password: {
                        required: "Please enter a password",
                        minlength: "Password must be more than 5 characters"
                    },
                    password_confirmation: {
                        required: "Please enter a password",
                        minLength: "Password must be more than 5 characters",
                        equalTo: "This must match the password"
                    }
                }
            })

        })
    </script>
@endsection

