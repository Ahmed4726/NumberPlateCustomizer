<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Send email
        $adminEmail = env('ADMIN_EMAIL'); // Replace with the actual admin email
        Mail::to($adminEmail)->send(new ContactUsMail($request->all()));

        return back()->with('success', 'Your message has been sent successfully.');
    }
}
