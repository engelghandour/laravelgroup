@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-600 via-purple-500 to-pink-400">
    <div class="bg-white bg-opacity-90 rounded-xl shadow-2xl p-8 max-w-md w-full">
        <div class="mb-6 text-center">
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-purple-500 to-pink-400">Welcome, Future Innovator!</h1>
            <p class="mt-2 text-lg text-gray-700">Log in and start your journey to discover, create, and learn something amazing today.</p>
            @if ($errors->any())
                <p class="text-red-500 font-semibold">
                    {{ $errors->first() }}
                </p>
            @endif
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
            <label class="block text-gray-800 font-semibold mb-2" for="email">Email</label>
            <input class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" type="email" name="email" id="email" required autofocus>
            </div>
            <div class="mb-6">
            <label class="block text-gray-800 font-semibold mb-2" for="password">Password</label>
            <input class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-400" type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="w-full py-3 rounded-lg font-bold text-white bg-gradient-to-r from-blue-500 via-purple-500 to-pink-400 hover:scale-105 transition-transform">Log In &rarr;</button>
        </form>
        
        <div class="mt-6 text-center">
            <p class="text-gray-600">Not registered yet? <a href="#" class="text-pink-500 font-semibold hover:underline">Join now and unlock your potential!</a></p>
        </div>
    </div>
</div>
@endsection