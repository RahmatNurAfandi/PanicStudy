<?php

namespace App\Services;

use App\Models\Progress;

class DashboardService
{
    public function getSummary($user)
    {
        return [
            'active_tasks' => $user->planners()
                                   ->where('status', 'pending')
                                   ->count(),

            'completed_tasks' => $user->planners()
                                      ->where('status', 'completed')
                                      ->count(),

            'today_schedule' => $user->planners()
                                     ->whereDate('due_date', now())
                                     ->count(),

            'upcoming_deadlines' => $user->planners()
                                         ->whereDate('due_date', '>', now())
                                         ->count(),

            'weekly_progress' => Progress::where('user_id', $user->id)
                                         ->avg('completion_percentage') ?? 0,
        ];
    }
}
