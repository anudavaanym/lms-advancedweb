@extends('layouts.app')

@section('title', 'Submit Solution')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Submit Solution</h1>
        <p class="text-gray-600">Task: {{ $task->name }} ({{ $task->points }} points)</p>
    </div>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form method="POST" action="{{ route('solutions.store', $task) }}" novalidate>
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                    Your Solution <span class="text-red-500">*</span>
                </label>
                <textarea id="content" name="content" rows="10" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('tasks.show', $task) }}" class="btn btn-ghost">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit Solution</button>
            </div>
        </form>
    </div>
</div>
@endsection