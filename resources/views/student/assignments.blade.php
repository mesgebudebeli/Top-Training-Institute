@extends('layouts.app')

@section('title', 'My Assignments - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">My Assignments</h1>
                <a href="{{ route('student.profile') }}" class="text-blue-900 hover:underline">← Back to Profile</a>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assignment</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($assignments as $assignment)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $assignment->title }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($assignment->description, 80) }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $assignment->course->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $assignment->due_date ?? 'N/A' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">No assignments available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
EOF
echo "done" 2>&1 | tail -1
