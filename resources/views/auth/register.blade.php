<!DOCTYPE html>
<html lang="en" xml:lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Responsive Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- favicon & bookmark -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/bookmark.html" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.html')}}" type="image/x-icon"/>
    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <!-- Website Title -->
    <title>Register - Coinpool</title>
    <!-- Stylesheets Start -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/other-pages/style.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" type="text/css"/>
    <!-- Stylesheets End -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="{{asset('assets/js/respond.js')}}"></script><![endif]-->

</head>
<body>
<!--Main Wrapper Start-->
<div class="wrapper login-page style-2" id="top">
    <div class="cp-container">

        <div class="image-part">
            <img src="{{asset('assets/images/about-img.png')}}" alt="">
        </div>
        <div class="form-part">
            <div class="cp-header">
                <div class="logo">
                    <a href="{{route('welcome')}}"><img class="light" src="{{asset('assets/images/dark-logo1.jpg')}}" alt="RocketPay"></a>
                </div>
            </div>
            <div class="cp-heading">
                <h5>Welcome to RocketPay</h5>
{{--                <p>Too keep connected with us please Sign up with your personal information by email address and--}}
{{--                    password.</p>--}}
            </div>
            <div class="cp-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                               placeholder="Enter Name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email"
                               placeholder="Enter Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                               name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                               placeholder="Enter Phone">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col form-group">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Confirm Password">
                        </div>

                    </div>
                    <div class="form-group">
                        <p class="text-left remember-me-checkbox"><label><input type="checkbox" name="remember"
                                                                                value="0">I agree with the website's <a
                                    href="#">Terms and conditions</a></label></p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                    <div class="form-group">
                        <p>Already a member? <a href="{{route('login')}}">Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>
