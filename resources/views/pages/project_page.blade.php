
@extends('layouts.app')

@section('content')
@include('layouts.dashboard-header')
          

<div class="card-body">
    <div class="form-section p-3">
        <h2 class="mb-3 text-secondary"> My Projects</h2>
        
            <div class="card bg-info text-light shadow mb-4 p-3">
                <h2> <i style="font-size: 30px;" class="icofont icofont-calendar"></i> {{$project->project_name}}</h2> 
                <p class="ml-3"> {{$project->project_description}}</p>
                <h5 class="ml-3">All Tasks</h5>
                @if ($tasks->count() > 0)
                    
                    <table class="table">
                        <thead>
                                <tr>
                                    
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
                                    <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                                        {{-- <td>{{$task->id}}</td> --}}
                                        <td>{{$task->task_name}}</td>
                                        <td>{{$task->priority}}</td>
                                        <td><a class="btn btn-light" href="{{route('edit_task', $task->id)}}"><i class="icofont icofont-edit"></i></a></td>
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
                    
                @else
                    <p>You do not have any tasks on this project yet..please add some below</p>
                @endif
            </div>
            
            @include('layouts.messages')
            
            <div class="bg-primary p-4 shadow mt-5">
            <h2 class="mb-3 text-secondary text-light">Add Tasks to project</h2>
                <form action="{{route('add_task', $project->id)}}" method="POST">
                    @csrf
                    <input type="text" name="task_name" class="form-control mb-3" placeholder="Enter Task">
                    <input type="text" name="task_priority" class="form-control mb-3" placeholder="Enter Task Priority">
                    <button type="submit" class="btn btn-light">Add Task</button>
                </form>
            </div>
        
    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
