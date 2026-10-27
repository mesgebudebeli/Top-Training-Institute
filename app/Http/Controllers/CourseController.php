<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('courses')->get();
        $courses = Course::with('category')->where('is_active', true)->get();
        
        return view('courses.index', compact('categories', 'courses'));
    }

    public function show($slug)
    {
        $course = Course::with('category')->where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('is_active', true)
            ->take(3)
            ->get();
        
        return view('courses.show', compact('course', 'relatedCourses'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $courses = Course::where('category_id', $category->id)->where('is_active', true)->get();
        $categories = Category::withCount('courses')->get();
        
        return view('courses.category', compact('category', 'courses', 'categories'));
    }
}
