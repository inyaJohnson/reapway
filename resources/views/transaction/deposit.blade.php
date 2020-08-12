@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Deposit To Make</h2>
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
                        <h4 class="card-title">Deposits </h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover investment-history">
                                <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Date Matched</th>
                                    <th>Amount</th>
                                    <th>Depositor's Info</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->package->name}}</td>
                                        <td>{{$transaction->created_at}}</td>
                                        <td>{{$transaction->amount}}</td>
                                        <td><a class="btn btn-primary view-recipient" style="padding: 10px;" href="#" data-id={{$transaction->recipient_id}} data='{{$transaction->id}}'>View Recipient</a></td>
                                        <input value="{{$transaction->amount}}" id="amount{{$transaction->id}}" type="hidden">
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
    @include('transaction.recipient-info')
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.investment-history').dataTable();
            $('.view-recipient').on('click', function(){
                var id = $(this).attr('data-id');
                var transactionId = $(this).attr('data');
                var amount = $('#amount'+transactionId).val();
                $.ajax({
                    type: 'GET',
                    url: "show-recipient",
                    data: {id:id},
                    success : function (response) {
                        $('.user-account .user-account-bank').text(response.bank)
                        $('.user-account .user-account-name').text(response.name)
                        $('.user-account .user-account-number').text(response.number)
                        $('.user-account .user-account-phone').text(response.phone)
                        $('.user-account .user-account-amount').text(amount)
                    }
                })
                $('#recipient-modal').modal();
            })
        })
    </script>
@endsection
