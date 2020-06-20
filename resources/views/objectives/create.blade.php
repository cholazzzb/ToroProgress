@extends('layouts/objectives')

@section('content-body')

<div class="">
    <h1 class="text-2xl font-bold p-3">Add New Objective Here</h1>
    <form action="{{route('objectives.store')}}?goal={{$goal_id}}" method="post">
        @csrf
        <div class="justify-between bg-blue-600 p-2">
            <h1 class="text-xl p-2">Objective</h1>
            <input type="text" class="p-2 rounded" name="name" placeholder="New Objective" />
            
            <div>
                <input type="submit" class="m-3 py-2 px-3 hover:bg-gray-300 rounded" value="Save" />
            </div>
        </div>
    </form>

</div>@endsection