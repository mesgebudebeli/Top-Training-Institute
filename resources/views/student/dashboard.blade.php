@extends('layouts.app')

@section('title', 'My Dashboard - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">My Dashboard</h1>
            
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-bold">My Applications</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applied On</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($applications as $application)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $application->course->title }}</div>
                                    <div class="text-sm text-gray-500">{{ $application->course->category->name }}</div>
                                    @if($application->payment_status === 'pending' && !$application->payment_method)
                                    <a href="{{ route('payment.index', $application->id) }}" class="text-xs text-blue-900 hover:underline">Complete Payment</a>
                                    @elseif($application->payment_method && $application->payment_status === 'pending')
                                    <span class="text-xs text-orange-600">Payment Pending Verification</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $application->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($application->status === 'approved') bg-green-100 text-green-800
                                        @elseif($application->status === 'rejected') bg-red-100 text-red-800
                                        @elseif($application->status === 'reviewed') bg-blue-100 text-blue-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                    <div class="mt-1">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($application->payment_status === 'paid') bg-green-100 text-green-800
                                            @elseif($application->payment_status === 'partial') bg-orange-100 text-orange-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            Payment: {{ ucfirst($application->payment_status) }}
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">No applications yet. <a href="{{ route('courses.index') }}" class="text-blue-900 hover:underline">Browse courses</a></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
