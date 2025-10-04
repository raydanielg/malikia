<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mother_intakes', function (Blueprint $table) {
            // Check if columns don't already exist before adding them
            if (!Schema::hasColumn('mother_intakes', 'status')) {
                $table->enum('status', ['pending', 'in_progress', 'completed', 'reviewed'])->default('pending')->after('interests');
            }

            if (!Schema::hasColumn('mother_intakes', 'reviewed_by')) {
                $table->unsignedBigInteger('reviewed_by')->nullable()->after('status');
            }

            if (!Schema::hasColumn('mother_intakes', 'reviewed_at')) {
                $table->timestamp('reviewed_at')->nullable()->after('reviewed_by');
            }

            if (!Schema::hasColumn('mother_intakes', 'completed_at')) {
                $table->timestamp('completed_at')->nullable()->after('reviewed_at');
            }

            if (!Schema::hasColumn('mother_intakes', 'notes')) {
                $table->text('notes')->nullable()->after('completed_at');
            }

            if (!Schema::hasColumn('mother_intakes', 'priority')) {
                $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium')->after('notes');
            }

            // user_id is managed by a dedicated earlier migration (2025_09_10_001100_add_user_id_to_mother_intakes_table)

            // Add foreign keys (ignore if they already exist)
            if (Schema::hasColumn('mother_intakes', 'reviewed_by')) {
                try {
                    $table->foreign('reviewed_by')->references('id')->on('users')->onDelete('set null');
                } catch (\Exception $e) {
                    // FK may already exist; ignore
                }
            }

            // user_id foreign key is handled in its own migration

            // Add indexes only if they don't exist
            if (Schema::hasColumns('mother_intakes', ['status', 'priority'])) {
                try {
                    $table->index(['status', 'priority']);
                } catch (\Exception $e) {
                    // Index might already exist
                }
            }

            if (Schema::hasColumn('mother_intakes', 'reviewed_by')) {
                try {
                    $table->index('reviewed_by');
                } catch (\Exception $e) {
                    // Index might already exist
                }
            }

            // user_id index handled elsewhere
        });
    }

    public function down(): void
    {
        Schema::table('mother_intakes', function (Blueprint $table) {
            // Drop foreign keys (ignore if missing)
            try { $table->dropForeign(['reviewed_by']); } catch (\Exception $e) {}
            try { $table->dropForeign(['user_id']); } catch (\Exception $e) {}

            // Drop indexes
            $table->dropIndex(['status', 'priority']);
            $table->dropIndex(['reviewed_by']);
            $table->dropIndex(['user_id']);

            // Drop columns
            $table->dropColumn([
                'status',
                'reviewed_by',
                'reviewed_at',
                'completed_at',
                'notes',
                'priority',
                'user_id'
            ]);
        });
    }
};
