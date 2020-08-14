@extends('layouts.modal')
@section('modal-id')
    recipient-modal
@overwrite
@section('modal-title')
    Your Match
@overwrite
@section('modal-content')
    <div class="user-account">
        <div class="account"><span class="mdi mdi-account"></span>Name: <span class="user-account-name"></span></div>
        <div class="account"><span class="mdi mdi-account-card-details"></span>Number: <span class="user-account-number"></span></div>
        <div class="account"><span class="mdi mdi-bank"></span>Bank: <span class="user-account-bank"></span></div>
        <div class="account"><span class="mdi mdi-phone"></span>Phone: <span class="user-account-phone"></span></div>
        <div class="account"><span class="mdi mdi-cash-multiple"></span>Amount: <span class="user-account-amount"></span></div>
    </div>
@overwrite
@section('modal-footer')
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
@overwrite

