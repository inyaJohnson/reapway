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
    <main class="pt-5 mx-lg-5" id="dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="dashboard-flash-card success-color-dark darken-2 ">
                        <h6 class="font-weight-bold text-center">Current Total Investment</h6>
                        <table>
                            @foreach($runningInvestments as $runningInvestment)
                                <tr>
                                    <td>₦{{$runningInvestment->capital}}</td>
                                    <td><small>{{$runningInvestment->created_at->format('d/m/Y')}}</small></td>
                                    <td>
                                        @if($runningInvestment->status == 1)
                                            <span class="badge badge-light">Approved</span>
                                        @else
                                            <span class="badge badge-warning">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="dashboard-flash-card bg-success darken-2 ">
                        <h6 class="font-weight-bold text-center">Investment + ROI</h6>
                        <table>
                            @foreach($runningInvestments as $runningInvestment)
                                <tr>
                                    <td>₦{{(($runningInvestment->capital * $runningInvestment->package->percentage) / 100) + $runningInvestment->capital}}</td>
                                    <td><small>{{$runningInvestment->created_at->format('d/m/Y')}}</small></td>
                                    <td>
                                        @if($runningInvestment->status == 1)
                                            <span class="badge badge-light">Approved</span>
                                        @else
                                            <span class="badge badge-warning">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="dashboard-flash-card success-color-dark darken-2 ">
                        <h6 class="font-weight-bold text-center">Balance</h6>
                        <h4 class="font-weight-bold text-center">
                            ₦ {{number_format(auth()->user()->actual_balance, 2)}}</h4>
                        <p class="text-center small">{{\Carbon\Carbon::now()->format('M d Y H:i')}}</p>
                        <div class="row">
                            <div class="col-md-6 mx-auto text-center">
                                <a href="{{route('withdrawal')}}"><span class="badge badge-light ">Withdraw</span></a>
                                <a href="{{route('investment.reinvest')}}"><span
                                        class="badge badge-warning">Reinvest</span></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="section-table mt-4">
                @include('layouts.message')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Investment History</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover data-table">
                                        <thead>
                                        <tr>
                                            <th>Package</th>
                                            <th>Capital</th>
                                            <th>Percentage</th>
                                            <th>ROI</th>
                                            <th>Created_On</th>
                                            <th>Status</th>
                                            <th>Maturity</th>
                                            <th>Withdrawn</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $investments as $investment)
                                            <tr>
                                                <td>{{$investment->package->name}}</td>
                                                <td>{{number_format($investment->capital)}}</td>
                                                <td>{{$investment->package->percentage}} %</td>
                                                <td>{{number_format((($investment->capital * $investment->package->percentage)/100) + $investment->capital) }}</td>
                                                <td>{{\Carbon\Carbon::parse($investment->created_at)->addHour()->format('M d Y H:i')}}</td>
                                                <td>
                                                    @if($investment->status == 1)
                                                        <span class="badge badge-success">Approved</span>
                                                    @else
                                                        <span class="badge badge-warning">Pending Confirmation</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($investment->maturity == 1)
                                                        <label class="badge badge-success">Matured</label>
                                                    @else
                                                        <label class="badge badge-danger">Not Due</label>
                                                    @endif
                                                </td>
                                                <td>@if($investment->withdrawn == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @switch($investment)
                                                        @case($investment->maturity == 1 && $investment->withdrawn == 1)
                                                        <span class="badge badge-success"> Completed</span>
                                                        @break
                                                        @case($investment->maturity == 1 && $investment->withdrawn == 0)
                                                        <a href="{{route('investment.withdraw', $hashIds->encode($investment->id))}}"
                                                           class="btn btn-primary withdraw"
                                                           style="padding: 10px; font-size: 1em; border-radius: 5px; border:none; margin-top: 10px;">Withdraw
                                                        </a>
                                                        @break
                                                        @default <span class="badge badge-warning">In progress</span>
                                                    @endswitch
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
            </div>

            <div class="section-chart">
                <div class="row">
                    <div class="col-md-12">
                        <!--Card-->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header">Line chart</div>

                            <!--Card content-->
                            <div class="card-body">

                                <canvas id="lineChart"></canvas>

                            </div>

                        </div>
                        <!--/.Card-->
                    </div>
                </div>
            </div>
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
