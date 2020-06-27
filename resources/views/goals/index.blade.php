@extends('layouts/app')

@section('content')

<div class="mx-5 my-4" style="background-color:#252b48;">
    <div class="grid grid-cols-3 gap-4">
        @if (count($goals) > 0)
        @foreach ($goals as $goal)

        <div class="overflow-hidden border-2 border-{{$goal->color}} bg-gray-900 my-2 hover:bg-gray-800">
            <a href="/goals/{{$goal->id}}" style="text-decoration:none;">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl text-{{$goal->color}} mb-2">{{$goal->name}}</div>
                    <p class="text-{{$goal->color}} text-base">
                        {{$goal->description}}
                    </p>
                </div>
                <div class="px-6 py-4">
                    <span
                        class="inline-block bg-gray-800 border-2 border-red-300 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2">
                        #tag
                    </span>
                </div>
            </a>
        </div>
        @endforeach
        @endif

        <div class="text-center overflow-hidden border-2 border-{{$goal->color}} bg-gray-800 my-2">
            <a href="{{route('goals.create')}}" style="text-decoration:none;">
                <div class="cursor-pointer hover:bg-green-900">
                    <i class="fas fa-plus-square text-6xl text-green-300"></i>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection