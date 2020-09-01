@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Report Misconduct</h2>
                            <p class="mb-md-0">State issues you are have with {{$defaulter->name}} .</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a></p>
                            <p class="text-primary mb-0 hover-cursor">Report</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="report-form-div">
                            <form id="report-form" enctype="multipart/form-data">
                                <h4 class="card-title">State your issue with {{$defaulter->name}}</h4>
                                @csrf
                                @include('layouts.message')
                                <div class="report-form-group">
                                    <input class="form-control" type="text" placeholder="Enter Message Subject *"
                                           name="subject" required
                                           value="{{old('subject')}}">
                                </div>
                                <div class="report-form-group">
                                <textarea aria-required="true" required class="form-control" rows="10" cols="70%"
                                          name="message" aria-invalid="true" placeholder="Enter Message*"
                                          value="{{old('message')}}"></textarea>
                                </div>
                                <p>Ask us a question and we'll write back to you promptly! Simply fill out the form
                                    below and
                                    click Send Email.</p>
                                <p>Thanks. Items marked with an asterisk (<span class="star">*</span>) are required
                                    fields.</p>
                                <div class="report-form-group">
                                    <input type="file" class="form-control" name="attachment"> <br />
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                    <input type="hidden" name="user_name" value="{{auth()->user()->name}}">
                                    <input type="hidden" name="defaulter_id" value="{{$defaulter->id}}">
                                    <input type="hidden" name="defaulter_name" value="{{$defaulter->name}}">
                                    <input type="hidden" name="defaulter_email" value="{{$defaulter->email}}">
                                    <input type="hidden" name="transaction_withdrawal_id" value="{{$transaction->withdrawal_id}}">
                                </div>
                                <p class="warning">*Note: Document should not be more than 2Mb</p>

                                <div class="report-form-bottom">
                                    <div>
                                    </div>
                                    <div class="spacer"></div>
                                    <div class="report-form-submit">
                                        <button type="submit" class="form-control btn btn-primary">Submit
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
            $('#report-form').on('submit', function (event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '/report/store',
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
                    },
                    error: function (error) {
                        if (error.responseJSON.errors.hasOwnProperty('attachment')) {
                            $('p.warning').addClass('error').text('The File is required and the size must not be more than 2Mb');
                        }
                    }
                })
            })
        })
    </script>
@endsection
