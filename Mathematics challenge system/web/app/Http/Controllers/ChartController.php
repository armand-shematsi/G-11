<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function showCharts()
    {
        // Retrieve and process data as defined

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
            ->select('marks.question_id', DB::raw('count(*) as total_attempts'))
            ->groupBy('marks.question_id')
            ->having('total_attempts', '>', 1)
            ->get();

        $totalQuestions = DB::table('questions')->count();
        $repetitionData = $repetitionData->map(function ($item) use ($totalQuestions) {
            $item->percentage = ($item->total_attempts / $totalQuestions) * 100;
            return $item;
        });

        $repetitionPercentage = $repetitionData;

        // Other data retrieval as defined

        return view('charts', compact(
            'mostCorrectQuestions',
            'schoolRankings',
            'performance',
            'repetitionPercentage'
        ));
    }
}
