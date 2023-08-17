@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 lg:px-24 pt-16">
        {{-- Popular movies container --}}
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-14">
                @foreach ($popularMovies as $popularMovie)
                    <x-movie-card :movie="$popularMovie" :genres="$genres"/>
                @endforeach
            </div>
        </div>

        {{-- Now playing movies container --}}
        <div class="now-playing mt-16">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-14">
                @foreach ($nowPlayingMovies as $nowPlayingMovie)
                    <x-movie-card :movie="$nowPlayingMovie" :genres="$genres"/>
                @endforeach
            </div>
        </div>
    </div>
@endsection