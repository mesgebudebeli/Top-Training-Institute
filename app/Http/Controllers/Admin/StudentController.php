<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('is_admin', false)->with('applications')->latest()->get();
        return view('admin.students.index', compact('students'));
    }

    public function show(User $student)
    {
        $student->load(['applications.course']);
        return view('admin.students.show', compact('student'));
    }

    public function updatePayment(Request $request, User $student)
    {
        $validated = $request->validate([
            'total_fee' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
        ]);

        $student->update($validated);

        return redirect()->back()->with('success', 'Student payment info updated successfully.');
    }
}
