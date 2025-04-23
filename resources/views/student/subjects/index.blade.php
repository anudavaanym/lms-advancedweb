@extends('layouts.app')

@section('title', 'My Subjects')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">My Subjects</h1>
        <a href="{{ route('subjects.available') }}" class="btn btn-primary">Take a new Subject</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if($subjects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($subjects as $subject)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2">{{ $subject->name }}</h2>
                        <p class="text-gray-600 mb-4">{{ Str::limit($subject->description, 100) }}</p>
                        <p class="text-sm text-gray-600"><span class="font-semibold">Code:</span> {{ $subject->subject_code }}</p>
                        <p class="text-sm text-gray-600"><span class="font-semibold">Credits:</span> {{ $subject->credit_value }}</p>
                        <p class="text-sm text-gray-600"><span class="font-semibold">Teacher:</span> {{ $subject->teacher->name }}</p>
                        
                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('subjects.show', $subject) }}" class="btn btn-primary">View Details</a>
                            
                            <form action="{{ route('subjects.leave', $subject) }}" method="POST" onsubmit="return confirm('Are you sure you want to leave this subject?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Leave Subject</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-gray-600">You are not enrolled in any subjects yet.</p>
            <a href="{{ route('subjects.available') }}" class="btn btn-primary mt-4">Take a Subject</a>
        </div>
    @endif
</div>
@endsection