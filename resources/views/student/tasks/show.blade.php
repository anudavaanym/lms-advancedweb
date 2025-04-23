@extends('layouts.app')

@section('title', $task->name)

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">{{ $task->name }}</h1>
        <div>
            <a href="{{ route('subjects.show', $subject) }}" class="btn btn-ghost">
                Back to Subject
            </a>
            @can('update', $subject)
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary ml-2">
                    Edit Task
                </a>
            @endcan
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="mb-4">
            <h2 class="text-xl font-semibold mb-2">Description</h2>
            <p class="text-gray-700">{{ $task->description }}</p>
        </div>
        
        <div class="mb-4">
            <h2 class="text-xl font-semibold mb-2">Points</h2>
            <p class="text-gray-700">{{ $task->points }}</p>
        </div>
        
        <div class="mb-4">
            <h2 class="text-xl font-semibold mb-2">Solutions</h2>
            <p class="text-gray-700">{{ $totalSolutions }} submitted, {{ $evaluatedSolutions }} evaluated</p>
        </div>
        
        @if(!Auth::user()->isTeacher())
            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-2">Submit Your Solution</h3>
                
                @if($solution)
                    <div class="bg-gray-100 p-4 rounded mb-4">
                        <h4 class="font-medium mb-2">Your Current Submission:</h4>
                        <p>{{ $solution->content }}</p>
                        
                        @if($solution->points !== null)
                            <div class="mt-4 p-3 bg-green-50 rounded">
                                <h4 class="font-medium mb-1">Evaluation:</h4>
                                <p><strong>Points:</strong> {{ $solution->points }}/{{ $task->points }}</p>
                                @if($solution->evaluation)
                                    <p><strong>Feedback:</strong> {{ $solution->evaluation }}</p>
                                @endif
                            </div>
                        @else
                            <p class="mt-2 text-yellow-600">Your solution is pending evaluation.</p>
                        @endif
                    </div>
                @endif
                
                <form action="{{ route('solutions.store', $task) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ $solution ? 'Update Your Solution' : 'Your Solution' }}
                        </label>
                        <textarea name="content" id="content" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror" required>{{ old('content', $solution ? $solution->content : '') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {{ $solution ? 'Update Solution' : 'Submit Solution' }}
                    </button>
                </form>
            </div>
        @endif
    </div>

    <!-- Solution List Section for Teachers -->
    @if(Auth::user()->isTeacher() && $solutions->count() > 0)
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Submitted Solutions</h2>
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Points</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($solutions as $sol)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $sol->user->name }} ({{ $sol->user->email }})
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $sol->created_at->format('M d, Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($sol->points !== null)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Evaluated
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($sol->points !== null)
                                    {{ $sol->points }}/{{ $task->points }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('solutions.show', $sol) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    View
                                </a>
                                
                                @if($sol->points === null)
                                    <a href="{{ route('solutions.show', $sol) }}" class="text-green-600 hover:text-green-900">
                                        Evaluate
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection