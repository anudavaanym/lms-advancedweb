<div class="navbar bg-base-100 shadow-sm">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> 
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /> 
                </svg>
            </div>
        </div>
        <a class="btn btn-ghost text-xl">LMS</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </div>
    <div class="navbar-end space-x-4">
        <!-- Show Login/Sign Up buttons if the user is not authenticated -->
        @guest
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('register') }}" class="btn">Sign Up</a>
        @endguest

        <!-- Show user profile and logout button if the user is authenticated -->
        @auth
            <span class="btn btn-ghost text-xl">
                {{ auth()->user()->name }}
            </span>
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Avatar" src="{{ asset('images/teacher.png') }}" />
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li><a>Profile</a></li>
                    <li><a>Settings</a></li>
                    <li>
                        <!-- Logout Form -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</div>
