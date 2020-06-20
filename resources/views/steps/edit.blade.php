@extends('layouts/steps')

@section('content-body')

<div class="">
    <h1 class="text-2xl font-bold p-3">Edit Steps</h1>
<form action="{{route('steps.update', $step->id)}}?goal={{$goal_id}}" method="post">
        @csrf
        @method('patch')
        <div class="justify-between bg-blue-600 p-2">
            <h1 class="text-xl p-2">Step</h1>
        <input type="text" class="p-2 rounded w-1/2" name="step" value="{{$step->step}}" />
            <div>
                <input type="submit" class="m-3 py-2 px-4 hover:bg-gray-300 rounded" value="Edit" />
            </div>
        </div>
    </form>

</div>

@endsection