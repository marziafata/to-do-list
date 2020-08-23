<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7f25fd8a42.js" crossorigin="anonymous"></script>
    <title>Todos</title>
    @livewireStyles
</head>
<body>
    <div class="text-center flex justify-center pt-10">
        <div class="w-1/4 border border-gray-400 rounded py-4">
            @yield('content')
        </div>
    </div>

    @livewireScripts
</body>
</html>
