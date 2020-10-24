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
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Packages</h4>
                                <div class="row">
                                    @foreach($packages as $package)
                                        <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                            <div class="sale-box-inner">
                                                <div class="sale-box-head">
                                                    <h4>{{$package->name}}</h4>
                                                </div>
                                                <ul class="sale-box-desc">
                                                    <li>
                                                        <strong>Price Range </strong>
                                                        <span>#{{number_format($package->mini_price)}} - #{{number_format($package->max_price)}}</span>
                                                    </li>
                                                    <li>
                                                        <strong>Up to {{$package->percentage}}% ROI</strong>
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
        </div>
    </main>
    <!-- content-wrapper ends -->
@endsection
