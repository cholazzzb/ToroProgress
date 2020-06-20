@extends('layouts/app')

@section('content')

<div class="mx-auto">
    <div class="md:flex">
        <div class="flex-1 text-center m-1 bg-gray-300 shadow-md">
            <h1 class="text-xl bg-green-300 p-3 font-bold">
                <a href="{{route('goals.index')}}">
                    <i class="fas fa-chevron-left hover:text-blue-900 hover:bg-green-400"></i>
                </a>
                Goal &nbsp : &nbsp {{$goal->name}}
                <a href="{{route('goals.edit', $goal->id)}}" class="cursor-pointer hover:bg-teal-00">
                    <i class="fas fa-edit"></i>
                </a>
                <i class="fas fa-trash pl-1 hover:text-red-900" 
                    onclick="event.preventDefault();
                    if(confirm('Are you sure to delete this goal?')){
                        document.getElementById('delete-goal').submit()
                    }"></i>
                <form style="display:none" id="delete-goal" action="{{route('goals.destroy', $goal->id)}}" method="post">
                @csrf
                @method('delete')
                </form>
            </h1>
            <p>Description &nbsp : &nbsp {{$goal->description}}</p>
        </div>
    </div>
</div>

<div class="mx-auto">
    <div class="md:flex">
        <div class="flex-1 text-center m-1 bg-gray-100 shadow-xl border-2 border-green-600">
            <h1 class="text-xl bg-green-200 p-3 font-bold">LOGBOOK
                <a href="{{route('logbooks.create')}}?goal={{$goal->id}}">
                    <i class="fas fa-plus-square pl-3"></i>
                </a>
            </h1>
            <table class="table-auto p-3 justify-center mt-1 w-full" id="users-table">
                <thead>
                    <tr class="border bg-green-200">
                        <th class="px-2 py-2">Date</th>
                        <th class="px-2 py-2">Topic</th>
                        <th class="px-2 py-2">Details</th>
                        <th class="px-2 py-2">Tags</th>
                        <th class="px-2 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($logBooks) > 0)
                    @foreach ($logBooks as $logBook)
                    <tr>
                        <td class="px-2 py-2 text-sm">{{$logBook->date}}</td>
                        <td class="px-2 py-2 text-sm">{{$logBook->topic}}</td>
                        <td class="px-2 py-2 text-sm">{{$logBook->details}}</td>
                        <td class="px-2 py-2 text-sm">{{$logBook->tags}}</td>
                        <td>
                            <a href="{{route('logbooks.edit', $logBook->id)}}">
                                <i class="fas fa-edit px-1 cursor-pointer hover:bg-yellow-300"></i>
                            </a>
                            <i class="fas fa-trash px-1 cursor-pointer hover:bg-yellow-300" onclick="event.preventDefault();
                            if(confirm('Are you really want to delete?')){
                                document.getElementById('logbook-delete-{{$logBook->id}}')
                                .submit()
                            }"></i>
                            <form style="display:none" id="{{'logbook-delete-'.$logBook->id}}" method="post"
                                action="{{route('logbooks.destroy',$logBook->id)}}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    There is no LogBook yet
                    @endif
                </tbody>
            </table>
        </div>
        <div class="flex-1 text-center m-1 bg-gray-100 shadow-xl border-2 border-purple-600">
            <h1 class="text-xl bg-purple-200 p-3 font-bold ">OBJECTIVES
                <a href="{{route('subgoals.create')}}?goal={{$goal->id}}">
                    <i class="fas fa-plus-square pl-3"></i>
                </a>
            </h1>
            <div class="grid grid-cols-2">
                <div class="bg-pink-300 mt-1">
                    <h1 class="bg-pink-200 p-1">
                        Steps <a href="{{route('steps.create')}}?goal={{$goal->id}}"
                            onclick="location.href=this.href+'&subGoal='+subGoal_choosen;return false;">
                            <i class="fas fa-plus-square pl-3"></i>
                        </a>
                    </h1>

                    <div id="steps"></div>
                    @for($i=0; $i<10; $i++) <form style="display:none" id="form-delete-{{$i+1}}" method="post">
                        @csrf
                        @method('delete')
                        </form>
                        @endfor
                </div>

                <div class="bg-purple-300 mt-1">
                    @if (count($subGoals) > 0)
                    <h1 class="bg-blue-300 p-1">
                        SubGoals
                    </h1>

                    @forelse ($subGoals as $subGoal)
                    <button class="w-full bg-teal-200 hover:bg-purple-200 p-2" id="sub_goal_id-{{$subGoal->id}}"
                        onclick="selectSubGoal({{$subGoal->id}})">{{$subGoal->name}}</button>
                    @endforeach

                    @else
                    <h1 class="bg-yellow-100 p-1">
                        There is no OBJECTIVES. Create One now !
                    </h1>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
<?php
$coba = 5
?>

<script>
    // catch php variale
    // console.log({!! json_encode($coba) !!}) 




    ///   AJAX FETCH STEP    ///
    // variable and functionfor step edit button
    const doneButton = '<i class="fas fa-check-square pr-2"></i>';
    const editButton = '<i class="fas fa-edit pl-2"></i>';

    function buildEdit(index){
        return '<a href="/steps/' + String(index) + '/edit">' + editButton+ '</a>'
    }

    function buildDelete(index){
        return '<i class="fas fa-trash pl-1 hover:text-red-900" id="delete-button-' + index + '"></i>';
    }

    function buildStep(data, index){
        return '<div class="bg-pink-300 text-left" id="step-' + String(index) + '">' + doneButton + data.step + 
             buildEdit(index) +
             buildDelete(index) +
            '</div>'
    }
    
    ///   SUBGOAL BUTTON   ///
    var subGoal_choosen = null;
    function selectSubGoal(id){
        ///  UI SELECTED EFFECT  ///
        $('#sub_goal_id-' + String(id)).addClass('bg-purple-400')
        if (subGoal_choosen != null){
            $('#sub_goal_id-' + String(subGoal_choosen)).removeClass('bg-purple-400')
        }
        subGoal_choosen = id

        ///    AJAX FETCH     ///
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                // remove the data before
                $('#steps').empty()

                // Parse new Data
                var responseObject = JSON.parse(this.responseText);
                
                // loop each data from fetching
                responseObject.map((data, index) => {
                    
                    // To build icon and step data
                    $('#steps').append(buildStep(data, index))
                    
                    // generate form id 
                    var deleteId = 'form-delete-' + String(index+1)

                    // Change form action route
                    $('#form-delete-'+String(index+1)).attr('action', '/steps/' + String(data.id));
                    
                    // Add onclick attributes
                    $('#delete-button-' + String(index)).click(function(){
                        event.preventDefault();
                        if(confirm('Are you really want to delete?')){
                            document.getElementById(deleteId).submit()
                        }
                    })
                });
            }
        };
        xhttp.open("GET", "/getSteps?subGoal=" + subGoal_choosen, true);
        xhttp.send();
    }
    
</script>

@endsection