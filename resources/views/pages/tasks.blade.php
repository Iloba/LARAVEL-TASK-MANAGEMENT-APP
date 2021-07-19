@extends('layouts.app')
@section('content')
@include('layouts.dashboard-header')

                <div class="card-body">
                    @include('layouts.messages')
                    {{-- Tasks are fetched from a livewire component --}}
                    @livewire('tasks-table', ['tasks' => $tasks])
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 