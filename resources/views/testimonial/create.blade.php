@extends('layouts.app')
@section('css')
    <link href="{{asset('frontend/css/about-nav.css')}}" rel="stylesheet">
@endsection
@section('content')
    <body class="bg-white">
    <!--Main Navigation-->
    @include('layouts.navigation')
    <header class="about-header">
        <!-- Navbar -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <img src="{{asset('frontend/img/Group 6989.png')}}" class="d-block mx-auto img-top"/>
                </div>
            </div>
        </div>
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5">
        <div id="core-values" class="mt-3 py-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        @include('layouts.message')
                        <div class="testimonial-section card">
                            <h5 class="font-weight-bold text-center">Tell your ReapWay story
                            </h5>
                            <form action="{{route('testimonial.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="story" rows="5"
                                              placeholder="Describe your experience with ReapWay"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="summary" placeholder="Summarize your experience">
                                </div>
                                <div class="form-group">
                                    {{--<label for="photo">Customer Photo</label>--}}
                                    <input type="file" class="form-control" name="photo">
                                    <small id="photo-text" class="form-text text-muted">Customer photo should not be more than 1Mb</small>
                                </div>
                                <input type="hidden" name="user_id" value="{{auth()->id()}}">
                                <button type="submit" class="btn text-white reap-bg-color">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Main layout-->
    @endsection
    @section('footer')
        @include('layouts.footer')
    @endsection
    </body>