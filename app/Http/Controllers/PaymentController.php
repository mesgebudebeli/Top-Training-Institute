<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($applicationId)
    {
        $application = Application::with('course')->findOrFail($applicationId);
        
        if ($application->user_id !== auth()->id()) {
            abort(403);
        }
        
        return view('payments.index', compact('application'));
    }

    public function process(Request $request, $applicationId)
    {
        $application = Application::with('course')->findOrFail($applicationId);
        
        if ($application->user_id !== auth()->id()) {
            abort(403);
        }
        
        $request->validate([
            'payment_method' => 'required|in:telebirr,cbe,bank_transfer,cash,mobile_money',
            'transaction_id' => 'required|string|max:255',
            'receipt' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        
        $application->update([
            'payment_status' => 'pending',
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id,
        ]);
        
        return redirect()->route('student.dashboard')->with('success', 'Payment confirmation submitted. Please send your receipt to Telegram @Ashuman124 or call 0912450661 / 0932932322 for verification.');
    }


    public function payLater($applicationId)
    {
        $application = Application::with('course')->findOrFail($applicationId);
        
        if ($application->user_id !== auth()->id()) {
            abort(403);
        }
        
        $application->update([
            'payment_status' => 'pending',
            'payment_method' => 'pay_later',
        ]);
        
        return redirect()->route('student.dashboard')->with('success', 'Application submitted. You can pay later at the institute.');
    }
}
