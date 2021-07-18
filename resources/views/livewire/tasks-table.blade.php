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
                            {{-- <td>{{$task->id}}</td> --}}
                            <td>{{$task->task_name}}</td>
                          
                            <td>{{$task->priority}}</td>
                            {{-- <td><a class="btn btn-info" href="{{route('edit_task', $task->id)}}"><i class="icofont icofont-edit"></i></a></td>
                            <td>
                                <a onclick="
                                event.preventDefault();
                                if(confirm('are you sure you want to delete task')){
                                    document.getElementById('form-delete-{{$task->id}}').submit();
                                }
                                
                                
                                "; href="{{route('delete_task', $task->id)}}"  class="btn btn-danger" >
                                
                                <i class="icofont icofont-trash"></i>

                                </a>
                                </td>
                            <form style="display: none;" action="{{route('delete_task', $task->id)}}" method="POST"  id="{{'form-delete-'.$task->id}}" >
                                @csrf
                                @method('delete')
                            </form> --}}
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
