{{-- edit to do list --}}

@extends('todos.layout')
@section('content')

    <div class="">
        <div class="flex justify-between border-b px-2 pb-4">
            <h1 class="text-2x1">Aggiorna il tuo obbiettivo!</h1>
            <a href="{{route('todo.index')}}" class="mx-5 text-gray-400 cursor-pointer">
                <span class="fas fa-arrow-circle-left"></span>
            </a>
        </div>
        <x-alert/>
        <form method="post" action="{{route('todo.update', $todo->id)}}" class="py-5">
            @csrf
            @method('patch')
            <div class="py-1">
                <input type="text" name="title" value="{{$todo->title}}" class="p-2 border rounded">
            </div>
            <div class="py-1">
                <textarea name="description" id="" class="p-2 rounded border" placeholder="Descrizione">{{$todo->description}}</textarea>
            </div>
            <div class="py-1">
                <input type="submit" value="Modifica" class="p-2 border rounded">
            </div>
        </form>
    </div>

@endsection
