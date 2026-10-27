<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <a href="{{ route('home') }}" class="flex items-center">
                <div class="text-2xl font-bold">
                    <span class="text-blue-900">TOP TRAINING</span><br>
                    <span class="text-gray-700 text-lg">Institute</span>
                </div>
            </a>
            
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-900 font-medium">Home</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-900 font-medium">About</a>
                <a href="{{ route('courses.index') }}" class="text-gray-700 hover:text-blue-900 font-medium">Courses</a>
                <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-blue-900 font-medium">Gallery</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-900 font-medium">Contact</a>
            </nav>
            
            <div class="flex items-center space-x-4">
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="text-blue-900 hover:underline">Admin Dashboard</a>
                    @else
                        <a href="{{ route('student.profile') }}" class="flex items-center space-x-2">
                            <div class="h-8 w-8 rounded-full bg-blue-900 text-white flex items-center justify-center text-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="text-blue-900 hover:underline">Profile</span>
                        </a>
                        <a href="{{ route('student.dashboard') }}" class="text-blue-900 hover:underline">My Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-blue-900">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-900">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800">Register</a>
                @endauth
            </div>

        </div>
    </div>
</header>
