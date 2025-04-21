<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\SubProgram;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{

    protected $model = Grade::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $subject = SubProgram::inRandomOrder()->first();
        $student = User::role('student')->inRandomOrder()->first();

        if (!$student || !$subject) {
            throw new \Exception('No students or subjects found. Please seed the database with the required data.');
        }

        return [
            'grade' => $this->faker->randomElement(['Pass', 'Merit', 'Distinction', 'Referral', 'Fail']),
            'subject_id' => $subject->id,
            'student_id' => $student->id,
        ];
    }
}
