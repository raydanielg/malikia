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
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();
            
            // Sehemu ya 1: Kuhusu wewe
            $table->string('age_group', 50);
            $table->string('flow_level', 50);
            
            // Sehemu ya 2: Unachotumia sasa
            $table->string('current_brand', 255);
            $table->json('reasons')->nullable(); // Array of reasons
            
            // Sehemu ya 3: Taulo nzuri ni ipi?
            $table->json('important_features')->nullable(); // Array of features
            $table->string('pad_type', 50)->nullable();
            $table->string('wings_preference', 50)->nullable();
            $table->string('scented_preference', 50)->nullable();
            $table->text('scented_reason')->nullable();
            $table->string('irritation_frequency', 50)->nullable();
            
            // Sehemu ya 4: Mambo ya kuepuka
            $table->json('dislikes')->nullable(); // Array of dislikes
            $table->string('stopped_brand', 10)->nullable();
            $table->text('stopped_brand_explain')->nullable();
            
            // Sehemu ya 5: Bei & thamani
            $table->string('price_range', 50);
            $table->string('pay_more', 20)->nullable();
            $table->text('good_pad_definition')->nullable();
            
            // Sehemu ya 6: Maoni ya kweli
            $table->text('ideal_pad')->nullable();
            $table->text('unresolved_problem')->nullable();
            $table->string('try_new_brand', 20);
            $table->text('other_comments')->nullable();
            
            // Metadata
            $table->ipAddress('ip_address')->nullable();
            $table->string('user_agent', 500)->nullable();
            $table->timestamps();
            
            // Indexes for common queries
            $table->index('age_group');
            $table->index('flow_level');
            $table->index('price_range');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_responses');
    }
};
