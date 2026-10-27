@extends('layouts.app')

@section('title', 'Courses - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Our Courses</h1>
                <p class="text-xl text-gray-600">Explore Our Course Catalog</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($courses as $course)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="text-sm text-blue-900 font-semibold mb-2">{{ $course->category->name }}</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $course->title }}</h3>
                        <p class="text-gray-600 mb-4 text-sm">{{ $course->short_description }}</p>
                        <div class="flex flex-wrap items-center text-sm text-gray-500 mb-4 gap-3">
                            @if($course->duration)<span>⏱ {{ $course->duration }}</span>@endif
                            @if($course->mode)<span>📍 {{ $course->mode }}</span>@endif
                            @if($course->level)<span>📊 {{ $course->level }}</span>@endif
                        </div>
                        <a href="{{ route('courses.show', $course->slug) }}" class="w-full bg-blue-900 text-white text-center py-2 rounded-lg hover:bg-blue-800 block">View Details & Apply</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
