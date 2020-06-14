@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-2xl p-3 bg-green-100">
                    <a href="{{route('goals.index')}}">
                            <div class="max-w-xs bg-green-200 text-center">
                                Your Goals
                            </div>
                                                </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
