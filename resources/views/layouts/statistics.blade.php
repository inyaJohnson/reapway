@can('admin-actions')
    <div class="row">
        @include('layouts.quick-links')
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body dashboard-tabs p-0">
                    <div class="tab-content py-0 px-0">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                             aria-labelledby="overview-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div
                                    class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total Inv. ongoing</small>
                                        <div
                                            class="p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium"
                                            aria-haspopup="true" aria-expanded="false">
                                            <h5 class="mb-0 d-inline-block text-muted"><span>&#8358;</span> {{$totalInvestment}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi mdi-currency-ngn mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total Withdrawal</small>
                                        <h5 class="mr-2 mb-0 text-muted"><span>&#8358;</span> {{$totalWithdrawal}}</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Num. of Users</small>
                                        <h5 class="mr-2 mb-0 text-muted">{{$numOfUsers}}</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-cash-multiple mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Pending Inv.</small>
                                        <h5 class="mr-2 mb-0 text-muted">{{$pendingInvestment}}</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Num. of Inv.</small>
                                        <h5 class="mr-2 mb-0 text-muted">{{$totalNumberOfInvestment}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan
@include('layouts.message')
