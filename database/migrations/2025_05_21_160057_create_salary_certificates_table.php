<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salary_certificates', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('employee_name_kh');
            $table->string('employee_name_en');
            $table->string('gender');
            $table->string('date_of_birth');
            $table->string('nationality');
            $table->string('ethnicity');
            $table->string('place_of_birth');
            $table->string('type_of_employee');
            $table->string('employee_position');
            $table->string('employee_serve');
            $table->string('employee_salary');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_certificates');
    }
};
