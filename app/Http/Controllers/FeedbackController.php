<?php

namespace App\Http\Controllers;

use App\Models\Feedback; // Import the Feedback model
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|between:1,5',
            'comments' => 'required|string',
        ]);

        // Save feedback to the database
        Feedback::create($validated);

        // Redirect back with a success message
        return back()->with('success', 'Thank you for your feedback!');
    }
}
