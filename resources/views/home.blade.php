@extends('layouts.app')

@section('content')
<div class="mx-5 bg-gray-800">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div id="Pinned">
        <h1 class="mt-3 p-3 bg-gray-900 text-green-400 text-2xl"><i class="text-green-400 fas fa-thumbtack mr-1"></i> Pinned</h1>
        <div class="flex">
            <a href="{{route('goals.index')}}" class="my-2 ml-3 p-5 bg-gray-900 border-2 border-green-400 text-center hover:bg-green-800">
                <i class="text-green-500 text-2xl fas fa-map-marker-alt"></i>
                <h1 class="text-green-500 text-2xl no-underline">Pinned Goals</h1>
            </a>
            <a href="{{route('tags.index')}}" class="my-2 ml-3 p-5 bg-gray-900 border-2 border-green-400 text-center hover:bg-green-800">
                <i class="text-green-500 text-2xl fas fa-tags"></i>
                <h1 class="text-green-500 text-2xl no-underline">Pinned Tags</h1>
            </a>
        </div>
    </div>
    <div id="goal-insight">
        <h1 class="p-3 bg-gray-900 text-blue-400 text-2xl">
            <i class="fas fa-map-marker-alt mr-1"></i>
            Goal Insights</h1>
            <div class="flex">
                Content
            </div>
    </div>
    <div id="tag-insight">
        <h1 class="p-3 bg-gray-900 text-purple-400 text-2xl">
            <i class="fas fa-tags mr-1"></i>
            Tag Insights</h1>
            <div class="flex">Content</div>
    </div>
    @endsection