@extends('layouts.app')

@section('title', 'Login - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Login</h1>
                
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-blue-900 focus:ring-blue-500">
                        <label for="remember" class="ml-2 text-sm text-gray-700">Remember me</label>
                    </div>
                    <button type="submit" class="w-full bg-blue-900 text-white py-2 rounded-lg hover:bg-blue-800">Login</button>
                </form>
                
                <p class="text-center text-gray-600 mt-4">Don't have an account? <a href="{{ route('register') }}" class="text-blue-900 hover:underline">Register</a></p>
            </div>
        </div>
    </section>
@endsection
