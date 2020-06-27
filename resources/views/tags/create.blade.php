@extends('layouts.app')

@section('content')

<h1 class="text-green-400 text-center text-2xl p-3">
    <a href="{{route('tags.index')}}">
        <button class="text-green-400 w-6 h-8 hover:bg-blue-300">
            <i class="fas fa-caret-left"></i></button>
    </a>
    Create New Tag </h1>

<div class="text-center flex justify-center bg-gray-100" style="background-color:#252b48;">
    <form id="form" class="bg-gray-900 w-1/3 border-2 border-green-400 rounded p-4 shadow-md mb-4" method="post"
        action="{{route('tags.store')}}">
        @csrf
        <div>
            <h1 class="p-2 text-green-400 text-xl">New Tag:</h1>
            <input class="w-full bg-gray-900 border-2 border-green-400 text-green-400 py-2 px-3" type="text" name="name" class="p-1"
                placeholder="New Tag" />
        </div>
        <div class="p-1">
            <input type="submit" class="mt-4 p-2 w-1/5 bg-gray-900 border-2 border-green-400 text-green-400 hover:bg-gray-100" value="Create" />
        </div>
    </form>
</div>
@endsection