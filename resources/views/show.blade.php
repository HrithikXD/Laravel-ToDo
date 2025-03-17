@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <h6 class="text-xl my-2">{{ $task->description }}</h6>

    @if ($task->long_description)
        <p class="my-2">{{ $task->long_description }}</p>
    @endif

    <p class="text-sm my-1">{{ $task->created_at }}</p>
    <p class="text-sm my-1">{{ $task->updated_at }}</p>
    <div class="my-3">
        <sapn class="text-sm rounded px-2 {{$task->completed ? 'bg-green-400' : 'bg-yellow-200'}}">
            {{$task->completed ? 'Completed' : 'On Progress'}}
        </span>
    </div>
    <div class="d-flex justify-content align-items-center">
        <form action="{{route('task.edit', ['task'=>$task->id])}}" method="GET">
            @csrf
            <button type="submit" class="btn btn-outline-primary" >Edit</button>
        </form>
        <form action="{{route('tasks.complete', ['task'=>$task->id])}}" method="POST" class="mx-2">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-outline-success" >
                Mark as {{$task->completed ? 'not completed' : 'complete'}}
            </button>
        </form>
        <form action="{{route('tasks.destroy', ['task'=>$task->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger" >Delete</button>
        </form>
    </div>
@endsection
