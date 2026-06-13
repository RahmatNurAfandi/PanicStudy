<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable = [
        'user_id',
        'planner_id',
        'completion_percentage',
        'completed_tasks',
        'total_tasks',
    ];

    protected $casts = [
        'completion_percentage' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function planner()
    {
        return $this->belongsTo(StudyPlanner::class, 'planner_id');
    }

    public function getStatusAttribute()
    {
        return $this->completion_percentage >= 100
            ? 'completed'
            : 'in_progress';
    }
}