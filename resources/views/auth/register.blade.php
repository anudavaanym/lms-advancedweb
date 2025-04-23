@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center mb-6">Create an account</h1>

        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" />
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" />
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                    Confirm Password
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>

            <div class="mb-6">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Register
                </button>
            </div>

            <div class="text-center text-sm">
                <p>
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800">
                        Login
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection