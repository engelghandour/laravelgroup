@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8 bg-gray-100 min-h-screen">
        <!-- Header with Logout Button -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Welcome, {{ auth()->user()->name ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-200 flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- Manage Classes -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                <h2 class="text-xl font-semibold mb-2 text-blue-600">Manage Classes</h2>
                <p class="text-gray-600 mb-4 text-center">View, add, edit, or remove school classes.</p>
                <a href="{{ route('admin.classes.index') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition">Go to
                    Classes</a>
            </div>
            <!-- Manage Students -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                <h2 class="text-xl font-semibold mb-2 text-green-600">Manage Students</h2>
                <p class="text-gray-600 mb-4 text-center">View, enroll, edit, or remove students.</p>
                <a href="{{ route('admin.students.index') }}"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition">Go to
                    Students</a>
            </div>
            <!-- Manage Teachers -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                <h2 class="text-xl font-semibold mb-2 text-purple-600">Manage Teachers</h2>
                <p class="text-gray-600 mb-4 text-center">View, add, edit, or remove teachers.</p>
                <a href="{{ route('admin.teachers.index') }}"
                    class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded transition">Go to
                    Teachers</a>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Manage Subjects -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                <h2 class="text-xl font-semibold mb-2 text-pink-600">Manage Subjects</h2>
                <p class="text-gray-600 mb-4 text-center">Assign and organize subjects for classes.</p>
                <a href="{{ route('admin.subjects.index') }}"
                    class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded transition">Go to
                    Subjects</a>
            </div>
            <!-- Attendance -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                <h2 class="text-xl font-semibold mb-2 text-yellow-600">Attendance</h2>
                <p class="text-gray-600 mb-4 text-center">Monitor and manage attendance records.</p>
                <a href="{{ route('admin.attendance.index') }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition">Go to
                    Attendance</a>
            </div>
            <!-- Reports -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                <h2 class="text-xl font-semibold mb-2 text-indigo-600">Reports & Analytics</h2>
                <p class="text-gray-600 mb-4 text-center">View school performance and generate reports.</p>
                <a href="{{ route('admin.reports.index') }}"
                    class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded transition">Go to
                    Reports</a>
            </div>
        </div>
    </div>
@endsection