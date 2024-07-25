<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use App\Models\Participant;
use App\Models\School;
use App\Models\Representative;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = Challenge::all();
        $participantCount = Participant::count();  // Get the count of participants

        // Get the start and end dates of the current week
        $startOfWeek = Carbon::now()->startOfWeek(); // Start of the week (e.g., Monday)
        $endOfWeek = Carbon::now()->endOfWeek(); // End of the week (e.g., Sunday)

        // Fetch recent applicants from this week
        $recentApplicants = Participant::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->select('id', 'first_name', 'last_name', 'status')
            ->get();

        return view('dashboard', compact('challenges', 'participantCount', 'recentApplicants'));
    }

    public function createChallenge(Request $request)
    {
        // Validate the form data
        $request->validate([
            'challengeName' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'duration' => 'required',
        ]);

        // Create a new challenge
        $challenge = new Challenge;
        $challenge->name = $request->challengeName;
        $challenge->start_date = $request->startDate;
        $challenge->end_date = $request->endDate;
        $challenge->duration = $request->duration;
        $challenge->save();

        return redirect()->route('form.show')->with('success', 'Challenge created successfully.');
    }

    public function createSchool(Request $request)
    {
        // Validate the form data
        $request->validate([
            'schoolName' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'registrationNumber' => 'required|string|max:255',
        ]);

        // Create a new school
        $school = new School;
        $school->name = $request->schoolName;
        $school->district = $request->district;
        $school->registration_number = $request->registrationNumber;
        $school->save();

        return redirect()->route('form.show')->with('success', 'School added successfully.');
    }

    public function createRepresentative(Request $request)
    {
        // Validate the form data
        $request->validate([
            'representativeName' => 'required|string|max:255',
            'representativeEmail' => 'required|email|max:255',
            'schoolId' => 'required|integer',
            'password' => 'required|string|min:8',
        ]);

        // Create a new representative
        $representative = new Representative;
        $representative->name = $request->representativeName;
        $representative->email = $request->representativeEmail;
        $representative->school_id = $request->schoolId;
        $representative->password = $request->password; // Store password as plain text

        $representative->save();

        return redirect()->route('form.show')->with('success', 'Representative added successfully.');
    }
}
