@extends('layouts/app')

@section('content')

<div class="mx-12 my-4 flex" style="background-color:#252b48;">
    <div class="bg-gray-900 text-white w-1/3 mr-4">
        <h1 class="text-green-400 text-center text-2xl p-3">Tags
            <a href="{{route('tags.create')}}">
                <i class="fas fa-plus-square pl-3"></i>
            </a>
        </h1>

        @if (count($tags)>0)
        <span style="display:none">
            {{$tag_active = $tags}}
        </span>
        @foreach ($tags as $tag)
        <p id="tag-{{$tag->id}}" class="bg-gray-800 hover:bg-gray-700 p-3 flex cursor-pointer"
            onclick="handleTagClick({{$tag->id}})">
            <span class="flex-grow text-left">
                {{$tag->name}}
            </span>
            <span class="">
                <a href="{{route('tags.edit', $tag->id)}}" class="cursor-pointer hover:text-orange-500">
                    <i class="fas fa-edit"></i>
                </a>
                <i class="fas fa-trash ml-1 hover:text-red-600" onclick="event.preventDefault();
                    if(confirm('Are you sure to delete this tag?')){
                        document.getElementById('delete-tag').submit()
                    }"></i>
                <form style="display:none" id="delete-tag" action="{{route('tags.destroy', $tag->id)}}" method="post">
                    @csrf
                    @method('delete')
                </form>
            </span>
        </p>
        @endforeach
        @endif

    </div>

    <div class="bg-gray-900 text-white w-2/3">
        <h1 class="text-green-400 text-center text-2xl p-3">Goals
            <a href="{{route('goals.create')}}">
                <i class="fas fa-plus-square pl-3"></i>
            </a>
        </h1>

        <div id="goals-ajax">
            <p class="bg-gray-800 p-3 hover:bg-green-400">
                Goal 1
                <a href="{{route('tags.edit', 1)}}" class="cursor-pointer hover:bg-teal-00">
                    <i class="fas fa-edit"></i>
                </a>
                <i class="fas fa-trash pl-1 hover:text-red-900" onclick="event.preventDefault();
                    if(confirm('Are you sure to delete this tag?')){
                        document.getElementById('delete-tag').submit()
                    }"></i>
                <form style="display:none" id="delete-tag" action="{{route('tags.destroy', 1)}}" method="post">
                    @csrf
                    @method('delete')
                </form>
            </p>
        </div>
    </div>
</div>

<script>
    // Get first tag active id
    var tag_active_id = ({!! json_encode($tag_active) !!})[0].id
    var prev_tag_active_id 
    // For the first time load
    if (tag_active_id != null){
        handleTagClick(tag_active_id)
    }

    function handleTagClick(id){
        // UI Selection Animation
        $('#tag-' + id.toString()).removeClass('bg-gray-800')
        $('#tag-' + id.toString()).addClass('bg-green-400 hover:bg-green-400')
        if (prev_tag_active_id != null){
            $('#tag-' + prev_tag_active_id.toString()).removeClass('bg-green-400')
        }
        prev_tag_active_id = id

        // Goals Builder for AJAX
        function buildGoals(data, index){
            return '<a style="text-decoration:none;" href="/goals/' + data.id.toString() + '"><p id="goal-' + data.id.toString() + '" class="bg-gray-800 p-3 no-underline hover:bg-green-400">' + 
            data.name + '</p></a>'
        }

        // AJAX FETCH
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status==200){
                
                // remove goals data before
                $('#goals-ajax').empty()
                
                // Parse new Data
                var responseObject = JSON.parse(this.responseText);
                
                console.log(responseObject)
                // loop each data from fetching
                responseObject.map((data, index) => {
                    $('#goals-ajax').append(buildGoals(data, index))
                })

            }
        }
        xhttp.open("GET", "/getGoalsfromTag?tag=" + id, true);
        xhttp.send();
    }


</script>

@endsection