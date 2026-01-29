@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-white">Add Category</h1>
            <a href="{{ route('categories.index') }}" class="text-gray-400 hover:text-white transition duration-150">Back to
                List</a>
        </div>

        <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Category Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                        placeholder="e.g., Science Fiction" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                        placeholder="Optional description...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow-lg hover:shadow-blue-500/30 transition duration-300 transform hover:-translate-y-0.5">
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection