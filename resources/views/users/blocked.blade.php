@extends("layouts.dashboard")
@section("main")
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
                                <h4 class="card-title">Suspended Users</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover data-table">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Join Date</th>
                                            <th>Num_of_Inv.</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{\Carbon\Carbon::parse($user->created_at)->addHour()->format('M d Y')}}</td>
                                                <td>{{($user->investment !== null)?$user->investment->count():'No Investment Yet'}}</td>
                                                <td>
                                                    <button class="btn btn-primary confirm-unblock"
                                                            data-id="{{$user->id}}">Unblock
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


                {{--                SMALL SCREEN--}}
                <div class="row small-screen">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Suspended users</h4>
                                @foreach($users as $user)
                                    <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                        <div class="sale-box-inner">
                                            <div class="sale-box-head">
                                                <h4>{{$user->name}}</h4>
                                            </div>
                                            <ul class="sale-box-desc">
                                                <li>
                                                    <strong>{{$user->email}}</strong>
                                                    <span>{{$user->phone}}</span>
                                                </li>
                                                <li>
                                                    <strong><button class="btn btn-primary confirm-unblock"
                                                                    data-id="{{$user->id}}">Unblock
                                                        </button></strong>
                                                </li>
                                                <li>
                                                    <strong>Joined on - {{\Carbon\Carbon::parse($user->created_at)->addHour()->format('M d Y')}}</strong>
                                                        <span> Num. of Inv. - {{($user->investment !== null)?$user->investment->count():'No Investment Yet'}}</span>
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
    <!-- content-wrapper ends -->
@endsection
