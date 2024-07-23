<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attempt;
use App\Models\Mark;
use App\Models\Participant;
use App\Models\Question;
use App\Models\School;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Most correctly answered questions
        $mostCorrectQuestions = DB::table('marks')
            ->join('questions', 'marks.question_id', '=', 'questions.id')
            ->select('questions.question_text', DB::raw('count(*) as total_correct'))
            ->where('marks.marks_awarded', '>', 0)
            ->groupBy('questions.question_text')
            ->orderBy('total_correct', 'desc')
            ->get();

        // School Rankings
        $schoolRankings = DB::table('schools')
            ->join('participants', 'schools.id', '=', 'participants.school_id')
            ->join('attempts', 'participants.id', '=', 'attempts.participant_id')
            ->select('schools.name', DB::raw('AVG(attempts.score) as average_score'))
            ->groupBy('schools.name')
            ->orderBy('average_score', 'desc')
            ->get();

        // Performance over time
        $performance = DB::table('attempts')
            ->join('participants', 'attempts.participant_id', '=', 'participants.id')
            ->join('schools', 'participants.school_id', '=', 'schools.id')
            ->select('schools.name as school_name', 'participants.username', 'attempts.score', 'attempts.created_at')
            ->orderBy('attempts.created_at', 'desc')
            ->get();

        // Percentage repetition of questions
        $repetitionData = DB::table('attempts')
            ->join('marks', 'attempts.id', '=', 'marks.attempt_id')
            ->select('attempts.participant_id', 'marks.question_id', DB::raw('count(*) as total_attempts'))
            ->groupBy('attempts.participant_id', 'marks.question_id')
            ->having('total_attempts', '>', 1)
            ->get();

        $totalRepetitions = $repetitionData->count();
        $totalQuestions = DB::table('questions')->count();
        $repetitionPercentage = $totalQuestions > 0 ? ($totalRepetitions / $totalQuestions) * 100 : 0;

        // Worst performing schools
        $worstSchools = DB::table('schools')
            ->join('participants', 'schools.id', '=', 'participants.school_id')
            ->join('attempts', 'participants.id', '=', 'attempts.participant_id')
            ->select('schools.name', DB::raw('AVG(attempts.score) as average_score'))
            ->groupBy('schools.name')
            ->orderBy('average_score', 'asc')
            ->get();

        // Best performing schools
        $bestSchools = DB::table('schools')
            ->join('participants', 'schools.id', '=', 'participants.school_id')
            ->join('attempts', 'participants.id', '=', 'attempts.participant_id')
            ->select('schools.name', DB::raw('AVG(attempts.score) as average_score'))
            ->groupBy('schools.name')
            ->orderBy('average_score', 'desc')
            ->get();

        // Participants with incomplete challenges
        $incompleteChallenges = DB::table('attempts')
            ->join('participants', 'attempts.participant_id', '=', 'participants.id')
            ->select('participants.username', 'attempts.challenge_id')
            ->whereNull('attempts.score')
            ->get();

        return view('analytics', compact(
            'mostCorrectQuestions',
            'schoolRankings',
            'performance',
            'repetitionPercentage',
            'worstSchools',
            'bestSchools',
            'incompleteChallenges'
        ));
    }
}
