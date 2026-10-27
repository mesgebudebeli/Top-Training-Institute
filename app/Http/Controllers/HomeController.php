<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('courses')->get();
        $featuredCourses = Course::with('category')->where('is_featured', true)->where('is_active', true)->take(6)->get();
        $galleries = Gallery::orderBy('order')->take(11)->get();
        
        return view('home', compact('categories', 'featuredCourses', 'galleries'));
    }

    public function about()
    {
        return view('about');
    }
}
