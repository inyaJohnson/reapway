@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Investments</h2>
                            <p class="mb-md-0">Your analytics dashboard template.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Analytics</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                            <i class="mdi mdi-download text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-clock-outline text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-plus text-muted"></i>
                        </button>
                        <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.message')
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Investment History</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover investment-history">
                                <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Created At</th>
                                    <th>Price</th>
                                    <th>Percentage</th>
                                    <th>Duration</th>
                                    <th>Maturity</th>
                                    <th>Withdrawn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $investments as $investment)
                                    <tr>
                                        <td>{{$investment->package->name}}</td>
                                        <td>{{$investment->created_at}}</td>
                                        <td>{{number_format($investment->package->price)}}</td>
                                        <td>{{$investment->percentage}}</td>
                                        <td>{{$investment->duration}}</td>
                                        <td>@if($investment->maturity == 1)
                                                <label class="badge badge-success">Matured</label>
                                            @else
                                                <label class="badge badge-danger">Not Due</label>
                                            @endif</td>
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
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.investment-history').dataTable();
        })
    </script>
@endsection
