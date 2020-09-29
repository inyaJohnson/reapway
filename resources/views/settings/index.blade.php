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
    <main class="pt-5 mx-lg-5" id="settings">
        <div class="container-fluid">
            <div class="col-md-12">
                <div>
                    <img src="{{asset('frontend/img/Mask Group 6.png')}}" class="mb-4" style="height:120px"/>
                    <span class="ml-3 small">Tap to change</span>
                </div>
                @include('layouts.message')
                <form action="{{route('settings.update')}}" method="POST">
                    <!-- Default input name -->
                    @csrf
                    <div class="form-group  grey lighten-3">
                        <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control">
                    </div>

                    <div class="form-group  grey lighten-3">
                        <input type="email" name="email" value="{{auth()->user()->email}}" class="form-control">
                    </div>

                    <div class="form-group  grey lighten-3">
                        <input type="text" name="phone" value="{{auth()->user()->phone}}" class="form-control">
                    </div>

                    <div><h5>Account Details</h5></div>

                    <div class="form-group  grey lighten-3">
                        <input type="text" name="account_name" value="{{auth()->user()->account->name}}"
                               class="form-control">
                    </div>

                    <div class="form-group  grey lighten-3">
                        <input type="text" name="account_number" value="{{auth()->user()->account->number}}"
                               class="form-control">
                    </div>

                    <div class="form-group  grey lighten-3">
                        <input type="text" name="bank" value="{{auth()->user()->account->bank}}" class="form-control">
                    </div>

                    <div class="py-4 mt-3">
                        <button type="submit" style="padding: 10px;">Update</button>
                    </div>
                </form>
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
