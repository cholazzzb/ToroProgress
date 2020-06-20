@extends('layouts/logbooks')

@section('content-body')

<div class="">
    <h1 class="text-2xl font-bold p-3">Add New LogBooks Here</h1>
    <form action="{{route('logbooks.store')}}?goal={{$goal_id}}" method="post">
        @csrf
        <div class="justify-between bg-blue-600 p-2">
            <h1 class="text-xl p-2">Topic</h1>
            <input type="text" class="p-2 rounded" name="topic" placeholder="New Topic" />
            <h1 class="text-xl p-2">Tags</h1>
            <input type="text" class="p-2 rounded" name="tags" placeholder="Tags" />
            <h1 class="text-xl p-2">Details</h1>
            <textarea name="details" class="p-2 rounded" id="" cols="30" rows="10">
        </textarea>
            <div>
                <input type="submit" class="m-3 py-2 px-4 hover:bg-gray-300 rounded" value="Save" />
            </div>
        </div>
    </form>

</div>

@endsection