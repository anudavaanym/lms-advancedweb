@extends('layouts.app')

@section('title', 'Solution Details')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Solution for: {{ $solution->task->name }}</h1>
        <p class="text-gray-600">Submitted by: {{ $solution->user->name }} ({{ $solution->user->email }}) on {{ $solution->created_at->format('M d, Y H:i') }}</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-xl font-semibold mb-4">Task Description</h2>
        <div class="prose max-w-none bg-gray-50 p-4 rounded mb-6">
            {{ $solution->task->description }}
        </div>

        <h2 class="text-xl font-semibold mb-4">Solution Content</h2>
        <div class="prose max-w-none bg-gray-50 p-4 rounded">
            {{ $solution->content }}
        </div>
    </div>

    @if(Auth::user()->isTeacher() && $solution->task->subject->user_id == Auth::id())
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold mb-4">Evaluation</h2>
            
            @if($solution->points !== null)
                <div class="mb-4">
                    <h3 class="text-lg font-medium mb-2">Current Evaluation:</h3>
                    <div class="bg-gray-50 p-4 rounded mb-4">
                        <p><strong>Points:</strong> {{ $solution->points }}/{{ $solution->task->points }}</p>
                        <p><strong>Feedback:</strong> {{ $solution->evaluation }}</p>
                    </div>
                </div>
                
                <form action="{{ route('solutions.evaluate', $solution) }}" method="POST" class="mt-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="evaluation">
                            Update Feedback
                        </label>
                        <textarea id="evaluation" name="evaluation" rows="4" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('evaluation') border-red-500 @enderror">{{ old('evaluation', $solution->evaluation) }}</textarea>
                        @error('evaluation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="points">
                            Update Points (max: {{ $solution->task->points }})
                        </label>
                        <input id="points" type="number" name="points" value="{{ old('points', $solution->points) }}" required min="0" max="{{ $solution->task->points }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('points') border-red-500 @enderror" />
                        @error('points')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Evaluation</button>
                </form>
            @else
                <form action="{{ route('solutions.evaluate', $solution) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="evaluation">
                            Feedback <span class="text-red-500">*</span>
                        </label>
                        <textarea id="evaluation" name="evaluation" rows="4" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('evaluation') border-red-500 @enderror">{{ old('evaluation') }}</textarea>
                        @error('evaluation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="points">
                            Points (max: {{ $solution->task->points }}) <span class="text-red-500">*</span>
                        </label>
                        <input id="points" type="number" name="points" value="{{ old('points', 0) }}" required min="0" max="{{ $solution->task->points }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('points') border-red-500 @enderror" />
                        @error('points')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit Evaluation</button>
                </form>
            @endif
        </div>
    @elseif($solution->points !== null)
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold mb-4">Evaluation</h2>
            
            <div class="bg-gray-50 p-4 rounded">
                <p><strong>Points:</strong> {{ $solution->points }}/{{ $solution->task->points }}</p>
                <p><strong>Feedback:</strong> {{ $solution->evaluation }}</p>
            </div>
        </div>
    @else
        <div class="bg-yellow-50 p-4 rounded">
            <p class="text-yellow-700">This solution is pending evaluation.</p>
        </div>
    @endif

    <div class="mt-6">
        <a href="{{ route('tasks.show', $solution->task) }}" class="btn btn-ghost">
            Back to Task
        </a>
    </div>
</div>
@endsection