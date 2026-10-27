@extends('layouts.app')

@section('title', 'My Profile - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">My Profile</h1>
                <a href="{{ route('student.dashboard') }}" class="text-blue-900 hover:underline">← Back to Dashboard</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-6">Personal Information</h2>
                    <form action="{{ route('student.profile.update') }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                            <input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <textarea name="address" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ $user->address }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Profile Photo URL</label>
                            <input type="url" name="profile_photo" value="{{ $user->profile_photo }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                        <button type="submit" class="w-full bg-blue-900 text-white py-2 rounded-lg hover:bg-blue-800">Update Profile</button>
                    </form>
                </div>
                
                <div class="space-y-6">
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4">Account Info</h2>
                        <div class="space-y-2 text-sm">
                            <div><span class="font-semibold">Admission Number:</span> {{ $user->admission_number ?? 'Not Assigned' }}</div>
                            <div><span class="font-semibold">Total Fee:</span> ${{ number_format($user->total_fee, 2) }}</div>
                            <div><span class="font-semibold">Balance:</span> <span class="text-red-600">${{ number_format($user->balance, 2) }}</span></div>
                        </div>
                    </div>
                    
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4">Change Password</h2>
                        <form action="{{ route('student.password.update') }}" method="POST" class="space-y-4">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                                <input type="password" name="current_password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                                <input type="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                                <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            </div>
                            <button type="submit" class="w-full bg-blue-900 text-white py-2 rounded-lg hover:bg-blue-800">Change Password</button>
                        </form>
                    </div>
                    
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4">Quick Links</h2>
                        <div class="space-y-2">
                            <a href="{{ route('student.assignments') }}" class="block text-blue-900 hover:underline">My Assignments</a>
                            <a href="{{ route('student.exams') }}" class="block text-blue-900 hover:underline">My Exams & Results</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
EOF
echo "done" 2>&1 | tail -1
