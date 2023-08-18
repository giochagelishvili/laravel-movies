<div class="relative">
    <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 rounded-full w-64 px-4 py-1 pl-10" placeholder="Search">
    <div class="absolute top-0 flex items-center h-full pl-2 ">
        <span class="material-symbols-outlined text-xl">search</span>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-6 mt-4"></div>

    @if (strlen($search) >= 2)
        <div class="absolute bg-gray-800 rounded w-64 mt-4">
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                        <li class="border-b border-gray-700 text-sm">
                            <a href={{ route('movies.show', $result['id']) }} class="block hover:bg-gray-700 px-3 py-3 flex items-center">
                                @if ($result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{ $result['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else 
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>