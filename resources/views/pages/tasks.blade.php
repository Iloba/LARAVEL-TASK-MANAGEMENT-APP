@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">Dashboard</a> | <a href="{{route('allprojects')}}">My Projects</a> | <a href="{{route('alltasks')}}">All Task</a></div>

                <div class="card-body">
                    @include('layouts.messages')
                    <div class="form-section p-3">
                        <h2 class="mb-3">My Tasks</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                        <tr>
                                            <th>
                                                S/NO
                                            </th>
                                            <th>
                                                Task Name
                                            </th>
                                            <th>
                                                Task Priority
                                            </th>
                                            <th>
                                                Edit
                                            </th>
                                            <th>
                                                Delete
                                            </th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks  as $task)
                                        <tr>
                                            <td>{{$task->id}}</td>
                                            <td><div class="card p-3 shadow-sm">{{$task->task_name}}</div></td>
                                            <td>{{$task->priority}}</td>
                                            <td><a class="btn btn-info" href="{{route('edit_task', $task->id)}}"><i class="icofont icofont-edit"></i></a></td>
                                            <td><a class="btn btn-danger" href="{{route('delete_task', $task->id)}}" onclick="
                                                event.preventDefault();
                                                if(confirm('are you sure you want to delete task')){
                                                    document.getElementById('form-delete-{{$task->id}}').submit();
                                                }
                                                
                                                
                                                "><i class="icofont icofont-trash"></i></a></td>
                                            <form style="display: none" action="{{route('delete_task', $task->id)}}" method="POST"  id="{{'form-delete-'.$task->id}}" >
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 