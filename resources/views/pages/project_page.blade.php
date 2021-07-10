
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} | <a href="{{route('allprojects')}}">My Projects</a> | <a href="{{route('alltasks')}}">My Tasks</a></div>

                <div class="card-body">
                    <div class="form-section p-3">
                        <h2 class="mb-3 text-secondary"> My Projects</h2>
                      
                            <div class="card bg-info text-light shadow mb-4 p-3">
                               <h2> <i style="font-size: 30px;" class="icofont icofont-calendar"></i> {{$project->project_name}}</h2> 
                               <p class="ml-3"> {{$project->project_description}}</p>
                            </div>
                            {{-- {{$tasks}} --}}
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
