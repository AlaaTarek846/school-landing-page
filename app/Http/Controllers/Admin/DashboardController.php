<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use App\Models\StudentRegistration;
use App\Models\ContactMessage;
use App\Models\EducationalStage;
use App\Models\CampusTour;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.dashboard');
    }

    public function getStats(): JsonResponse
    {
        $stats = [
            'registrations_count' => StudentRegistration::count(),
            'messages_count' => ContactMessage::count(),
            'stages_count' => EducationalStage::count(),
            'tours_count' => CampusTour::count(),
        ];

        $recentRegistrations = StudentRegistration::with(['educationalStage', 'classRoom'])
            ->latest()
            ->take(5)
            ->get();

        $recentMessages = ContactMessage::latest()
            ->take(5)
            ->get();

        // Data for student distribution by stage chart
        $chartData = EducationalStage::withCount('studentRegistrations')
            ->get()
            ->map(function ($stage) {
                return [
                    'label' => $stage->name, // TranslationsTrait handles this if $stage->name is used
                    'count' => $stage->student_registrations_count
                ];
            });

        return response()->json([
            'stats' => $stats,
            'recentRegistrations' => $recentRegistrations,
            'recentMessages' => $recentMessages,
            'chartData' => $chartData,
        ]);
    }
}
