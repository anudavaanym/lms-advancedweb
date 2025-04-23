@extends('layouts.app')

@section('title', 'Create New Subject')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Create New Subject</h1>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form method="POST" action="{{ route('subjects.store') }}" novalidate>
            @csrf

            <!-- Subject Name -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Subject Name <span class="text-red-500">*</span>
                </label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea id="description" name="description" rows="4"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            </div>

            <!-- Subject Code -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="subject_code">
                    Subject Code <span class="text-red-500">*</span>
                </label>
                <input id="subject_code" type="text" name="subject_code" value="{{ old('subject_code') }}" required 
                    placeholder="Format: IK-SSSNNN (e.g., IK-ABC123)"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('subject_code') border-red-500 @enderror" />
                @error('subject_code')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Credit Value -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="credit_value">
                    Credit Value <span class="text-red-500">*</span>
                </label>
                <input id="credit_value" type="number" name="credit_value" value="{{ old('credit_value') }}" required min="1" max="30"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('credit_value') border-red-500 @enderror" />
                @error('credit_value')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('subjects.index') }}" class="btn btn-ghost">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Subject</button>
            </div>
        </form>
    </div>
</div>
@endsection