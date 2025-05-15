<?php

namespace Database\Factories;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    protected $model = Salary::class;

    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),  // Link this salary to an employee
            'amount' => $this->faker->numberBetween(3000, 8000),  // Random salary amount
        ];
    }
}
