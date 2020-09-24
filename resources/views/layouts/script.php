
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{asset('frontend/js/jquery-3.4.1.min.js')}}"></script>

<!-- <script src="https://unpkg.com/popmotion/dist/popmotion.global.min.js"></script> -->
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('frontend/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('frontend/js/mdb.min.js')}}"></script>

{{--CUSTOM--}}
<script src="{{asset('dashboard/js/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('dashboard/js/custom.js')}}"></script>

<script src="https://unpkg.com/aos@next/dist/aos.js" type="text/javascript"></script>

<script>
    AOS.init();
    // Animations initialization
    new WOW().init();

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll < 300) {
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
</script>
<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js"></script>
