<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\School;
use App\Models\Participant;
use App\Models\Challenge;
use App\Models\Question;
use App\Models\Attempt;
use App\Models\Representative; // Ensure this import is added

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate existing tables
        DB::table('rejected_participants')->truncate();
        DB::table('marks')->truncate();
        DB::table('questions')->truncate();
        DB::table('attempts')->truncate();
        DB::table('challenges')->truncate();
        DB::table('participants')->truncate();
        DB::table('representatives')->truncate();
        DB::table('schools')->truncate();

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Seed schools
        $schools = [];
        for ($i = 1; $i <= 4; $i++) {
            $schools[] = School::create([
                'name' => 'School ' . $i,
                'district' => 'District ' . $i,
                'registration_number' => 'REG' . $i,
            ]);
        }

        // Seed representatives
        foreach ($schools as $school) {
            Representative::create([
                'name' => 'Rep ' . $school->id,
                'email' => 'rep' . $school->id . '@example.com',
                'school_id' => $school->id,
                'password' => 'password123', // Plain text password
            ]);
        }

        // Seed participants
        for ($i = 1; $i <= 40; $i++) {
            $school = $schools[array_rand($schools)];
            Participant::create([
                'username' => 'student' . $i,
                'first_name' => 'First' . $i,
                'last_name' => 'Last' . $i,
                'email' => 'student' . $i . '@example.com',
                'date_of_birth' => Carbon::today()->subYears(rand(10, 15))->format('Y-m-d'),
                'school_id' => $school->id,
                'image_path' => null,
                'password' => 'password123', // Plain text password
                'status' => 'Pending',
            ]);
        }

        // Seed challenges
        $challenges = [];
        for ($i = 1; $i <= 4; $i++) {
            $challenges[] = Challenge::create([
                'name' => 'Challenge ' . $i,
                'start_date' => Carbon::today()->format('Y-m-d'),
                'end_date' => Carbon::today()->addDays(7)->format('Y-m-d'),
                'duration' => '01:00:00', // 1 hour duration
            ]);
        }

        // Seed questions
        foreach ($challenges as $challenge) {
            for ($i = 1; $i <= 50; $i++) {
                Question::create([
                    'challenge_id' => $challenge->id,
                    'question_text' => 'Question ' . $i,
                    'answer' => 'Answer ' . $i,
                    'marks' => rand(1, 10),
                ]);
            }
        }

        // Seed attempts
        foreach (Participant::all() as $participant) {
            foreach ($challenges as $challenge) {
                Attempt::create([
                    'participant_id' => $participant->id,
                    'challenge_id' => $challenge->id,
                    'score' => rand(0, 100),
                    'time_taken' => '00:30:00', // 30 minutes
                ]);
            }
        }
    }
}
