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
        <div class="content-wrapper">
            @include('layouts.statistics')
            <div class="section-table mt-4">
                <div class="row big-screen">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                {{--                        <h4 class="card-title">Investment History</h4>--}}
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover data-table">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            {{--                                    <th>Create At</th>--}}
                                            <th>Referral Code</th>
                                            <th>Num. of Inv.</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $users as $user)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone}}</td>
                                                {{--                                        <td>{{$user->created_at->format('M d Y')}}</td>--}}
                                                <td>{{$user->referral_code}}</td>
                                                <td>{{($user->investment !== null)?$user->investment->count():'No Investment Yet'}}</td>
                                                <td>@if($user->blocked == 0 )
                                                        <button class="btn btn-danger confirm-generic-block"
                                                                data-id="{{$user->id}}">Block
                                                        </button>
                                                    @else
                                                        <button class="btn btn-primary confirm-unblock"
                                                                data-id="{{$user->id}}">Unblock
                                                        </button>
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
    <!-- content-wrapper ends -->
@endsection
