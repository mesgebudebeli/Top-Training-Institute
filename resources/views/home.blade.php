@extends('layouts.app')

@section('title', 'Top Training Institute - Learn Skills. Build Your Career.')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Learn Skills. Build Your Career. Create Your Future.</h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100">Build Skills for the Future</p>
            <p class="text-lg mb-10 max-w-3xl mx-auto text-blue-100">Join Top Training Institute to boost your career with practical, expert-led training in languages, computers, software development, creative media, business, and engineering software.</p>
            <a href="{{ route('courses.index') }}" class="bg-white text-blue-900 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-blue-50 inline-block">Explore Courses</a>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-blue-900">10+</div>
                    <div class="text-gray-600 mt-2">Core Disciplines</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-blue-900">100%</div>
                    <div class="text-gray-600 mt-2">Practical & Hands-on</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-blue-900">All Levels</div>
                    <div class="text-gray-600 mt-2">Beginner to Advanced</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-blue-900">Flexible</div>
                    <div class="text-gray-600 mt-2">Study Options</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Categories -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Course Catalog</h2>
                <p class="text-xl text-gray-600">Explore Our Course Categories</p>
                <p class="text-gray-600 mt-2 max-w-2xl mx-auto">From language fluency and software engineering to creative media and engineering CAD, discover practical training tailored to your ambitions.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($categories as $category)
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-bold text-blue-900 mb-3">{{ $category->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $category->description }}</p>
                    <div class="mb-4">
                        <p class="font-semibold text-gray-900 mb-2">Key Topics & Tools:</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            @if($category->topics)
                                @foreach(explode("\n", $category->topics) as $topic)
                                    @if(trim($topic))
                                        <li>• {{ trim($topic) }}</li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <a href="{{ route('courses.category', $category->slug) }}" class="text-blue-900 font-semibold hover:underline">Explore Courses →</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Programs -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Programs</h2>
                <p class="text-xl text-gray-600">Popular Career Pathways</p>
                <p class="text-gray-600 mt-2">Explore in-demand courses curated for high practical impact across software development, creative media, engineering, and professional skills.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredCourses as $course)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="text-sm text-blue-900 font-semibold mb-2">{{ $course->category->name }}</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $course->title }}</h3>
                        <p class="text-gray-600 mb-4 text-sm">{{ $course->short_description }}</p>
                        <div class="flex items-center text-sm text-gray-500 mb-4 space-x-4">
                            <span>⏱ {{ $course->duration }}</span>
                            <span>📍 {{ $course->mode }}</span>
                            <span>📊 {{ $course->level }}</span>
                        </div>
                        <a href="{{ route('courses.show', $course->slug) }}" class="w-full bg-blue-900 text-white text-center py-2 rounded-lg hover:bg-blue-800 block">Inquire & Enroll</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Us</h2>
                <p class="text-xl text-gray-600">Designed for Real-World Competence</p>
                <p class="text-gray-600 mt-2 max-w-3xl mx-auto">At Top Training Institute, our educational philosophy centers on practical competence, guided mentorship, and relevant technical capabilities.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center p-6">
                    <div class="text-4xl mb-4">🎯</div>
                    <h3 class="text-lg font-bold mb-2">Practical Learning</h3>
                    <p class="text-gray-600 text-sm">We prioritize direct, actionable knowledge that you can immediately apply to real-world tasks.</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-4xl mb-4">💼</div>
                    <h3 class="text-lg font-bold mb-2">Hands-on Projects</h3>
                    <p class="text-gray-600 text-sm">Every module integrates realistic assignments and capstone projects so you graduate with a portfolio.</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-4xl mb-4">📚</div>
                    <h3 class="text-lg font-bold mb-2">Beginner-Friendly</h3>
                    <p class="text-gray-600 text-sm">Structured learning progressions guide you step-by-step from core fundamentals to confident mastery.</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-4xl mb-4">🚀</div>
                    <h3 class="text-lg font-bold mb-2">Career-Focused Skills</h3>
                    <p class="text-gray-600 text-sm">Our curricula reflect contemporary industry demands across engineering, creative, software, and administration.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
