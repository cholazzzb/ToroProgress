@extends('layouts/app')

@section('content')

<div class="mx-auto">
    <div class="md:flex">
        <div class="flex-1 text-center m-1 bg-gray-300 shadow-md">
            <h1 class="text-xl text-green-400 bg-gray-900 p-3 font-bold">
                <a href="{{route('goals.index')}}">
                    <i class="fas fa-chevron-left hover:text-blue-900 hover:bg-green-400"></i>
                </a>
                Goal &nbsp : &nbsp {{$goal->name}}
                <a href="{{route('goals.edit', $goal->id)}}" class="cursor-pointer hover:bg-teal-00">
                    <i class="fas fa-edit"></i>
                </a>
                <i class="fas fa-trash pl-1 hover:text-red-900" onclick="event.preventDefault();
                    if(confirm('Are you sure to delete this goal?')){
                        document.getElementById('delete-goal').submit()
                    }"></i>
                <form style="display:none" id="delete-goal" action="{{route('goals.destroy', $goal->id)}}"
                    method="post">
                    @csrf
                    @method('delete')
                </form>
            </h1>
            <p class="bg-gray-900 text-green-400">Description &nbsp : &nbsp {{$goal->description}}</p>
        </div>
    </div>
</div>

<div class="mx-auto">
    <div class="md:flex">
        <div class="flex-1 text-center m-1 bg-gray-900 shadow-xl border-2 border-green-400">
            <h1 class="text-xl text-green-400 bg-gray-900-200 p-3 font-bold">LOGBOOK
                <a href="{{route('logbooks.create')}}?goal={{$goal->id}}">
                    <i class="fas fa-plus-square pl-3"></i>
                </a>
            </h1>
            <table class="table-auto p-3 justify-center mt-1 w-full" id="users-table">
                <thead>
                    <tr class="border bg-gray-900">
                        <th class="px-2 py-2 text-green-400">Date</th>
                        <th class="px-2 py-2 text-green-400">Topic</th>
                        <th class="px-2 py-2 text-green-400">Details</th>
                        <th class="px-2 py-2 text-green-400">Tags</th>
                        <th class="px-2 py-2 text-green-400">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($logBooks) > 0)
                    @foreach ($logBooks as $logBook)
                    <tr>
                        <td class="px-2 py-2 text-sm text-green-400">{{$logBook->date}}</td>
                        <td class="px-2 py-2 text-sm text-green-400">{{$logBook->topic}}</td>
                        <td class="px-2 py-2 text-sm text-green-400">{{$logBook->details}}</td>
                        <td class="px-2 py-2 text-sm text-green-400">{{$logBook->tags}}</td>
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
                    <p class="text-green-400">
                        There is no LogBook yet
                    </p>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="flex-1 text-center m-1 bg-gray-100 border-2 border-purple-600">
            <h1 class="text-xl text-green-400 bg-gray-900 p-3 font-bold ">OBJECTIVES
                <a href="{{route('objectives.create')}}?goal={{$goal->id}}">
                    <i class="fas fa-plus-square pl-3"></i>
                </a>
            </h1>
            <div class="bg-gray-900 grid grid-cols-2">
                <div class="bg-gray-900 mt-1">
                    <h1 class="bg-gray-900 p-1 text-2xl text-green-400 font-bold">
                        Steps <a id="link-create-step">
                            <i class="fas fa-plus-square pl-3"></i>
                        </a>
                    </h1>

                    <!-- Delete Button -->
                    <div id="steps"></div>
                    @for($i=0; $i<10; $i++) <form style="display:none" id="form-delete-{{$i+1}}" method="post">
                        @csrf
                        @method('delete')
                        </form>
                    @endfor

                    <!-- Done Button -->
                    @for($i=0; $i<10; $i++) <form style="display:none" id="form-done-{{$i+1}}" method="post">
                        @csrf
                        @method('put')
                        </form>
                    @endfor
                </div>

                <div class="bg-gray-900 mt-1">
                    @if (count($objectives) > 0)
                    <h1 class="p-1 text-2xl text-green-400 font-bold">
                        Objectives
                    </h1>

                    @forelse ($objectives as $objective)
                    <div class="flex">
                        <button class="w-full bg-gray-900 text-green-400 hover:bg-purple-200 p-2" id="objective_id-{{$objective->id}}"
                            onclick="selectObjective({{$objective->id}})">{{$objective->name}}</button>
                        <a href="{{route('objectives.edit', $objective->id)}}" class="p-2 text-gray-700"> <i class="fas fa-edit hover:text-green-400"></i>
                        </a>
                    <form style="display:none" action="{{route('objectives.destroy', $objective->id)}}" id="objective-delete-{{$objective->id}}" method="post" action="{{route('objectives.destroy', $objective->id)}}">
                            @csrf
                            @method('delete')
                        </form>
                        <div class="p-2 text-gray-700 hover:text-orange-500" onclick="event.preventDefault();
                        if(confirm('Are you sure to delete {{$objective->name}} ?')){
                        document.getElementById('objective-delete-{{$objective->id}}').submit()
                        }"> <i class="fas fa-trash hover:text-red-600 cursor-pointer"></i>
                        </div>
                    </div>
                    @endforeach

                    @else
                    <h1 class="bg-gray-900 text-green-400 p-1">
                        There is no OBJECTIVES. Create One now !
                    </h1>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    // catch php variale
    const goal_id = ({!! json_encode($goal->id) !!}) 
    var first_objective_id
    if(! ( {!! json_encode($objectives) !!}[0] === undefined)){
        first_objective_id = ({!! json_encode($objectives) !!})[0].id
    }

    ///   AJAX FETCH STEP    ///
    // variable and functionfor step edit button
    const doneButton = (id) => '<i class="fas fa-check-square cursor-pointer" id="done-button-' + String(id) + '"></i>';
    const editButton = '<i class="fas fa-edit pl-2"></i>';
    const paddingStep = '<span class="pl-2"></span>'

    function buildDone(id){
        return doneButton(id)
    }

    function buildEdit(id){
        return '<a href="/steps/' + String(id) + '/edit?goal=' + goal_id + '">' + editButton+ '</a>'
    }

    function buildDelete(index){
        return '<i class="fas fa-trash pl-1 hover:text-red-900" id="delete-button-' + index + '"></i>';
    }

    function buildStep(data, index){
        if (data.isCompleted){
            data.step = '<strike>' + data.step + '</strike>'
        }

        return '<div class="bg-gray-900 border-2 border-purple-600 text-left text-green-400" id="step-' + String(index) + '">' + buildDone(data.id) + paddingStep + data.step + 
             buildEdit(data.id) +
             buildDelete(index) +
            '</div>'
    }
    
    ///   OBJECTIVE BUTTON   ///
    function selectObjective(objective_choosen){
        
        // To change routing query for create step
        $('#link-create-step').attr("href", "/steps/create?goal=" + goal_id.toString() + "&objective=" + objective_choosen.toString())
        
        ///  UI SELECTED EFFECT  ///
        $('#objective_id-' + String(objective_choosen)).addClass('bg-purple-400')
        if (objective_choosen != null){
            $('#objective_id-' + String(objective_choosen)).removeClass('bg-purple-400')
        }

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
                    var doneId = 'form-done-' + String(index+1) 

                    // Change delete form action route
                    $('#form-delete-'+ String(index+1)).attr('action', '/steps/' + String(data.id));

                    // Change done form action route
                    $('#form-done-'+ String(index+1)).attr('action', '/steps/done/' + data.id.toString() + "?goal=" + goal_id.toString());
                    
                    // Add onclick attributes to delete button
                    $('#delete-button-' + String(index)).click(function(){
                        event.preventDefault();
                        if(confirm('Are you really want to delete?')){
                            document.getElementById(deleteId).submit()
                        }
                    })

                    // Add onclick attributes to done button
                    $('#done-button-' + String(data.id)).click(function(){
                        event.preventDefault();
                        console.log(doneId)
                            document.getElementById(doneId).submit()
                    })

                    // Add Green color if done button is completed
                    if(data.isCompleted){
                        $('#done-button-' + String(data.id)).attr('class', 'fas fa-check-square cursor-pointer text-green-500 bg-green-900')
                    }
                });
            }
        };
        xhttp.open("GET", "/getSteps?objective=" + objective_choosen, true);
        xhttp.send();
    }
    if (first_objective_id != null){
        selectObjective(first_objective_id)
    }
    
</script>

@endsection