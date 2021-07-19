@extends('layouts.app')

@section('content')
@include('layouts.dashboard-header')

            <div class="card-body">
                @include('layouts.messages')
                <div class="form-section p-3">
                    <a href="{{route('home')}}">Back</a>
                    @if ($tasks->count() > 0)
                    @foreach ($tasks as $task)
                        <div class="card shadow-sm m-3 p-4">
                            {{$task->task_name}}
                        </div>
                        @endforeach

                    @else
                        <p class="text-center text-secondary">This project does not have any Tasks</p>
                    @endif
                </div>
                
                
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
