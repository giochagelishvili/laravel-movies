@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 lg:px-24 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $actor['profile_path'] }}" alt="actor image" class="w-76">
                <ul class="flex items-center mt-4">
                    <li>
                        @if ($social['facebook'])
                            <a href="{{ $social['facebook'] }}" title="Facebook">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        @endif

                        @if ($social['twitter'])
                            <a href="{{ $social['twitter'] }}" title="Twitter">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        @endif

                        @if ($social['instagram'])
                            <a href="{{ $social['instagram'] }}" title="Instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">
                    {{ $actor['name'] }}
                </h2>

                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span class="material-symbols-outlined text-orange-500 text-base">cake</span>
                    <span class="ml-2">{{ $actor['birthday'] }} ({{ $actor['age'] }}) in {{ $actor['place_of_birth'] }}</span>
                    <span class="mx-2"> | </span>
                    <span>More Stuff</span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $actor['biography'] }}
                </p>

                <h4 class="font-semibold mt-12">
                    Known For
                </h4>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach ($knownForMovies as $movie)
                    <div class="mt-4">
                        <a href="{{ route('movies.show', $movie['id']) }}">
                            <img src="{{ $movie['poster_path'] }}" alt="movie poster" class="hover:opacity-75 transition ease-in-out duration-150">

                            <a href="#" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1 transition ease-in-out duration-150">
                                {{ $movie['title'] }}
                            </a>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="credits px-4 lg:px-24 border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach ($credits as $credit)
                    <li>{{ $credit['release_year'] }} &middot; <strong>{{ $credit['title'] }}</strong> {{ $credit['character'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection