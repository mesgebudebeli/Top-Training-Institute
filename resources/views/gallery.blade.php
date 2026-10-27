@extends('layouts.app')

@section('title', 'Gallery - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Life at Top Training Institute</h1>
                <p class="text-xl text-gray-600">Explore Our Gallery</p>
                <p class="text-gray-600 mt-2">Take a glimpse into our real graduation ceremonies, vibrant classrooms, and hands-on practical training sessions.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($galleries as $gallery)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                    <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover">
                    <div class="p-4">
                        @if($gallery->category)
                        <span class="inline-block bg-blue-100 text-blue-900 text-xs px-2 py-1 rounded mb-2">{{ $gallery->category }}</span>
                        @endif
                        @if($gallery->title)
                        <h3 class="font-semibold text-gray-900">{{ $gallery->title }}</h3>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
