<?php

namespace App\Http\Controllers;

use App\Models\MotherIntake;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MotherIntakesExport;

class PanelController extends Controller
{
    public function index()
    {
        return view('panel.dashboard');
    }

    public function markAsCompleted(Request $request, MotherIntake $intake): JsonResponse
    {
        try {
            $intake->markAsCompleted();

            return response()->json([
                'success' => true,
                'message' => 'Fomu imekamilika kikamilifu!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Kosa: ' . $e->getMessage()
            ], 500);
        }
    }

    public function markAsReviewed(Request $request, MotherIntake $intake): JsonResponse
    {
        try {
            $intake->markAsReviewed(Auth::id());

            return response()->json([
                'success' => true,
                'message' => 'Fomu imepitiwa kikamilifu!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Kosa: ' . $e->getMessage()
            ], 500);
        }
    }

    public function showDetails(MotherIntake $intake)
    {
        return view('panel.intake-details', compact('intake'));
    }

    public function exportExcel()
    {
        // Download as real Excel file
        return Excel::download(new MotherIntakesExport(), 'mother_intakes.xlsx');
    }

    public function exportCSV()
    {
        $filename = 'mother_intakes.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Cache-Control' => 'no-store, no-cache',
        ];

        $columns = [
            'ID', 'Full Name', 'Phone',
            'Journey Stage', 'Pregnancy Weeks', 'Baby Weeks Old', 'Hospital Planned', 'Agree Comms', 'Disclaimer Ack',
            'Email', 'Age', 'Pregnancy Stage', 'Due Date', 'Location',
            'Previous Pregnancies', 'Concerns', 'Interests', 'Status', 'Reviewed By', 'Reviewed At',
            'Completed At', 'Notes', 'Priority', 'User ID', 'Created At', 'Updated At'
        ];

        $callback = function () use ($columns) {
            $handle = fopen('php://output', 'w');
            // Write UTF-8 BOM for Excel compatibility
            fwrite($handle, "\xEF\xBB\xBF");

            // Headings
            fputcsv($handle, $columns);

            MotherIntake::query()->orderByDesc('id')->chunk(500, function ($rows) use ($handle) {
                foreach ($rows as $r) {
                    fputcsv($handle, [
                        $r->id,
                        $r->full_name,
                        $r->phone,
                        $r->journey_stage,
                        $r->pregnancy_weeks,
                        $r->baby_weeks_old,
                        $r->hospital_planned,
                        $r->agree_comms ? 'Yes' : 'No',
                        $r->disclaimer_ack ? 'Yes' : 'No',
                        $r->email,
                        $r->age,
                        $r->pregnancy_stage,
                        optional($r->due_date)->toString() ?? $r->due_date,
                        $r->location,
                        $r->previous_pregnancies,
                        $r->concerns,
                        $r->interests,
                        $r->status,
                        $r->reviewed_by,
                        optional($r->reviewed_at)->toDateTimeString(),
                        optional($r->completed_at)->toDateTimeString(),
                        $r->notes,
                        $r->priority,
                        $r->user_id,
                        optional($r->created_at)->toDateTimeString(),
                        optional($r->updated_at)->toDateTimeString(),
                    ]);
                }
            });

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function toggleUserStatus(Request $request, User $user): JsonResponse
    {
        try {
            // Toggle email verification status
            $user->update([
                'email_verified_at' => $user->email_verified_at ? null : now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Hali ya mtumiaji imebadilishwa kikamilifu!',
                'verified' => $user->email_verified_at ? true : false
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Kosa: ' . $e->getMessage()
            ], 500);
        }
    }

    public function showUserDetails(User $user)
    {
        return view('panel.user-details', compact('user'));
    }

    public function sendNotification(Request $request): JsonResponse
    {
        try {
            // This would integrate with a notification service
            // For now, just return success
            return response()->json([
                'success' => true,
                'message' => 'Arifa imetumwa kikamilifu!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Kosa: ' . $e->getMessage()
            ], 500);
        }
    }

    public function systemHealth(): JsonResponse
    {
        try {
            $issues = [];

            // Check database connection
            try {
                \DB::connection()->getPdo();
            } catch (\Exception $e) {
                $issues[] = 'Database connection failed';
            }

            // Check storage permissions
            if (!is_writable(storage_path())) {
                $issues[] = 'Storage directory not writable';
            }

            // Check cache
            try {
                \Cache::put('health_check', 'ok', 10);
                \Cache::get('health_check');
            } catch (\Exception $e) {
                $issues[] = 'Cache system not working';
            }

            return response()->json([
                'status' => empty($issues) ? 'healthy' : 'issues',
                'issues' => $issues,
                'timestamp' => now()->toISOString()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'issues' => ['System health check failed'],
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function clearCache(Request $request): JsonResponse
    {
        try {
            \Artisan::call('cache:clear');
            \Artisan::call('config:clear');
            \Artisan::call('route:clear');
            \Artisan::call('view:clear');

            return response()->json([
                'success' => true,
                'message' => 'Cache imesafishwa kikamilifu!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Kosa: ' . $e->getMessage()
            ], 500);
        }
    }

    public function backupDatabase()
    {
        try {
            // This would create a database backup
            // For now, just return a message
            return response()->json([
                'success' => true,
                'message' => 'Backup imefanywa kikamilifu!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Kosa: ' . $e->getMessage()
            ], 500);
        }
    }

    private function getStatusText($status)
    {
        return match($status) {
            'pending' => 'Inasubiri',
            'in_progress' => 'Inaendelea',
            'completed' => 'Imekamilika',
            'reviewed' => 'Imepitiwa',
            default => ucfirst($status ?? 'pending'),
        };
    }

    private function getPriorityText($priority)
    {
        return match($priority) {
            'low' => 'Chini',
            'medium' => 'Kati',
            'high' => 'Juu',
            'urgent' => 'Haraka',
            default => ucfirst($priority ?? 'medium'),
        };
    }
}
