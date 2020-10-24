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
                                <h4 class="card-title">Investors Request</h4>
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
                                                           href='/reapway/public/store/{{$request->attachment}}'
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


                {{--                SMALL SCREEN--}}
                <div class="row small-screen">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Investors Request</h4>
                                @foreach($requests as $request)
                                    <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                        <div class="sale-box-inner">
                                            <div class="sale-box-head">
                                                <h4>{{$request->name}}</h4>
                                            </div>
                                            <ul class="sale-box-desc">
                                                <li>
                                                    <strong>{{$request->subject}}</strong>
                                                    <span>{{$request->email}}</span>
                                                </li>
                                                <li>
                                                    <span> Created on - {{\Carbon\Carbon::parse($request->created_at)->addHour()->format('M d Y H:i')}}</span>
                                                    <span><a class="btn btn-primary request-message-btn" href="#"
                                                             data-toggle="modal"
                                                             data-target="#request-message-modal"
                                                             data-id="{{$request->id}}"
                                                             style="padding: 10px;">View</a>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        @if($request->attachment !== null)
                                                            <a class='btn btn-link'
                                                               href='/reapway/public/store/{{$request->attachment}}'
                                                               download>Download File</a>
                                                        @else
                                                            No File
                                                        @endif
                                                    </span>
                                                    <span>
                                                        @if($request->response_status == 1)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </span>
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
        @include('help.message-modal')
    </main>
@endsection
