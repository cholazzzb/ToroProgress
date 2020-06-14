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
    <div class="md:flex">
        @if (count($goals) > 0)
        @foreach ($goals as $goal)
        <div class="flex-1 text-center m-1 bg-gray-100 shadow-md">
            <a href="/goals/{{$goal->id}}">
                <div class="hover:bg-teal-100">
                    <h1 class="text-xl bg-green-100 p-3 hover:bg-teal-100 font-bold">{{$goal->name}}</h1>
                    <p>{{$goal->description}}</p>
                </div>
            </a>
        </div>
        @endforeach
        @endif
        <div class="flex-1 text-center m-1 bg-gray-100 shadow-md">
            <a href="{{route('goals.create')}}">
                <div class="p-5 cursor-pointer hover:bg-teal-100">
                    <i class="fas fa-plus-square"></i>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection