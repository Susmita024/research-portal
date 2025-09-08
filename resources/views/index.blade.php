<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Portal</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="[https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css](https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css)">
</head>

<body class="bg-gray-100 font-sans antialiased">

    <!-- Header -->
    @include('includes.header')

    <!-- Main Content -->
    <main class="container mx-auto mt-8 p-4">
        <div class="flex flex-col items-center justify-center text-center py-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-4">What do you want to learn today?</h1>
            <p class="text-lg text-gray-600 mb-8 max-w-lg">
                Find and explore research papers with AI powered summary.
            </p>
            <div class="w-full max-w-xl">
                <form action="/search" method="GET" class="flex rounded-full shadow-lg overflow-hidden bg-white">
                    <input type="text" name="query" placeholder="Search for research papers, authors, or topics..." class="flex-grow py-3 px-6 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-l-full" required>
                    <button type="submit" class="bg-blue-600 text-white px-4 md:px-6 py-3 rounded-r-full hover:bg-blue-700 transition duration-300 flex items-center justify-center">
                        <svg class="h-5 w-5 md:mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span class="hidden md:inline">Search</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Featured Papers</h2>
            <p class="text-gray-600">This is the main content of the index page.</p>
        </div>
    </main>

    <!-- Footer -->
    @include('includes.footer')

    @vite('resources/js/app.js')
</body>

</html>