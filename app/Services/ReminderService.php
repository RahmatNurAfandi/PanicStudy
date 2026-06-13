<?php

namespace App\Services;

use App\Models\Reminder;

class ReminderService
{
    public function getAll($user)
    {
        return Reminder::where('user_id', $user->id)
                        ->latest()
                        ->get();
    }

    public function markAsRead($id)
    {
        $reminder = Reminder::findOrFail($id);

        $reminder->update([
            'is_read' => true,
        ]);

        return $reminder;
    }
}
