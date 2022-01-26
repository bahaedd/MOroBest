<div>
    <div class="relative mt-1 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
        <input type="text" wire:model.debounce.500ms="search" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">
        <div class="absolute top-0">
            <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" class="svg-icon" viewBox="0 0 20 20">
                <path d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z"></path>
            </svg>
        </div>
    </div>
    <div class="search_dropdown absolute bg-gray-800 text-sm rounded w-64 mt-4"
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    @keydown.shift.tab="isOpen = false">
    {{-- <div class="hidden" wire:loading.remove> --}}
        @if (strlen($search) > 2)
            <ul>
                @if ($searchResults->count() > 0)
                    @foreach ($searchResults as $movie)
                    <li class="flex items-start space-x-3 p-1 border-b border-red-700 hover:bg-gray-700">
                        @if ($movie['poster_path'])
                        <img src="https://image.tmdb.org/t/p/original/{{$movie['poster_path']}}" alt="" width="40" height="60" className="flex-none rounded-md bg-gray-100" />
                        @else
                        <img src="https://via.placeholder.com/50x75" alt="" width="40" height="60" className="flex-none rounded-md bg-gray-100" />
                        @endif
                        <div class="min-w-0 relative flex-auto">
                        <a href="{{ route('movies.show', ['movie' => $movie['id']]) }}" class="block px-3 py-3"
                            @if($loop->last) @keydown.tab="isOpen = false" @endif
                            >{{ $movie['title'] }}</a>
                        </div>
                    </li>
                    @endforeach
                @else
                    <li class="flex items-start space-x-6 p-3 border-b border-red-700 hover:bg-gray-700">
                        <div class="min-w-0 relative flex-auto">
                        <span>No reuslt founds for "{{$search}}"</span>
                        </div>
                    </li>
                @endif
            </ul>
        @endif
    </div>
</div>
<div wire:loading.remove>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
