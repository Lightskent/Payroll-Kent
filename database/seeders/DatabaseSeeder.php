<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\PayrollRecord;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $departments = Department::factory()->count(3)->create();

        // Create 10 employees and link them to departments
        $employees = Employee::factory()->count(10)->create();

        // Assign employees to departments randomly
        $employees->each(function ($employee) use ($departments) {
            // Assign department to employee (linking employee to a department)
            $employee->department_id = $departments->random()->id;
            $employee->save();

            // Create salary for each employee
            Salary::factory()->create([
                'employee_id' => $employee->id,
                'amount' => rand(3000, 8000),  // Random salary amount
            ]);

            // Create payroll records for each employee
            PayrollRecord::factory()->count(2)->create([
                'employee_id' => $employee->id,
                'amount' => rand(1000, 3000),  // Random payroll amount
                'paid_at' => now()->subDays(rand(1, 30)),  // Random payment date
            ]);
        });
    }
}