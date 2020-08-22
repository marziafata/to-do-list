{{-- create new to do --}}
@extends('todos.layout')

@section('content')
<div class="">
    <h1 class="text-2x1 mr-2">La tua prossima cosa da fare</h1>
    <x-alert/>
    <form method="post" action="{{route('todo.store')}}" class="py-5">
        @csrf
        <input type="text" name="title" class="p-2 border rounded">
        <input type="submit" value="Crea" class="p-2 border rounded">
    </form>
    <a href="{{route('todo.index')}}" class="m-5 p-2 bg-white cursor-pointer border rounded text-black">Indietro</a>
</div>
@endsection



