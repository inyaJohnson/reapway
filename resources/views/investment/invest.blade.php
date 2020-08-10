@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Packages</h2>
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
            @foreach($availablePackages as $package)
                <div class="col-lg-4 grid-margin stretch-card">
                    <div class="package card-body">
                        <div class="package_icon_wrap text-center">
                            <div class="package_icon">
                                <span class="mdi mdi-cash-multiple "></span>
                            </div>
                        </div>
                        <div class="package_info text-center">
                            <span>{{$package->name}}</span>
                            <h3>#{{$package->price}}</h3>
                        </div>
                        <div class="package_service_content">
                            <p> Get return {{$package->percentage}}% in {{$package->duration}} Days</p>
                            <form method="POST" action="{{route('investment.store')}}">
                                @csrf
                                <input type="hidden" name="package_id" value={{$package->id}} />
                                <input type="hidden" name="package_price" value={{$package->price}} class="package_price" />
                                <div class="invest_btn text-center">
                                    <button class="invest_submit" type="button">Invest Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.invest_submit').on('click', function () {
                // window.alert("hello")
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to invest #" + $(this).parents('form').children('.package_price').val() + "!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Invest Now!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Congrats',
                            'Your investment was successful',
                            'success'
                        ).then(()=>{
                            var form = $(this).parents('form:first');
                            form.submit();
                        })
                    }
                })
            })
        })
    </script>
@endsection

