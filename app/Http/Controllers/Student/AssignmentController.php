<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $courseIds = $user->applications()->where('status', 'approved')->pluck('course_id');
        if ($courseIds->isEmpty()) {
            $courseIds = collect([]);
        }
        $assignments = Assignment::whereIn('course_id', $courseIds)->with('course')->latest()->get();
        return view('student.assignments', compact('assignments'));
    }
}

