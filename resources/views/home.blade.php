{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--    <div class="content-wrapper">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12 grid-margin">--}}
{{--                <div class="d-flex justify-content-between flex-wrap">--}}
{{--                    <div class="d-flex align-items-end flex-wrap">--}}
{{--                        <div class="mr-md-3 mr-xl-5">--}}
{{--                            <h2>Welcome back,</h2>--}}
{{--                            <p class="mb-md-0">Your user dashboard and statistics.</p>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex">--}}
{{--                            <i class="mdi mdi-home text-muted hover-cursor"></i>--}}
{{--                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>--}}
{{--                            </p>--}}
{{--                            <p class="text-primary mb-0 hover-cursor">Dashboard</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @include('layouts.quick-links')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('layouts.statistics')--}}
{{--        <div class="row ">--}}
{{--            <div class="col-md-6 grid-margin stretch-card" id="deposit-section">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="history-panel">--}}
{{--                            <div class="profile-panel-heading card-title">--}}
{{--                                Deposit Match--}}
{{--                            </div>--}}
{{--                            <div class="profile-panel-body">--}}
{{--                                @if(!$deposits->isEmpty())--}}
{{--                                    @foreach($deposits as $deposit)--}}
{{--                                        <div class="sale-box wow fadeInUp" data-wow-iteration="1">--}}
{{--                                            <div class="sale-box-inner">--}}
{{--                                                <div class="sale-box-head">--}}
{{--                                                    <h4>{{$deposit->package->name}}</h4>--}}
{{--                                                </div>--}}
{{--                                                <ul class="sale-box-desc">--}}
{{--                                                    <li>--}}
{{--                                                        <strong>Amount - {{number_format($deposit->amount)}}</strong>--}}
{{--                                                        <span>Matched on {{\Carbon\Carbon::parse($deposit->created_at)->addHour()->format('M d Y H:i')}}</span>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <strong><a class="btn btn-primary view-recipient"--}}
{{--                                                                   href="javascript:void(0)"--}}
{{--                                                                   data-id={{$deposit->recipient_id}} data='{{$deposit->id}}'>View--}}
{{--                                                                Recipient</a></strong>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <button class="btn btn-primary upload-payment-btn"--}}
{{--                                                                data-id="{{$deposit->id}}">Upload Proof--}}
{{--                                                        </button>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        @if($deposit->proof_of_payment !== null)--}}
{{--                                                            <a class="btn btn-link"--}}
{{--                                                               href="/rocket_pay/public/store/{{$deposit->proof_of_payment}}"--}}
{{--                                                               download>Download--}}
{{--                                                                File</a>--}}
{{--                                                        @endif--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        @if($deposit->depositor_status == 1 && $deposit->recipicent_status == 0  )--}}
{{--                                                            <span class="text-danger">Awaiting Confirmation</span>--}}
{{--                                                        @elseif($deposit->depositor_status == 0)--}}
{{--                                                            <span class="text-waring">New</span>--}}
{{--                                                        @endif--}}
{{--                                                    </li>--}}
{{--                                                    <input value="{{$deposit->amount}}" id="amount{{$deposit->id}}"--}}
{{--                                                           type="hidden">--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                @else--}}
{{--                                    <div class="latest-investment">--}}
{{--                                        <div class="text-muted">Invest in any of our packages and start earning today...</div>--}}
{{--                                        <div>--}}
{{--                                            <a type="button" class="btn btn-primary"--}}
{{--                                               href="{{route('investment.invest')}}">Invest--}}
{{--                                                Now</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-6 grid-margin stretch-card" id="withrawal-section">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="history-panel">--}}
{{--                            <div class="profile-panel-heading card-title">Withdrawal Match--}}
{{--                            </div>--}}
{{--                            <div class="profile-panel-body">--}}
{{--                                @if(!$withdrawals->isEmpty())--}}
{{--                                    @foreach($withdrawals as $withdrawal)--}}
{{--                                        <div class="sale-box wow fadeInUp" data-wow-iteration="1">--}}
{{--                                            <div class="sale-box-inner">--}}
{{--                                                <div class="sale-box-head">--}}
{{--                                                    <h4>{{$withdrawal->package->name}}</h4>--}}
{{--                                                </div>--}}
{{--                                                <ul class="sale-box-desc">--}}
{{--                                                    <li>--}}
{{--                                                        <strong>Amount - {{number_format($withdrawal->amount)}}</strong>--}}
{{--                                                        <span>Matched on - {{\Carbon\Carbon::parse($withdrawal->created_at)->addHour()->format('M d Y  H:i')}}</span>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <strong><a class="btn btn-primary view-depositor" href="#"--}}
{{--                                                                   data-id={{$withdrawal->depositor_id}} data='{{$withdrawal->id}}'>View--}}
{{--                                                                Depositor</a></strong>--}}

{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <button class="btn btn-primary confirm-withrawal"--}}
{{--                                                                data-id="{{$withdrawal->id}}">Confirm Payment--}}
{{--                                                        </button>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        @if($withdrawal->proof_of_payment !== null)--}}
{{--                                                            <a class='btn btn-link'--}}
{{--                                                               href='/rocket_pay/public/store/{{$withdrawal->proof_of_payment}}'--}}
{{--                                                               download>Download File</a>--}}
{{--                                                        @endif--}}
{{--                                                    </li>--}}
{{--                                                    <input value="{{$withdrawal->amount}}"--}}
{{--                                                           id="amount{{$withdrawal->id}}"--}}
{{--                                                           type="hidden">--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                @else--}}
{{--                                    <div class="latest-investment">--}}
{{--                                        <div class="text-muted">Invest in any of our packages and start earning today...--}}
{{--                                            You are expected to recommit 100% your investment before profit withdrawal--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}{{--                <img src="{{asset('assets/images/banner-2.jpg')}}" alt="banner" height="200px"/>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- content-wrapper ends -->--}}

{{--@endsection--}}

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
                            <tr>
                                <td>#1,000,000</td>
                                <td><small>2/10/2020</small></td>
                                <td><span class="badge badge-light">Approved</span></td>
                            </tr>
                            <br/>

                            <tr>
                                <td>#1,000,000</td>
                                <td>---</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                            </tr>

                            <tr>
                                <td>#1,000,000</td>
                                <td>---</td>
                                <td><span class="badge badge-warning">Pending</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="dashboard-flash-card bg-success darken-2 ">
                        <h6 class="font-weight-bold text-center">Investment + ROI</h6>
                        <table>
                            <tr>
                                <td>#1,000,000</td>
                                <td><small>2/10/2020</small></td>
                                <td><span class="badge badge-light">Approved</span></td>
                            </tr>
                            <br/>
                            <tr>
                                <td>#1,000,000</td>
                                <td>---</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>#1,000,000</td>
                                <td>---</td>
                                <td><span class="badge badge-warning">Pending</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="dashboard-flash-card success-color-dark darken-2 ">
                        <h6 class="font-weight-bold text-center">Balance</h6>
                        <h4 class="font-weight-bold text-center">₦ {{number_format(auth()->user()->actual_balance, 2)}}</h4>
                        <p class="text-center small">{{\Carbon\Carbon::now()->format('M d Y H:i')}}</p>
                        <div class="row">
                            <div class="col-md-6 mx-auto text-center">
                                <a href="{{route('withdrawal')}}" ><span class="badge badge-light ">Withdraw</span></a>
                                <a href="{{route('investment.reinvest')}}" ><span class="badge badge-warning">Reinvest</span></a>
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
