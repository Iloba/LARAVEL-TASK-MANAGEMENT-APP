{{-- create session messages to guide users --}}
@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>

@elseif(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>

    
@endif



{{-- loop through laravels error --}}
@if ($errors->all())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
         <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif
    