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
    <main class="pt-5 mx-lg-5" id="withdraw">
        <div class="container-fluid">
            @can('admin-actions')
                @include('layouts.statistics')
            @endcan
            <div class="section-table mt-4">
                <div class="row big-screen">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Investments Approaching Maturity</h4>
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
                                        @foreach($nextToMature as $investment)
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
                                <h4 class="card-title">Investments Approaching Maturity</h4>
                                @foreach($nextToMature as $investment)
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
        </div>
    </main>

    @endsection
    <!--Main layout-->
    <!--Footer-->
    @section('footer')
        @include('layouts.footer')
    @endsection
    <!--/.Footer-->

    </body>
