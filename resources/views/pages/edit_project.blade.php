@extends('layouts.app')
@section('content')
@include('layouts.dashboard-header')

                <div class="card-body">
                    @include('layouts.messages')
                    <div class="form-section p-3">
                        <h2 class="mb-3">Edit my Tasks</h2>
                        <div class="card p-3 shadow">
                            <form action="{{route('update_project', $project->id)}}" method="POST">
                                @method('put')
                                @csrf
                                <input type="text" class="form-control mb-3" name="project_name" value="{{$project->project_name}}"> 
                                <input type="text" class="form-control mb-3" name="project_description" value="{{$project->project_description}}"> 
                                <button type="submit" class="btn btn-info">Update Project</button>
                            </form>
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 