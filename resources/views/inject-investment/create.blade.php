@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>Inject an Investment</h2>
                            <p class="mb-md-0">Set an already matured investment </p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor crumbs"><a href="{{route('home')}}">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                            </p>
                            <p class="text-primary mb-0 hover-cursor">Add Investment</p>
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

                        <div class="inject-investment">
                            <form action="{{route('inject-store')}}" method="POST">
                                <h4 class="card-title">Quick Maturity</h4>
                                @csrf
                                @include('layouts.message')
                                <div class="help-form-group">
                                    <select class="form-control" name="package" required>
                                        <option>Choose Package *</option>
                                        @foreach($packages as $package)
                                            <option value="{{$package->id}}">{{$package->name}}</option>
                                        @endforeach
                                    </select>
                                    <input class="form-control" type="number" placeholder="Percentage Return *"
                                           name="percentage"
                                           required
                                           value="{{old('percentage')}}">
                                </div>
                                <div class="help-form-group">
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                </div>
                                <div class="help-form-bottom">
                                    <div class="help-form-submit">
                                        <button type="submit" class="form-control btn btn-primary">Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
