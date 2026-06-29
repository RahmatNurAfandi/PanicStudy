<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyPlannerController extends Controller
{
    /**
     * Create Study Plan
     */
    public function createPlan(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Study plan created successfully',
            'data' => [
                'plan_id' => rand(1, 1000),
                'mata_kuliah' => $request->input('mata_kuliah'),
                'deadline' => $request->input('deadline'),
                'prioritas' => $request->input('prioritas'),
                'target_jam_belajar' => $request->input('target_jam_belajar'),
                'created_at' => now()
            ]
        ]);
    }

    /**
     * Get All Plans By User
     */
    public function getPlansByUser($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Study plans retrieved successfully',
            'data' => [
                'user_id' => $userId,
                'total_plans' => 2,
                'plans' => [
                    [
                        'plan_id' => 1,
                        'mata_kuliah' => 'Pemrograman Web',
                        'deadline' => '2026-06-20',
                        'prioritas' => 'Tinggi'
                    ],
                    [
                        'plan_id' => 2,
                        'mata_kuliah' => 'Basis Data',
                        'deadline' => '2026-06-25',
                        'prioritas' => 'Sedang'
                    ]
                ]
            ]
        ]);
    }

    /**
     * Get Plan Detail
     */
    public function getPlanDetail($planId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Plan detail retrieved successfully',
            'data' => [
                'plan_id' => $planId,
                'mata_kuliah' => 'Pemrograman Web',
                'deadline' => '2026-06-20',
                'prioritas' => 'Tinggi',
                'target_jam_belajar' => 10
            ]
        ]);
    }

    /**
     * Update Study Plan
     */
    public function updatePlan($planId, Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Study plan updated successfully',
            'data' => [
                'plan_id' => $planId,
                'mata_kuliah' => $request->input('mata_kuliah'),
                'deadline' => $request->input('deadline'),
                'prioritas' => $request->input('prioritas'),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Delete Study Plan
     */
    public function deletePlan($planId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Study plan deleted successfully',
            'data' => [
                'deleted_plan_id' => $planId,
                'deleted_at' => now()
            ]
        ]);
    }

    /**
     * Generate Priority Plan
     */
    public function generatePriorityPlan($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Priority plan generated successfully',
            'data' => [
                'user_id' => $userId,
                'highest_priority_task' => 'Tugas Basis Data',
                'deadline' => '2026-06-18',
                'recommended_study_hours' => 4
            ]
        ]);
    }

    /**
     * Get Weekly Study Schedule
     */
    public function getWeeklySchedule($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Weekly study schedule retrieved successfully',
            'data' => [
                'Senin' => 'Pemrograman Web',
                'Selasa' => 'Basis Data',
                'Rabu' => 'Jaringan Komputer',
                'Kamis' => 'Pemrograman Mobile',
                'Jumat' => 'Review Materi'
            ]
        ]);
    }

    /**
     * Get Study Recommendations
     */
    public function getStudyRecommendations($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Study recommendations retrieved successfully',
            'data' => [
                'recommended_subject' => 'Basis Data',
                'reason' => 'Deadline paling dekat',
                'estimated_hours_needed' => 6
            ]
        ]);
    }

    /**
     * Mark Plan As Completed
     */
    public function markPlanCompleted($planId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Study plan completed successfully',
            'data' => [
                'plan_id' => $planId,
                'status' => 'completed',
                'completed_at' => now()
            ]
        ]);
    }

    public function index(Request $request)
    {
        return $this->getPlansByUser($request->user()->id ?? 1);
    }

    public function store(Request $request)
    {
        return $this->createPlan($request);
    }
}