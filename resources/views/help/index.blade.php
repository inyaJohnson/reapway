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
                                <h4 class="card-title">Client Request</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover data-table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Message</th>
                                            <th>File</th>
                                            <th>Responded</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $requests as $request)
                                            <tr>
                                                <td>{{$request->name}}</td>
                                                <td>{{$request->email}}</td>
                                                <td>{{$request->subject}}</td>
                                                <td>{{\Carbon\Carbon::parse($request->created_at)->addHour()->format('M d Y H:i')}}</td>
                                                <td><a class="btn btn-primary request-message-btn" href="#"
                                                       data-toggle="modal"
                                                       data-target="#request-message-modal" data-id="{{$request->id}}"
                                                       style="padding: 10px;">View</a></td>
                                                <td>@if($request->attachment !== null)
                                                        <a class='btn btn-link'
                                                           href='/rocket_pay/public/store/{{$request->attachment}}'
                                                           download>Download File</a>
                                                    @else
                                                        No File
                                                    @endif
                                                </td>
                                                <td>@if($request->response_status == 1)
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
        @include('help.message-modal')
    </main>
@endsection
