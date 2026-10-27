@extends('layouts.app')

@section('title', 'Contact Us - Top Training Institute')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Contact Us</h1>
                <p class="text-xl text-gray-600">Get in Touch</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-2xl font-bold mb-6">Send us a Message</h2>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
                            <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="text" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <input type="text" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Message *</label>
                            <textarea name="message" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-900 text-white px-6 py-3 rounded-lg hover:bg-blue-800">Send Message</button>
                    </form>
                </div>
                
                <div>
                    <h2 class="text-2xl font-bold mb-6">Contact Information</h2>
                    <div class="space-y-4">
                        <div>
                            <h3 class="font-semibold text-gray-900">Address</h3>
                            <p class="text-gray-600">Top Training Institute<br>City, Country</p>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Email</h3>
                            <p class="text-gray-600">info@toptraining.com</p>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Phone</h3>
                            <p class="text-gray-600">+123 456 7890</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
