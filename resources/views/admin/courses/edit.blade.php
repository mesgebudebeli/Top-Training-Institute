@extends('layouts.app')

@section('title', 'Edit Course - Admin')

@section('content')
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('admin.courses.index') }}" class="text-blue-900 hover:underline">← Back to Courses</a>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Course</h1>
                <form action="{{ route('admin.courses.update', $course) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                            <input type="text" name="title" required value="{{ $course->title }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category *</label>
                            <select name="category_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                        <textarea name="short_description" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $course->short_description }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Description</label>
                        <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $course->description }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Duration</label>
                            <input type="text" name="duration" value="{{ $course->duration }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Level</label>
                            <input type="text" name="level" value="{{ $course->level }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mode</label>
                            <input type="text" name="mode" value="{{ $course->mode }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Fee</label>
                            <input type="text" name="fee" value="{{ $course->fee }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Topics & Tools (one per line)</label>
                        <textarea name="topics_tools" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $course->topics_tools }}</textarea>
                    </div>
                    <div class="flex space-x-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" {{ $course->is_active ? 'checked' : '' }} class="rounded border-gray-300 text-blue-900 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_featured" {{ $course->is_featured ? 'checked' : '' }} class="rounded border-gray-300 text-blue-900 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700">Featured</span>
                        </label>
                    </div>
                    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded-lg hover:bg-blue-800">Update Course</button>
                </form>
            </div>
        </div>
    </section>
@endsection
