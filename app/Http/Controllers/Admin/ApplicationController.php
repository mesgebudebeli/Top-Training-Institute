<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with(['course', 'user'])->latest()->get();
        return view('admin.applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        $application->load(['course', 'user']);
        return view('admin.applications.show', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewed,approved,rejected',
            'payment_status' => 'nullable|in:pending,paid,partial',
            'amount_paid' => 'nullable|numeric',
        ]);

        $application->update($validated);

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }


    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('admin.applications.index')->with('success', 'Application deleted successfully.');
    }
}
