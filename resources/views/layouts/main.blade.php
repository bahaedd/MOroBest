<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link href="/css/main.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-red-500">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between py-6">
            <ul class="flex flex-col md:flex-row items-center font-semibold">
                <li>
                    <a href="{{ url('/') }}" class="w-32 text-2xl">
                        <span class="text-red-600">MORO</span><span class="text-zinc-900">BEST</span></a>
                </li>
            </ul>
            <ul class="flex flex-col md:flex-row items-center font-semibold">
                <li class="md:ml-16 mt-3 md:mt-0 mr-4">
                    <a href="{{ url('/') }}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0 mr-4">
                    <a href="#" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0 mr-4">
                    <a href="#" class="hover:text-gray-300">Anime</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0 mr-4">
                    <a href="#" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown />
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <img src="{{url('/images/man.png')}}" alt="avatar" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    @livewireScripts
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function toggleModal() {
  document.getElementById('trailer').classList.toggle('hidden')
}
    </script>
</body>

</html>
