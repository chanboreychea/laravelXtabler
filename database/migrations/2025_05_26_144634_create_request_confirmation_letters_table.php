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
        Schema::create('request_confirmation_letters', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('type_of_letter');
            $table->string('reference');
            $table->string('employee_name_kh');
            $table->string('day_of_birth');
            $table->string('month_of_birth');
            $table->string('year_of_birth');
            $table->string('type_of_employee');
            $table->string('employee_position');
            $table->string('department_name');
            $table->string('purpose');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_confirmation_letters');
    }
};
