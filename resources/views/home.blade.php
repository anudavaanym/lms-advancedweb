@extends('layouts.app')

@section('title', 'Welcome to Learning Management System')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-base-200 to-base-300">
    <!-- Hero Section with Animation -->
    <div class="relative py-24 bg-gradient-to-r from-indigo-100 to-purple-100">
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <span class="px-4 py-1 bg-indigo-500/20 text-indigo-700 rounded-full text-sm font-medium mb-4 inline-block backdrop-blur-sm">The Future of Education</span>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 text-indigo-700">
                        Our Learning Management System
                    </h1>
                    <p class="text-lg mb-8 text-gray-700 max-w-lg">
                        Our Learning Management System empowers educators and students with powerful tools for a seamless educational experience.
                    </p>
                    
                    @guest
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('login') }}" class="btn btn-primary shadow-lg hover:shadow-primary/50 transition-all">Get Started</a>
                        <a href="{{ route('register') }}" class="btn bg-white text-indigo-700 hover:bg-gray-100 shadow-lg hover:shadow-white/30 transition-all">Create Account</a>
                    </div>
                    @else
                    <a href="{{ route('dashboard') }}" class="btn btn-primary shadow-lg hover:shadow-primary/50 transition-all">Go to Dashboard</a>
                    @endguest
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg shadow-xl transform hover:scale-[1.02] transition-all">
                        <img src="{{ asset('images/home1.jpg') }}" alt="Learning Management System" class="w-full rounded-lg shadow-lg object-cover h-80">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
 <!-- Features Section -->
 <div class="container mx-auto px-4 py-20">
        <div class="text-center mb-16">
            <span class="px-4 py-1 bg-indigo-500/10 text-indigo-600 rounded-full text-sm font-medium mb-4 inline-block">Why Choose Us</span>
            <h2 class="text-3xl md:text-4xl font-bold">Powerful Features for Modern Education</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto mt-6"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Feature Card 1 -->
            <div class="card bg-base-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden group">
                <div class="absolute w-32 h-32 -top-16 -right-16 bg-indigo-500/10 rounded-full group-hover:bg-indigo-500/20 transition-all duration-300"></div>
                <div class="card-body relative z-10">
                    <div class="bg-primary/10 p-4 rounded-xl w-16 h-16 flex items-center justify-center mb-6 group-hover:bg-primary/20 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Intuitive Course Management</h3>
                    <p class="text-base-content/70 mb-4">Easily create, organize, and manage courses with our user-friendly interface. Designed for educators of all technical levels.</p>
                    <div class="mt-auto">
                        <a href="#" class="text-primary font-medium inline-flex items-center group-hover:translate-x-1 transition-transform">
                            Learn more
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Feature Card 2 -->
            <div class="card bg-base-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden group">
                <div class="absolute w-32 h-32 -top-16 -right-16 bg-secondary/10 rounded-full group-hover:bg-secondary/20 transition-all duration-300"></div>
                <div class="card-body relative z-10">
                    <div class="bg-secondary/10 p-4 rounded-xl w-16 h-16 flex items-center justify-center mb-6 group-hover:bg-secondary/20 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Smart Assignment Tracking</h3>
                    <p class="text-base-content/70 mb-4">Track assignments, deadlines, and progress with real-time updates and notifications. Never miss an important deadline again.</p>
                    <div class="mt-auto">
                        <a href="#" class="text-secondary font-medium inline-flex items-center group-hover:translate-x-1 transition-transform">
                            Learn more
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Feature Card 3 -->
            <div class="card bg-base-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden group">
                <div class="absolute w-32 h-32 -top-16 -right-16 bg-accent/10 rounded-full group-hover:bg-accent/20 transition-all duration-300"></div>
                <div class="card-body relative z-10">
                    <div class="bg-accent/10 p-4 rounded-xl w-16 h-16 flex items-center justify-center mb-6 group-hover:bg-accent/20 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Advanced Analytics</h3>
                    <p class="text-base-content/70 mb-4">Gain insights into student performance with detailed analytics and progress reports. Make data-driven decisions to improve outcomes.</p>
                    <div class="mt-auto">
                        <a href="#" class="text-accent font-medium inline-flex items-center group-hover:translate-x-1 transition-transform">
                            Learn more
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="container mx-auto px-4 py-16 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-3xl my-8">
        <div class="text-center mb-16">
            <span class="px-4 py-1 bg-indigo-500/10 text-indigo-600 rounded-full text-sm font-medium mb-4 inline-block">User Feedback</span>
            <h2 class="text-3xl md:text-4xl font-bold text-indigo-700">What Our Users Say</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto mt-6"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="card bg-white hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden group">
                <div class="card-body relative">
                    <div class="absolute top-4 right-4 text-indigo-200 opacity-30 group-hover:opacity-100 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                    </div>
                    <div class="flex items-center mb-6">
                        <div class="avatar">
                            <div class="w-14 h-14 rounded-full ring-2 ring-indigo-100 p-1">
                                <img src="https://i.pravatar.cc/150?img=1" alt="User Avatar" class="rounded-full" />
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-lg text-indigo-800">Sarah Johnson</h3>
                            <p class="text-sm text-indigo-500">Teacher</p>
                        </div>
                    </div>
                    <p class="italic text-gray-700 mb-6">"This LMS has transformed how I manage my courses. The intuitive interface and powerful features make teaching a breeze."</p>
                    <div class="flex mt-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="card bg-white hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden group">
                <div class="card-body relative">
                    <div class="absolute top-4 right-4 text-indigo-200 opacity-30 group-hover:opacity-100 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                    </div>
                    <div class="flex items-center mb-6">
                        <div class="avatar">
                            <div class="w-14 h-14 rounded-full ring-2 ring-indigo-100 p-1">
                                <img src="https://i.pravatar.cc/150?img=8" alt="User Avatar" class="rounded-full" />
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-lg text-indigo-800">Michael Chen</h3>
                            <p class="text-sm text-indigo-500">Student</p>
                        </div>
                    </div>
                    <p class="italic text-gray-700 mb-6">"As a student, I love how easy it is to keep track of my assignments and communicate with my teachers. This platform has improved my academic performance."</p>
                    <div class="flex mt-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="card bg-white hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 overflow-hidden group">
                <div class="card-body relative">
                    <div class="absolute top-4 right-4 text-indigo-200 opacity-30 group-hover:opacity-100 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                    </div>
                    <div class="flex items-center mb-6">
                        <div class="avatar">
                            <div class="w-14 h-14 rounded-full ring-2 ring-indigo-100 p-1">
                                <img src="https://i.pravatar.cc/150?img=5" alt="User Avatar" class="rounded-full" />
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-lg text-indigo-800">Emily Rodriguez</h3>
                            <p class="text-sm text-indigo-500">Administrator</p>
                        </div>
                    </div>
                    <p class="italic text-gray-700 mb-6">"Managing our institution's educational resources has never been easier. The analytics and reporting features provide valuable insights for our decision-making."</p>
                    <div class="flex mt-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div class="container mx-auto px-4 py-16 mb-16">
        <div class="card bg-gradient-to-r from-indigo-100 to-purple-100 shadow-xl rounded-3xl overflow-hidden relative">
            <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-300/20 rounded-full -mt-24 -mr-24"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-purple-300/20 rounded-full -mb-32 -ml-32"></div>
            <div class="card-body text-center py-16 px-8 relative z-10">
                <span class="px-4 py-1 bg-indigo-500/20 text-indigo-700 rounded-full text-sm font-medium mb-4 inline-block backdrop-blur-sm">Join Our Community</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-indigo-700">Ready to Transform Your Educational Experience?</h2>
                <p class="text-xl mb-10 max-w-2xl mx-auto text-gray-700">Join thousands of educators and students who are already using our platform to enhance their teaching and learning.</p>
                @guest
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('login') }}" class="btn btn-lg bg-indigo-500 hover:bg-indigo-600 border-0 text-white shadow-lg hover:shadow-indigo-500/30 transition-all duration-300 hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Get Started
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-lg bg-white hover:bg-gray-100 text-indigo-600 border border-indigo-200 shadow-lg hover:shadow-white/50 transition-all duration-300 hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Learn More
                    </a>
                </div>
                @else
                <a href="{{ route('dashboard') }}" class="btn btn-lg bg-indigo-500 hover:bg-indigo-600 border-0 text-white shadow-lg hover:shadow-indigo-500/30 transition-all duration-300 hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Go to Dashboard
                </a>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection