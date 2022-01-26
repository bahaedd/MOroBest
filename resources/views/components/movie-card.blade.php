<div class="mt-8 max-w-sm rounded overflow-hidden shadow-lg shadow-slate-900 hover:opacity-75 transition ease-in-out duration-150">
    <a href="{{ route('movies.show', ['movie' => $movie['id']]) }}">
        <img src="https://image.tmdb.org/t/p/original/{{$movie['poster_path']}}" alt="poster" class="w-full">
    </a>
    <div class="p-3">
        <div class="mt-4 text-red-600">
            <a href="{{ route('movies.show', ['movie' => $movie['id']]) }}" class="flex items-center font-bold text-md mb-4 mt-2">{{$movie['original_title']}}</a>
        </div>
        <div class="mt-4">
        <div class="flex items-center text-white-900 text-sm mt-1">
            <svg class="fill-current text-orange-500 color-orange-500 w-4" viewBox="0 0 20 20">
                <path d="M17.684,7.925l-5.131-0.67L10.329,2.57c-0.131-0.275-0.527-0.275-0.658,0L7.447,7.255l-5.131,0.67C2.014,7.964,1.892,8.333,2.113,8.54l3.76,3.568L4.924,17.21c-0.056,0.297,0.261,0.525,0.533,0.379L10,15.109l4.543,2.479c0.273,0.153,0.587-0.089,0.533-0.379l-0.949-5.103l3.76-3.568C18.108,8.333,17.986,7.964,17.684,7.925 M13.481,11.723c-0.089,0.083-0.129,0.205-0.105,0.324l0.848,4.547l-4.047-2.208c-0.055-0.03-0.116-0.045-0.176-0.045s-0.122,0.015-0.176,0.045l-4.047,2.208l0.847-4.547c0.023-0.119-0.016-0.241-0.105-0.324L3.162,8.54L7.74,7.941c0.124-0.016,0.229-0.093,0.282-0.203L10,3.568l1.978,4.17c0.053,0.11,0.158,0.187,0.282,0.203l4.578,0.598L13.481,11.723z"></path>
            </svg>
            <span class="ml-1">{{$movie['vote_average'] * 10}}%</span>
            <span class="mx-2">|</span>
            <span>{{ \Carbon\Carbon::parse($movie['release_date'])-> format('M d, Y')}}</span>
            <span class="mx-2">|</span>
        </div>
        <div class="text-gray-400 text-sm">
            @foreach ($movie['genre_ids'] as $genre)
                {{ $genres->get($genre) }}@if(!$loop->last), @endif
            @endforeach
        </div>
    </div>
    </div>
</div>
