<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Professor>
 */
class ProfessorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_id' => Department::inRandomOrder()->first()?->id ?? Department::factory(),
            'major' => $this->faker->randomElement(['การบัญชี', 'วิทยาการคอมพิวเตอร์', 'คอมพิวเตอร์ธุรกิจ', 'การแสดง', 'ศิลปศึกษา']),
            'prefix' => $this->faker->randomElement(['ศ','รศ','ผศ','ศ.ดร','รศ.ดร','ผศ.ดร','ดร.']),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName
        ];
    }
}
