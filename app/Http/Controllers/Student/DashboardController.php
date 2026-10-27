<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $applications = auth()->user()->applications()->with('course')->latest()->get();
        return view('student.dashboard', compact('applications'));
    }
}
