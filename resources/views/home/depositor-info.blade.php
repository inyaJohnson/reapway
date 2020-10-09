@extends('layouts.modal')
@section('modal-id')
    depositor-modal
@overwrite
@section('modal-title')
    Depositor Information
@overwrite
@section('modal-content')
    <div class="depositor-account">
        <div class="account"><span class="mdi mdi-account"></span>Name: <span class="depositor-account-name"></span></div>
        <div class="account"><span class="mdi mdi-account-card-details"></span>Number: <span class="depositor-account-number"></span></div>
        <div class="account"><span class="mdi mdi-bank"></span>Bank: <span class="depositor-account-bank"></span></div>
        <div class="account"><span class="mdi mdi-phone"></span>Phone: <span class="depositor-account-phone"></span></div>
        <div class="account"><span class="mdi mdi-cash-multiple"></span>Amount: <span class="depositor-account-amount"></span></div>
    </div>
@overwrite
@section('modal-footer')
    <a type="button" class="btn btn-secondary" href="">Report</a>
    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
@overwrite

