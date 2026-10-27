@extends('layouts.app')

@section('title', 'Gallery - Admin')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Gallery</h1>
                <a href="{{ route('admin.gallery.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800">Add Image</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($galleries as $gallery)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-1">{{ $gallery->title }}</h3>
                        <p class="text-sm text-gray-500 mb-3">{{ $gallery->category }} | Order: {{ $gallery->order }}</p>
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.gallery.edit', $gallery) }}" class="text-blue-900 hover:underline text-sm">Edit</a>
                            <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
