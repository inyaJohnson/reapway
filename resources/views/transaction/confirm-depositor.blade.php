@extends('layouts.modal')
@section('modal-id')
    confirm-deposit-modal
@overwrite
@section('modal-title')
    Payment from Recipient
@overwrite
@section('modal-content')
    <div class="confirm-deposit">
        <form id="confirm-deposit-form" enctype="multipart/form-data">
            @csrf
            <input type="file" name="attachment" class="form-control">
            <span>*Note: Document should not be more than 2Mb</span>
            <input type="hidden" name="transaction_id" id="transaction_id">
        </form>
        <div class="progress" style="height: 15px !important;">
            <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%; ">0%</div>
        </div>
        <br/>
        <div id="success"></div>
    </div>
@overwrite
@section('modal-footer')
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" form="confirm-deposit-form">Submit</button>
@overwrite

