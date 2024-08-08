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
        Schema::create('special_fee_generates', function (Blueprint $table) {
            $table->id();
            $table->integer('gr_number');
            $table->string('month_year');
            $table->string('transaction_date');
            $table->string('issued_date');
            $table->string('due_date');
            $table->string('session');
            $table->integer('admission')->default(0);
            $table->integer('tution')->default(0);
            $table->integer('annual')->default(0);
            $table->integer('exam_fee')->default(0);
            $table->integer('lab_charges')->default(0);
            $table->integer('late_fee')->default(0);
            $table->integer('pre_dues')->default(0);
            $table->integer('id_card')->default(0);
            $table->integer('board_fee')->default(0);
            $table->integer('stationary')->default(0);
            $table->integer('total')->default(0);
            $table->integer('previous_dues')->default(0);
            $table->integer('total_payable_within_due_date')->default(0);
            $table->integer('total_payable_after_due_date')->default(0);
            $table->string('class');
            $table->string('section');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_fee_generate');
    }
};
