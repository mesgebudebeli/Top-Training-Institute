@extends('layouts.app')

@section('title', 'Results - Admin')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Results</h1>
                <a href="{{ route('admin.results.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800">Add Result</a>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Exam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marks</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($results as $result)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $result->user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $result->exam->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $result->marks_obtained }}/{{ $result->total_marks }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $result->grade ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.results.edit', $result) }}" class="text-blue-900 hover:underline mr-3">Edit</a>
                                <form action="{{ route('admin.results.destroy', $result) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
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
