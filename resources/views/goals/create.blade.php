@extends('layouts.app')

@section('content')
<ul class="flex justify-between bg-pink-100">
    <li class="mr-3">
        <a href="{{route('goals.index')}}">
            <button class="bg-blue-100 w-6 h-8 hover:bg-blue-300">
                <i class="fas fa-caret-left"></i></button>
        </a>
    </li>
    <li class="mr-3 flex">
        <h1 class="text-xl font-bold">Create New Goal</h1>
    </li>
    <li class="mr-3">
        <div class="inline-block"></div>
    </li>
</ul>

<div class="text-center flex justify-center pt-10 bg-blue-100">
    <div class="w-1/3 border border-gray-400 rounded py-4">

        <form method="post" action="{{route('goals.store')}}">
            @csrf
            <h1>New Goal:</h1>
            <div>
                <input type="text" name="name" class="p-1" placeholder="New Goal" />
            </div>
            <div class="p-1">
                <textarea name="description" cols="30" rows="10" class="m-3 p-1" placeholder="Description"></textarea>
            </div>
            <div class="p-1">
                <input type="submit" class="p-2 hover:bg-gray-100" value="Create" />
            </div>
        </form>

    </div>
</div>
@endsection