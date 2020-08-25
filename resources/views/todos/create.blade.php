{{-- create new to do --}}
@extends('todos.layout')

@section('content')
<div class="">
    <div class="flex justify-between border-b px-2 pb-4">
        <h1 class="text-lg">Scrivi un obbiettivo!</h1>
        <a href="{{route('todo.index')}}" class="mx-5 text-gray-400 cursor-pointer">
            <span class="fas fa-arrow-circle-left"></span>
        </a>
    </div>
    <x-alert/>
    <form method="post" action="{{route('todo.store')}}" class="py-5">
        @csrf
        <div class="py-1">
            <input type="text" name="title" class="p-2 border rounded" placeholder="Titolo">
        </div>
        <div class="py-1">
            <textarea name="description" id="" class="p-2 rounded border" placeholder="Descrizione"></textarea>
        </div>

        {{-- aggiungi step intermedi --}}
        <div class="py-2">
            @livewire('step')
        </div>

        <div class="py-1">
            <input type="submit" value="Crea" class="p-2 border rounded">
        </div>
    </form>
</div>
@endsection



