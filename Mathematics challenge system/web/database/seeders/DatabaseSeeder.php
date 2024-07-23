<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed Schools
        $schoolIds = [];
        for ($i = 1; $i <= 3; $i++) {
            $schoolIds[] = DB::table('schools')->insertGetId([
                'name' => $faker->company,
                'district' => $faker->city,
                'registration_number' => $faker->unique()->numerify('SCH####'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Representatives
        foreach ($schoolIds as $schoolId) {
            DB::table('representatives')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'school_id' => $schoolId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Challenges
        $challengeIds = [];
        for ($i = 1; $i <= 5; $i++) {
            $challengeIds[] = DB::table('challenges')->insertGetId([
                'name' => 'Challenge ' . $i,
                'start_date' => $faker->date,
                'end_date' => $faker->date,
                'duration' => $faker->time,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Questions
        $questionIds = [];
        foreach ($challengeIds as $challengeId) {
            for ($i = 1; $i <= 4; $i++) { // Total 20 questions across 5 challenges
                $questionIds[] = DB::table('questions')->insertGetId([
                    'challenge_id' => $challengeId,
                    'question_text' => 'English Question ' . $i,
                    'answer' => $faker->word,
                    'marks' => $faker->numberBetween(1, 10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Seed Participants
        $participantIds = [];
        for ($i = 1; $i <= 20; $i++) {
            $participantIds[] = DB::table('participants')->insertGetId([
                'username' => $faker->unique()->userName,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'date_of_birth' => $faker->date,
                'school_id' => $faker->randomElement($schoolIds),
                'image_path' => null,
                'password' => bcrypt('password'),
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Attempts
        $attemptIds = [];
        foreach ($participantIds as $participantId) {
            foreach ($challengeIds as $challengeId) {
                $attemptIds[] = DB::table('attempts')->insertGetId([
                    'participant_id' => $participantId,
                    'challenge_id' => $challengeId,
                    'score' => $faker->numberBetween(0, 100),
                    'time_taken' => $faker->time,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Seed Marks
        foreach ($attemptIds as $attemptId) {
            foreach ($questionIds as $questionId) {
                DB::table('marks')->insert([
                    'attempt_id' => $attemptId,
                    'question_id' => $questionId,
                    'marks_awarded' => $faker->numberBetween(0, 10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Seed Rejected Participants
        for ($i = 1; $i <= 5; $i++) {
            DB::table('rejected_participants')->insert([
                'participant_id' => $faker->randomElement($participantIds),
                'details' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
