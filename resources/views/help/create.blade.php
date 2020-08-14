@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Ask for Help</h2>
                            <p class="mb-md-0">Your analytics dashboard template.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Analytics</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                            <i class="mdi mdi-download text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-clock-outline text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-plus text-muted"></i>
                        </button>
                        <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="help-form-div">
                            <form id="help-form" enctype="multipart/form-data">
                                <h4 class="card-title">Any Problems? Report Here</h4>
                                @csrf
                                @include('layouts.message')
                                <div class="help-form-group">
                                    <input class="form-control" type="text" placeholder="Enter your name *"
                                           name="name"
                                           required
                                           value="{{old('name')}}">

                                    <input class="form-control" type="email" placeholder="Enter E-mail *"
                                           name="email"
                                           required
                                           value="{{old('email')}}">

                                </div>
                                <div class="help-form-group">
                                    <input class="form-control" type="text" placeholder="Enter Message Subject *"
                                           name="subject" required
                                           value="{{old('subject')}}">
                                </div>
                                <div class="help-form-group">
                                <textarea aria-required="true" required class="form-control" rows="10" cols="70%"
                                          name="message" aria-invalid="true" placeholder="Enter Message*"
                                          value="{{old('message')}}"></textarea>
                                </div>
                                <p>Ask us a question and we'll write back to you promptly! Simply fill out the form
                                    below and
                                    click Send Email.</p>
                                <p>Thanks. Items marked with an asterisk (<span class="star">*</span>) are required
                                    fields.</p>
                                <div class="help-form-group">
                                    <input type="file" class="form-control" name="attachment">
                                </div>
                                <div class="help-form-bottom">
                                    <div>
                                        <input type="checkbox" name="copy">
                                        <span>Send copy to yourself</span>
                                    </div>
                                    <div class="spacer"></div>
                                    <div class="help-form-submit">
                                        <button type="submit" class="form-control btn btn-success">Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#help-form').on('submit', function (event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '/help',
                    data: formData,
                    contentType : false,
                    processData : false,
                    cache: false,
                    beforeSend: function () {
                        swal.showLoading()
                    },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire(
                                'Successful!',
                                response.success,
                                'success'
                            ).then(function (result) {
                                if (result.value) {
                                    window.location = '/home'
                                }
                            })
                        } else {
                            Swal.fire(
                                'Failed!',
                                response.error,
                                'error'
                            ).then(function (result) {
                                if (result.value) {
                                    window.location = '/home'
                                }
                            })
                        }
                    }
                })
            })
        })
    </script>
@endsection