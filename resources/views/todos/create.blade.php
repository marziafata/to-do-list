{{-- create new to do --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Todos</title>
</head>
<body>
    <div class="text-center pt-10">
        <h1 class="text-2x1">La tua prossima cosa da fare</h1>
        {{-- <x-alert/> --}}
        <form class="py-5" action="/todos/create" method="post">
            @csrf
            <input class="p-2 border rounded" type="text" name="title">
            <input class="p-2 border rounded" type="submit" value="Crea">
        </form>
    </div>
</body>
</html>
