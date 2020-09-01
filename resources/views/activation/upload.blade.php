@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Activation</h2>
                            <p class="mb-md-0">Upload Proof of Payment for your activation fee.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a></p>
                            <p class="text-primary mb-0 hover-cursor">Activation</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        @if($user !== null)
            <div class="alert alert-success activation-message">You will be activated soon. Report delay with the help menu</div>
        @endif
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="help-form-div">
                            <form id="activation-form" enctype="multipart/form-data">
                                <h4 class="card-title">Upload Proof</h4>
                                @csrf
                                @include('layouts.message')
                                <div class="help-form-group">
                                    <input class="form-control" type="text" placeholder="Enter your name *"
                                           name="name" readonly
                                           required
                                           value="{{$activator->account_name}}">

                                    <input class="form-control" type="email" placeholder="Enter E-mail *"
                                           name="email" readonly
                                           required
                                           value="{{$activator->phone}}">
                                </div>
                                <div class="help-form-group">
                                    <input class="form-control" type="text" placeholder="Enter Message Subject *"
                                           name="subject" required readonly
                                           value="Activation Fee Payment Proof">
                                </div>
                                <div class="help-form-group">
                                    <input type="file" class="form-control" name="attachment"> <br />
                                    <input type="hidden" name="activator_id" value="{{$activator->id}}">
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                </div>
                                <p class="warning">*Note: Document should not be more than 2Mb</p>
                                <div class="help-form-bottom">
                                    <div>
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
            $('#activation-form').on('submit', function (event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '/activate/store',
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
                                if(result.value){
                                    location.reload()
                                }
                            })
                        } else {
                            Swal.fire(
                                'Failed!',
                                response.error,
                                'error'
                            )
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
