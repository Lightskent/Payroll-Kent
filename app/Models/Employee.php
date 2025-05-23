<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }

    public function payrollRecords()
    {
        return $this->hasMany(PayrollRecord::class);
    }
}
