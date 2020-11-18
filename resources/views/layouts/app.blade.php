<!DOCTYPE html>
<html lang="en" xml:lang="en">

<!-- Mirrored from sacredthemes.net/coinpool/cp-platinum.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jul 2020 21:18:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ReapWay/Home</title>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,300&family=Oswald:wght@600&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('frontend/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('dashboard/js/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">

    <link href="{{asset('dashboard/DataTables/datatables.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/img/favicon.png')}}">

    @yield('css')

    <style>
        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>
</head>

{{--Content Starts--}}
@yield('content')
{{--Content Ends--}}

<!--Footer-->
@yield('footer')
<!--End Footer-->
<!-- SCRIPTS -->
<!-- JQuery -->
{{--<script type="text/javascript" src="{{asset('frontend/js/jquery-3.5.1.min.js')}}"></script>--}}

<script type="text/javascript" src="{{asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
<!-- <script src="https://unpkg.com/popmotion/dist/popmotion.global.min.js"></script> -->
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('frontend/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('frontend/js/mdb.min.js')}}"></script>

<script type="text/javascript" src="{{asset('dashboard/js/sweetalert2/dist/sweetalert2.min.js')}}"></script>

<script type="text/javascript" src="{{asset('dashboard/DataTables/datatables.min.js')}}"></script>

<script src="{{asset('dashboard/js/custom.js')}}"></script>
<script src="{{asset('frontend/js/style.js')}}"></script>
<!-- Initializations -->

@yield('script')

<script src="https://unpkg.com/aos@next/dist/aos.js" type="text/javascript"></script>

<script>
    // Animations initialization
    new WOW().init();
    AOS.init();

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll < 210) {
            $('.fixed-top').css('background', 'transparent');
            $('.fixed-top a').css('color', 'white');
            $('.fixed-top .btn').css('color', 'green');
            $('.fixed-top').css("box-shadow", "none");
        } else if (scroll > 3500) {
            $('.fixed-top').css('background', '#fff');
            $('.fixed-top a').css('color', 'green');
            $('.fixed-top .btn').css('color', 'green');
        } else {
            $('.fixed-top').css('background', '#fff');
            $('.fixed-top a').css('color', 'green');
            $('.fixed-top').css("box-shadow", "0px 9px 12px -4px rgba(022,022,022,.4)");
        }
    });


    //     $('.panel-collapse').on('show.bs.collapse', function () {
    //     $(this).siblings('.panel-heading').addClass('active');
    //   });

    //   $('.panel-collapse').on('hide.bs.collapse', function () {
    //     $(this).siblings('.panel-heading').removeClass('active');
    //   });


</script>
<script>
    jQuery(function ($) {
        var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $('.sidebar-fixed a').each(function () {
            if (this.href === path) {
                $(this).addClass('active');
            }
        });
    });
</script>
<!--Google Maps-->

<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+2349132054210", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
<script src="https://maps.google.com/maps/api/js"></script>

</html>




