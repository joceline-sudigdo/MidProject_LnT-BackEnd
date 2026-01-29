@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-3xl font-bold bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent">Books</h1>
        <a href="{{ route('books.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-lg hover:shadow-blue-500/30 transition duration-300 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Book
        </a>
    </div>

    <!-- Search and Filter -->
    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-4 mb-6">
        <form action="{{ route('books.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-grow">
                <input type="text" name="search" placeholder="Search by title or author..." value="{{ request('search') }}"
                    class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150">
            </div>
            <div class="w-full md:w-64">
                <select name="category_id"
                    class="w-full bg-gray-900 border border-gray-600 rounded-lg py-2 px-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit"
                    class="w-full md:w-auto bg-gray-700 hover:bg-gray-600 text-white font-medium py-2 px-6 rounded-lg transition duration-150">
                    Filter
                </button>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($books as $book)
            <div
                class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-700 flex flex-col hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <div class="relative h-64 bg-gray-900 overflow-hidden group">
                    @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}"
                            class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                    @else
                        <div
                            class="w-full h-full flex items-center justify-center text-gray-600 bg-gray-900 text-6xl font-bold select-none">
                            {{ strtoupper(substr($book->title, 0, 1)) }}
                        </div>
                    @endif
                    <div
                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <div class="flex space-x-2">
                            <a href="{{ route('books.edit', $book) }}"
                                class="p-2 bg-blue-600 rounded-full text-white hover:bg-blue-700 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                    </path>
                                </svg>
                            </a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST"
                                onsubmit="return confirm('Delete this book?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 bg-red-600 rounded-full text-white hover:bg-red-700 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="p-5 flex-grow flex flex-col">
                    <div class="mb-2">
                        <span
                            class="text-xs font-semibold px-2 py-1 bg-blue-900/50 text-blue-300 rounded-full">{{ $book->category->name ?? 'Uncategorized' }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-1 line-clamp-1" title="{{ $book->title }}">{{ $book->title }}
                    </h3>
                    <p class="text-sm text-gray-400 mb-3">{{ $book->author }}</p>

                    <div class="mt-auto flex justify-between items-center text-sm text-gray-500 border-t border-gray-700 pt-3">
                        <span>Stock: {{ $book->stock }}</span>
                        <span>{{ $book->publication_year }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-gray-500">
                No books found matching your criteria.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $books->withQueryString()->links() }}
    </div>
@endsection