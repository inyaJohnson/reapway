@extends("layouts.dashboard")
@section("main")
    <!--Main layout-->
    <main class="pt-5 mx-lg-5" id="withdraw">
        <div class="container-fluid">
            @can('admin-actions')
                @include('layouts.statistics')
            @endcan
            <div class="section-table mt-4">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Investment History</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover data-table">
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
                                                <td>@if($investment->maturity)
                                                        <label class="badge badge-success">Matured</label>
                                                    @else
                                                        <label class="badge badge-danger">Not Due</label>
                                                    @endif</td>
                                                <td>@if($investment->withdrawn)
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
        </div>
    </main>
@endsection
