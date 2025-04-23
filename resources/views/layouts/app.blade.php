<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Learning Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <!-- Navigation Bar (Header) -->
    @include('layouts.navigation')

    <!-- Main Layout with Sidebar -->
    <div class="flex mt-4">
        <!-- Sidebar (Only visible for logged-in users) -->
        @auth
        @if(request()->route()->getName() != 'home')
        <div class="w-64 bg-base-100 min-h-screen shadow-md">
            <div class="flex flex-col p-4">
                <ul class="space-y-2">
                    @if(auth()->user()->isTeacher())  <!-- Check if user is a teacher -->
                        <li><a href="{{ route('dashboard') }}" class="btn btn-ghost">Dashboard</a></li>
                        <li><a href="{{ route('subjects.index') }}" class="btn btn-ghost">My Subjects</a></li>
                        <li><a href="{{ route('subjects.create') }}" class="btn btn-ghost">New Subject</a></li>
                    @elseif(auth()->user()->isStudent())  <!-- Check if user is a student -->
                        <li><a href="{{ route('dashboard') }}" class="btn btn-ghost">Dashboard</a></li>
                        <li><a href="{{ route('subjects.index') }}" class="btn btn-ghost">My Subjects</a></li>
                        <li><a href="{{ route('subjects.available') }}" class="btn btn-ghost">Take Subjects</a></li>
                    @endif

                    <li><a href="#" class="btn btn-ghost">Messages</a></li>
                    <li><a href="#" class="btn btn-ghost">Settings</a></li>
                </ul>
            </div>
        </div>
        @endif
        @endauth

        <!-- Main Content Area -->
        <div class="flex-1 p-4">
            @yield('content')  <!-- Page-specific content will go here -->
        </div>
    </div>

    @yield('footer')  <!-- You can add footer content here if necessary -->
</body>
</html>
