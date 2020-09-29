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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Soon to mature investments</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover data-table">
                                        <thead>
                                        <tr>
                                            <th>Package</th>
                                            <th>Capital</th>
                                            <th>Percentage</th>
                                            <th>ROI</th>
                                            <th>Created At</th>
                                            <th>Maturity</th>
                                            <th>Withdrawn</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $nextToMature as $investment)
                                            <tr>
                                                <td>{{$investment->package->name}}</td>
                                                <td>{{number_format($investment->capital)}}</td>
                                                <td>{{$investment->package->percentage}} %</td>
                                                <td>{{number_format((($investment->capital * $investment->package->percentage)/100) + $investment->capital) }}</td>
                                                <td>{{\Carbon\Carbon::parse($investment->created_at)->addHour()->format('M d Y H:i')}}</td>
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
