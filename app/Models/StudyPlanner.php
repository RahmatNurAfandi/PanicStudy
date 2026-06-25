<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyPlanner extends Model
{
    protected $table = 'study_planners';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'priority',
        'due_date',
        'study_time',
        'status',
    ];

    protected $casts = [
        'due_date' => 'date',
        'study_time' => 'datetime:H:i',
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

    public function reminders()
    {
        return $this->hasMany(Reminder::class, 'planner_id');
    }

    public function progress()
    {
        return $this->hasOne(Progress::class, 'planner_id');
    }
}