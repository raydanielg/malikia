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

            if (!Schema::hasColumn('mother_intakes', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('priority');
            }

            // Add foreign keys only if they don't exist
            if (Schema::hasColumn('mother_intakes', 'reviewed_by') && !Schema::hasColumn('mother_intakes', 'reviewed_by_foreign')) {
                $table->foreign('reviewed_by')->references('id')->on('users')->onDelete('set null');
            }

            if (Schema::hasColumn('mother_intakes', 'user_id') && !Schema::hasColumn('mother_intakes', 'user_id_foreign')) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            }

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

            if (Schema::hasColumn('mother_intakes', 'user_id')) {
                try {
                    $table->index('user_id');
                } catch (\Exception $e) {
                    // Index might already exist
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('mother_intakes', function (Blueprint $table) {
            // Drop foreign keys
            $table->dropForeign(['reviewed_by']);
            $table->dropForeign(['user_id']);

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
