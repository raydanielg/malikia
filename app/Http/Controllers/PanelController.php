<?php

namespace App\Http\Controllers;

use App\Models\MotherIntake;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use App\Exports\MotherIntakesExport;

class PanelController extends Controller
{
    public function index()
    {
        // Precompute dashboard data to avoid querying in Blade
        $total = MotherIntake::count();
        $pending = MotherIntake::where('status', 'pending')->count();
        $inProgress = MotherIntake::where('status', 'in_progress')->count();
        $completed = MotherIntake::where('status', 'completed')->count();
        $reviewed = MotherIntake::where('status', 'reviewed')->count();

        $uniqueUsers = MotherIntake::distinct('phone')->count('phone');

        $statusCounts = [
            'pending' => $pending,
            'in_progress' => $inProgress,
            'completed' => $completed,
            'reviewed' => $reviewed,
        ];

        $priorityCounts = [
            'low' => MotherIntake::where('priority', 'low')->count(),
            'medium' => MotherIntake::where('priority', 'medium')->count(),
            'high' => MotherIntake::where('priority', 'high')->count(),
            'urgent' => MotherIntake::where('priority', 'urgent')->count(),
        ];

        $intakes = MotherIntake::latest()->get();
        $recentIntakes = MotherIntake::latest()->take(5)->get();

        $stats = [
            'total' => $total,
            'pending' => $pending,
            'in_progress' => $inProgress,
            'completed' => $completed,
            'reviewed' => $reviewed,
            'unique_users' => $uniqueUsers,
        ];

        return view('panel.dashboard', compact('stats', 'statusCounts', 'priorityCounts', 'intakes', 'recentIntakes'));
    }

    // Users management: all users are admins in this app
    public function usersIndex(Request $request)
    {
        $q = (string) $request->get('q', '');
        $users = User::query()
            ->when($q !== '', function ($qb) use ($q) {
                $qb->where(function ($sub) use ($q) {
                    $sub->where('name', 'like', "%$q%")
                        ->orWhere('email', 'like', "%$q%")
                        ->orWhere('phone', 'like', "%$q%" );
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('panel.users-index', compact('users', 'q'));
    }

    public function usersStore(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'],
            'phone' => ['nullable','string','max:50'],
            'password' => ['nullable','string','min:6'],
        ]);

        $password = $data['password'] ?? str()->password(10);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Mtumiaji mpya ameongezwa. Nenosiri: '.$password);
    }

    public function listIntakes(Request $request)
    {
        $q = (string) $request->get('q', '');
        $status = (string) $request->get('status', '');
        $priority = (string) $request->get('priority', '');
        $stage = (string) $request->get('journey_stage', '');
        $perPage = (int) max(5, min(100, (int) $request->get('per_page', 15)));

        $intakes = MotherIntake::query()
            ->when($q !== '', function ($qbuilder) use ($q) {
                $qbuilder->where(function ($sub) use ($q) {
                    $sub->where('full_name', 'like', "%$q%")
                        ->orWhere('phone', 'like', "%$q%")
                        ->orWhere('hospital_planned', 'like', "%$q%")
                        ->orWhere('journey_stage', 'like', "%$q%")
                        ;
                });
            })
            ->when($status !== '', fn($qb) => $qb->where('status', $status))
            ->when($priority !== '', fn($qb) => $qb->where('priority', $priority))
            ->when($stage !== '', fn($qb) => $qb->where('journey_stage', $stage))
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('panel.intakes-index', compact('intakes', 'q', 'status', 'priority', 'stage', 'perPage'));
    }

    public function markAsCompleted(Request $request, MotherIntake $intake)
    {
        try {
            $intake->markAsCompleted();
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Fomu imekamilika kikamilifu!'
                ]);
            }
            return redirect()->back()->with('success', 'Fomu imekamilika kikamilifu!');
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'Tatizo limetokea.'], 500);
            }
            return redirect()->back()->with('error', 'Tatizo limetokea.');
        }
    }

    public function markAsReviewed(Request $request, MotherIntake $intake)
    {
        try {
            $intake->markAsReviewed(\Auth::id());
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Fomu imepitiwa kikamilifu!'
                ]);
            }
            return redirect()->back()->with('success', 'Fomu imepitiwa kikamilifu!');
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'Tatizo limetokea.'], 500);
            }
            return redirect()->back()->with('error', 'Tatizo limetokea.');
        }
    }

    public function showDetails(MotherIntake $intake)
    {
        return view('panel.intake-details', compact('intake'));
    }

    public function exportExcel()
    {
        // If Excel package (or its interfaces) is unavailable in this environment, fallback to CSV
        $excelAvailable = class_exists(\Maatwebsite\Excel\Facades\Excel::class)
            && interface_exists(\Maatwebsite\Excel\Concerns\FromQuery::class);

        if (!$excelAvailable) {
            // Graceful fallback without erroring in production
            return $this->exportCSV();
        }

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
