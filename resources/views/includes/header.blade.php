<header class="bg-blue-600 text-white p-4 shadow-lg">
    <nav class="container mx-auto flex justify-between items-center flex-wrap">
        <!-- Brand/Logo -->
        <a href="/" class="text-2xl font-bold">Research Portal</a>

        <!-- Hamburger Menu Button for Mobile -->
        <button id="mobile-menu-button" class="md:hidden text-white p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

        <!-- Desktop Navigation -->
        <div id="desktop-menu" class="hidden md:flex items-center space-x-4">
            <a href="/" class="p-2 rounded-md {{ request()->routeIs('home') ? 'bg-blue-500' : 'hover:bg-blue-500' }} transition duration-300">Home</a>
            <a href="/" class="p-2 rounded-md {{ request()->routeIs('about') ? 'bg-blue-500' : 'hover:bg-blue-500' }} transition duration-300">About</a>
            <a href="/" class="p-2 rounded-md {{ request()->routeIs('contact') ? 'bg-blue-500' : 'hover:bg-blue-500' }} transition duration-300">Contact</a>

            @auth
            <a href="/" class="p-2 rounded-md {{ request()->routeIs('submit') ? 'bg-blue-500' : 'hover:bg-blue-500' }} transition duration-300">Submit</a>
            <div class="relative group">
                <button class="flex items-center space-x-2 focus:outline-none">
                    <span class="text-white">{{ Auth::user()->name }}</span>
                    <svg class="h-4 w-4 fill-current transition-transform duration-300 group-hover:rotate-180" viewBox="0 0 20 20">
                        <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                    <a href="/profile" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-200">Log Out</button>
                    </form>
                </div>
            </div>
            @endauth

            @guest
            <a href="{{route('login') }}" class="p-2 rounded-md hover:bg-blue-500 transition duration-300">Login</a>
            @endguest

        </div>
    </nav>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden md:hidden w-full bg-blue-600">
        <div class="flex flex-col items-center mt-4 space-y-2">
            <a href="/" class="block w-full text-center p-2 rounded-md {{ request()->routeIs('home') ? 'bg-blue-700' : 'hover:bg-blue-500' }} transition duration-300">Home</a>
            <a href="/" class="block w-full text-center p-2 rounded-md {{ request()->routeIs('about') ? 'bg-blue-700' : 'hover:bg-blue-500' }} transition duration-300">About</a>
            <a href="/" class="block w-full text-center p-2 rounded-md {{ request()->routeIs('contact') ? 'bg-blue-700' : 'hover:bg-blue-500' }} transition duration-300">Contact</a>

            @auth
            <a href="#" class="block w-full text-center p-2 rounded-md hover:bg-blue-500 transition duration-300">Profile</a>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="block w-full text-center p-2 rounded-md hover:bg-blue-500 transition duration-300">Log Out</button>
            </form>
            @endauth

            @guest
            <a href="{{ route('login') }}" class="block w-full text-center p-2 rounded-md hover:bg-blue-500 transition duration-300">Login</a>
            <a href="{{ route('register') }}" class="block w-full text-center p-2 rounded-md bg-blue-700 hover:bg-blue-800 transition duration-300">Register</a>
            @endguest
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</header>