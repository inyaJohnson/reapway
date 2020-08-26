@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Registered Users</h2>
                        <p class="mb-md-0">List of all registered users</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                        </p>
                        <p class="text-primary mb-0 hover-cursor">Admin</p>
                    </div>
                </div>
                @include('layouts.quick-links')
            </div>
        </div>
    </div>
    @include('layouts.message')
    <div class="row big-screen">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users Awaiting Activation</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover investment-history">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    <button class="btn btn-primary confirm-activation"
                                            data-id="{{$user->id}}">Activate
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


    {{--        SMALL SCREEN--}}

    <div class="row small-screen">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users Awaiting Activation </h4>
                    <div>
                        @foreach( $users as $user)
                        <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                            <div class="sale-box-inner">
                                <div class="sale-box-head">
                                    <h4>{{$user->name}}</h4>
                                </div>
                                <ul class="sale-box-desc">
                                    <li>
                                        <strong>{{$user->email}}</strong>
                                        <span>Registered on {{$user->created_at->format('M d Y H:i')}}</span>
                                    </li>
                                    <li>
                                        <strong>{{$user->phone}}</strong>
                                    </li>
                                    <li>
                                        <strong>
                                            <button class="btn btn-primary confirm-activation"
                                                        data-id="{{$user->id}}">Activate
                                            </button>
                                        </strong>
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

