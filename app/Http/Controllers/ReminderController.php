<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReminderController extends Controller
{
    /**
     * Create New Reminder
     */
    public function createReminder(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Reminder created successfully',
            'data' => [
                'id' => rand(1, 1000),
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'tanggal' => $request->input('tanggal'),
                'waktu' => $request->input('waktu'),
                'status' => 'active',
                'created_at' => now()
            ]
        ]);
    }

    /**
     * Get All Reminders By User
     */
    public function getRemindersByUser($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Reminders retrieved successfully',
            'data' => [
                'user_id' => $userId,
                'total_reminders' => 3,
                'reminders' => [
                    [
                        'id' => 1,
                        'judul' => 'Kuis Web Programming',
                        'tanggal' => '2026-06-20',
                        'status' => 'active'
                    ],
                    [
                        'id' => 2,
                        'judul' => 'Deadline Proposal',
                        'tanggal' => '2026-06-25',
                        'status' => 'active'
                    ]
                ]
            ]
        ]);
    }

    /**
     * Get Reminder Detail
     */
    public function getReminderDetail($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Reminder detail retrieved successfully',
            'data' => [
                'id' => $id,
                'judul' => 'Kuis Web Programming',
                'deskripsi' => 'Mengerjakan kuis Laravel',
                'tanggal' => '2026-06-20',
                'waktu' => '09:00'
            ]
        ]);
    }

    /**
     * Update Reminder
     */
    public function updateReminder($id, Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Reminder updated successfully',
            'data' => [
                'id' => $id,
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'tanggal' => $request->input('tanggal'),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Delete Reminder
     */
    public function deleteReminder($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Reminder deleted successfully',
            'data' => [
                'deleted_reminder_id' => $id,
                'deleted_at' => now()
            ]
        ]);
    }

    /**
     * Send Notification
     */
    public function sendNotification($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Notification sent successfully',
            'data' => [
                'user_id' => $userId,
                'notification_title' => 'Deadline Reminder',
                'notification_message' => 'Deadline tugas Pemrograman Web besok pukul 23:59',
                'sent_at' => now()
            ]
        ]);
    }

    /**
     * Get Upcoming Reminders
     */
    public function getUpcomingReminders($userId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Upcoming reminders retrieved successfully',
            'data' => [
                [
                    'judul' => 'Presentasi Proyek',
                    'tanggal' => '2026-06-18'
                ],
                [
                    'judul' => 'Ujian Basis Data',
                    'tanggal' => '2526-06-22'
                ]
            ]
        ]);
    }

    /**
     * Mark Reminder as Completed
     */
    public function markAsCompleted($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Reminder marked as completed',
            'data' => [
                'reminder_id' => $id,
                'status' => 'completed',
                'completed_at' => now()
            ]
        ]);
    }

    public function index(Request $request)
    {
        return $this->getRemindersByUser($request->user()->id ?? 1);
    }

    public function store(Request $request)
    {
        return $this->createReminder($request);
    }
}