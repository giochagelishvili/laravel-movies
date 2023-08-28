@extends('layouts.main')

@section('content')
    <div class="tvshow-info border-b border-gray-800">
        <div class="container mx-auto px-4 lg:px-24 py-16 flex flex-col md:flex-row">
            <img src="{{ $tvshow['poster_path'] }}" alt="the gentlemen poster" class="w-64 md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">
                    {{ $tvshow['name'] }}
                </h2>

                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span class="material-symbols-outlined text-orange-500 text-base">star</span>
                    <span class="ml-1">{{ $tvshow['vote_average'] }}</span>
                    <span class="mx-2"> | </span>
                    <span>{{ $tvshow['first_air_date'] }}</span>
                    <span class="mx-2"> | </span>
                    <span>
                        {{ $tvshow['genres'] }}
                    </span>
                </div>

                <p class="text-gray-300 mt-8">{{ $tvshow['overview'] }}</p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">
                        Featured Cast
                    </h4>

                    <div class="flex mt-4">
                        @foreach ($tvshow['created_by'] as $crew)
                            <div class="mr-8">
                                <div>{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-400">Creator</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-data="{ isOpen: false }">
                    @if (count($tvshow['videos']['results']) > 0)
                        <div class="mt-12">
                            <button 
                            @click="isOpen = true" class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <span class="material-symbols-outlined">play_arrow</span>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>
                    @endif

                    <div style="background-color: rgba(0, 0, 0, .5);" class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" x-show="isOpen">
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded" @click.away="isOpen = false">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button @click="isOpen = false" class="text-3xl leading-none hover:text-gray-300">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-bottom: 45%">
                                        @if (isset($tvshow['videos']['results'][0]['key']))
                                            <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tv-cast px-4 lg:px-24 border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-14">
                @foreach ($tvshow['cast'] as $cast)
                    <div class="mt-8">
                        <a href="{{ route('actors.show', $cast['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] }}" alt="actor picture" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                            <div class="text-gray-400 text-sm">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="tv-images px-4 lg:px-24 border-b border-gray-800" x-data="{ isOpen: false, image: '' }">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-14">
                @foreach ($tvshow['images'] as $image)
                    <div class="mt-8">
                        <a 
                            href="#" 
                            @click.prevent="
                                isOpen = true
                                image = '{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
                            "
                        >
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image from tvshow" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach

                <div style="background-color: rgba(0, 0, 0, .5);" class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" x-show="isOpen">
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded" @click.away="isOpen = false">
                            <div class="flex justify-end pr-4 pt-2">
                                <button 
                                    @click="isOpen = false" 
                                    @keydown.escape.window="isOpen = false"
                                    class="text-3xl leading-none hover:text-gray-300">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <img :src="image" alt="poster">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection