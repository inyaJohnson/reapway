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
            @include('layouts.statistics')
            <div class="section-table mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Investment History</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover investment-history">
                                        <thead>
                                        <tr>
                                            <th>Depositor's Name</th>
                                            <th>Package</th>
                                            <th>Created at</th>
                                            <th>Amount</th>
                                            <th>Proof of Payment</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($searchResult as $deposit)
                                            <tr>
                                                <td>{{$deposit->user->name}}</td>
                                                <td>{{$deposit->package->name}}</td>
                                                <td>{{\Carbon\Carbon::parse($deposit->created_at)->addHour()->format('M d Y H:i')}}</td>
                                                <td>{{number_format($deposit->amount)}}</td>
                                                <td>
                                                    @if($deposit->proof_of_payment !== null)
                                                        <a class="btn btn-primary" rel="noreferrer noopener"
                                                           target="_blank"
                                                           href="/store/{{$deposit->proof_of_payment}}"
                                                        >View
                                                            File</a>
                                                    @else
                                                        No proof yet
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($deposit->confirmation_status == 1)
                                                        <span class="badge badge-success">Approved</span>
                                                    @elseif($deposit->confirmation_status == 0)
                                                        <span class="badge badge-warning">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary confirm-deposit-btn"
                                                            data-id="{{$deposit->id}}">Confirm Payment
                                                    </button>
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
    </body>
