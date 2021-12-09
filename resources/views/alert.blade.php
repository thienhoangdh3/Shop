@if (count($errors) > 0)
    <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                {{ $err }}
            @endforeach
    </div>
@endif
@if(session('alert_error'))
    <div class="alert alert-danger">
        {{session('alert_error')}}
    </div>
@endif
@if (session('alert_success'))
    <div class="alert alert-success">
        {{session('alert_success')}}
    </div>
@endif
