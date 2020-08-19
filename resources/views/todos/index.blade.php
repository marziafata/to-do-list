{{-- all todos  --}}

@extends('todos.layout')
@section('content')
<h1 class="text-2x1">Tutte le cose da fare</h1>
    @foreach ($todos as $todo)
        <ul>
            <li>
                {{$todo->title}}
            </li>
        </ul>
    @endforeach
@endsection


