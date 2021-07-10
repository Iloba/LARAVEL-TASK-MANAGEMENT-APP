@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">Dashboard</a> | <a href="{{route('allprojects')}}">My Projects</a> | <a href="{{route('alltasks')}}">My Tasks</a></div>

                <div class="card-body">
                    @include('layouts.messages')
                    <div class="form-section p-3">
                        <h2 class="mb-3 text-secondary"> My Projects</h2>
                       

                        @if($projects->count() > 0)
                            
                            @foreach ($projects as $project)
                            <div class="card mb-3 p-3">
                                <div style="display: flex" class=" d-flex justify-content-between mb-3">
                                    <div>
                                        <a href="{{route('show_project', $project->id)}}">
                                        {{$project->project_name}}</a>
                                    </div>
                                   
                                    <div>   
                                        <a class="btn btn-info" href="#"> <i class="icofont icofont-edit text-light"></i></a>
                                    </div>

                                    <div>
                                        <a class="btn btn-danger" href="#"> <i class="icofont icofont-trash"></i></a> 
                                    </div>
                                   
                                </div>
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
                                                    <td>
                                                        <a onclick="
                                                        event.preventDefault();
                                                        if(confirm('are you sure you want to delete task')){
                                                            document.getElementById('form-delete-{{$task->id}}').submit();
                                                        }
                                                        
                                                        
                                                        "; href="{{route('delete_task', $task->id)}}"  class="btn btn-danger" >
                                                        
                                                        <i class="icofont icofont-trash"></i>
        
                                                        </a>
                                                        </td>
                                                    <form style="display: none;" action="{{route('delete_task', $task->id)}}" method="POST"  id="{{'form-delete-'.$task->id}}" >
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- {{$tasks}} --}}
                                    
                                    
                            </div>
                            @endforeach
                        @else
                        <p class="text-secondary text-center">You dont have any projects</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
