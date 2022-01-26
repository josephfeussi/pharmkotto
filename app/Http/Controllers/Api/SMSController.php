<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SendSMSJob;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin-only');
    }

    public function sendSMS(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|max:160',
            'numbers' => 'required|array|min:1|max:5000',
        ]);

        SendSMSJob::dispatch($validated['message'], $validated['numbers']);

        return redirect()->back()->with('info', "Les SMS seront bientot envoyés");
    }
}
