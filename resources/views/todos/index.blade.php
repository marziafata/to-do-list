{{-- all todos  --}}

@extends('todos.layout')
@section('content')
<div class="flex justify-between border-b px-2 pb-4">
    <h1 class="text-2x1">Tutte le cose da fare</h1>
    <a href="{{route('todo.create')}}" class="mx-5 text-blue-400 cursor-pointer">
        <span class="fas fa-plus-circle"></span>
    </a>
</div>
<ul class="my-5">
    <x-alert/>
    @forelse ($todos as $todo)
        <li class="flex justify-between p-2 ">
            {{-- complete button --}}
            <div>
                @include('todos.completeButton')
            </div>

            {{-- title --}}
            @if ($todo->completed)
                <p class="line-through">{{$todo->title}}</p>
            @else
            <a class="cursor-pointer" href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a>
            @endif

            {{-- edit button --}}
            <div>
                <a href="{{route('todo.edit', $todo->id)}}" class="text-orange-400 cursor-pointer rounded text-white">
                    <span class="fas fa-edit px-2"></span>
                </a>
                <a href="{{route('todo.destroy', $todo->id)}}" class="text-red-500 cursor-pointer rounded text-white">
                    <span class="fas fa-trash px-2" onclick="event.preventDefault();
                        if(confirm('Sei sicuro di voler cancellare questa nota?')) {
                            document.getElementById('form-delete-{{$todo->id}}').submit()
                        }">
                    </span>
                </a>
                <form action="{{route('todo.destroy', $todo->id)}}" method="post" style="display:none" id="{{'form-delete-'. $todo->id}}">
                @csrf
                @method('delete')
                </form>
            </div>
        </li>
    @empty

        <p>Non hai niente da fare:</p>
        <p>scrivi il tuo primo obbiettivo!</p>

    @endforelse

</ul>

@endsection


