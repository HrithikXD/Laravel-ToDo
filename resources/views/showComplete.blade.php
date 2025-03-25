@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white shadow-2xl rounded-xl overflow-hidden">
            {{-- Header Section --}}
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-6">
                <h1 class="text-3xl font-bold text-white flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    My Completed Tasks
                </h1>
            </div>


            {{-- Tasks List --}}
            <div class="divide-y divide-gray-200">
                @forelse ($tasks as $task)
                    <div class="px-6 py-4 hover:bg-gray-50 transition duration-200 group">
                        <a href="{{ route('task.show', ['task' => $task->id]) }}"
                            class="flex items-center justify-between group-hover:text-indigo-600 {{ $task->completed ? 'text-gray-400 line-through' : 'text-gray-800' }}">
                            <span class="text-lg font-medium">
                                {{ $task->title }}
                            </span>

                            {{-- Status Indicator --}}
                            @if ($task->completed)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @endif
                        </a>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4 text-gray-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-xl font-semibold">No tasks yet</p>
                        <p class="text-sm">Start by adding a new task!</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if ($tasks->count())
                <div class="bg-gray-50 px-6 py-4 border-t">
                    {{ $tasks->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
