{{-- show a single to do --}}
@extends('todos.layout')

@section('content')
<div class="">
    <div class="flex justify-between border-b px-2 pb-4">
        <h1 class="text-2x1">{{$todo->title}}</h1>
        <a href="{{route('todo.index')}}" class="mx-5 text-gray-400 cursor-pointer">
            <span class="fas fa-arrow-circle-left"></span>
        </a>
    </div>
</div>
<div>
    <div>
        <h3 class="text-lg">Descrizione</h3>
        <p>{{$todo->description}}</p>
    </div>

    @if($todo->steps->count() > 0)
    <div class="py-4">
        <h3 class="text-lg">Tutti i passaggi</h3>
        @foreach ($todo->steps as $step)
        <p>{{$step->name}}</p>
        @endforeach
    </div>
    @endif
</div>
@endsection
