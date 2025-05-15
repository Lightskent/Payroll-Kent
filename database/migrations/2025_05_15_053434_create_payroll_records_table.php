<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('payroll_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade'); // Required column
            $table->integer('amount');
            $table->timestamp('paid_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payroll_records');
    }
}
