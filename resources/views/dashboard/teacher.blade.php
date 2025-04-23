@extends('layouts.app')

@section('title', 'Teacher Dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-1">Teacher Dashboard</h1>
    <p class="text-gray-600 mb-6">Welcome back, Professor {{ Auth::user()->name }}</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- My Subjects Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-4 flex justify-between items-center border-b border-gray-100">
                <h2 class="font-semibold">My Subjects</h2>
                <div class="text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </div>
            </div>
            <div class="p-4">
                @forelse($subjects as $subject)
                    <div class="mb-4 flex justify-between items-center">
                        <a href="{{ route('subjects.show', $subject) }}" class="font-medium hover:text-indigo-600 truncate mr-2">{{ $subject->name }}</a>
                        <div class="text-xs bg-gray-100 px-3 py-1 rounded-full whitespace-nowrap text-gray-600">
                            {{ $subject->students->count() }} students
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">You don't have any subjects yet.</p>
                @endforelse

                <div class="mt-6">
                    <a href="{{ route('subjects.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        New Subject
                    </a>
                </div>
            </div>
        </div>

        <!-- Pending Evaluations Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-4 flex justify-between items-center border-b border-gray-100">
                <h2 class="font-semibold">Pending Evaluations</h2>
                <span class="bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-medium">
                    {{ $pendingSolutions->count() }}
                </span>
            </div>
            <div class="p-4">
                @forelse($pendingSolutions as $solution)
                    <div class="mb-4 pb-4 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                        <div class="font-medium">{{ $solution->task->name }}</div>
                        <div class="text-sm text-gray-500">{{ $solution->user->name }}</div>
                        <div class="mt-1 text-right">
                            <span class="text-gray-500 text-xs">{{ $solution->created_at->format('M d') }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No pending evaluations.</p>
                @endforelse

                @if($pendingSolutions->count() > 0)
                    <div class="mt-4 text-center">
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm">View All</a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-4 border-b border-gray-100">
                <h2 class="font-semibold">Recent Activity</h2>
            </div>
            <div class="p-4">
                <div class="mb-4 pb-4 border-b border-gray-100 flex items-start">
                    <div class="mr-3 mt-1 bg-indigo-100 p-2 rounded-full text-indigo-600 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium text-sm">John Doe submitted Project 1</div>
                        <div class="text-xs text-gray-500">2 hours ago</div>
                    </div>
                </div>
                
                <div class="mb-4 pb-4 border-b border-gray-100 flex items-start">
                    <div class="mr-3 mt-1 bg-green-100 p-2 rounded-full text-green-600 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium text-sm">Emma Lee enrolled in Web Dev</div>
                        <div class="text-xs text-gray-500">Yesterday</div>
                    </div>
                </div>
                
                <div class="mb-4 flex items-start">
                    <div class="mr-3 mt-1 bg-yellow-100 p-2 rounded-full text-yellow-600 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium text-sm">You graded CSS Basics assignments</div>
                        <div class="text-xs text-gray-500">2 days ago</div>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection