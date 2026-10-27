@extends('layouts.app')

@section('title', 'View Application - Admin')

@section('content')
    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('admin.applications.index') }}" class="text-blue-900 hover:underline">← Back to Applications</a>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Application Details</h1>
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <div class="text-sm text-gray-500">Full Name</div>
                        <div class="font-medium">{{ $application->full_name }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Email</div>
                        <div class="font-medium">{{ $application->email }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Phone</div>
                        <div class="font-medium">{{ $application->phone }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Course</div>
                        <div class="font-medium">{{ $application->course->title }}</div>
                    </div>
                    @if($application->address)
                    <div class="col-span-2">
                        <div class="text-sm text-gray-500">Address</div>
                        <div class="font-medium">{{ $application->address }}</div>
                    </div>
                    @endif
                    @if($application->message)
                    <div class="col-span-2">
                        <div class="text-sm text-gray-500">Message</div>
                        <div class="font-medium">{{ $application->message }}</div>
                    </div>
                    @endif
                </div>
                
                @if($application->payment_method)
                <div class="border-t pt-6 mb-6">
                    <h2 class="text-lg font-bold mb-4">Payment Information</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-sm text-gray-500">Payment Method</div>
                            <div class="font-medium">{{ ucfirst(str_replace('_', ' ', $application->payment_method)) }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Payment Status</div>
                            <div class="font-medium">{{ ucfirst($application->payment_status) }}</div>
                        </div>
                        @if($application->transaction_id)
                        <div class="col-span-2">
                            <div class="text-sm text-gray-500">Transaction ID</div>
                            <div class="font-medium">{{ $application->transaction_id }}</div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
                
                <div class="border-t pt-6">
                    <h2 class="text-lg font-bold mb-4">Update Status</h2>
                    <form action="{{ route('admin.applications.update', $application) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Application Status</label>
                                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                                    <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="reviewed" {{ $application->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                    <option value="approved" {{ $application->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
                                <select name="payment_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                                    <option value="pending" {{ $application->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="partial" {{ $application->payment_status === 'partial' ? 'selected' : '' }}>Partial</option>
                                    <option value="paid" {{ $application->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Amount Paid</label>
                                <input type="number" step="0.01" name="amount_paid" value="{{ $application->amount_paid }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            </div>
                        </div>
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
