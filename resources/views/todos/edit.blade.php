{{-- edit to do list --}}

@extends('todos.layout')
@section('content')

    <div class="">
        <h1 class="text-2x1 border-b pb-4">Modifica questa cosa da fare: </h1>
        <x-alert/>
        <form method="post" action="{{route('todo.update', $todo->id)}}" class="py-5">
            @csrf
            @method('patch')
            <input type="text" name="title" value="{{$todo->title}}" class="p-2 border rounded">
            <input type="submit" value="Modifica" class="p-2 border rounded">
        </form>
        <a href="/todo" class="m-5 p-2 bg-white cursor-pointer border rounded text-black">Indietro</a>
    </div>

@endsection
