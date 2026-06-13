<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'user_id',
        'planner_id',
        'title',
        'message',
        'reminder_date',
        'is_read',
    ];

    protected $casts = [
        'reminder_date' => 'datetime',
        'is_read' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function planner()
    {
        return $this->belongsTo(StudyPlanner::class, 'planner_id');
    }
}