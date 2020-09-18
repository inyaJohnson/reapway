@extends('layouts.modal')
@section('modal-id')
    upload-withdrawal-payment-modal
@overwrite
@section('modal-title')
    Payment Proof
@overwrite
@section('modal-content')
    <div class="upload-withdrawal-payment">
        <form id="upload-withdrawal-payment-form" enctype="multipart/form-data">
            @csrf
            <input type="file" name="attachment" class="form-control">
            <span>*Note: Document should not be more than 2Mb</span>
            <input type="hidden" name="deposit_id" id="deposit_id">
        </form>
        <div class="progress" style="height: 15px !important;">
            <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%; ">0%</div>
        </div>
        <br/>
        <div id="success"></div>
    </div>
@overwrite
@section('modal-footer')
    <button type="button" class="btn btn-secondary">Close</button>
    <button type="submit" class="btn btn-primary" form="upload-withdrawal-payment-form">Submit</button>
@overwrite

