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
        Schema::create('cashflows', function (Blueprint $table) {
            $table->id();

            // Investment Details
            $table->enum('flow_type', ['inflow', 'outflow']);
            $table->decimal('invest_amount', 15, 2)->nullable();
            $table->date('invest_date')->nullable();
            $table->string('invest_remarks')->nullable();
            $table->string('invest_proof')->nullable();

            // Profit Details
            $table->decimal('profit_amount', 15, 2)->nullable();
            $table->date('profit_date')->nullable();
            $table->string('profit_remarks')->nullable();
            $table->string('profit_proof')->nullable();

            // Foreign Key
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashflows');
    }
};
