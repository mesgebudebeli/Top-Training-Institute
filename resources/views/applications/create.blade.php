@extends('layouts.app')

@section('title', 'Apply for ' . $course->title . ' - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('courses.show', $course->slug) }}" class="text-blue-900 hover:underline">← Back to Course</a>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Application Form</h1>
                <p class="text-gray-600 mb-6">Course: {{ $course->title }}</p>
                
                <form action="{{ route('applications.store', $course->slug) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                        <input type="text" name="full_name" required value="{{ old('full_name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('full_name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                        <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
                        <input type="text" name="phone" required value="{{ old('phone') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('phone')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Message (Optional)</label>
                        <textarea name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded-lg hover:bg-blue-800 font-semibold">Submit Application</button>
                </form>
            </div>
        </div>
    </section>
@endsection
