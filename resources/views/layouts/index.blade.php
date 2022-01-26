@extends('layouts.main')
@section('title', 'MoroBest')
@section('content')
    <div class="container mx-auto px-4 pt-8">
        {{-- popular movies --}}
        <div class="popular-movies py-24">
            <h1 class="uppercase tracking-wider text-center text-red-600 text-2xl font-bold mb-4">Popular Movies</h1> {{-- tracking-wider => letter-spacing: 0.05em; => reference : https://tailwindcss.com/docs/letter-spacing --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach ($pmovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @endforeach
            </div>
        </div>
        {{-- top rated movies --}}
        <div class="top-rated-movies py-16">
            <h4 class="uppercase tracking-wider text-center text-red-600 text-2xl font-bold mb-4">Top Rated Movies</h1> {{-- tracking-wider => letter-spacing: 0.05em; => reference : https://tailwindcss.com/docs/letter-spacing --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach ($trmovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @endforeach
            </div>
        </div>
        {{-- now playing movies --}}
        <div class="now-playing-movies py-16">
            <h1 class="uppercase tracking-wider text-center text-red-600 text-2xl font-bold mb-4">Now playing</h1> {{-- tracking-wider => letter-spacing: 0.05em; => reference : https://tailwindcss.com/docs/letter-spacing --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach ($pmovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
