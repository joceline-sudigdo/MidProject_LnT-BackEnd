<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library Management System')</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-900 text-gray-100 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-gray-800/80 backdrop-blur-md border-b border-gray-700 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="{{ url('/') }}"
                            class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">LibrarySys</a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ route('categories.index') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-150 {{ request()->routeIs('categories.*') ? 'bg-gray-700 text-white' : 'text-gray-300' }}">Categories</a>
                            <a href="{{ route('books.index') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition duration-150 {{ request()->routeIs('books.*') ? 'bg-gray-700 text-white' : 'text-gray-300' }}">Books</a>
                            <!-- Placeholders for other routes if not implemented -->
                            <!-- <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-500 cursor-not-allowed">Members</a> -->
                            <!-- <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-500 cursor-not-allowed">Borrowings</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 w-full">
        @if(session('success'))
            <div class="mb-6 bg-green-500/10 border border-green-500 text-green-400 px-4 py-3 rounded-lg shadow-sm backdrop-blur-sm"
                role="alert">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="block sm:inline font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 bg-red-500/10 border border-red-500 text-red-400 px-4 py-3 rounded-lg shadow-sm backdrop-blur-sm"
                role="alert">
                <div class="font-medium mb-1">Please fix the following errors:</div>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 border-t border-gray-700 mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-500 text-sm">&copy; {{ date('Y') }} Library Management System. All rights
                reserved.</p>
        </div>
    </footer>
</body>

</html>