@extends('layouts.app')

@section('title', 'Admin Dashboard - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Admin Dashboard</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="text-sm text-gray-500">Categories</div>
                    <div class="text-3xl font-bold text-blue-900">{{ $stats['categories'] }}</div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="text-sm text-gray-500">Courses</div>
                    <div class="text-3xl font-bold text-blue-900">{{ $stats['courses'] }}</div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="text-sm text-gray-500">Students</div>
                    <div class="text-3xl font-bold text-blue-900">{{ $stats['students'] }}</div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="text-sm text-gray-500">Applications</div>
                    <div class="text-3xl font-bold text-blue-900">{{ $stats['applications'] }}</div>
                    <div class="text-xs text-orange-600">{{ $stats['pending_applications'] }} pending</div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-9 gap-3 mb-8">
                <a href="{{ route('admin.categories.index') }}" class="bg-blue-900 text-white text-center py-3 rounded-lg hover:bg-blue-800 text-sm">Categories</a>
                <a href="{{ route('admin.courses.index') }}" class="bg-blue-900 text-white text-center py-3 rounded-lg hover:bg-blue-800 text-sm">Courses</a>
                <a href="{{ route('admin.instructors.index') }}" class="bg-blue-900 text-white text-center py-3 rounded-lg hover:bg-blue-800 text-sm">Instructors</a>
                <a href="{{ route('admin.students.index') }}" class="bg-green-700 text-white text-center py-3 rounded-lg hover:bg-green-800 text-sm">Students</a>
                <a href="{{ route('admin.assignments.index') }}" class="bg-purple-700 text-white text-center py-3 rounded-lg hover:bg-purple-800 text-sm">Assignments</a>
                <a href="{{ route('admin.exams.index') }}" class="bg-purple-700 text-white text-center py-3 rounded-lg hover:bg-purple-800 text-sm">Exams</a>
                <a href="{{ route('admin.results.index') }}" class="bg-purple-700 text-white text-center py-3 rounded-lg hover:bg-purple-800 text-sm">Results</a>
                <a href="{{ route('admin.applications.index') }}" class="bg-blue-900 text-white text-center py-3 rounded-lg hover:bg-blue-800 text-sm">Applications</a>
                <a href="{{ route('admin.inquiries.index') }}" class="bg-blue-900 text-white text-center py-3 rounded-lg hover:bg-blue-800 text-sm">Inquiries</a>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-bold">Recent Applications</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @forelse($recentApplications as $app)
                        <div class="p-4">
                            <div class="flex justify-between">
                                <div>
                                    <div class="font-medium text-gray-900">{{ $app->full_name }}</div>
                                    <div class="text-sm text-gray-500">{{ $app->course->title }}</div>
                                </div>
                                <span class="text-xs px-2 py-1 rounded-full 
                                    @if($app->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($app->status === 'approved') bg-green-100 text-green-800
                                    @elseif($app->status === 'rejected') bg-red-100 text-red-800
                                    @else bg-blue-100 text-blue-800
                                    @endif">{{ ucfirst($app->status) }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="p-4 text-center text-gray-500">No applications yet</div>
                        @endforelse
                    </div>
                </div>
                
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-bold">Recent Inquiries</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @forelse($recentInquiries as $inquiry)
                        <div class="p-4">
                            <div class="font-medium text-gray-900">{{ $inquiry->name }}</div>
                            <div class="text-sm text-gray-500">{{ $inquiry->email }}</div>
                            <div class="text-sm text-gray-600 mt-1">{{ Str::limit($inquiry->message, 60) }}</div>
                        </div>
                        @empty
                        <div class="p-4 text-center text-gray-500">No inquiries yet</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
EOF
php artisan view:clear 2>&1 | tail -1; php artisan optimize 2>&1 | tail -2
