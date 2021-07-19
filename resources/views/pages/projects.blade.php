@extends('layouts.app')

@section('content')
<div class="container">
   @include('layouts.dashboard-header')

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
                                        <a class="btn btn-info" href="{{route('edit_project', $project->id)}}"> <i class="icofont icofont-edit text-light"></i></a>
                                    </div>

                                    <div>
                                        <a class="btn btn-danger" onclick="
                                        event.preventDefault();
                                        if(confirm('are you sure you want to delete task')){
                                            document.getElementById('form-delete-{{$project->id}}').submit();
                                        }
                                        
                                        
                                        "; href="{{route('delete_project', $project->id)}}"> <i class="icofont icofont-trash"></i></a> 
                                    </div>
                                   
                                </div>
                               
                                <form style="display: none;" action="{{route('delete_project', $project->id)}}" method="POST"  id="{{'form-delete-'.$project->id}}" >
                                    @csrf
                                    @method('delete')
                                </form> 
                                    
                                    
                            </div>
                            @endforeach
                        @else
                        <p class="text-secondary text-center">You dont have any projects</p>
                        @endif
                    </div>
                    {{$projects->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
