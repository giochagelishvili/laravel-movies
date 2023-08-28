@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 lg:px-24 pt-16">
        {{-- Popular tv shows container --}}
        <div class="popular-tv">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-14">
                @foreach ($popularTv as $tvshow)
                    <x-tv-card :tvshow="$tvshow" :genres="$genres"/>
                @endforeach
            </div>
        </div>

        {{-- Top Rated Shows container --}}
        <div class="now-playing mt-16">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Top Rated Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-14">
                @foreach ($topRatedTv as $tvshow)
                    <x-tv-card :tvshow="$tvshow" :genres="$genres"/>
                @endforeach
            </div>
        </div>
    </div>
@endsection