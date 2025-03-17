@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' :'Add Task')

@section('styles')
    <style>
    .error-message{
        color : red;
        font-size: 0.8rem;
    }
    </style>
@endsection

@section('content')
    <form class="form" method="POST" action="{{isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store')}}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value={{$task->title ?? old('title')}}>
            @error('title')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="2">{{$task->description ?? old('description')}}</textarea>
            @error('description')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="long_description" class="form-label">Long Description</label>
            <textarea name="long_description" class="form-control" id="long_description" rows="5">{{$task->long_description ?? old('long_description')}}</textarea>
            @error('long_description')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
            <button type="reset" class="btn btn-outline-danger">Clear</button>
        </div>
    </form>

@endsection
