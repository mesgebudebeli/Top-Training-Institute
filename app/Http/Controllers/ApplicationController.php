<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Course;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create($slug)
    {
        $course = Course::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('applications.create', compact('course'));
    }

    public function store(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $validated['course_id'] = $course->id;
        $validated['user_id'] = auth()->check() ? auth()->id() : null;

        $application = Application::create($validated);

        if (auth()->check()) {
            return redirect()->route('payment.index', $application->id)->with('success', 'Your application has been submitted. Please complete payment.');
        }

        return redirect()->route('courses.show', $slug)->with('success', 'Your application has been submitted successfully. We will contact you soon.');

    }
}
