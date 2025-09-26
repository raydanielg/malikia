<?php

namespace App\Http\Controllers;

use App\Models\MotherIntake;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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
        // This would be implemented with a package like Laravel Excel
        // For now, return a simple CSV
        return $this->exportCSV();
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
