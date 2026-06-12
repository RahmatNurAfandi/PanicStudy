<?php

namespace App\Services;

use App\Models\StudyPlanner;

class PlannerService
{
    public function getAll($user)
    {
        return $user->planners()
                    ->latest()
                    ->get();
    }

    public function create($user, array $data)
    {
        return StudyPlanner::create([
            'user_id'     => $user->id,
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'priority'    => $data['priority'],
            'due_date'    => $data['due_date'],
            'study_time'  => $data['study_time'] ?? null,
            'status'      => 'pending',
        ]);
    }
}
