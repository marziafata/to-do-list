@if ($todo->completed)
    <span onclick="event.preventDefault(); document.getElementById('form-incomplete-{{$todo->id}}').submit()" class="fas fa-check text-green-400 px-2 cursor-pointer"></span>
    <form action="{{route('todo.incomplete', $todo->id)}}" method="post" style="display:none" id="{{'form-incomplete-'. $todo->id}}">
    @csrf
    @method('delete')
    </form>
@else
    <span onclick="event.preventDefault(); document.getElementById('form-complete-{{$todo->id}}').submit()" class="fas fa-check cursor-pointer text-gray-300 px-2"></span>
    <form action="{{route('todo.complete', $todo->id)}}" method="post" style="display:none" id="{{'form-complete-'. $todo->id}}">
    @csrf
    @method('put')
    </form>
@endif
