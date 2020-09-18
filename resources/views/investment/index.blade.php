@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Investments</h2>
                            <p class="mb-md-0">List of all your investments.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Investments</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        @include('layouts.statistics')
        <div class="row big-screen">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Investment History</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover investment-history">
                                <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Capital</th>
                                    <th>Percentage</th>
                                    <th>ROI</th>
                                    <th>Created At</th>
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
                                                <span class="badge badge-warning">Pending Deposit Confirmation</span>
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

        {{--        SMALL SCREEN--}}

        <div class="row small-screen">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Investment History</h4>
                        <div>
                            @foreach( $investments as $investment)
                                <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                    <div class="sale-box-inner">
                                        <div class="sale-box-head">
                                            <h4>{{$investment->package->name}}</h4>
                                        </div>
                                        <ul class="sale-box-desc">
                                            <li>
                                                <strong>Amount - {{number_format($investment->capital)}}</strong>
                                                <span>ROI - #{{number_format((($investment->capital * $investment->package->percentage)/100) + $investment->capital) }} @ {{$investment->package->percentage}}% Profit</span>
                                            </li>
                                            <li>
                                                <span>{{\Carbon\Carbon::parse($investment->created_at)->addHour()->format('M d Y H:i')}}</span>
                                                @if($investment->status == 1)
                                                    <span class="badge badge-success">Approved</span>
                                                @else
                                                    <span
                                                        class="badge badge-warning">Pending Deposit Confirmation</span>
                                                @endif
                                            </li>
                                            <li>
                                                @if($investment->maturity == 1)
                                                    <label class="badge badge-success">Matured</label>
                                                @else
                                                    <label class="badge badge-danger">Not Due</label>
                                                @endif
                                            </li>
                                            <li>@if($investment->withdrawn == 1)
                                                    <span style="color:black;">Withdrawn</span>
                                                @else
                                                    <span style="color:black;">Not Withdrawn</span>
                                                @endif
                                            </li>
                                            <li>
                                                @switch($investment)
                                                    @case($investment->maturity == 1 && $investment->withdrawn == 1)
                                                    <span class="badge badge-success"> Completed</span>
                                                    @break
                                                    @case($investment->maturity == 1 && $investment->withdrawn == 0)
                                                    <a href="{{route('investment.withdraw', $investment->id )}}"
                                                       class="btn btn-primary withdraw"
                                                       style="padding: 10px; font-size: 1em; border-radius: 5px; border:none; margin-top: 10px;">Withdraw
                                                    </a>
                                                    @break
                                                    @default <span class="badge badge-warning">In progress</span>
                                                @endswitch
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
@endsection
