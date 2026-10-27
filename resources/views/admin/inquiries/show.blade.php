@extends('layouts.app')

@section('title', 'View Inquiry - Admin')

@section('content')
    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('admin.inquiries.index') }}" class="text-blue-900 hover:underline">← Back to Inquiries</a>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Inquiry Details</h1>
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <div class="text-sm text-gray-500">Name</div>
                        <div class="font-medium">{{ $inquiry->name }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Email</div>
                        <div class="font-medium">{{ $inquiry->email }}</div>
                    </div>
                    @if($inquiry->phone)
                    <div>
                        <div class="text-sm text-gray-500">Phone</div>
                        <div class="font-medium">{{ $inquiry->phone }}</div>
                    </div>
                    @endif
                    @if($inquiry->subject)
                    <div>
                        <div class="text-sm text-gray-500">Subject</div>
                        <div class="font-medium">{{ $inquiry->subject }}</div>
                    </div>
                    @endif
                    <div class="col-span-2">
                        <div class="text-sm text-gray-500">Message</div>
                        <div class="font-medium whitespace-pre-wrap">{{ $inquiry->message }}</div>
                    </div>
                </div>
                
                <div class="border-t pt-6">
                    <h2 class="text-lg font-bold mb-4">Update Status</h2>
                    <form action="{{ route('admin.inquiries.update', $inquiry) }}" method="POST" class="flex items-center space-x-4">
                        @csrf
                        @method('PUT')
                        <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg">
                            <option value="unread" {{ $inquiry->status === 'unread' ? 'selected' : '' }}>Unread</option>
                            <option value="read" {{ $inquiry->status === 'read' ? 'selected' : '' }}>Read</option>
                            <option value="replied" {{ $inquiry->status === 'replied' ? 'selected' : '' }}>Replied</option>
                        </select>
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
