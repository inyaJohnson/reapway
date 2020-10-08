@extends('layouts.app')
@section('css')
    <link href="{{asset('frontend/css/dashboard.css')}}" rel="stylesheet" >
@endsection
@section('content')
    <body class="bg-white">
    <!--Main Navigation-->
    @include('layouts.dashboard_navigation.layout')
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5" id="dashboard">
        <div class="container-fluid">
            @include('layouts.statistics')
            <div class="section-table mt-4">
                <div class="row big-screen">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Investment History</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover data-table">
                                        <thead>
                                        <tr>
                                            <th>Investor</th>
                                            <th>Package</th>
                                            <th>Capital</th>
                                            <th>Percentage</th>
                                            <th>ROI</th>
                                            <th>Created_On</th>
                                            <th>Status</th>
                                            <th>Maturity</th>
                                            <th>Withdrawn</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $investments as $investment)
                                            <tr>
                                                <td>{{$investment->user->name}}</td>
                                                <td>{{$investment->package->name}}</td>
                                                <td>{{number_format($investment->capital)}}</td>
                                                <td>{{$investment->package->percentage}} %</td>
                                                <td>{{number_format((($investment->capital * $investment->package->percentage)/100) + $investment->capital) }}</td>
                                                <td>{{\Carbon\Carbon::parse($investment->created_at)->format('M d Y')}}</td>
                                                <td>
                                                    @if($investment->status == 1)
                                                        <span class="text-success">Approved</span>
                                                    @else
                                                        <span class="text-warning">Pending Confirmation</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($investment->maturity == 1)
                                                        <span class="text-success">Matured</span>
                                                    @else
                                                        <span class="text-danger">Not Due</span>
                                                    @endif
                                                </td>
                                                <td>@if($investment->withdrawn == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{--                SMALL SCREEN--}}
                <div class="row small-screen">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Investment History</h4>
                                @foreach( $investments as $investment)
                                    <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                        <div class="sale-box-inner">
                                            <div class="sale-box-head">
                                                <h4>{{$investment->user->name}}</h4>
                                            </div>
                                            <ul class="sale-box-desc">
                                                <li>
                                                    <strong>Package - {{$investment->package->name}}</strong>
                                                </li>
                                                <li>
                                                    <span>Capital - ₦{{number_format($investment->capital)}}
                                                        @ {{$investment->package->percentage}} %</span>
                                                    <strong>ROI - ₦{{number_format((($investment->capital * $investment->package->percentage)/100) + $investment->capital) }}</strong>
                                                </li>
                                                <li>
                                                    <strong>Created
                                                        on {{\Carbon\Carbon::parse($investment->created_at)->addHour()->format('M d Y')}}</strong>
                                                    <span>Status - @if($investment->status == 1)
                                                            <span class="text-success">Approved</span>
                                                        @else
                                                            <span
                                                                class="text-warning">Pending Confirmation</span>
                                                        @endif</span>
                                                </li>
                                                <li>
                                                    <span>
                                                        @if($investment->maturity == 1)
                                                            <span class="text-success">Matured</span>
                                                        @else
                                                            <span class="text-danger">Not Matured</span>
                                                        @endif
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="section-chart">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <!--Card-->--}}
{{--                        <div class="card">--}}

{{--                            <!-- Card header -->--}}
{{--                            <div class="card-header">Line chart</div>--}}

{{--                            <!--Card content-->--}}
{{--                            <div class="card-body">--}}

{{--                                <canvas id="lineChart"></canvas>--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <!--/.Card-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </main>
    @endsection
    <!--Main layout-->
    <!--Footer-->
    @section('footer')
        @include('layouts.footer')
    @endsection
    <!--/.Footer-->
    @section('script')
        <!-- Initializations -->
        <script type="text/javascript">
            // Animations initialization
            new WOW().init();

            var ctxL = document.getElementById("lineChart").getContext('2d');
            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [{
                        label: "My First dataset",
                        backgroundColor: [
                            'rgba(105, 0, 132, .2)',
                        ],
                        borderColor: [
                            'rgba(200, 99, 132, .7)',
                        ],
                        borderWidth: 2,
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                        {
                            label: "My Second dataset",
                            backgroundColor: [
                                'rgba(0, 137, 132, .2)',
                            ],
                            borderColor: [
                                'rgba(0, 10, 130, .7)',
                            ],
                            data: [28, 48, 40, 19, 86, 27, 90]
                        },
                        {
                            label: "My Second dataset",
                            backgroundColor: [
                                'rgba(0, 13, 132, .2)',
                            ],
                            borderColor: [
                                'rgba(0, 10, 130, .7)',
                            ],
                            data: [28, 48, 0, 169, 86, 27, 50]
                        },

                        // {
                        //   label: "My Second dataset",
                        //   backgroundColor: [
                        //     'rgba(0, 137, 132, .2)',
                        //   ],
                        //   borderColor: [
                        //     'rgba(0, 140, 10, .7)',
                        //   ],
                        //   data: [26, 28, 40, 129, 86, 27, 30]
                        // }
                    ]
                },
                options: {
                    responsive: true
                }
            });
        </script>
    @endsection
    </body>
