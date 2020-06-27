@extends('layouts/steps')

@section('content-body')

<h1 class="text-2xl text-green-400 font-bold p-3">Edit Steps</h1>
<div class="text-center flex justify-center bg-gray-100" style="background-color:#252b48;">
    <form class="bg-gray-900 w-1/3 border-2 border-green-400 p-4 shadow-md mb-4" action="{{route('steps.update', $step->id)}}?goal={{$goal_id}}" method="post">
        @csrf
        @method('patch')
        <div class="justify-between p-2">
            <h1 class="text-xl text-green-400 p-2">Step</h1>
        <input type="text" class="p-2 border-2 border-green-400 text-green-400" name="step" value="{{$step->step}}" />
            <div>
                <input type="submit" class="m-3 py-2 px-4 border-2 border-green-400 text-green-400 bg-gray-900 hover:bg-gray-800" value="Edit" />
            </div>
        </div>
    </form>
</div>

@endsection