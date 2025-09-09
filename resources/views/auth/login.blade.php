<x-guest-layout>
    <div  class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg>
        <div class="w-full max-w-md rounded-xl bg-white p-8 shadow-2xl">
            
            <div class="mb-8 text-center">
                <a href="/" class="inline-block">
                    <svg class="h-12 w-auto" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.7289 10.2711C21.7289 11.9298 20.3921 13.2666 18.7334 13.2666C17.0747 13.2666 15.7379 11.9298 15.7379 10.2711C15.7379 8.61238 17.0747 7.27563 18.7334 7.27563C20.3921 7.27563 21.7289 8.61238 21.7289 10.2711ZM23.7289 10.2711C23.7289 13.0327 21.5037 15.2666 18.7334 15.2666C15.9631 15.2666 13.7379 13.0327 13.7379 10.2711C13.7379 7.50951 15.9631 5.27563 18.7334 5.27563C21.5037 5.27563 23.7289 7.50951 23.7289 10.2711Z" fill="#3B82F6"/>
                        <path d="M10.2666 15.7379C11.9253 15.7379 13.2621 17.0747 13.2621 18.7334C13.2621 20.3921 11.9253 21.7289 10.2666 21.7289C8.60788 21.7289 7.27113 20.3921 7.27113 18.7334C7.27113 17.0747 8.60788 15.7379 10.2666 15.7379Z" fill="#F97316"/>
                        <path d="M10.2666 13.7379C13.0282 13.7379 15.2621 15.9631 15.2621 18.7334C15.2621 21.5037 13.0282 23.7289 10.2666 23.7289C7.50503 23.7289 5.27113 21.5037 5.27113 18.7334C5.27113 15.9631 7.50503 13.7379 10.2666 13.7379Z" fill="#F97316"/>
                    </svg>
                </a>
                <h1 class="mt-4 text-2xl font-bold text-gray-800">Welcome Back!</h1>
                <p class="text-sm text-gray-600">Please sign in to continue.</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <x-input-label for="email" value="Email Address" class="font-semibold" />
                    <div class="relative mt-2">
                         <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                            </svg>
                        </span>
                        <x-text-input id="email" class="block w-full rounded-lg border-gray-300 py-2.5 pl-10" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@example.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="password" value="Password" class="font-semibold" />
                     <div class="relative mt-2">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                           <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <x-text-input id="password" class="block w-full rounded-lg border-gray-300 py-2.5 pl-10" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-medium text-blue-600 hover:text-blue-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="mt-6">
                    <x-primary-button class="w-full justify-center rounded-lg bg-blue-600 py-3 text-sm font-semibold text-white hover:bg-blue-700">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline">
                    Sign up
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>