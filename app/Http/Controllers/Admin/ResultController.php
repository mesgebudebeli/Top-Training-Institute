<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with(['user', 'exam'])->latest()->get();
        return view('admin.results.index', compact('results'));
    }

    public function create()
    {
        $students = User::where('is_admin', false)->get();
        $exams = Exam::with('course')->get();
        return view('admin.results.create', compact('students', 'exams'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'exam_id' => 'required|exists:exams,id',
            'marks_obtained' => 'required|integer',
            'total_marks' => 'required|integer',
            'grade' => 'nullable|string|max:10',
        ]);

        Result::create($validated);

        return redirect()->route('admin.results.index')->with('success', 'Result added successfully.');
    }

    public function edit(Result $result)
    {
        $students = User::where('is_admin', false)->get();
        $exams = Exam::with('course')->get();
        return view('admin.results.edit', compact('result', 'students', 'exams'));
    }

    public function update(Request $request, Result $result)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'exam_id' => 'required|exists:exams,id',
            'marks_obtained' => 'required|integer',
            'total_marks' => 'required|integer',
            'grade' => 'nullable|string|max:10',
        ]);

        $result->update($validated);

        return redirect()->route('admin.results.index')->with('success', 'Result updated successfully.');
    }

    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->route('admin.results.index')->with('success', 'Result deleted successfully.');
    }
}
