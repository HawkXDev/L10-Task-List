@extends('layouts.app')

@section('title', 'Add Task')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.9rem;
        }
    </style>
@endsection

@section('content')

    <form action="{{ route('task.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
        </div>
        @error('title')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5"></textarea>
        </div>
        @error('description')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div>
            <label for="long_description">Long Description</label>
            <textarea id="long_description" name="long_description" rows="10"></textarea>
        </div>
        @error('long_description')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <button type="submit">Submit</button>
    </form>

@endsection
