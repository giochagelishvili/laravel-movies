<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    @vite('resources/css/app.css')
    
    <title>Document</title>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 lg:px-24 flex flex-col md:flex-row items-center justify-between py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="#">MovieApp</a>
                </li>
                <li class="md:ml-16">
                    <a href="#" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6">
                    <a href="#" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-6">
                    <a href="#" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>

            <div class="flex flex-col md:flex-row items-center mt-3 md:mt-0">
                <div class="relative">
                    <input type="text" class="bg-gray-800 rounded-full w-64 px-4 py-1 pl-10" placeholder="Search">
                    <div class="absolute top-0 flex items-center h-full pl-2 ">
                        <span class="material-symbols-outlined text-xl">search</span>
                    </div>
                </div>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}">
                        <img src="img/avatar.png" alt="avatar" class="w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>