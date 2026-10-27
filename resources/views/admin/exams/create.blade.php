@extends('layouts.app')

@section('title', 'Add Exam - Admin')

@section('content')
    <section class="py-16">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('admin.exams.index') }}" class="text-blue-900 hover:underline">← Back to Exams</a>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Add Exam</h1>
                <form action="{{ route('admin.exams.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Course *</label>
                        <select name="course_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                        <input type="text" name="title" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Exam Date</label>
                            <input type="date" name="exam_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Total Marks</label>
                            <input type="number" name="total_marks" value="100" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded-lg hover:bg-blue-800">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
EOF
echo "done" 2>&1 | tail -1
