@extends('layouts.app')

@section('content')
<h1 class="text-green-400 text-center text-2xl p-3">
    <a href="{{route('goals.index')}}">
        <button class="text-green-400 w-6 h-8 hover:bg-blue-300">
            <i class="fas fa-caret-left"></i></button>
    </a>
    Create New Goal </h1>

<div class="text-center flex justify-center
<div class="text-center flex justify-center pt-10 bg-gray-800">

    <form id="form" class="bg-gray-900 w-1/3 border-4 border-green-400 p-4 mb-4" method="post"
        action="{{route('goals.store')}}">
        @csrf
        <div>
            <h1 id="text-goal" class="p-2 text-xl text-green-400">New Goal:</h1>
            <input id="input-goal" class="w-full border-2 border-green-400 py-2 px-3 text-green-400 bg-gray-800" type="text" name="name" class="p-1"
                placeholder="New Goal" />
        </div>
        <div class="p-1">
            <h1 id="text-description" class="text-xl text-green-400 m-1 mt-3 ">Description</h1>
            <textarea id="input-description" class="w-full border-2 border-green-400 bg-gray-800 py-2 px-3 text-green-400" name="description" cols="30" rows="10" class="p-1"
                placeholder="Description"></textarea>
        </div>

        <div class='m-1 mt-3'>
            <h1 id="text-tag" class="text-xl text-green-400 p-1">Select Tag</h1>
            <select
                id="input-tag"
                class="inline-flex justify-center w-full border-2 border-green-400 bg-gray-800 px-3 py-2 text-sm leading-5 font-medium text-green-400 hover:text-gray-500 focus:outline-none focus:border-blue-300 active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
                name="tag" placeholder="Choose tags" id="chooseTag">
                @if(count($tags) > 0)
                @foreach ($tags as $tag)
                <option value={{$tag->id}}>{{$tag->name}}</option>
                @endforeach
                @endif
            </select>
        </div>

        <div class='m-1 mt-3'>
            <h1 id="text-color" class="text-xl text-green-400 p-1">Select Background Color</h1>
            <select
                id="input-select-color"
                class="inline-flex justify-center w-full border-2 border-green-400 bg-gray-800 px-3 py-2 text-sm text-green-400 leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
                onChange="changeColorBg()" name="color" placeholder="Choose background color" >
                <option value="green-400">Green</option>
                <option value="blue-400">Blue</option>
                <option value="red-400">Red</option>
                <option value="purple-400">Purple</option>
                <option value="orange-400">Orange</option>
            </select>
        </div>
        <div class="p-1 mt-3">
            <input id="input-submit" type="submit" class="p-2 w-1/5 text-green-400 bg-gray-900 border-2 border-green-400 hover:bg-gray-800" value="Create" />
        </div>
    </form>
</div>


<script>
    function changeColorBg(){
        // Change Border Color
        $('#form').removeClass('border-red-400').removeClass('border-blue-400').removeClass('border-green-400').removeClass('border-purple-400').removeClass('border-orange-400').addClass("border-" + document.getElementById("input-select-color").value.toString())
        $('#input-goal').removeClass('border-red-400').removeClass('border-blue-400').removeClass('border-green-400').removeClass('border-purple-400').removeClass('border-orange-400').addClass("border-" + document.getElementById("input-select-color").value.toString())
        $('#input-description').removeClass('border-red-400').removeClass('border-blue-400').removeClass('border-green-400').removeClass('border-purple-400').removeClass('border-orange-400').addClass("border-" + document.getElementById("input-select-color").value.toString())
        $('#input-tag').removeClass('border-red-400').removeClass('border-blue-400').removeClass('border-green-400').removeClass('border-purple-400').removeClass('border-orange-400').addClass("border-" + document.getElementById("input-select-color").value.toString())
        $('#input-select-color').removeClass('border-red-400').removeClass('border-blue-400').removeClass('border-green-400').removeClass('border-purple-400').removeClass('border-orange-400').addClass("border-" + document.getElementById("input-select-color").value.toString())
        $('#input-submit').removeClass('border-red-400').removeClass('border-blue-400').removeClass('border-green-400').removeClass('border-purple-400').removeClass('border-orange-400').addClass("border-" + document.getElementById("input-select-color").value.toString())
        
        // Change Text Color
        $('#form').removeClass('text-red-400').removeClass('text-blue-400').removeClass('text-green-400').removeClass('text-purple-400').removeClass('text-orange-400').addClass("text-" + document.getElementById("input-select-color").value.toString())
        $('#input-goal').removeClass('text-red-400').removeClass('text-blue-400').removeClass('text-green-400').removeClass('text-purple-400').removeClass('text-orange-400').addClass("text-" + document.getElementById("input-select-color").value.toString())
        $('#input-description').removeClass('text-red-400').removeClass('text-blue-400').removeClass('text-green-400').removeClass('text-purple-400').removeClass('text-orange-400').addClass("text-" + document.getElementById("input-select-color").value.toString())
        $('#input-tag').removeClass('text-red-400').removeClass('text-blue-400').removeClass('text-green-400').removeClass('text-purple-400').removeClass('text-orange-400').addClass("text-" + document.getElementById("input-select-color").value.toString())
        $('#input-select-color').removeClass('text-red-400').removeClass('text-blue-400').removeClass('text-green-400').removeClass('text-purple-400').removeClass('text-orange-400').addClass("text-" + document.getElementById("input-select-color").value.toString())
        $('#input-submit').removeClass('text-red-400').removeClass('text-blue-400').removeClass('text-green-400').removeClass('text-purple-400').removeClass('text-orange-400').addClass("text-" + document.getElementById("input-select-color").value.toString())
        $('#text-goal').removeClass('text-red-400').removeClass('text-blue-400').removeClass('text-green-400').removeClass('text-purple-400').removeClass('text-orange-400').addClass("text-" + document.getElementById("input-select-color").value.toString())
        $('#text-description').removeClass('text-red-400').removeClass('text-blue-400').removeClass('text-green-400').removeClass('text-purple-400').removeClass('text-orange-400').addClass("text-" + document.getElementById("input-select-color").value.toString())
        $('#text-tag').removeClass('text-red-400').removeClass('text-blue-400').removeClass('text-green-400').removeClass('text-purple-400').removeClass('text-orange-400').addClass("text-" + document.getElementById("input-select-color").value.toString())
        $('#text-color').removeClass('text-red-400').removeClass('text-blue-400').removeClass('text-green-400').removeClass('text-purple-400').removeClass('text-orange-400').addClass("text-" + document.getElementById("input-select-color").value.toString())
    }
</script>

@endsection