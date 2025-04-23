@extends('layouts.app')

@section('title', $subject->name)

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">{{ $subject->name }}</h1>
        <div class="flex space-x-2">
            <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-primary">Edit Subject</a>
            <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-error" onclick="return confirm('Are you sure you want to delete this subject?')">Delete Subject</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h2 class="text-xl font-semibold mb-2">Subject Details</h2>
                <p><span class="font-semibold">Subject Code:</span> {{ $subject->subject_code }}</p>
                <p><span class="font-semibold">Credit Value:</span> {{ $subject->credit_value }}</p>
                <p><span class="font-semibold">Created:</span> {{ $subject->created_at->format('Y-m-d H:i') }}</p>
                <p><span class="font-semibold">Last Updated:</span> {{ $subject->updated_at->format('Y-m-d H:i') }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Description</h2>
                <p>{{ $subject->description ?: 'No description provided.' }}</p>
            </div>
        </div>
    </div>

    <!-- Tasks Section -->
    <div class="mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">Tasks</h2>
            <a href="{{ route('tasks.create', ['subject' => $subject->id]) }}" class="btn btn-primary">Add New Task</a>
        </div>

        @if(count($tasks) > 0)
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Task Name</th>
                            <th>Points</th>
                            <th>Submissions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>
                                    <a href="{{ route('tasks.show', $task) }}" class="font-medium text-blue-600 hover:underline">
                                        {{ $task->name }}
                                    </a>
                                </td>
                                <td>{{ $task->points }}</td>
                                <td>{{ $task->solutions->count() }}</td>
                                <td class="flex space-x-2">
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-base-200 p-6 rounded-lg text-center">
                <p class="text-lg">No tasks have been created for this subject yet.</p>
                <a href="{{ route('tasks.create', ['subject' => $subject->id]) }}" class="btn btn-primary mt-4">Create Your First Task</a>
            </div>
        @endif
    </div>

    <!-- Students Section -->
    <div>
        <h2 class="text-2xl font-semibold mb-4">Enrolled Students ({{ $subject->students->count() }})</h2>
        
        @if($subject->students->count() > 0)
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subject->students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-base-200 p-6 rounded-lg text-center">
                <p class="text-lg">No students are enrolled in this subject yet.</p>
            </div>
        @endif
    </div>
</div>
@endsection