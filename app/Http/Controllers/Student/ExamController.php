<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $courseIds = $user->applications()->where('status', 'approved')->pluck('course_id');
        if ($courseIds->isEmpty()) {
            $courseIds = collect([]);
        }
        $exams = Exam::whereIn('course_id', $courseIds)->with('course')->latest()->get();
        $results = $user->results()->with('exam.course')->latest()->get();
        return view('student.exams', compact('exams', 'results'));
    }
}

