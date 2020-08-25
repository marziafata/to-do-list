{{-- modifica step intermedi --}}
<div>
    <div class="flex justify-center px-2 pb-4">
        <h2 class="text-lg">Modifica uno step intermedio</h2>
        <span wire:click="increment" class="fas fa-plus-circle text-blue-400 cursor-pointer px-2 py-1"></span>
    </div>

    @foreach ($steps as $step)
    <div class="py-2" wire:key="{{$loop->index}}">
        <input value="{{$step['name']}}" type="text" name="stepName[]" class="p-2 border rounded" placeholder="{{'Descrivi step '. ($loop->index)}}">
        <input value="{{$step['id']}}" type="hidden" name="stepId[]">
        <span class="fas fa-times text-red-400 p-2 cursor-pointer" wire:click="remove({{$loop->index}})"></span>
    </div>
    @endforeach
</div>
