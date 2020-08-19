@extends('layouts.modal')
@section('modal-id')
    referrer-modal
@overwrite
@section('modal-title')
    Who Referred You?
@overwrite
@section('modal-content')
    <div class="referrer-div">
        <form id="referrer-form">
            @csrf
            <input type="text" name="referrer_code" class="form-control" placeholder="Enter referrer code" required>
            <span>*Note: You can get referral code from the person that introduced you to RocketPay</span>
        </form>
    </div>
@overwrite
@section('modal-footer')
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" form="referrer-form">Submit</button>
@overwrite

