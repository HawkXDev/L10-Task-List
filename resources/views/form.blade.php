@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.9rem;
        }
    </style>
@endsection

@section('content')

    <form action="{{ isset($task) ? route('task.update', ['task' => $task->id]) : route('task.store') }}" method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $task->title ?? old('title') }}">
        </div>
        @error('title')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description"
                      rows="5">{{ $task->description ?? old('description') }}</textarea>
        </div>
        @error('description')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div>
            <label for="long_description">Long Description</label>
            <textarea id="long_description" name="long_description"
                      rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
        </div>
        @error('long_description')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <button type="submit">
            @isset($task)
                Edit Task
            @else
                Add Task
            @endisset
        </button>
    </form>

@endsection
