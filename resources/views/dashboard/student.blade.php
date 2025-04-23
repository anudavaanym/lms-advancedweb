@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold mb-2">Student Dashboard</h1>
    <p class="text-gray-600 mb-6">Welcome back, {{ Auth::user()->name }}</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- My Subjects Section -->
        <div class="bg-white rounded-lg shadow-md">
            <div class="p-4 border-b flex justify-between items-center">
                <h2 class="text-xl font-semibold">My Subjects</h2>
                <button class="text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </button>
            </div>
            <div class="p-4">
                @forelse($subjects as $subject)
                    <div class="mb-6">
                        <a href="{{ route('subjects.show', $subject) }}" class="text-lg font-medium hover:text-blue-600">
                            {{ $subject->name }}
                        </a>
                        <div class="mt-1 w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-purple-600 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                        <div class="mt-1 text-right">
                            <span class="text-purple-600 font-semibold">
                                @php
                                    $grades = ['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C'];
                                    echo $grades[array_rand($grades)];
                                @endphp
                            </span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">You are not enrolled in any subjects yet.</p>
                @endforelse

                <div class="mt-4 text-center">
                    <a href="{{ route('subjects.available') }}" class="inline-block px-4 py-2 bg-purple-100 text-purple-700 rounded-full hover:bg-purple-200 transition">
                        Browse Subjects
                    </a>
                </div>
            </div>
        </div>

        <!-- Upcoming Tasks Section -->
        <div class="bg-white rounded-lg shadow-md">
            <div class="p-4 border-b flex justify-between items-center">
                <h2 class="text-xl font-semibold">Upcoming Tasks</h2>
                <span class="bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">
                    {{ $subjects->flatMap->tasks->where('due_date', '>=', now())->count() }}
                </span>
            </div>
            <div class="p-4">
                @php
                    $upcomingTasks = $subjects->flatMap->tasks->where('due_date', '>=', now())->sortBy('due_date')->take(3);
                @endphp
                
                @forelse($upcomingTasks as $task)
                    <div class="mb-4 pb-4 border-b last:border-0">
                        <div class="font-medium">{{ $task->name }}</div>
                        <div class="text-sm text-gray-500">{{ $task->subject->name }}</div>
                        <div class="mt-2 flex justify-between items-center">
                            <span class="text-sm text-red-600">
                                Due in {{ now()->diffInDays($task->due_date) }} days
                            </span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No upcoming tasks.</p>
                @endforelse

                <div class="mt-4 text-center">
                    <a href="#" class="text-purple-600 hover:text-purple-800">View All Tasks</a>
                </div>
            </div>
        </div>

        <!-- Recent Grades Section -->
        <div class="bg-white rounded-lg shadow-md">
            <div class="p-4 border-b">
                <h2 class="text-xl font-semibold">Recent Grades</h2>
            </div>
            <div class="p-4">
                @php
                    $solutions = Auth::user()->solutions()->with('task.subject')->latest()->take(3)->get();
                @endphp
                
                @forelse($solutions as $solution)
                    <div class="mb-4 pb-4 border-b last:border-0">
                        <div class="font-medium">{{ $solution->task->name }}</div>
                        <div class="text-sm text-gray-500">{{ $solution->task->subject->name }}</div>
                        <div class="mt-2 flex justify-between items-center">
                            <span class="text-sm">
                                @if($solution->points !== null)
                                    <span class="text-green-600 font-semibold">
                                        {{ $solution->points }}/{{ $solution->task->points }}
                                    </span>
                                @else
                                    <span class="text-yellow-600">Pending</span>
                                @endif
                            </span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No graded submissions yet.</p>
                @endforelse

            </div>
        </div>
    </div>

    <!-- Announcements Section -->
    <div class="mt-6 bg-white rounded-lg shadow-md">
        <div class="p-4 border-b">
            <h2 class="text-xl font-semibold">Announcements</h2>
        </div>
        <div class="p-4">
            <div class="mb-4 pb-4 border-b flex justify-between">
                <div>
                    <div class="font-medium">No class on Friday</div>
                    <div class="text-sm text-gray-500">Web Development</div>
                </div>
                <div class="text-sm text-gray-500">Oct 12</div>
            </div>
            
            <div class="mb-4 pb-4 border-b flex justify-between">
                <div>
                    <div class="font-medium">Extra office hours next week</div>
                    <div class="text-sm text-gray-500">Data Structures</div>
                </div>
                <div class="text-sm text-gray-500">Oct 10</div>
            </div>
        </div>
    </div>
</div>
@endsection