@extends('layouts.app')

@section('title', 'My Subjects')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">My Subjects</h1>
        <a href="{{ route('subjects.create') }}" class="btn btn-primary">Create New Subject</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div> 
    @endif

    @if(count($subjects) > 0)
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Description</th>
                        <th>Subject Code</th>
                        <th>Credit Value</th>
                        <th>Students</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>
                                <a href="{{ route('subjects.show', $subject) }}" class="font-medium text-blue-600 hover:underline">
                                    {{ $subject->name }}
                                </a> 
                            </td>
                            <td>{{ $subject->description }}</td>
                            <td>{{ $subject->subject_code }}</td>
                            <td>{{ $subject->credit_value }}</td>
                            <td>{{ $subject->students->count() }}</td>
                            <td class="flex space-x-2">
                                <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-sm">Edit</a>
                                <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-error" onclick="return confirm('Are you sure you want to delete this subject?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-base-200 p-6 rounded-lg text-center">
            <p class="text-lg">You haven't created any subjects yet.</p>
            <a href="{{ route('subjects.create') }}" class="btn btn-primary mt-4">Create Your First Subject</a>
        </div>
    @endif
</div>
@endsection