@extends('layouts.app')
@section('content')
@include('layouts.dashboard-header')

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
 