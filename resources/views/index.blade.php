@extends('layouts.app')

@section('title', 'Task List')

@section('content')

    <nav class="my-2 rounded px-2 bg-gray-200 hover:bg-gray-300">
        <a href="{{route('task.create')}}" class="text-xl"> + Add New Task</a>
    </nav>

    <div>
        @forelse ($tasks as $task)
            <div class="my-1 hover:bg-amber-100 rounded px-2">
                <a href="{{ route('task.show', ['task' => $task->id]) }}" class="{{$task->completed ? 'line-through' : ''}}" >
                    {{ $task->title }}
                </a>
            </div>
        @empty
            <p>No tasks</p>
        @endforelse

        @if ($tasks->count())
        <div class="my-2">
            {{$tasks->links()}}
        </div>
        @endif
    </div>
@endsection
