@extends('layouts.app')

@section('content')
<h1 class="text-green-400 text-center text-2xl p-3">
    <a href="{{route('tags.index')}}">
        <button class="text-green-400 w-6 h-8 hover:bg-blue-300">
            <i class="fas fa-caret-left"></i></button>
    </a>
    Edit Tag </h1>

<div class="text-center flex justify-center" style="background-color:#252b48;">

    <form id="form" class="bg-gray-900 w-1/3 border-2 border-green-400 rounded p-4 mb-4" method="post" action="{{route('tags.update', $tag->id)}}">
        @csrf
        @method('patch')
        <div>
            <h1 class="p-2 text-green-400 text-xl">Edit Tag:</h1>
            <input class="bg-gray-900 text-green-400 w-full border-2 border-green-400 py-2 px-3" type="text" name="name" class="p-1" value={{$tag->name}} />
        </div>
        <div class="p-1">
            <input type="submit" class="m-4 p-2 w-1/5 bg-gray-900 border-2 border-green-400 text-green-400 hover:bg-gray-800" value="Edit" />
        </div>
    </form>
</div>
@endsection