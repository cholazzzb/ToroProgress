@extends('layouts/app')

@section('content')

<div class="container mx-auto">
    <div class="md:flex">
        <div class="flex-1 text-center m-1 bg-gray-300 shadow-md">
            <div class="">
                <h1 class="text-xl bg-green-300 p-3 font-bold">{{$goal->name}}
                    <a href="{{route('goals.edit', $goal->id)}}" class="cursor-pointer hover:bg-teal-00">
                        <i class="fas fa-edit"></i>
                    </a>
                </h1>
                <p>{{$goal->description}}</p>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto">
    <div class="md:flex">
        <div class="flex-1 text-center m-1 bg-gray-100 shadow-md">
            <h1 class="text-xl bg-green-100 p-3 font-bold">LOGBOOK</h1>
            <table class="table-auto p-3 justify-center mt-5 ">
                <thead>
                    <tr class="border">
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Topic</th>
                        <th class="px-4 py-2">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 text-sm">23 Desember 2029</td>
                        <td class="px-4 py-2 text-sm">Belajar Tailwind CSS</td>
                        <td class="px-4 py-2 text-sm">Dari travesrty media</td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-3 mb-3 cursor-pointer hover:bg-teal-100"><i class="fas fa-plus-square"></i></div>
        </div>
        <div class="flex-1 text-center p-3 m-1 bg-gray-100">
            <h1>SUBGOAL</h1>
        </div>

    </div>
</div>

@endsection