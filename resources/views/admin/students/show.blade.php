@extends('layouts.app')

@section('title', 'Student Details - Admin')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('admin.students.index') }}" class="text-blue-900 hover:underline">← Back to Students</a>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1">
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="text-center mb-4">
                            <div class="h-20 w-20 rounded-full bg-blue-900 text-white flex items-center justify-center text-2xl mx-auto mb-4">
                                {{ strtoupper(substr($student->name, 0, 1)) }}
                            </div>
                            <h2 class="text-xl font-bold">{{ $student->name }}</h2>
                            <p class="text-gray-600">{{ $student->email }}</p>
                        </div>
                        <div class="space-y-3 text-sm">
                            <div>
                                <span class="font-semibold">Admission No:</span> {{ $student->admission_number ?? 'N/A' }}
                            </div>
                            <div>
                                <span class="font-semibold">Phone:</span> {{ $student->phone ?? 'N/A' }}
                            </div>
                            <div>
                                <span class="font-semibold">DOB:</span> {{ $student->date_of_birth ?? 'N/A' }}
                            </div>
                            <div>
                                <span class="font-semibold">Address:</span> {{ $student->address ?? 'N/A' }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white border border-gray-200 rounded-lg p-6 mt-6">
                        <h3 class="text-lg font-bold mb-4">Payment Info</h3>
                        <form action="{{ route('admin.students.payment', $student) }}" method="POST" class="space-y-3">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Total Fee</label>
                                <input type="number" step="0.01" name="total_fee" value="{{ $student->total_fee }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Balance</label>
                                <input type="number" step="0.01" name="balance" value="{{ $student->balance }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                            </div>
                            <button type="submit" class="w-full bg-blue-900 text-white py-2 rounded-lg hover:bg-blue-800">Update</button>
                        </form>
                    </div>
                </div>
                
                <div class="lg:col-span-2">
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-bold">Applications/Courses</h3>
                        </div>
                        <div class="divide-y divide-gray-200">
                            @forelse($student->applications as $application)
                            <div class="p-4">
                                <div class="flex justify-between">
                                    <div>
                                        <div class="font-medium text-gray-900">{{ $application->course->title }}</div>
                                        <div class="text-sm text-gray-500">{{ $application->course->category->name }}</div>
                                    </div>
                                    <div class="text-right">
                                        <span class="px-2 py-1 text-xs rounded-full 
                                            @if($application->status === 'approved') bg-green-100 text-green-800
                                            @elseif($application->status === 'rejected') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800
                                            @endif">{{ ucfirst($application->status) }}</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="p-4 text-center text-gray-500">No applications</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
EOF
echo "done" 2>&1 | tail -1
