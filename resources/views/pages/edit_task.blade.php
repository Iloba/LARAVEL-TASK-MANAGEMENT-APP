@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} | <a href="{{route('allprojects')}}">My Projects</a> | <a href="{{route('alltasks')}}">All Task</a></div>

                <div class="card-body">
                    @include('layouts.messages')
                    <div class="form-section p-3">
                        <h2 class="mb-3">Edit my Tasks</h2>
                        <div class="card p-3 shadow">
                            <form action="{{route('update_task', $task->id)}}" method="POST">
                                @method('put')
                                @csrf
                                <input type="text" class="form-control mb-3" name="task_name" value="{{$task->task_name}}"> 
                                <input type="text" class="form-control mb-3" name="task_priority" value="{{$task->priority}}"> 
                                <button type="submit" class="btn btn-info">Update Task</button>
                            </form>
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 