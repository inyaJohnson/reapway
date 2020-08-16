@extends('layouts.modal')

@section('modal-id')
    request-message-modal
@overwrite

@section('modal-title')
    Message from <span id="client-name"></span>
@overwrite

@section('modal-content')
    <h5></h5>
    <p></p>
@overwrite

@section('modal-footer')
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary response-link" href="">Reply</a>
@overwrite
