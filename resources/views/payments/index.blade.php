@extends('layouts.app')

@section('title', 'Payment - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-6">Complete Your Payment</h1>
                
                <div class="bg-blue-50 p-4 rounded-lg mb-6">
                    <h2 class="font-semibold text-blue-900 mb-2">Course Details</h2>
                    <p class="text-gray-900 font-medium">{{ $application->course->title }}</p>
                    <p class="text-gray-600 text-sm">{{ $application->course->category->name }}</p>
                    @if($application->course->fee)
                    <p class="text-gray-900 font-bold mt-2">Fee: {{ $application->course->fee }}</p>
                    @endif
                </div>
                
                <div class="bg-green-50 p-6 rounded-lg mb-6 border border-green-200">
                    <h2 class="text-xl font-bold text-green-900 mb-4">Payment Instructions</h2>
                    <div class="space-y-3 text-gray-800">
                        <div class="p-3 bg-white rounded border">
                            <p class="font-semibold text-blue-900">Telebirr</p>
                            <p class="font-mono text-lg">0912450661</p>
                        </div>
                        <div class="p-3 bg-white rounded border">
                            <p class="font-semibold text-blue-900">CBE</p>
                            <p class="font-mono text-lg">1000448547519</p>
                        </div>
                        <div class="p-3 bg-white rounded border">
                            <p class="font-semibold text-blue-900">Contact/Telegram</p>
                            <p>Phone: <span class="font-semibold">+251912450661</span> / <span class="font-semibold">0932932322</span></p>
                            <p>Telegram: <span class="font-semibold">@Ashuman124</span></p>
                        </div>
                        <div class="p-3 bg-yellow-50 rounded border border-yellow-200">
                            <p class="font-semibold text-yellow-900 mb-1">Important:</p>
                            <p class="text-sm">After payment, please send your receipt/attachment to Telegram <span class="font-semibold">@Ashuman124</span> or call the contact numbers above with your full name and course name.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h2 class="text-xl font-bold mb-4">Submit Payment Confirmation</h2>
                    <form action="{{ route('payment.process', $application->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Select Payment Method *</label>
                            <div class="space-y-2">
                                <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="payment_method" value="telebirr" required class="text-blue-900 focus:ring-blue-500">
                                    <span class="ml-3">Telebirr</span>
                                </label>
                                <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="payment_method" value="cbe" required class="text-blue-900 focus:ring-blue-500">
                                    <span class="ml-3">CBE Bank Transfer</span>
                                </label>
                                <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="payment_method" value="bank_transfer" required class="text-blue-900 focus:ring-blue-500">
                                    <span class="ml-3">Other Bank Transfer</span>
                                </label>
                                <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="payment_method" value="cash" required class="text-blue-900 focus:ring-blue-500">
                                    <span class="ml-3">Cash (Pay at Institute)</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Transaction/Reference ID *</label>
                            <input type="text" name="transaction_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Upload Payment Receipt (Image/PDF)</label>
                            <input type="file" name="receipt" accept="image/*,application/pdf" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Upload your payment receipt/screenshot</p>
                        </div>
                        <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded-lg hover:bg-blue-800 font-semibold">Submit Payment Confirmation</button>
                    </form>
                </div>

                
                <div class="text-center">
                    <a href="{{ route('payment.later', $application->id) }}" class="text-blue-900 hover:underline">Pay Later at the Institute</a>
                </div>
            </div>
        </div>
    </section>
@endsection
EOF
echo "done" 2>&1 | tail -1
