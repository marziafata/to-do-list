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
        <p>{{$todo->description}}</p>
    </div>
</div>
@endsection
