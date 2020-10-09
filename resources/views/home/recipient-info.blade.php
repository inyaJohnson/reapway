@extends('layouts.modal')
@section('modal-id')
    recipient-modal
@overwrite
@section('modal-title')
    Recipient Information
@overwrite
@section('modal-content')
    <div class="recipient-account">
        <div class="account"><span class="mdi mdi-account"></span>Name: <span class="recipient-account-name"></span></div>
        <div class="account"><span class="mdi mdi-account-card-details"></span>Number: <span class="recipient-account-number"></span></div>
        <div class="account"><span class="mdi mdi-bank"></span>Bank: <span class="recipient-account-bank"></span></div>
        <div class="account"><span class="mdi mdi-phone"></span>Phone: <span class="recipient-account-phone"></span></div>
        <div class="account"><span class="mdi mdi-cash-multiple"></span>Amount: <span class="recipient-account-amount"></span></div>
    </div>
@overwrite
@section('modal-footer')
    <a type="button" class="btn btn-secondary" href="">Report</a>
    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
@overwrite

