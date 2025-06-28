@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-blue-300 via-indigo-200 to-purple-300 px-4">
    <div class="bg-white bg-opacity-90 backdrop-blur-md shadow-2xl rounded-3xl p-8 w-full max-w-md animate-fade-in">
        <h2 class="text-3xl font-bold text-center text-indigo-700 mb-6">Welcome Back 👋</h2>

        @if (session('status'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block mb-1 text-sm font-semibold text-gray-700">Email</label>
                <div class="relative">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
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

            <!-- Remember Me -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="accent-indigo-500">
                    <span>Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">Forgot password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit"
                    class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition">
                Sign In
            </button>

            <p class="text-sm text-center mt-4">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Register here</a>
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

<!-- Font Awesome (ikon email & lock) -->
<script src="https://kit.fontawesome.com/a2e0c4a4c3.js" crossorigin="anonymous"></script>
@endsection
