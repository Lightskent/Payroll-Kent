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
    // Manually create 2 specific departments
         $departments = collect([
             Department::create(['name' => 'Human Resources']),
             Department::create(['name' => 'Finance']),
            ]);

    // Create 10 employees and assign to one of the above departments
         $employees = Employee::factory()->count(10)->make();

         $employees->each(function ($employee) use ($departments) {
            $employee->department_id = $departments->random()->id;
            $employee->save();

        // Create salary
        Salary::factory()->create([
            'employee_id' => $employee->id,
            'amount' => rand(3000, 8000),
        ]);

        // Create 2 payroll records
        for ($i = 0; $i < 2; $i++) {
            PayrollRecord::factory()->create([
                'employee_id' => $employee->id,
                'amount' => rand(1000, 3000),
                'paid_at' => now()->subDays(rand(1, 30)),
            ]);
        }
    });
    }   
}