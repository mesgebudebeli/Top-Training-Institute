<footer class="bg-blue-900 text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <div class="text-2xl font-bold mb-4">
                    <span>TOP TRAINING</span><br>
                    <span class="text-lg">Institute</span>
                </div>
                <p class="text-blue-100 mb-4">Learn Skills. Build Your Career. Create Your Future.</p>
                <p class="text-blue-100">Join Top Training Institute to boost your career with practical, expert-led training in languages, computers, software development, creative media, business, and engineering software.</p>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-blue-100 hover:text-white">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-blue-100 hover:text-white">About Us</a></li>
                    <li><a href="{{ route('courses.index') }}" class="text-blue-100 hover:text-white">Courses</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-blue-100 hover:text-white">Gallery</a></li>
                    <li><a href="{{ route('contact') }}" class="text-blue-100 hover:text-white">Contact</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                <ul class="space-y-2 text-blue-100">
                    <li>Top Training Institute</li>
                    <li>info@toptraining.com</li>
                    <li>+123 456 7890</li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-blue-800 mt-8 pt-8 text-center text-blue-100">
            <p>&copy; {{ date('Y') }} Top Training Institute. All rights reserved.</p>
        </div>
    </div>
</footer>
