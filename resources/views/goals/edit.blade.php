@extends('layouts/goal')

@section('content-body')
<ul class="flex justify-between bg-teal-100 p-2">
    <li class="mr-3">
        <a href="{{route('goals.index')}}">
            <button class="bg-blue-100 w-6 h-8 hover:bg-blue-300">
                <i class="fas fa-caret-left"></i></button>
        </a>
    </li>
    <li class="mr-3 flex">
        <h1 class="text-xl font-bold">Edit Goal</h1>
    </li>
    <li class="mr-3">
        <div class="inline-block"></div>
    </li>
</ul>

<div class="flex justify-center pt-10 bg-blue-100">

    <form class="bg-white w-1/3 border border-gray-400 rounded p-4 shadow-md mb-4" method="post" id="form"
        action="{{route('goals.update', $goal->id)}}">
        @csrf
        @method('patch')
        <div>
            <h1 class="p-2 text-xl">Edit Goal:</h1>
            <input class="w-full shadow-md border py-2 px-3" type="text" name="name" value="{{$goal->name}}" />
        </div>
        <div class="p-1 mb-3">
            <h1 class="text-xl mt-3 mb-1">Description</h1>
            <textarea class="w-full shadow-md border py-2 px-3" name="description" cols="30" rows="10" class="p-1">
                    {{$goal->description}}
                </textarea>
        </div>

        <div class='m-1 mt-3'>
            <h1 class="text-xl p-1">Select Tag</h1>
            <select
                class="inline-flex justify-center w-full border border-gray-300 px-3 py-2 text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
                name="tag" placeholder="Choose tags" id="chooseTag">
                @if(count($tags) > 0)
                @foreach ($tags as $tag)
                <option value={{$tag->name}}>{{$tag->name}}</option>
                @endforeach
                @endif
            </select>
        </div>


        <div class='mb-3'>
            <h1 class="text-xl p-1">Select Background Color</h1>
            <select
                class="inline-flex justify-center w-full shadow-md border border-gray-300 px-3 py-2 text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 cursor-pointer focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
                onChange="changeColorBg()" name="color" placeholder="Choose background color" id="chooseColor">
                <option value="bg-red-300">Red</option>
                <option value="bg-green-300">Green</option>
                <option value="bg-blue-300">Blue</option>
            </select>
        </div>
        <div class="p-1">
            <input type="submit" class="p-2 w-1/5 border border-gray-300 hover:bg-gray-200" value="Edit" />
        </div>
    </form>

</div>

<script>
    function changeColorBg(){
        $('#form').removeClass('bg-white').removeClass('bg-red-300').removeClass('bg-blue-300').removeClass('bg-green-300').addClass(document.getElementById("chooseColor").value.toString())
    }
</script>

@endsection