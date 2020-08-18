<div>
    {{-- Metodo 1 con bitfumes --}}
{{-- @if (session()->has('message'))
<div class="alert alert-success">
    {{session()->get('message')}}
</div>
@elseif (session()->has('error'))
<div class="alert alert-danger">
    {{session()->get('error')}}
</div>
{{session()->forget('message')}}
@endif --}}

{{-- Metodo 2 stackoverflow --}}
@if (\Session::has('success'))
<div class="py-4 px-2 bg-green-300">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@elseif (\Session::has('error'))
<div class="py-4 px-2 bg-red-300">
    <ul>
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif

{{-- metodo 3 stackoverflow --}}
{{-- @if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@elseif (Session::has('error'))
<div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif --}}

</div>
