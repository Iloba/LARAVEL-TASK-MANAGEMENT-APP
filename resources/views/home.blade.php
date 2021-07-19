@extends('layouts.app')

@section('content')
    @include('layouts.dashboard-header')

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
                    <div class="p-3">
                        <h3 class="text-center mb-4">Select Project to view Task</h3>
                        @foreach ($projects as $project)
                        <form action="{{route('getTasks', $project->id)}}" method="POST">
                        @endforeach
                      
                            @csrf
                            <select class="form-control mb-4" name="project_id" id="">
                                @foreach ($projects as $project)
                                    <option value="{{$project->id}}">{{$project->project_name}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success mb-4">
                                 View task
                            </button>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
