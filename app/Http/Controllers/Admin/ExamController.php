<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::with('course')->latest()->get();
        return view('admin.exams.index', compact('exams'));
    }

    public function create()
    {
        $courses = Course::where('is_active', true)->get();
        return view('admin.exams.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'exam_date' => 'nullable|date',
            'total_marks' => 'nullable|integer',
        ]);

        Exam::create($validated);

        return redirect()->route('admin.exams.index')->with('success', 'Exam created successfully.');
    }

    public function edit(Exam $exam)
    {
        $courses = Course::where('is_active', true)->get();
        return view('admin.exams.edit', compact('exam', 'courses'));
    }

    public function update(Request $request, Exam $exam)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'exam_date' => 'nullable|date',
            'total_marks' => 'nullable|integer',
        ]);

        $exam->update($validated);

        return redirect()->route('admin.exams.index')->with('success', 'Exam updated successfully.');
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('admin.exams.index')->with('success', 'Exam deleted successfully.');
    }
}
