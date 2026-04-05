<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mother_intakes', function (Blueprint $table) {
            if (!Schema::hasColumn('mother_intakes', 'region')) {
                $table->string('region')->nullable()->after('district_id');
            }

            if (!Schema::hasColumn('mother_intakes', 'district')) {
                $table->string('district')->nullable()->after('region');
            }

            if (!Schema::hasColumn('mother_intakes', 'referral')) {
                $table->string('referral')->nullable()->after('district');
            }
        });
    }

    public function down(): void
    {
        Schema::table('mother_intakes', function (Blueprint $table) {
            $columns = [];

            if (Schema::hasColumn('mother_intakes', 'referral')) {
                $columns[] = 'referral';
            }

            if (Schema::hasColumn('mother_intakes', 'district')) {
                $columns[] = 'district';
            }

            if (Schema::hasColumn('mother_intakes', 'region')) {
                $columns[] = 'region';
            }

            if ($columns) {
                $table->dropColumn($columns);
            }
        });
    }
};
