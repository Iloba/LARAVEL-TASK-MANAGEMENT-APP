<div>
    {{-- Livewire component --}}
    @if ($tasks->count() > 0)
    <h2 class="mb-3">My Tasks</h2>
    <div class="table-responsive">
        <table class="table table-bordered" wire:sortable="updateTaskOrder">
            <thead>
                    <tr>
                       
                        <th>
                            Task Name
                        </th>
                        
                        <th>
                            Task Priority
                        </th>
                       
                    </tr>
            </thead>
            
            <tbody>
            
                    @foreach ($tasks  as $task)
                        <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                            <td>{{$task->task_name}}</td>
                            <td>{{$task->priority}}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@else 
<p>You do not have any tasks yet</p>
@endif
</div>
</div>
