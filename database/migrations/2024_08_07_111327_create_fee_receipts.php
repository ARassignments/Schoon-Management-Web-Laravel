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
        Schema::create('fee_receipts', function (Blueprint $table) {
            $table->id();
            $table->integer("voucher_id");
            $table->string("date");
            $table->integer('gr_number');
            $table->string('class');
            $table->string('section');
            $table->integer('total')->default(0);
            $table->string('paytype');
            $table->integer('discount')->default(0);
            $table->integer('receipts')->default(0);
            $table->integer('balance')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_receipts');
    }
};
