@extends('layouts.app')

@section('content')
<ul class="flex justify-between bg-pink-100">
    <li class="mr-3">
        <a href="{{route('tags.index')}}">
            <button class="bg-blue-100 w-6 h-8 hover:bg-blue-300">
                <i class="fas fa-caret-left"></i></button>
        </a>
    </li>
    <li class="mr-3 flex">
        <h1 class="text-xl font-bold">Edit Tag</h1>
    </li>
    <li class="mr-3">
        <div class="inline-block"></div>
    </li>
</ul>

<div class="text-center flex justify-center pt-10 bg-blue-100">

    <form id="form" class="bg-white w-1/3 border border-gray-400 rounded p-4 shadow-md mb-4" method="post" action="{{route('tags.update', $tag->id)}}">
        @csrf
        @method('patch')
        <div>
            <h1 class="p-2 text-xl">Edit Tag:</h1>
            <input class="w-full shadow-md border py-2 px-3" type="text" name="name" class="p-1" value={{$tag->name}} />
        </div>
        <div class="p-1">
            <input type="submit" class="p-2 w-1/5 border border-gray-300 hover:bg-gray-100" value="Edit" />
        </div>
    </form>
</div>
@endsection