<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoroBest</title>

    <link href="/css/main.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex items-center justify-between px-4 py-6">
            <ul class="flex items-center">
                <li>
                    <a href="#" class="w-32">MoroBest</a>
                </li>
                <li class="ml-16">
                    <a href="#" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="ml-6">
                    <a href="#" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="ml-6">
                    <a href="#" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</body>

</html>
