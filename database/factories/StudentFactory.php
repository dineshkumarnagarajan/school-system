<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\User;

class StudentFactory extends Factory
{
    // Specify the corresponding model
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // Create a new user and link it as a student
            'user_id' => User::factory()->create(['role' => 'student'])->id,
            // Generate a unique student number
            'student_number' => $this->faker->unique()->numerify('STU#####'),
        ];
    }
}
