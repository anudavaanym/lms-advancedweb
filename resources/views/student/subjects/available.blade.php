@extends('layouts.app')

@section('title', 'Available Subjects')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Available Subjects</h1>
        <a href="{{ route('subjects.index') }}" class="btn btn-ghost">Back to My Subjects</a>
    </div>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if($availableSubjects->count() > 0)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Credits</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teacher</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($availableSubjects as $subject)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $subject->name }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($subject->description, 100) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $subject->subject_code }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $subject->credit_value }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $subject->teacher->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form action="{{ route('subjects.take', $subject) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">Take Subject</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-gray-600">There are no available subjects to take at the moment.</p>
        </div>
    @endif
</div>
@endsection