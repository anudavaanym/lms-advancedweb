@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Edit Task: {{ $task->name }}</h1>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form method="POST" action="{{ route('tasks.update', $task) }}" novalidate>
            @csrf
            @method('PUT')

            <!-- Task Name -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Task Name <span class="text-red-500">*</span>
                </label>
                <input id="name" type="text" name="name" value="{{ old('name', $task->name) }}" required 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description <span class="text-red-500">*</span>
                </label>
                <textarea id="description" name="description" rows="4" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror">{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Points -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="points">
                    Points <span class="text-red-500">*</span>
                </label>
                <input id="points" type="number" name="points" value="{{ old('points', $task->points) }}" required min="1" max="100"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('points') border-red-500 @enderror" />
                @error('points')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('tasks.show', $task) }}" class="btn btn-ghost">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Task</button>
            </div>
        </form>
    </div>
</div>
@endsection