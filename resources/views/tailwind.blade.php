@extends('layouts/app')

@section('content')

<nav class="flex items-center justify-between flex-wrap bg-gray-900 mx-5 mt-3">
    <div class="flex items-center flex-shrink-0 text-teal-200 mr-6">
        <a href="/home" id="nav-home"
            class="bg-gray-900 border-t-2 border-green-500 hover:bg-teal-900 hover:text-white ml-2 p-2 font-semibold text-xl tracking-tight">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <div class="w-full block flex-grow lg:flex lg:w-auto">
        <div class="lg:flex-grow">
            <a href="/goals" id="nav-goals"
                class="lg:inline-block lg:mt-0 text-teal-500 border-t-2 border-green-500 hover:bg-gray-800 hover:text-teal-600 text-xl mx-1 p-2">
                <i class="fas fa-map-marker-alt mr-1"></i>
                <span class="mr-1 no-underline">Goals </span>
            </a>
            <a href="/tags" id="nav-tags"
                class="block lg:inline-block lg:mt-0 text-teal-500 border-t-2 border-green-500 hover:bg-gray-800 hover:text-teal-600 text-xl mx-1 px-2">
                <i class="fas fa-tags mr-1"></i>
                <span class="mr-1 no-underline">Tags </span>
            </a>
            <a  class="border-t-2 border-green-500 text-white">
                <i class="fas fa-tags mr-1"></i>
                <span class="mr-1 no-underline">Tags </span>
            </a>
            {{$request_uri = "$_SERVER[REQUEST_URI]"}};
        </div>
        <div>
            <div class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="text-green-700 fas fa-user"></i>
                    <span class="text-white ml-2">{{ Auth::user()->name }}</span> <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item">
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<nav class="bg-white w-full flex">
    <div class="bg-gray-500 flex-grow">
flex grow
    </div>
    <div class="bg-gray-200">
        Test
    </div>
</nav>

@endsection