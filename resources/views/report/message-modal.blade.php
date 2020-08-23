@extends('layouts.modal')

@section('modal-id')
    report-message-modal
@overwrite

@section('modal-title')
    Message from <span id="client-name"></span>
@overwrite

@section('modal-content')
    <h5></h5>
    <p></p>
@overwrite

@section('modal-footer')
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
@overwrite
