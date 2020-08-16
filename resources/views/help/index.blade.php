@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Respond to Client</h2>
                            <p class="mb-md-0">Issue assistance to clients complaints .</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a></p>
                            <p class="text-primary mb-0 hover-cursor">Complaints</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Client Request</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover request">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Responded</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $requests as $request)
                                    <tr>
                                        <td>{{$request->name}}</td>
                                        <td>{{$request->email}}</td>
                                        <td>{{$request->subject}}</td>
                                        <td>{{$request->created_at}}</td>
                                        <td><a  class="btn btn-primary request-message-btn" href="#" data-toggle="modal" data-target="#request-message-modal" data-id="{{$request->id}}" style="padding: 10px;">View</a></td>
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
@endsection
@include('help.message-modal')
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.request').dataTable();
            $('.request-message-btn').on('click', function () {
                var id = $(this).attr('data-id')
                $.ajax({
                    type:'GET',
                    url:'/help/'+id,
                    success:function (response) {
                        $('.modal-title span').text(response.name)
                        $('.modal-body h5').text(response.subject)
                        $('.modal-body p').text(response.message)
                        $('.modal-footer a').attr('href','/response/create/' +response.id)
                    }
                })
                $('#request-message-modal').modal();
            })
        })
    </script>
@endsection
