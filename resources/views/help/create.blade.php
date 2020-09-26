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
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="help-form-div">
                            <form id="help-form" enctype="multipart/form-data">
                                <h4 class="card-title">Any Problems? Report Here</h4>
                                @csrf
                                @include('layouts.message')
                                <div class="help-form-group">
                                    <input class="form-control" type="text" placeholder="Enter your name *"
                                           name="name" readonly
                                           required
                                           value="{{auth()->user()->name}}">

                                    <input class="form-control" type="email" placeholder="Enter E-mail *"
                                           name="email" readonly
                                           required
                                           value="{{auth()->user()->email}}">
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
                                    <input type="file" class="form-control" name="attachment"> <br/>
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                </div>
                                <p class="warning">*Note: Document should not be more than 2Mb</p>

                                <div class="help-form-bottom">
                                    <div>
                                        <input type="checkbox" name="copy">
                                        <span>Send copy to yourself</span>
                                    </div>
                                    <div class="spacer"></div>
                                    <div class="help-form-submit">
                                        <button type="submit" class="form-control btn btn-primary">Send Email
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
    <!--Main layout-->

    <!--Footer-->
    @section('footer')
        @include('layouts.footer')
    @endsection

    </body>
