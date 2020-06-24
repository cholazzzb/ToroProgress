@extends('layouts/app')

@section('content')

<div class="container mx-auto">
    <div class="bg-purple-500 mt-4">
        @if(count($tags) > 0)
        <h1 class="text-2xl p-3 bg-purple-600">Tags <a href="{{route('tags.create')}}">
                <i class="fas fa-plus-square ml-3"></i>
            </a></h1>
        @foreach($tags as $tag)
        <h1 class="text-xl p-3"> {{$tag->name}} <a href="{{route('tags.edit', $tag->id)}}"
                class="cursor-pointer hover:bg-teal-00">
                <i class="fas fa-edit ml-2"></i>
            </a>
            <i class="fas fa-trash pl-1 hover:text-red-900" onclick="event.preventDefault();
            if(confirm('Are you sure to delete this tag?')){
            document.getElementById('delete-tag-{{$tag->id}}').submit()
            }"></i>
            <form style="display:none" id="delete-tag-{{$tag->id}}" action="{{route('tags.destroy', $tag->id)}}" method="post">
                @csrf
                @method('delete')
            </form>
        </h1>
        @endforeach
        @else
        <h1 class="text-2xl p-3 bg-purple-600">There aren't any tags. Create one! <a
                href="{{route('tags.create')}}">
                <i class="fas fa-plus-square ml-3"></i>
            </a></h1>
        @endif
    </div>
</div>
@endsection