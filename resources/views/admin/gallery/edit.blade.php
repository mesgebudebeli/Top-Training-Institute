@extends('layouts.app')

@section('title', 'Edit Gallery Image - Admin')

@section('content')
    <section class="py-16">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('admin.gallery.index') }}" class="text-blue-900 hover:underline">← Back to Gallery</a>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Gallery Image</h1>
                <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Image URL *</label>
                        <input type="url" name="image" required value="{{ $gallery->image }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="title" value="{{ $gallery->title }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <input type="text" name="category" value="{{ $gallery->category }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                            <input type="number" name="order" value="{{ $gallery->order }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded-lg hover:bg-blue-800">Update Image</button>
                </form>
            </div>
        </div>
    </section>
@endsection
