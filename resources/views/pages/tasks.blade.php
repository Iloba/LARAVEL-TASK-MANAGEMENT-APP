@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">Dashboard</a> | <a href="{{route('allprojects')}}">My Projects</a> | <a href="{{route('alltasks')}}">All Task</a></div>

                <div class="card-body">
                    @include('layouts.messages')
                    @livewire('tasks-table', ['tasks' => $tasks])
                    <div class="form-section p-3">
                      
                       

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 