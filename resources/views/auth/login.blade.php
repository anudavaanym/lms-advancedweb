@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center mb-6">Login to your account</h1>
        
        <!-- Session Status -->
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

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
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" />
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-indigo-600">
                    <span class="ml-2 text-sm text-gray-700">Remember me</span>
                </label>
            </div>

            <div class="mb-6">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Login
                </button>
            </div>

            <div class="text-center text-sm">
                <p class="mb-2">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800">
                        Register
                    </a>
                </p>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-indigo-600 hover:text-indigo-800">
                        Forgot your password?
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection