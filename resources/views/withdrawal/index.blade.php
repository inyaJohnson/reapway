@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Withdrawal</h2>
                            <p class="mb-md-0">Reinvest your previous capital to withdraw your profit.</p>
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
                        <h4 class="card-title">Withdrawal Request</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover investment-history">
                                <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Price</th>
                                    <th>Percentage</th>
                                    <th>Profit</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $investments as $investment)
                                    <tr>
                                        <td>{{$investment->package->name}}</td>
                                        <td>{{$investment->package->price}}</td>
                                        <td>{{$investment->percentage}}</td>
                                        <td>{{$investment->profit}}</td>
                                        <td>
                                            @if($investment->reinvest !== 0 && $investment->reinvest !== 1)
                                                Completed
                                            @else
                                                <button
                                                    class="btn btn-danger reinvest @php echo (isset($investment) && $investment->reinvest != 0)? 'disabled':'';  @endphp"
                                                    style="padding: 10px; font-size: 1em; border-radius: 5px; border:none; margin-top: 10px;"
                                                    data-id={{$investment->id}}>Reinvest
                                                </button>
                                                <button
                                                    class="btn btn-warning withdraw @php echo (isset($investment) && $investment->reinvest != 1)? 'disabled':'';  @endphp"
                                                    style="padding: 10px; font-size: 1em; border-radius: 5px; border:none; margin-top: 10px;"
                                                    data-id={{$investment->id}}>Withdraw
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
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.investment-history').dataTable();
        })

        var failed = '/withdrawal';
        function sweetAlert(response, failed, redirectTo){
                if (response.success) {
                    Swal.fire(
                        'Successful!',
                        response.success,
                        'success'
                    ).then(function (result) {
                        if (result.value) {
                            window.location = redirectTo
                        }
                    })
                } else {
                    Swal.fire(
                        'Failed!',
                        response.error,
                        'error'
                    ).then(function (result) {
                        if (result.value) {
                            window.location = failed;
                        }
                    })
                }

        }
        $('.reinvest').on('click', function () {
            $.ajax({
                type: 'GET',
                url: 'investment/reinvest',
                data: {id: $(this).attr('data-id')},
                success: function (response) {
                    var redirectTo = 'transactions/deposit';
                    sweetAlert(response, failed, redirectTo)
                }

            })
        })

        $('.withdraw').on('click', function () {
            $.ajax({
                type: 'GET',
                url: 'investment/withdraw',
                data: {id: $(this).attr('data-id')},
                success: function (response) {
                    var redirectTo = 'transactions/withdrawal-request';
                    sweetAlert(response, failed, redirectTo)
                }
            })
        })
    </script>
@endsection
