<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use App\Models\Course;
use App\Models\Inquiry;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'categories' => Category::count(),
            'courses' => Course::count(),
            'students' => User::where('is_admin', false)->count(),
            'applications' => Application::count(),
            'pending_applications' => Application::where('status', 'pending')->count(),
            'inquiries' => Inquiry::count(),
            'unread_inquiries' => Inquiry::where('status', 'unread')->count(),
        ];

        $recentApplications = Application::with(['course', 'user'])->latest()->take(5)->get();
        $recentInquiries = Inquiry::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentApplications', 'recentInquiries'));
    }
}
