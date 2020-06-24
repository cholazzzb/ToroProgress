@extends('layouts/app')

@section('content')

<ul class="flex justify-between bg-pink-100">
    <li class="mr-3">
    </li>
    <li class="mr-3 flex">
        <h1 class="text-xl font-bold">GOALS</h1>
    </li>
    <li class="mr-3">
        <div class="inline-block"></div>
    </li>
</ul>
<div class="container mx-auto">
    <div class="grid grid-cols-3 gap-4">
        @if (count($goals) > 0)
        @foreach ($goals as $goal)

        <div class="rounded overflow-hidden shadow-lg {{$goal->color}}">
            <a href="/goals/{{$goal->id}}" style="text-decoration:none;">
                <img class="w-full" src="" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{$goal->name}}</div>
                    <p class="text-gray-700 text-base">
                        {{$goal->description}}
                    </p>
                </div>
                <div class="px-6 py-4">
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#tag</span>
                </div>
            </a>
        </div>
        @endforeach
        @endif
        <div class="rounded overflow-hidden shadow-lg">
            <a href="{{route('goals.create')}}">
                <div class="p-5 cursor-pointer hover:bg-teal-100">
                    <i class="fas fa-plus-square"></i>
                </div>
            </a>
        </div>

    </div>
</div>

@endsection