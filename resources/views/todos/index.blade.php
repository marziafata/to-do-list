{{-- all todos  --}}

@extends('todos.layout')
@section('content')
<div class="flex justify-between">
    <h1 class="text-2x1">Tutte le cose da fare</h1>
    <a href="/todos/create" class="mx-5 p-1 bg-blue-400 cursor-pointer rounded text-white">Nuovo</a>
</div>
<ul class="my-5">
    <x-alert/>
    @foreach ($todos as $todo)
        <li class="flex justify-between my-3">
            <p>
                {{$todo->title}}
            </p>
            <a href="{{'/todos/' . $todo->id . '/edit'}}" class="mx-5 p-1 bg-green-400 cursor-pointer rounded text-white">
                Modifica
            </a>
        </li>
    @endforeach
</ul>

@endsection


