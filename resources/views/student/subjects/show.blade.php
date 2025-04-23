@extends('layouts.app')

@section('title', $subject->name)

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">{{ $subject->name }}</h1>
        <div>
            <a href="{{ route('subjects.index') }}" class="btn btn-ghost">Back to My Subjects</a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-xl font-semibold mb-4">Subject Details</h2>
                <p class="mb-2"><span class="font-semibold">Description:</span> {{ $subject->description }}</p>
                <p class="mb-2"><span class="font-semibold">Code:</span> {{ $subject->subject_code }}</p>
                <p class="mb-2"><span class="font-semibold">Credits:</span> {{ $subject->credit_value }}</p>
                <p class="mb-2"><span class="font-semibold">Created:</span> {{ $subject->created_at->format('M d, Y') }}</p>
                <p class="mb-2"><span class="font-semibold">Last Updated:</span> {{ $subject->updated_at->format('M d, Y') }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-4">Teacher Information</h2>
                <p class="mb-2"><span class="font-semibold">Name:</span> {{ $subject->teacher->name }}</p>
                <p class="mb-2"><span class="font-semibold">Email:</span> {{ $subject->teacher->email }}</p>
                <p class="mb-2"><span class="font-semibold">Students Enrolled:</span> {{ $subject->students ? $subject->students->count() : 0 }}</p>
            </div>
        </div>
    </div>

    <!-- Tasks Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Tasks</h2>
        
        @if($tasks->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Task Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Points</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($tasks as $task)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('tasks.show', $task) }}" class="text-blue-600 hover:text-blue-800">
                                    {{ $task->name }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $task->points }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if(isset($solutions[$task->id]))
                                    @if($solutions[$task->id] && $solutions[$task->id]->points !== null)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Evaluated ({{ $solutions[$task->id]->points }}/{{ $task->points }})
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Submitted (Pending Evaluation)
                                        </span>
                                    @endif
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Not Submitted
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">No tasks have been assigned for this subject yet.</p>
        @endif
    </div>

    <!-- Students Section -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">Enrolled Students ({{ $subject->students ? $subject->students->count() : 0 }})</h2>
        
        @if($subject->students && $subject->students->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($subject->students as $student)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $student->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $student->email }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">No students are enrolled in this subject yet.</p>
        @endif
    </div>
</div>
@endsection