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
                        <h2 class="mb-3">Create Project</h2>
                        <form action="{{route('create_project')}}" method="POST">
                            @csrf
                            <input type="text" name="project_name" class="form-control mb-3" placeholder="Project Name">
                            <textarea name="project_description" class="form-control mb-3" id="" cols="30" rows="4" placeholder="Enter Project Description"></textarea>
                            <button type="submit" class="btn btn-info">Create Project</button>
                        </form>
                    </div>
                    @if ($projects->count() > 0)
                        <h3 class="mb-3 text-center">Select Project to View Task</h3>
                        <div class="all-projects p-4">
                            <select name="" class="form-control" id="">
                                @foreach ($projects as $project)
                                <option value="{{$project->project_name}}">{{$project->project_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    @else
                    <p>You do not have any projects</p>
                    @endif
                    
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
