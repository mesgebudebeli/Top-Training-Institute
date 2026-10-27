@extends('layouts.app')

@section('title', $course->title . ' - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('courses.index') }}" class="text-blue-900 hover:underline">← Back to Courses</a>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="p-8">
                    <div class="text-sm text-blue-900 font-semibold mb-2">{{ $course->category->name }}</div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $course->title }}</h1>
                    <p class="text-lg text-gray-600 mb-6">{{ $course->short_description }}</p>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8 p-4 bg-gray-50 rounded-lg">
                        @if($course->duration)
                        <div>
                            <div class="text-sm text-gray-500">Duration</div>
                            <div class="font-semibold">{{ $course->duration }}</div>
                        </div>
                        @endif
                        @if($course->level)
                        <div>
                            <div class="text-sm text-gray-500">Level</div>
                            <div class="font-semibold">{{ $course->level }}</div>
                        </div>
                        @endif
                        @if($course->mode)
                        <div>
                            <div class="text-sm text-gray-500">Study Mode</div>
                            <div class="font-semibold">{{ $course->mode }}</div>
                        </div>
                        @endif
                        @if($course->fee)
                        <div>
                            <div class="text-sm text-gray-500">Fee</div>
                            <div class="font-semibold">{{ $course->fee }}</div>
                        </div>
                        @endif
                    </div>
                    
                    @if($course->description)
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold mb-4">Course Description</h2>
                        <div class="text-gray-700 prose max-w-none">{!! nl2br(e($course->description)) !!}</div>
                    </div>
                    @endif
                    
                    @if($course->topics_tools)
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold mb-4">Key Topics & Tools</h2>
                        <ul class="space-y-2">
                            @foreach(explode("\n", $course->topics_tools) as $topic)
                                @if(trim($topic))
                                    <li class="flex items-start">
                                        <span class="text-blue-900 mr-2">•</span>
                                        <span class="text-gray-700">{{ trim($topic) }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <a href="{{ route('applications.create', $course->slug) }}" class="bg-blue-900 text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-blue-800 inline-block">Inquire & Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
