@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-indigo-600 p-4">
            <h1 class="text-2xl font-bold text-white">Contact Information</h1>
        </div>
        
        <div class="p-6">
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Author Details</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-500">Name</p>
                        <p class="font-medium">Anu Davaanyam</p>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-500">Neptun Code</p>
                        <p class="font-medium">BTIGD9</p>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg col-span-1 md:col-span-2">
                        <p class="text-sm text-gray-500">Email Address</p>
                        <p class="font-medium">anudavaanym@gmail.com</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t pt-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">About the Project</h2>
                <p class="text-gray-600 mb-4">
                    This Learning Management System was developed as part of the Advanced Web Programming course.
                    The system allows teachers to create and manage courses, while students can enroll in courses
                    and submit assignments.
                </p>
                
                <p class="text-gray-600">
                    Technologies used: Laravel, PHP, SQLite, Tailwind CSS
                </p>
            </div>
        </div>
    </div>
</div>
@endsection