@extends('layouts.app')

@section('title', 'Teacher Dashboard')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-1">Teacher Dashboard</h1>
    <p class="text-gray-600 mb-6">Welcome back, Professor {{ Auth::user()->name }}</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- My Subjects Section -->
<!-- My Subjects Section -->
<div class="bg-white rounded-lg shadow">
    <div class="p-4 flex justify-between items-center border-b">
        <h2 class="font-semibold">My Subjects</h2>
        <button class="text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
            </svg>
        </button>
    </div>
    <div class="p-4">
        @forelse($subjects as $subject)
            <div class="mb-4 flex justify-between items-center">
                <div class="font-medium truncate mr-2">{{ $subject->name }}</div>
                <div class="text-sm bg-gray-100 px-3 py-1 rounded-full whitespace-nowrap">
                    {{ $subject->students->count() }} students
                </div>
            </div>
        @empty
            <p class="text-gray-500">You don't have any subjects yet.</p>
        @endforelse

        <div class="mt-6">
            <a href="{{ route('subjects.create') }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                + New Subject
            </a>
        </div>
    </div>
</div>

        <!-- Pending Evaluations Section -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-4 flex justify-between items-center border-b">
                <h2 class="font-semibold">Pending Evaluations</h2>
                <span class="bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">
                    {{ $pendingSolutions->count() }}
                </span>
            </div>
            <div class="p-4">
                @forelse($pendingSolutions as $solution)
                    <div class="mb-4 pb-4 {{ !$loop->last ? 'border-b' : '' }}">
                        <div class="font-medium">{{ $solution->task->name }}</div>
                        <div class="text-sm text-gray-500">{{ $solution->user->name }}</div>
                        <div class="mt-1 text-right">
                            <span class="text-gray-500 text-sm">{{ $solution->created_at->format('M d') }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No pending evaluations.</p>
                @endforelse

                <div class="mt-4 text-center">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">View All</a>
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-4 border-b">
                <h2 class="font-semibold">Recent Activity</h2>
            </div>
            <div class="p-4">
                @forelse($recentSubmissions as $submission)
                    <div class="mb-4 pb-4 {{ !$loop->last ? 'border-b' : '' }} flex items-start">
                        <div class="mr-3 mt-1 bg-indigo-100 p-2 rounded-full text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-medium">{{ $submission->user->name }} submitted {{ $submission->task->name }}</div>
                            <div class="text-sm text-gray-500">{{ $submission->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No recent activity.</p>
                @endforelse

                <div class="mt-4 text-center">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">View All</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Deadlines Section -->
    <div class="bg-white rounded-lg shadow">
    <div class="p-4">
    @forelse($upcomingTasks as $task)
        <div class="flex justify-between items-start {{ !$loop->last ? 'mb-4 pb-4 border-b' : '' }}">
            <div>
                <div class="font-medium">{{ $task->name }}</div>
                <div class="text-sm text-gray-500">{{ $task->subject->name }}</div>
            </div>
            <div class="text-sm text-red-600">
                @if($task->due_date)
                    @if($task->due_date->isToday())
                        Today
                    @elseif($task->due_date->isTomorrow())
                        Tomorrow
                    @else
                        {{ $task->due_date->format('M d') }}
                    @endif
                @else
                    No deadline
                @endif
            </div>
        </div>
    @empty
        <p class="text-gray-500">No upcoming deadlines.</p>
    @endforelse
</div>
    </div>
</div>
@endsection