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
        <div class="container-fluid">
            @include('layouts.statistics')
            <div class="section-table mt-4">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card package-creator">
                            <div class="card-body">
                                <h4 class="card-title">Create Package</h4>
                                <form method="POST" action="{{route('packages.store')}}" >
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Package Name" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="description"
                                               placeholder="Package Description" value="{{old('description')}}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="mini_price"
                                                   placeholder="Minimum Price" value="{{old('mini_price')}}"/>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="max_price"
                                                   placeholder="Maximum Price" value="{{old('max_price')}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="percentage"
                                                   placeholder="Percentage Profit"
                                                   value="{{old('percentage')}}"/>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="duration"
                                                   placeholder="Maturity Duration" value="{{old('duration')}}"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
