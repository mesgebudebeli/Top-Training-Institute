<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with('course')->latest()->get();
        return view('admin.assignments.index', compact('assignments'));
    }

    public function create()
    {
        $courses = Course::where('is_active', true)->get();
        return view('admin.assignments.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|url',
            'due_date' => 'nullable|date',
        ]);

        Assignment::create($validated);

        return redirect()->route('admin.assignments.index')->with('success', 'Assignment created successfully.');
    }

    public function edit(Assignment $assignment)
    {
        $courses = Course::where('is_active', true)->get();
        return view('admin.assignments.edit', compact('assignment', 'courses'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|url',
            'due_date' => 'nullable|date',
        ]);

        $assignment->update($validated);

        return redirect()->route('admin.assignments.index')->with('success', 'Assignment updated successfully.');
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return redirect()->route('admin.assignments.index')->with('success', 'Assignment deleted successfully.');
    }
}
