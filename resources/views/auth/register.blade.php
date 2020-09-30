@extends('layouts.app')
@section('css')
    <link href="{{asset('frontend/css/auth.css')}}" rel="stylesheet">
@endsection
@section('content')
    <body class="grey lighten-3">
    <!--Auth layout-->

    <div class="auth">
        <!--Main layout-->
        <main class="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4 mt-5">
                        <div class="auth-left">
                            <a href="{{route('welcome')}}">
                            <img class="mb-5" src="{{asset('frontend/img/Reapway Logo one (1).png')}}"  alt="">
                            </a>
                            <div class="mt-4 auth-left-title">
                                <h3 class="font-weight-bolder text-success">Create an account!</h3>
                                <h3 class="font-weight-light">
                                    Let's help you grow
                                    your MONEY</h3>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <form method="POST" action="{{route('register')}}">
                            @csrf
                            <div class="auth-right">
                                <div class="form-wrapper register-icon">
                                    <i class="fas fa-user input-icon"></i>
                                    <i class="fas fa-unlock input-icon"></i>
                                    <i class="far fa-envelope input-icon"></i>
                                    <i class="fas fa-phone input-icon"></i>
                                    <h3 class="text-center font-weight-bolder">Create a Secured Account</h3>
                                    <p class="text-center mb-5"> Welcome to the future of Savings & Investments
                                    </p>
                                    <div class="md-form mb-5">
                                        <input type="text" id="name" name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               required autocomplete="name" autofocus>
                                        <label for="name">Enter Full Name</label>
                                        @error('name')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="md-form mb-5">
                                        <input type="email" id="email" name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               required autocomplete="email">
                                        <label for="email">Enter Email </label>
                                        @error('email')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>


                                    <div class="md-form mb-5">
                                        <input type="text" id="phone" name="phone"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               required autocomplete="phone">
                                        <label for="phone">Phone Number</label>
                                        @error('phone')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="md-form mb-5">
                                        <i class="fas fa-eye input-prefix"></i>
                                        <input id="password" name="password" type="password"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               required autocomplete="password">
                                        <label for="password">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="md-form mb-5">
                                        <i class="fas fa-eye input-prefix"></i>
                                        <input id="password_confirmation" name="password_confirmation" type="password"
                                               class="form-control"
                                               required autocomplete="password">
                                        <label for="password_confirmation"> Confirm Password</label>
                                    </div>

                                    <div class="md-form">
                                        <button type="submit" class="btn">Create Account</button>
                                    </div>
                                    <p class="text-center">Already have an account? <a class="text-success"
                                                                                       href="{{route('login')}}">Log
                                            In</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </main>
        <!--Main layout-->
    </div>
    <!--Auth layout-->

    @endsection
    </body>
