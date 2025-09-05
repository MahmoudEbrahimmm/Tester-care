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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()
                ->constrained('users')->nullOnDelete();
            $table->string('tracking_code')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('description');
            $table->string('device_model');
            $table->enum('status',['pending','under_repair','ready','delivered'])
                ->default('pending');
            $table->decimal('price',10,2)->nullable();
            $table->decimal('paid_amount',10,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
