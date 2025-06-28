@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-blue-300 via-indigo-200 to-purple-300 px-4">
    <div class="bg-white bg-opacity-90 backdrop-blur-md shadow-2xl rounded-3xl p-8 w-full max-w-md animate-fade-in">
        <h2 class="text-3xl font-bold text-center text-indigo-700 mb-6">Create Account ✨</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block mb-1 text-sm font-semibold text-gray-700">Name</label>
                <div class="relative">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                           class="w-full px-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block mb-1 text-sm font-semibold text-gray-700">Email</label>
                <div class="relative">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block mb-1 text-sm font-semibold text-gray-700">Password</label>
                <div class="relative">
                    <input id="password" type="password" name="password" required
                           class="w-full px-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block mb-1 text-sm font-semibold text-gray-700">Confirm Password</label>
                <div class="relative">
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                           class="w-full px-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>

            <!-- Button -->
            <button type="submit"
                    class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition">
                Create Account
            </button>

            <p class="text-sm text-center mt-4">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login here</a>
            </p>
        </form>
    </div>
</div>

<!-- Fade animation -->
<style>
@keyframes fade-in {
    0% { opacity: 0; transform: scale(0.95); }
    100% { opacity: 1; transform: scale(1); }
}
.animate-fade-in {
    animation: fade-in 0.5s ease-out;
}
</style>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a2e0c4a4c3.js" crossorigin="anonymous"></script>
@endsection
