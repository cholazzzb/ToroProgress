@extends('layouts/logbooks')

@section('content-body')

<h1 class="text-2xl text-green-400 font-bold p-3">Add New LogBooks Here</h1>
<div class="text-center flex justify-center bg-gray-100" style="background-color:#252b48;">
    <form class="bg-gray-900 w-1/3 border-2 border-green-400 rounded p-4 shadow-md mb-4" action="{{route('logbooks.store')}}?goal={{$goal_id}}" method="post">
        @csrf
        <div>
            <h1 class="text-xl text-green-400 p-2">Topic</h1>
            <input type="text" class="p-2 border-2 border-green-400 text-green-400" name="topic" placeholder="New Topic" />
        </div>
        <div>
            <h1 class="text-xl text-green-400 p-2">Tags</h1>
            <input type="text" class="p-2 border-2 border-green-400 text-green-400" name="tags" placeholder="Tags" />
        </div>
        <div>
            <h1 class="text-xl text-green-400 p-2">Details</h1>
            <textarea name="details" class="p-2 border-2 border-green-400 text-green-400" cols="30" rows="10">
        </textarea>
            <div>
                <input type="submit" class="m-3 py-2 px-4 border-2 border-green-400 text-green-400 bg-gray-900 hover:bg-gray-800" value="Save" />
            </div>
        </div>
    </form>

</div>

@endsection