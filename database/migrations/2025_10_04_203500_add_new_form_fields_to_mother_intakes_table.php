<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('mother_intakes', function (Blueprint $table) {
            $table->string('journey_stage')->nullable()->after('phone');
            $table->unsignedTinyInteger('pregnancy_weeks')->nullable()->after('journey_stage');
            $table->unsignedTinyInteger('baby_weeks_old')->nullable()->after('pregnancy_weeks');
            $table->string('hospital_planned')->nullable()->after('baby_weeks_old');
            $table->boolean('agree_comms')->default(false)->after('hospital_planned');
            $table->boolean('disclaimer_ack')->default(false)->after('agree_comms');
        });
    }

    public function down(): void
    {
        Schema::table('mother_intakes', function (Blueprint $table) {
            $table->dropColumn([
                'journey_stage',
                'pregnancy_weeks',
                'baby_weeks_old',
                'hospital_planned',
                'agree_comms',
                'disclaimer_ack',
            ]);
        });
    }
};
