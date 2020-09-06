@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Client Report</h2>
                            <p class="mb-md-0">Verify reports and take action.</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Reports</p>
                        </div>
                    </div>
                    @include('layouts.quick-links')
                </div>
            </div>
        </div>
        <div class="row big-screen">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Client Report</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover report">
                                <thead>
                                <tr>
                                    <th>Name Report</th>
                                    <th>Defaulter</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $reports as $report)
                                    <tr>
                                        <td>{{$report->user_name}}</td>
                                        <td>{{$report->defaulter_name}}</td>
                                        <td>{{$report->subject}}</td>
                                        <td>{{\Carbon\Carbon::parse($report->created_at)->addHour()->format('M d Y H:i')}}</td>
                                        <td><button class="btn btn-primary report-message-btn" data-id="{{$hashIds->encode($report->id)}}"
                                                    style="padding: 10px;">View Report</button></td>
                                        <td>{!! ($report->status == 1)? "<span class='text-success'>Processed</span>":"<span class='text-danger'>New</span>"!!}</td>
                                        <td>
                                            <form id="report-ids">
                                                @csrf
                                                <input type="hidden" name="report_id" value="{{$report->id}}"/>
                                                <input type="hidden" name="defaulter_id"
                                                       value="{{$report->defaulter_id}}"/>
                                                <button type="submit" class="btn btn-danger confirm-block"
                                                        {{($report->status)?'disabled':''}} style="padding: 10px; margin-top: 15px;">
                                                    Block
                                                </button>
                                            </form>
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

        <div class="row small-screen">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Client Request</h4>
                        <div>
                            @foreach( $reports as $report)
                                <div class="col-md-3 sale-box wow fadeInUp" data-wow-iteration="1">
                                    <div class="sale-box-inner">
                                        <div class="sale-box-head">
                                            <h4>{{$report->user_name}}</h4>
                                        </div>
                                        <ul class="sale-box-desc">
                                            <li>
                                                <strong>Defaulter - {{$report->defaulter_name}}</strong>
                                                <span>{{$report->subject}}</span>
                                            </li>

                                            <li><strong><button class="btn btn-primary report-message-btn" data-id="{{$hashIds->encode($report->id)}}"
                                                           style="padding: 10px;">View Report</button></strong>
                                                <span>{{\Carbon\Carbon::parse($report->created_at)->addHour()->format('M d Y H:i')}}</span>
                                            </li>
                                            <li>
                                                <form id="report-ids">
                                                    @csrf
                                                    <input type="hidden" name="report_id" value="{{$report->id}}"/>
                                                    <input type="hidden" name="defaulter_id"
                                                           value="{{$report->defaulter_id}}"/>
                                                    <button type="submit" class="btn btn-danger confirm-block"
                                                            {{($report->status)?'disabled':''}} style="padding: 10px; margin-top: 15px;">
                                                        Block
                                                    </button>
                                                </form>
                                                <span>{!! ($report->status == 1)? "<span class='text-success'>Processed</span>":"<span class='text-danger'>New</span>"!!}</span>

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
@include('report.message-modal')
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.report').dataTable();
            $('.report-message-btn').on('click', function () {
                var id = $(this).attr('data-id')
                $('#report-message-modal').modal('show');
                $.ajax({
                    type: 'GET',
                    url: '/report/show/' + id,
                    success: function (response) {
                        $('.modal-title span').text(response.name)
                        $('.modal-body h5').text(response.subject)
                        $('.modal-body p').text(response.message)
                        if (response.attachment !== null)
                            var link = "/rocket_pay/public/store/" + response.attachment
                        $('.modal-footer').append(`<a class='btn btn-primary' href=${link}  download>Download File</a>`)
                    }
                })
                $('#report-message-modal').on('hidden.bs.modal', function () {
                    location.reload();
                })
            })
        })
    </script>
@endsection
