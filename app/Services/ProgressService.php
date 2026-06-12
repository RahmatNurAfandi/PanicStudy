<?php

namespace App\Services;

use App\Models\Progress;

class ProgressService
{
    public function getAll($user)
    {
        return Progress::where('user_id', $user->id)->get();
    }

    public function update($id, array $data)
    {
        $progress = Progress::findOrFail($id);

        $progress->update($data);

        return $progress;
    }
}
