<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rocket Pay</title>
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("assets/img/favicon.png")}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}} " type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/owl.carousel.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/magnific-popup.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/font-awesome.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/themify-icons.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/nice-select.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/flaticon.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/gijgo.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/animate.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/slick.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/slicknav.css")}}" type="text/css">

    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}" type="text/css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

</head>
<body>

<!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="{{url("https://browsehappy.com/")}}>upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="{{route('welcome')}}" style="font-size: 30px; font-weight: bold; color: #FFFFFF;">
                                    Rocket Pay
{{--                                    <img src="{{asset("assets/img/logo.png")}}" alt="">--}}
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href={{route('welcome')}}>Home</a></li>
                                        <li><a href="{{route('about')}}">About</a></li>
                                        <li><a href="{{route('login')}}">Login</a></li>
                                        <li><a href="{{route('faq')}}">FAQ</a></li>
                                        <li><a href="{{route('contact')}}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="phone_num d-none d-xl-block">
                                    <a href="#"> <i class="fa fa-phone"></i> +10 673 567 367</a>
                                </div>
                                <div class="d-none d-lg-block">
                                    <a class="boxed-btn4" href="{{route('register')}}">Register Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->

@yield("content")

<!-- footer start -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-3">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="img/footer_logo.png" alt="">
                            </a>
                        </div>
                        <p>
                            finloan@support.com <br>
                            +10 873 672 6782 <br>
                            600/D, Green road, NewYork
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-3">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                        <h3 class="footer_title">
                            Services
                        </h3>
                        <ul>
                            <li><a href="#">SEO/SEM </a></li>
                            <li><a href="#">Web design </a></li>
                            <li><a href="#">Ecommerce</a></li>
                            <li><a href="#">Digital marketing</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                        <h3 class="footer_title">
                            Useful Links
                        </h3>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#"> Contact</a></li>
                            <li><a href="#">Support</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                        <h3 class="footer_title">
                            Subscribe
                        </h3>
                        <form action="#" class="newsletter_form">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit">Subscribe</button>
                        </form>
                        <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems
                            luckily.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ footer end  -->

<!-- link that opens popup -->
<!-- JS here -->
<script src="{{asset("assets/js/vendor/modernizr-3.5.0.min.js")}}"></script>
<script src="{{asset("assets/js/vendor/jquery-1.12.4.min.js")}}"></script>
<script src="{{asset("assets/js/popper.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/owl.carousel.min.js")}}"></script>
<script src="{{asset("assets/js/isotope.pkgd.min.js")}}"></script>
<script src="{{asset("assets/js/ajax-form.js")}}"></script>
<script src="{{asset("assets/js/waypoints.min.js")}}"></script>
<script src="{{asset("assets/js/jquery.counterup.min.js")}}"></script>
<script src="{{asset("assets/js/imagesloaded.pkgd.min.js")}}"></script>
<script src="{{asset("assets/js/scrollIt.js")}}"></script>
<script src="{{asset("assets/js/jquery.scrollUp.min.js")}}"></script>
<script src="{{asset("assets/js/wow.min.js")}}"></script>
<script src="{{asset("assets/js/nice-select.min.js")}}"></script>
<script src="{{asset("assets/js/jquery.slicknav.min.js")}}"></script>
<script src="{{asset("assets/js/jquery.magnific-popup.min.js")}}"></script>
<script src="{{asset("assets/js/plugins.js")}}"></script>
<script src="{{asset("assets/js/gijgo.min.js")}}"></script>
<script src="{{asset("assets/js/slick.min.js")}}"></script>


<!--contact js-->
<script src="{{asset("assets/js/contact.js")}}"></script>
<script src="{{asset("assets/js/jquery.ajaxchimp.min.js")}}"></script>
<script src="{{asset("assets/js/jquery.form.js")}}"></script>
<script src="{{asset("assets/js/jquery.validate.min.js")}}"></script>
<script src="{{asset("assets/js/mail-script.js")}}"></script>


<script src="{{asset("assets/js/main.js")}}"></script>

</body>
</html>
