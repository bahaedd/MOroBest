@extends('layouts.main')
@section('title', $movie['original_title'])
@section('content')
    <div class="movie-info border-b border-red-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://image.tmdb.org/t/p/original/{{$movie['poster_path']}}" alt="deadpool" class="w-64 md:w-96" style="width: 24rem">
            <div class="md:ml-24">
                <h1 class="text-4xl font-semibold text-red-600">{{ $movie['original_title'] }}</h1>
                <div class="flex items-center text-gray-400 text-sm">
                    <svg class="fill-current text-orange-500 color-orange-500 w-4" viewBox="0 0 20 20">
                        <path d="M17.684,7.925l-5.131-0.67L10.329,2.57c-0.131-0.275-0.527-0.275-0.658,0L7.447,7.255l-5.131,0.67C2.014,7.964,1.892,8.333,2.113,8.54l3.76,3.568L4.924,17.21c-0.056,0.297,0.261,0.525,0.533,0.379L10,15.109l4.543,2.479c0.273,0.153,0.587-0.089,0.533-0.379l-0.949-5.103l3.76-3.568C18.108,8.333,17.986,7.964,17.684,7.925 M13.481,11.723c-0.089,0.083-0.129,0.205-0.105,0.324l0.848,4.547l-4.047-2.208c-0.055-0.03-0.116-0.045-0.176-0.045s-0.122,0.015-0.176,0.045l-4.047,2.208l0.847-4.547c0.023-0.119-0.016-0.241-0.105-0.324L3.162,8.54L7.74,7.941c0.124-0.016,0.229-0.093,0.282-0.203L10,3.568l1.978,4.17c0.053,0.11,0.158,0.187,0.282,0.203l4.578,0.598L13.481,11.723z"></path>
                    </svg>
                    <span class="ml-1 text-gray-500">{{$movie['vote_average'] * 10}}%</span>
                    <span class="mx-2 text-gray-500">|</span>
                    <span class="text-gray-500">{{ \Carbon\Carbon::parse($movie['release_date'])-> format('M d, Y')}}</span>
                    <span class="mx-2">|</span>
                    <span class="mx-2 text-gray-500">@foreach ($movie['genres'] as $genre)
                        {{ $genre['name']}}@if(!$loop->last), @else
                        @break @endif
                    @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>
                <div class="mt-12">
                    <h4 class="text-white font-bold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 5)
                                <div class="mr-8">
                                    <div>{{ $crew['name']}}</div>
                                    <div class="text-sm text-gray-500">{{ $crew['job']}}</div>
                                </div>
                            @else
                                @break
                            @endif
                        @endforeach
                    </div>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index > 5 && $loop->index < 10)
                                <div class="mr-8">
                                    <div>{{ $crew['name']}}</div>
                                    <div class="text-sm text-gray-500">{{ $crew['job']}}</div>
                                </div>
                            @else
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                @if (count($movie['videos']['results']) > 0)
                    <div class="mt-12">
                        <div class="border-white flex inline-flex items-center bg-red-700 text-white-900 rounded semibold px-5 py-4 hover:bg-gray-600 transition ease-in-out duration-150">
                            <svg class="w-6 fill-current" viewBox="0 0 20 20">
                                <path d="M17.919,4.633l-3.833,2.48V6.371c0-1-0.815-1.815-1.816-1.815H3.191c-1.001,0-1.816,0.814-1.816,1.815v7.261c0,1.001,0.815,1.815,1.816,1.815h9.079c1.001,0,1.816-0.814,1.816-1.815v-0.739l3.833,2.478c0.428,0.226,0.706-0.157,0.706-0.377V5.01C18.625,4.787,18.374,4.378,17.919,4.633 M13.178,13.632c0,0.501-0.406,0.907-0.908,0.907H3.191c-0.501,0-0.908-0.406-0.908-0.907V6.371c0-0.501,0.407-0.907,0.908-0.907h9.079c0.502,0,0.908,0.406,0.908,0.907V13.632zM17.717,14.158l-3.631-2.348V8.193l3.631-2.348V14.158z"></path>
                            </svg>
                            <span class="ml-2 font-bold" onclick="toggleModal()">Play trailer</span>
                        </div>
                    </div>
                    <div
                                style="background-color: rgba(0, 0, 0, .5);"
                                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto hidden" id="trailer"
                            >
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class="bg-gray-900 rounded">
                                        <div class="flex justify-end pr-4 pt-2">
                                            <button onclick="hideModal()"
                                                class="text-3xl leading-none hover:text-gray-300 text-red-700">&times;
                                            </button>
                                        </div>
                                        <div class="modal-body px-8 py-8">
                                            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                @endif
            </div>
        </div>
    </div><!--- end movie-info -->

    <div class="movie-cast border-b border-red-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl text-red-600 font-bold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 10)
                        <div class="mt-8">
                            <a href="#">
                                <img src="https://image.tmdb.org/t/p/w300/{{$cast['profile_path']}}" alt="cover" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg mt-2">{{$cast['name']}}</a>
                                <div class="text-gray-500 text-sm">
                                    {{$cast['character']}}
                                </div>
                            </div>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div><!-- end movie-cost-->

    <div class="movie-images border-b border-red-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl text-red-600 font-bold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 gap-16">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 10)
                        <div class="mt-8">
                            <a href="#">
                                <img src="https://image.tmdb.org/t/p/w500/{{$image['file_path']}}" alt="cover" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div><!-- end movie-images -->
@endsection
<script>
    function hideModal() {
    document.getElementById('trailer').classList.toggle('hidden')
    }

    function toggleModal() {
    document.getElementById('trailer').classList.toggle('show')
    }
</script>
