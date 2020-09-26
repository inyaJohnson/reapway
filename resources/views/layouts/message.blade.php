@if($errors->any())
    <div class="alert alert-danger" style="margin-top: 10px;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if($message = Session::get('success'))
    <div class="alert alert-success" style="margin-top: 10px;">
        {{$message}}
    </div>
@endif

@if($message = Session::get('custom_error'))
    <div class="alert alert-danger" style="margin-top: 10px;">
        {{$message}}
    </div>
@endif
