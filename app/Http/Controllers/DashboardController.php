<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Get Active Tasks
     */
    public function getActiveTasks($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Active tasks retrieved successfully',
            'data' => [
                'user_id' => $userId,
                'active_tasks' => 5,
                'high_priority_tasks' => 2,
                'medium_priority_tasks' => 2,
                'low_priority_tasks' => 1
            ]
        ]);
    }

    /**
     * Get Completed Tasks
     */
    public function getCompletedTasks($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Completed tasks retrieved successfully',
            'data' => [
                'user_id' => $userId,
                'completed_tasks' => 12,
                'completed_today' => 3,
                'completed_this_week' => 8
            ]
        ]);
    }

    /**
     * Get Today's Schedule
     */
    public function getTodaySchedule($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Today schedule retrieved successfully',
            'data' => [
                'user_id' => $userId,
                'date' => now()->format('Y-m-d'),
                'schedule' => [
                    [
                        'time' => '08:00',
                        'subject' => 'Basis Data',
                        'location' => 'Lab Komputer'
                    ],
                    [
                        'time' => '13:00',
                        'subject' => 'Pemrograman Web',
                        'location' => 'Ruang Kelas A'
                    ]
                ]
            ]
        ]);
    }

    /**
     * Get Weekly Progress
     */
    public function getWeeklyProgress($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Weekly progress retrieved successfully',
            'data' => [
                'user_id' => $userId,
                'weekly_progress' => '75%',
                'attendance_rate' => '90%',
                'task_completion_rate' => '80%'
            ]
        ]);
    }

    /**
     * Get Dashboard Summary
     */
    public function getDashboardSummary($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Dashboard summary retrieved successfully',
            'data' => [
                'user_id' => $userId,
                'active_tasks' => 5,
                'completed_tasks' => 12,
                'weekly_progress' => '75%',
                'attendance_rate' => '90%',
                'next_class' => 'Pemrograman Web',
                'next_class_time' => '13:00',
                'notifications' => 4
            ]
        ]);
    }

    /**
     * Get Notifications
     */
    public function getNotifications($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Notifications retrieved successfully',
            'data' => [
                [
                    'id' => 1,
                    'title' => 'Tugas Baru',
                    'description' => 'Tugas Pemrograman Web telah ditambahkan',
                    'status' => 'unread'
                ],
                [
                    'id' => 2,
                    'title' => 'Jadwal Kuliah',
                    'description' => 'Kuliah Basis Data dimulai pukul 08:00',
                    'status' => 'read'
                ]
            ]
        ]);
    }

    /**
     * Get Upcoming Deadlines
     */
    public function getUpcomingDeadlines($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Upcoming deadlines retrieved successfully',
            'data' => [
                [
                    'task' => 'Laporan Basis Data',
                    'deadline' => '2026-06-20'
                ],
                [
                    'task' => 'Project Laravel',
                    'deadline' => '2026-06-25'
                ]
            ]
        ]);
    }
}