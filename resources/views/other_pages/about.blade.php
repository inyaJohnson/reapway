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
    <main class="pt-5" id="about">
        <div id="core-values" style="background-color: rgba(128, 128, 128, 0.11);" class="mt-3 py-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h5 class="font-weight-bold">VISION STATEMENT
                        </h5>
                        <p>
                            Our Vision is to establish our presence as one of Africa’s Foremost Investment and
                            Financial Management Platform with an undisputed renown for being the best Provider
                            of high quality investment and financial management services and products.
                        </p>


                        <h5 class="font-weight-bold">MISSION STATEMENT
                        </h5>
                        <p>
                            In keeping with the Vision Statement above, Our Mission therefore is to provide our
                            clients with the best Investment and Financial Management Services and Products with
                            an unwavering aim to help them achieve Financial Security with ease. As a result, we
                            will seek at all times and at all costs to exhibit unapologetic excellence in the
                            provision and delivery of a diverse range of already established and innovative
                            Investment and Financial Management Products and Services.
                        </p>


                        <h5 class="font-weight-bold">CORE VALUE
                        </h5>
                        <p>
                            In the pursuance of Our Vision and Mission above, ReapWay Investments shall be
                            guided by Three Core Values:
                        </p>


                        <h5 class="font-weight-bold">Integrity
                        </h5>
                        <p>
                            We will execute our business dealings with the highest level of Honesty and
                            Provisional Work Ethics. This also applies to us doing the right thing at all times
                            and always taking responsibilities for all our actions.
                        </p>


                        <h5 class="font-weight-bold">Commitment
                        </h5>
                        <p>
                            We will commit ourselves without reservations to the pursuit of excellence in the
                            execution of our business dealings, the success and growth of our company, the
                            satisfaction and retention of our clients and the provision and delivery of the best
                            quality products and services to our prospects and clients alike.
                        </p>


                        <h5 class="font-weight-bold">TeamWork
                        </h5>
                        <p>
                            We will, together as one single, unbroken unit, work with our employees, to seek,
                            identify and maximize each employee’s unique talents and skills in an atmosphere
                            full of trust and loyalty to achieve our joint goals, Mission and Organisational
                            Vision.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div id="" class="my-4 py-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h5 class="font-weight-bold reap-color">The WHAT
                        </h5>
                        <p>
                            ReapWay Investments is a premium Online Investments and Financial Management founded
                            with the sole aim to help people manage their finances in such ways that it grows
                            steadily to help them achieve financial security and to live the life of their
                            dreams.
                        </p>


                        <p>
                            With a diverse range of high quality Investment and Financial Management Products
                            and Services, ReapWay Investments seeks to achieve Clients Engagement, Satisfaction
                            and Retention in the most excellent way possible.
                        </p>

                        <p>
                            Our Products and Services are very Clients-Friendly and are Structured and Packaged
                            in such ways that our Prospects and Active Clients are assured of the Security and
                            Growth of their Investments and most especially, their trust in us.
                        </p>


                        <h5 class="font-weight-bold reap-color">The WHO
                        </h5>
                        <p>
                            ReapWay Investments is managed by a Team of Astute Professionals with a wide range
                            of relevant experiences and a passion for Excellence that is only rivalled by their
                            desire to help create a world
                            of financially secure people.
                        </p>


                        <p>
                            This Team is headed by Dara Okanlawon, a Skilled Expert in Finance Investments and
                            Management and Foreign Exchange. Dara is also a serial entrepreneur whose goal among
                            many others is to help people live a life free of financial challenges.
                        </p>

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
