<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\CMS;

class RegistrationController extends Controller
{
    /**
     * Show the registration form.
     */
    public function show()
    {
        $courses = Course::where('is_active', true)
            ->orderBy('name')
            ->get();

        $cms = CMS::select('footer_title', 'footer_text')->first();

        $section10 = [
            'title' => $cms->footer_title,
            'text' => $cms->footer_text,
        ];

        return view('register', compact('courses', 'section10'));
    }

    /**
     * Handle registration form submission.
     */
    public function submit(Request $request)
    {
        // Get the selected course to validate level requirements
        $course = null;
        if ($request->course_id) {
            $course = Course::find($request->course_id);
        }

        // Build validation rules dynamically based on course
        $rules = [
            'child_name' => 'required|string|max:255',
            'child_age' => 'required|integer|min:3|max:18',
            'parent_phone' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'preferred_time_slot' => 'nullable|in:morning,afternoon,evening,weekend',
        ];

        // Add level validation if course has levels
        if ($course && $course->has_level && $course->level > 0) {
            $rules['selected_level'] = 'required|integer|min:1|max:' . $course->level;
        }

        // Validate the request
        $validatedData = $request->validate($rules, [
            'child_name.required' => 'Child name is required.',
            'child_age.required' => 'Child age is required.',
            'child_age.min' => 'Child must be at least 3 years old.',
            'child_age.max' => 'Child must be 18 years old or younger.',
            'parent_phone.required' => 'Parent phone number is required.',
            'course_id.required' => 'Please select a course.',
            'course_id.exists' => 'Selected course is not valid.',
            'selected_level.required' => 'Please select a level for this course.',
            'selected_level.min' => 'Level must be at least 1.',
            'selected_level.max' => 'Selected level is not available for this course.',
        ]);

        try {
            // Create the registration
            $registration = Registration::create([
                'child_name' => $validatedData['child_name'],
                'child_age' => $validatedData['child_age'],
                'parent_phone' => $validatedData['parent_phone'],
                'course_id' => $validatedData['course_id'],
                'selected_level' => $validatedData['selected_level'] ?? null,
                'preferred_time_slot' => $validatedData['preferred_time_slot'] ?? null,
                'status' => 'pending',
            ]);

            // Redirect to home with success message
            return redirect()->route('welcome')->with(
                'success',
                'Registration submitted successfully! We will contact you soon to confirm your enrollment.'
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
