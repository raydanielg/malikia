<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mother_intakes', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedTinyInteger('age')->nullable();
            $table->string('pregnancy_stage')->nullable(); // e.g., Trimester 1/2/3 or Postpartum
            $table->date('due_date')->nullable();
            $table->string('location')->nullable();
            $table->unsignedTinyInteger('previous_pregnancies')->nullable();
            $table->text('concerns')->nullable();
            $table->json('interests')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mother_intakes');
    }
};
