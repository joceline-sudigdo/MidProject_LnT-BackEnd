@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-white">Edit Book</h1>
            <a href="{{ route('books.index') }}" class="text-gray-400 hover:text-white transition duration-150">Back to
                List</a>
        </div>

        <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
            <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Book Title</label>
                        <input type="text" name="title" id="title"
                            class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                            value="{{ old('title', $book->title) }}" required>
                        @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                        <select name="category_id" id="category_id"
                            class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                            required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Author -->
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-300 mb-2">Author</label>
                        <input type="text" name="author" id="author"
                            class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                            value="{{ old('author', $book->author) }}">
                        @error('author') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- ISBN -->
                    <div>
                        <label for="isbn" class="block text-sm font-medium text-gray-300 mb-2">ISBN</label>
                        <input type="text" name="isbn" id="isbn"
                            class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                            value="{{ old('isbn', $book->isbn) }}">
                        @error('isbn') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Publisher -->
                    <div>
                        <label for="publisher" class="block text-sm font-medium text-gray-300 mb-2">Publisher</label>
                        <input type="text" name="publisher" id="publisher"
                            class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                            value="{{ old('publisher', $book->publisher) }}">
                        @error('publisher') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Year -->
                    <div>
                        <label for="publication_year" class="block text-sm font-medium text-gray-300 mb-2">Year</label>
                        <input type="number" name="publication_year" id="publication_year"
                            class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                            value="{{ old('publication_year', $book->publication_year) }}">
                        @error('publication_year') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-300 mb-2">Stock</label>
                        <input type="number" name="stock" id="stock"
                            class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                            value="{{ old('stock', $book->stock) }}" required min="0">
                        @error('stock') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Cover Image -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Current Cover</label>
                        @if($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Current Cover"
                                class="h-40 w-auto rounded-lg mb-4 border border-gray-600">
                        @else
                            <p class="text-gray-500 text-sm mb-4">No cover image.</p>
                        @endif

                        <label for="cover_image" class="block text-sm font-medium text-gray-300 mb-2">Change Cover
                            Image</label>
                        <input type="file" name="cover_image" id="cover_image"
                            class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition duration-150">
                        @error('cover_image') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150">{{ old('description', $book->description) }}</textarea>
                        @error('description') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow-lg hover:shadow-blue-500/30 transition duration-300 transform hover:-translate-y-0.5">
                        Update Book
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection