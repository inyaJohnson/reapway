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
                            <img class="mb-5" src="{{asset('frontend/img/Reapway Logo one (1).png')}}" alt="">
                            <div class="mt-4 auth-left-title">
                                <h3 class="font-weight-bolder text-success">Welcome back!</h3>
                                <h3 class="font-weight-light">Login to continue</h3>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="auth-right">
                                <div class="form-wrapper">
                                    <i class="fas fa-user"></i>
                                    <i class="fas fa-unlock"></i>
                                    <h3 class="text-center font-weight-bolder">Login to your account </h3>
                                    <p class="text-center mb-5">Login to your ReapWay Account</p>

                                    <div class="md-form mb-5">
                                        <input type="email" id="email" name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               value="{{old('email')}}"
                                               required autocomplete="email" autofocus>
                                        <label for="email">Email</label>
                                        @error('email')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="md-form mb-5">
                                        <i class="fas fa-eye input-prefix"></i>
                                        <input type="password" id="password" name="password"
                                               class="form-control @error('password')is-invalid @enderror"
                                               value="{{old('password')}}"
                                               required autocomplete="password">
                                        <label for="password">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="md-form">
                                        @if (Route::has('password.request'))
                                            <p><a class="text-success" href="{{ route('password.request') }}"> Forgot
                                                    Password?</a>
                                                @endif
                                                <button type="submit"
                                                        class="float-right"><i
                                                        class="fas fa-arrow-right"></i></button>
                                            </p>
                                    </div>

                                    <div class="md-form">
                                        <p><span> Don't have an account?</span><span><a href="{{route('register')}}"
                                                                                        class="text-success"> Register</a></span>
                                        </p>
                                    </div>

                                    <!-- <div class="md-form">
                                      <button class="btn">Login</button>
                                </div> -->
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
