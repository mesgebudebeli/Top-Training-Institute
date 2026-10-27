@extends('layouts.app')

@section('title', 'Edit Result - Admin')

@section('content')
    <section class="py-16">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('admin.results.index') }}" class="text-blue-900 hover:underline">← Back to Results</a>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Result</h1>
                <form action="{{ route('admin.results.update', $result) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Student *</label>
                        <select name="user_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ $result->user_id == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Exam *</label>
                        <select name="exam_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            @foreach($exams as $exam)
                            <option value="{{ $exam->id }}" {{ $result->exam_id == $exam->id ? 'selected' : '' }}>{{ $exam->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Marks Obtained *</label>
                            <input type="number" name="marks_obtained" value="{{ $result->marks_obtained }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Total Marks *</label>
                            <input type="number" name="total_marks" value="{{ $result->total_marks }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Grade</label>
                        <input type="text" name="grade" value="{{ $result->grade }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded-lg hover:bg-blue-800">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
EOF
echo "done" 2>&1 | tail -1
