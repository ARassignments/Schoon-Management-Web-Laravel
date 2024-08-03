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
        Schema::create('admission_forms', function (Blueprint $table) {
            $table->id();
            $table->integer('gr_number')->unique();
            $table->string('student_name',20);
            $table->string('father_name',30);
            $table->integer('student_age');
            $table->bigInteger('mobile_number');
            $table->string('class');
            $table->string('current_class');
            $table->string('section');
            $table->string('last_institute');
            $table->string('fees');
            $table->date('date_of_addmission');
            $table->date('date_of_birth');
            $table->string('religion');
            $table->string('address');
            $table->string('Status')->default('Current');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_forms');
    }
};
