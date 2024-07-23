<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use App\Models\Question;
use App\Models\Participant;
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

    public function create(Request $request)
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
}
