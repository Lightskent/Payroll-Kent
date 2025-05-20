<?php

namespace Database\Factories;

use App\Models\PayrollRecord;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class PayrollRecordFactory extends Factory
{
    protected $model = PayrollRecord::class;

    public function definition()
    {
        return [
            'employee_id' => null,
            'amount' => $this->faker->numberBetween(1000, 3000),
            'paid_at' => now()->subDays(rand(1, 30)),
        ];
    }
}
