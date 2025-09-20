<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CMS;

class RegistrationController extends Controller
{
    /**
     * Show the registration form.
     */
    public function show()
    {
        $cms = CMS::select('footer_title', 'footer_text')->first();

        $section10 = [
            'title' => $cms->footer_title,
            'text' => $cms->footer_text,
        ];

        return view('register', compact('section10'));
    }

    /**
     * Handle registration form submission.
     */
    public function submit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'child_name' => 'required|string|max:255',
            'child_age' => 'required|integer|min:3|max:18',
            'parent_phone' => 'required|string|max:255',
            'preferred_time_slot' => 'nullable|in:morning,afternoon,evening,weekend',
        ], [
            'child_name.required' => 'Child name is required.',
            'child_age.required' => 'Child age is required.',
            'child_age.min' => 'Child must be at least 3 years old.',
            'child_age.max' => 'Child must be 18 years old or younger.',
            'parent_phone.required' => 'Parent phone number is required.',
        ]);

        try {
            // Create the user first
            $user = User::create([
                'name' => $validatedData['child_name'],
                'email' => 'student_' . time() . '_' . rand(1000, 9999) . '@temp.local',
                'password' => null,
            ]);

            // Create the student record linked to the user
            Student::create([
                'user_id' => $user->id,
                'child_age' => $validatedData['child_age'],
                'parent_phone' => $validatedData['parent_phone'],
                'preferred_time_slot' => $validatedData['preferred_time_slot'] ?? null,
                'status' => 'pending',
            ]);

            // Redirect to home with success message
            return redirect()->route('welcome')->with(
                'success',
                __('other.registration_submitted_successfully')
            );
        } catch (\Exception $e) {
            // Log the error and redirect back with error message
            \Log::error('Registration submission failed: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Sorry, there was an error processing your registration. Please try again or contact us directly.');
        }
    }
}
