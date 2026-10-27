@extends('layouts.app')

@section('title', 'Exams - Admin')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Exams</h1>
                <a href="{{ route('admin.exams.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800">Add Exam</a>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Exam Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Marks</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($exams as $exam)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $exam->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $exam->course->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $exam->exam_date ?? 'TBA' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $exam->total_marks }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.exams.edit', $exam) }}" class="text-blue-900 hover:underline mr-3">Edit</a>
                                <form action="{{ route('admin.exams.destroy', $exam) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
EOF
echo "done" 2>&1 | tail -1
