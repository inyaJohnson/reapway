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
    </div>
@overwrite
@section('modal-footer')
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" form="confirm-deposit-form">Submit</button>
@overwrite

