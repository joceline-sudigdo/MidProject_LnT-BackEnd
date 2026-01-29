@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <h1 class="text-3xl font-bold bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div
            class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-300">
            <div class="text-blue-100 text-sm font-semibold uppercase tracking-wider mb-2">Total Books</div>
            <div class="text-4xl font-bold">{{ $totalBooks }}</div>
        </div>
        <div
            class="bg-gradient-to-br from-purple-600 to-purple-800 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-300">
            <div class="text-purple-100 text-sm font-semibold uppercase tracking-wider mb-2">Categories</div>
            <div class="text-4xl font-bold">{{ $totalCategories }}</div>
        </div>
        <div
            class="bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-300">
            <div class="text-indigo-100 text-sm font-semibold uppercase tracking-wider mb-2">Members</div>
            <div class="text-4xl font-bold">{{ $totalMembers }}</div>
        </div>
        <div
            class="bg-gradient-to-br from-pink-600 to-pink-800 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-300">
            <div class="text-pink-100 text-sm font-semibold uppercase tracking-wider mb-2">Active Borrowings</div>
            <div class="text-4xl font-bold">{{ $activeBorrowings }}</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
            <h2 class="text-xl font-bold text-white mb-4">Quick Actions</h2>
            <div class="flex flex-col gap-4">
                <a href="{{ route('books.create') }}"
                    class="block p-4 bg-gray-700/50 hover:bg-gray-700 rounded-lg transition border border-gray-600 flex items-center group">
                    <div
                        class="p-3 bg-blue-600/20 text-blue-400 rounded-full mr-4 group-hover:bg-blue-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold text-white">Add New Book</div>
                        <div class="text-sm text-gray-400 group-hover:text-gray-300">Register a new book to the library
                        </div>
                    </div>
                </a>
                <a href="{{ route('categories.create') }}"
                    class="block p-4 bg-gray-700/50 hover:bg-gray-700 rounded-lg transition border border-gray-600 flex items-center group">
                    <div
                        class="p-3 bg-purple-600/20 text-purple-400 rounded-full mr-4 group-hover:bg-purple-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold text-white">Add Category</div>
                        <div class="text-sm text-gray-400 group-hover:text-gray-300">Create a new book category</div>
                    </div>
                </a>
            </div>
        </div>
        <div
            class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6 flex flex-col justify-center items-center text-center">
            <h2 class="text-xl font-bold text-white mb-2">Welcome to LibrarySys</h2>
            <p class="text-gray-400 mb-6">Manage your library assets efficiently and beautifully.</p>
            <div class="p-4 bg-gray-900 rounded-full border border-gray-700 shadow-inner">
                <svg class="w-16 h-16 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
            </div>
        </div>
    </div>
@endsection