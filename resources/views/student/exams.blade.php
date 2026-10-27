@extends('layouts.app')

@section('title', 'My Exams & Results - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">My Exams & Results</h1>
                <a href="{{ route('student.profile') }}" class="text-blue-900 hover:underline">← Back to Profile</a>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-bold">Upcoming Exams</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @forelse($exams as $exam)
                        <div class="p-4">
                            <div class="font-medium text-gray-900">{{ $exam->title }}</div>
                            <div class="text-sm text-gray-500">{{ $exam->course->title }}</div>
                            <div class="text-sm text-gray-600 mt-1">Date: {{ $exam->exam_date ?? 'TBA' }} | Marks: {{ $exam->total_marks }}</div>
                        </div>
                        @empty
                        <div class="p-4 text-center text-gray-500">No exams scheduled</div>
                        @endforelse
                    </div>
                </div>
                
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-bold">Results</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @forelse($results as $result)
                        <div class="p-4">
                            <div class="flex justify-between">
                                <div>
                                    <div class="font-medium text-gray-900">{{ $result->exam->title }}</div>
                                    <div class="text-sm text-gray-500">{{ $result->exam->course->title }}</div>
                                </div>
                                <div class="text-right">
                                    <div class="font-bold text-blue-900">{{ $result->marks_obtained }}/{{ $result->total_marks }}</div>
                                    <div class="text-sm text-gray-600">Grade: {{ $result->grade ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="p-4 text-center text-gray-500">No results available</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
EOF
echo "done" 2>&1 | tail -1
