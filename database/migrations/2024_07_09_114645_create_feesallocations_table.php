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
        Schema::create('feesallocations', function (Blueprint $table) {
            $table->id();
            $table->string('class');
            $table->integer('admission');
            $table->integer('tution');
            $table->integer('annual');
            $table->integer('exam_fee');
            $table->integer('lab_charges'); 
            $table->integer('late_fee');  
            $table->integer('pre_dues');
            $table->integer('id_card');
            $table->integer('board_fee');
            $table->integer('stationary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feesallocations');
    }
};
